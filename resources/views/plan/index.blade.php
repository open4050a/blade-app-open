<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Plan') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex justify-center">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg content-400">
                    <form method="POST" action="{{ route('plan.search') }}" class="">
                        @csrf

                        <div class="p-6 text-gray-900 search">

                            <h3 class="">
                                <span>{{ __('Search') }}</span>
                            </h3>
                            <div class="">
                                <div class="item">
                                    <h4 class=""><span>{{ __('Keyword') }}</span></h4>
                                    <div class="">
                                        <input name="keyword" class="keyword" value="" placeholder="プラン名など" class="keyword @error('keyword') is-invalid @enderror">
                                    </div>

                                    @error('keyword')
                                            <div class="status tac mb10">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- <div class="item">
                                    <h4 class=""><span>{{ __('User Type') }}</span></h4>
                                    <div class="flex type">
                                        <input type="checkbox" name="" id="">
                                        <p>{{ __('Adult') }}</p>
                                    </div>
                                    <div class="flex type">
                                        <input type="checkbox" name="" id="">
                                        <p>{{ __('Child') }}</p>
                                    </div>
                                </div> -->
                            </div>

                            <!-- 検索 -->
                            <div class="item">
                                <x-primary-button>
                                    {{ __('Search') }}
                                </x-primary-button>
                            </div>
                        </div>

                    </form>
                </div>

                <div class="content-right">
                @isset($plans)
                @foreach ($plans as $plan)
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb20">
                            <div class="p-6 text-gray-900 plan item">
                                <div class="">
                                    <input type="hidden" name="id" value="{{ $plan->id }}">
                                    <h4 class="">{{ $plan->plan_name }}</h4>
                                    <p class="mb20">{{ $plan->explanation }}</p>
                                    <div class="card-info flex">
                                        <div class="mr10">
                                            <p>大人料金：<span>¥{{ number_format($plan->adult_price) }}</span>/月</p>
                                        </div>
                                        <div class="">
                                            <p>子供料金：<span>¥{{ number_format($plan->child_price) }}</span>/月</p>
                                        </div>
                                    </div>
                                </div>
                                
                                <!-- 詳細ボタン -->
                                <div class="flex">
                                    <a href="{{ url('/plan/show/' . ($plan->id)) }}" class="btn">{{ __('Detail') }}</a>
                                </div>
                            </div>
                    </div>
                @endforeach
                @endisset
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
