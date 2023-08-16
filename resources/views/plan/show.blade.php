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
                            {{ __('Detail') }}
                        </h3>
                        <p class="title_sub">プランについてのご説明</p>
                    </div>

                    <div class="mb30 flex">
                        <div class="image mr30">
                            <img src="{{ asset($plan['image']) }}" alt="プラン画像">
                        </div>

                        <div class="info">
                            <div class="item mb20">
                                <h4 class="title mb20">プランについて</h4>
                                <div class="list mb20">
                                    <p class="">プラン名</p>
                                    <p class=""><span>{{ $plan['plan_name'] }}</span></p>
                                </div>
                            </div>

                            <div class="item mb20">
                                <h4 class="title mb20">基本情報</h4>
                                <div class="list mb20">
                                    <p class="">大人料金</p>
                                    <p class=""><span>¥{{ number_format($plan['adult_price']) }}</span></p>
                                    <p class="">子供料金</p>
                                    <p class=""><span>¥{{ number_format($plan['child_price']) }}</span></p>
                                </div>
                            </div>

                            <div class="item">
                                <h4 class="title mb20">利用可能時間</h4>
                                <div class="list mb20">
                                    <p class="">時間帯</p>
                                    <p class=""><span>{{ $plan['explanation'] }}</span></p>
                                </div>
                            </div>
                        </div>

                    </div>

                    <!-- 見積もりボタン -->
                    <div class="flex justify-center">
                        <a href="{{ url('/plan/quotation/' . ($plan['id'])) }}" class="btn">{{ __('Quotation') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
