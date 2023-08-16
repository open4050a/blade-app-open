<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Plan') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 plan">

                    <div class="title_area">
                        <h3 class="font-semibold text-gray-800 leading-tight">
                            {{ __('Confirm') }}
                        </h3>
                        <p class="title_sub">以下の料金プランで登録します。</p>
                    </div>

                    <form method="POST" action="{{ route('plan.store') }}">
                        @csrf

                        <div class="mb20 flex justify-center">
                            <div class="info">
                                <div class="item mb20">
                                    <h4 class="title mb20">申込内容</h4>
                                    <div class="mb20">
                                        <div class="list mb20">
                                            <input type="hidden" name="id" value="{{ $items['id'] }}">
                                            <label class="">プラン名</label>
                                            <div class=""><p class="account">{{ $items['plan'] }}</p></div>
                                        </div>

                                        <div class="list mb20">
                                            <label class="">料金タイプ</label>
                                            <div class=""><p class="account">{{ $items['types']['name'] . ' : ' . number_format($items['types']['price']) . ' 円' }}</p></div>
                                        </div>

                                        <div class="list mb20">
                                            <label class="">開始日</label>
                                            <div class=""><p class="account">{{ $items['start_date'] }}</p></div>
                                        </div>

                                        <div class="list mb20">
                                            <label class="">終了日</label>
                                            <div class=""><p class="account">{{ $items['end_date'] }}</p></div>
                                        </div>
                                    </div>
                                </div>
    
                                <div class="item mb20">
                                    <h4 class="title mb20">申込者情報</h4>
                                    <div class="mb20">
                                        <div class="list mb20">
                                            <label class="">氏名</label>
                                            <div class=""><p class="account">{{ Auth::user()->first_name . Auth::user()->last_name }}</p></div>
                                        </div>

                                        <div class="list mb20">
                                            <label class="">誕生日</label>
                                            <div class=""><p class="account">{{ $items['birthday'] }}</p></div>
                                        </div>

                                        <div class="list mb20">
                                            <label class="">性別</label>
                                            <div class="">
                                                @if ($items['gender'] === 0)
                                                <p class="account">男性</p>
                                                @else
                                                <p class="account">女性</p>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="list mb20">
                                            <label class="">電話番号</label>
                                            <div class=""><p class="account">{{ $items['tel1'] . '-' . $items['tel2'] . '-' .$items['tel3'] }}</p></div>
                                        </div>

                                        <div class="list mb20">
                                            <label class="">メールアドレス</label>
                                            <div class=""><p class="account">{{ Auth::user()->email }}</p></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="item mb20">
                                    <h4 class="title mb20">会員規約・個人情報</h4>
                                    <div class="list mb20 check">
                                        <label class="">
                                            <span>同意</span>
                                        </label>
                                        <div class=""><p class="account">{{ __('Done') }}</p></div>
                                    </div>
                                </div>
                            </div>
                        </div>
    
                        <!-- 登録ボタン -->
                        <div class="flex">
                            <button type="sumbit" class="btn">{{ __('Register') }}</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
