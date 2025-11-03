@php
    use App\Services\Game\Enums\Status;
@endphp

<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <section>
                    <header>
                        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                            {{ __('Play') }}
                        </h2>

                        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                            {{ __('Click it!') }}
                        </p>
                    </header>
                    <form method="POST"
                          action="{{ route(name: 'game.play', parameters: ['user' => Auth::signature()->getUserId(), 'hash' => Auth::signature()->getHash()]) }}">
                        @csrf

                        <!-- Submit -->
                        <div class="flex items-center justify-end">
                            <x-primary-button class="ms-4">
                                {{ __('ImFeelingLucky') }}
                            </x-primary-button>
                        </div>

                        @if ($status = session()->pull('status'))
                            <p x-data="{ show: true }"
                               x-show="show"
                               x-transition
                               x-init="setTimeout(() => show = false, 5000)"
                               class="text-sm text-gray-600 dark:text-gray-400"
                            >{{ Status::from($status)->title() }}</p>
                        @endif
                    </form>
                </section>
            </div>
        </div>
    </div>
</x-app-layout>
