<x-guest-layout>
    {{-- adapted from resources/views/components/auth-card.blade.php --}}
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
        <div>
            <h1 class="mb-4">Zagadki</h1>
        </div>
        <div class="flex flex-col sm:justify-center items-center">
            <div class="mb-4">
                <form method="post" action={{route("riddles.random")}}>
                    @csrf
                    <x-primary-button id="random-riddle" class="ml-3">
                        {{ __('Wylosuj zagadkę') }}
                    </x-primary-button>
                </form>
            </div>

            <div>
                <form method="post" action={{route("riddles.filter")}}>
                    @csrf
                    <select name="category">
                        <option @if($selected == "all")selected="selected" @endif value="all">wszystkie kategorie
                        </option>
                        @foreach($categories as $category)
                            <option value="{{$category}}"
                                    @if($selected == $category) selected="selected" @endif>{{$category}}</option>
                        @endforeach
                    </select>

                    <x-primary-button id="riddles-filter" class="ml-3">
                        {{ __('Filtruj') }}
                    </x-primary-button>
                </form>
            </div>

        </div>
        <div class="w-full sm:max-w-2xl mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
            {{-- created based on https://flowbite.com/docs/typography/lists/ --}}
            <dl class="max-w-2xl text-gray-900 divide-y divide-gray-200 dark:text-white dark:divide-gray-700">
                @foreach($riddles as $riddle)
                    <div class="flex flex-col pb-3 riddle">
                        <dt class="mb-1 text-gray-500 md:text-lg dark:text-gray-400">
                            <a href="{{ route('riddles.show', $riddle) }}">{{ $riddle->title }}</a>
                        </dt>
                        <dd class="text-lg font-semibold">
                            @markdown($riddle->question)
                        </dd>
                    </div>
                @endforeach
            </dl>
        </div>
        <div class="mt-3">
            <a href="{{ route('riddles.page', last(request()->segments()) - 1) }}">
                <x-secondary-button id="riddles-previous" name="riddles-previous">
                    {{ __('<') }}
                </x-secondary-button>
            </a>

            <span id="riddles-page-number" class="ml-2 mr-2">{{ last(request()->segments()) }}</span>

            <a href="{{ route('riddles.page', last(request()->segments()) + 1) }}">
                <x-secondary-button id="riddles-next" name="riddles-next">
                    {{ __('>') }}
                </x-secondary-button>
            </a>
        </div>
    </div>
</x-guest-layout>
