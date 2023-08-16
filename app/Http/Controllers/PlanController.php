<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\PlanRequest;
use App\Http\Requests\SearchRequest;
use App\Models\User;
use App\Models\MstPlan;
use App\Models\UserPlan;
use Carbon\Carbon;

/**
 * プラン画面
 */
class PlanController extends Controller
{
    const AGREE_FILE_NAME = 'プラン同意書.pdf';

    /**
     * 一覧画面
     */
    public function index(): View
    {
        $plans = MstPlan::excludeDelFlagOne()->get();

        return view('plan.index', ['plans' => $plans]);
    }

    /**
     * 詳細画面
     *
     * @return View
     */
    public function show(Int $id)
    {
        $data = MstPlan::find($id);

        if ($data->delete_flag !== 0) {
            return redirect('/plan');
        }

        $plan = [
            'id' => $data->id,
            'plan_name' => $data->plan_name,
            'adult_price' => $data->adult_price,
            'child_price' => $data->child_price,
            'explanation' => $data->explanation,
            'image' => $data->image,
        ];

        if (session('plan')) {
            session()->forget('plan');
        }

        session(['plan' => $plan]);

        return view('plan.show', ['plan' => $plan]);
    }

    /**
     * 見積もり画面
     *
     * @return View
     */
    public function quotation(Int $id): View
    {
        $plan = session('plan');

        if ($id !== $plan['id']) {
            return redirect('/plan');
        }

        $data = [
            'id' => $plan['id'],
            'plan_name' => $plan['plan_name'],
            'file' => 'storage/files/' . self::AGREE_FILE_NAME,
        ];

        return view('plan.quotation', ['plan' => $data]);
    }

    /**
     * 確認画面
     */
    public function confirm(PlanRequest $request): View
    {
        $validated = $request->validated();
        $max = 12;

        // 0:大人 or 1:子供料金
        $age = Carbon::parse($validated['birthday'])->age;
        $type = $age > $max ? 0 : 1;

        $end = Carbon::parse($validated['start_date'])->addYear()->format('Y-m-d');

        if (session('plan.store')) {
            session()->forget('plan.store');
        }

        session()->push('plan.store', [
            'start_date' => $validated['start_date'],
            'end_date' => $end,
            'price_type' => $type,
            'birthday' => $validated['birthday'],
            'gender' => $validated['gender'],
            'tell' => $validated['tel1'] . '-' . $validated['tel2'] . '-' . $validated['tel3'],
        ]);

        $plan = session('plan');

        $types = [
            'name' => $type === 0 ? '大人' : '子供',
            'price' => $type === 0 ? $plan['adult_price'] : $plan['child_price'],
        ];

        $items = $validated + [
            'types' => $types,
            'plan' => $plan['plan_name'],
            'end_date' => $end,
        ];

        return view('plan.confirm', ['items' => $items]);
    }

    /**
     * プラン登録
     */
    public function store(): View
    {
        $plan = session('plan');

        try {
            User::where('id', Auth::id())
                ->update([
                    'birthday' => $plan['store'][0]['birthday'],
                    'gender' => $plan['store'][0]['gender'],
                    'tell' => $plan['store'][0]['tell'],
                ]);
        } catch (\Exception $e) {
            report($e);
            return view('plan.store', ['status' => 'ユーザー情報の登録に失敗しました。再度実施してください。']);
        }

        try {
            UserPlan::where('user_id', Auth::id())
                ->where('delete_flag', 0)
                ->update(['delete_flag' => 1]);
        } catch (\Exception $e) {
            report($e);
            return view('plan.store', ['status' => 'プランの更新に失敗しました。再度実施してください。']);
        }

        try {
            UserPlan::create([
                'user_id' => Auth::id(),
                'mst_plan_id' => $plan['id'],
                'price_type' => $plan['store'][0]['price_type'],
                'start_date' => $plan['store'][0]['start_date'],
                'end_date' => $plan['store'][0]['end_date'],
                'delete_flag' => 0,
            ]);
        } catch (\Exception $e) {
            report($e);
            return view('plan.store', ['status' => 'プランの登録に失敗しました。再度実施してください。']);
        }

        return view('plan.store', ['status' => '登録しました。']);
    }

    /**
     * プラン検索
     *
     * @param SearchRequest $request
     * @return View
     */
    public function search(SearchRequest $request): View
    {
        $validated = $request->validated();
        
        $plans = MstPlan::keyword($validated['keyword'])->excludeDelFlagOne()->get();

        return view('plan.index', ['plans' => $plans]);

    }
}
