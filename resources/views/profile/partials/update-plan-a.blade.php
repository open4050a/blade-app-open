<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Plan Information') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __('Update plans to which the account is subscribed.') }}
        </p>
    </header>

    <div class="mt-6 space-y-6">
        <h3 class="plan">{{ $plan }}</h3>

        <div class="flex items-center gap-4">
            <!-- 変更ページに遷移 -->
            <x-primary-a href="{{ route('plan.index') }}">{{ __('Change') }}</x-primary-a>
        </div>
    </div>
</section>
