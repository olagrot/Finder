<x-guest-layout>
    {{-- adapted from resources/views/components/auth-card.blade.php --}}
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
        <div>
            <h1>{{ $riddle->title }}</h1>
        </div>
        <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
            @markdown($riddle->question)
            {{-- created based on https://flowbite.com/docs/typography/links/ --}}
            <div class="flex flex-col sm:justify-center items-center">
                <a href="{{ route('riddles.index') }}"
                   class="font-medium text-blue-600 dark:text-blue-500 mt-8">
                    <x-primary-button id="riddle-back" class="ml-3">
                        {{ __('Powrót') }}
                    </x-primary-button>
                </a>
            </div>
        </div>
    </div>
</x-guest-layout>
