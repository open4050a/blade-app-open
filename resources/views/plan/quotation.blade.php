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
                            {{ __('Quotation') }}
                        </h3>
                        <p class="title_sub">プランのお見積もり</p>
                    </div>

                    <form method="POST" action="{{ route('plan.confirm') }}">
                        @csrf
                        
                        <div class="mb20 flex justify-center">
                            <div class="info">
                                <div class="item mb20">
                                    <h4 class="title mb20">申込内容</h4>
                                    <div class="mb20">
                                        <div class="list mb20">
                                            <input type="hidden" name="id" value="{{ $plan['id'] }}">
                                            <label class="">プラン名</label>
                                            <p class="account">{{ $plan['plan_name'] }}</p>
                                        </div>
                                        @error('id')
                                            <div class="status tac mb10">{{ $message }}</div>
                                        @enderror

                                        <div class="list mb20">
                                            <label class="">開始日</label>
                                            <input type="date" name="start_date" class="keyword @error('start_date') is-invalid @enderror" value="{{ old('start_date') }}">
                                        </div>
                                        @error('start_date')
                                            <div class="status tac mb10">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
    
                                <div class="item mb20">
                                    <h4 class="title mb20">申込者情報</h4>
                                    <div class="mb20">
                                        <div class="list mb20">
                                            <label class="">氏名</label>
                                            <div class="">
                                                <p class="account">{{ Auth::user()->first_name . Auth::user()->last_name }}</p>
                                            </div>
                                        </div>

                                        <div class="list mb20">
                                            <label class="">誕生日</label>
                                            <input type="date" name="birthday" class="keyword @error('birthday') is-invalid @enderror" value="{{ old('birthday') }}">
                                        </div>
                                        @error('birthday')
                                            <div class="status tac mb10">{{ $message }}</div>
                                        @enderror

                                        <div class="list mb20">
                                            <label class="">性別</label>
                                            <div class="flex flex-right">
                                                <label class="mr30">
                                                    <input name="gender" type="radio" class="radio @error('gender') is-invalid @enderror" value="0" {{ old('gender') === '0' ? 'checked' : '' }}>
                                                    男性
                                                </label>
                                                <label class="">
                                                    <input name="gender" type="radio" class="radio @error('gender') is-invalid @enderror" value="1" {{ old('gender') === '1' ? 'checked' : '' }}>
                                                    女性
                                                </label>
                                            </div>
                                        </div>
                                        @error('gender')
                                            <div class="status tac mb10">{{ $message }}</div>
                                        @enderror

                                        <div class="list mb20">
                                            <label class="">電話番号</label>
                                            <div class="flex">
                                                <input type="text" name="tel1" placeholder="0120" class="keyword mr10 @error('tel1') is-invalid @enderror" value="{{ old('tel1') }}">
                                                <input type="text" name="tel2" placeholder="00" class="keyword mr10 @error('tel2') is-invalid @enderror" value="{{ old('tel2') }}">
                                                <input type="text" name="tel3" placeholder="1111" class="keyword @error('tel3') is-invalid @enderror" value="{{ old('tel3') }}">
                                            </div>
                                        </div>
                                        @error('tel1')
                                            <div class="status tac mb10">{{ $message }}</div>
                                        @enderror
                                        @error('tel2')
                                            <div class="status tac mb10">{{ $message }}</div>
                                        @enderror
                                        @error('tel3')
                                            <div class="status tac mb10">{{ $message }}</div>
                                        @enderror

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
                                            <input type="checkbox" name="checkbox" class="checkbox @error('checkbox') is-invalid @enderror" value="1" {{ old('checkbox') === '1' ? 'checked' : '' }} >
                                            <span>同意する</span>
                                        </label>

                                        <div class="flex flex-end mr30">
                                            <a href="{{ asset($plan['file']) }}" class="agree btn">{{ __('Membership Agreement') }}</a>
                                        </div>
                                    </div>
                                    @error('checkbox')
                                        <div class="status tac mb10">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
    
                        <!-- 確認ボタン -->
                        <div class="flex">
                            <button type="sumbit" class="btn">{{ __('Confirm') }}</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
