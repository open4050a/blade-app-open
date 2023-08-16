<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\MstPlan;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        $data = User::find($request->user()->id)->plan()->first();
        
        $planName = '';

        if (is_null($data)) {
            $planName = '未契約';
        } else {
            $plan = MstPlan::find($data->mst_plan_id)->first();
            $planName = $plan->plan_name;
        }
        
        return view('profile.edit', [
            'user' => $request->user(),
            'plan' => $planName,
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {

        $request->user()->fill($request->validated());

        if($request->hasFile('icon')) {
            $directory = 'account/';
            $userDirectory = Auth::user()->id;
            $extension = $request->file('icon')->getClientOriginalExtension();
            $name = 'icon.' . $extension;
            
            if (! Storage::disk('public')->exists($directory)) {
                Storage::makeDirectory('/public/' . $directory);
            }
            
            if (! Storage::disk('public')->exists($directory . $userDirectory)) {
                Storage::makeDirectory('/public/' . $directory . $userDirectory);
            }
            
            $path = $directory . $userDirectory . '/' . (string) Str::uuid();
            Storage::makeDirectory('/public/' . $path);

            $request->user()->icon = '/storage/' . $request->file('icon')->storeAs($path, $name, 'public');
        }

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
