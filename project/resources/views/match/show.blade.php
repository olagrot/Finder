<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Moje pary') }}
        </h2>
    </x-slot>
    {{-- adapted from resources/views/components/auth-card.blade.php --}}
    <div class="min-h-screen flex flex-col items-center pt-6 sm:pt-0 py-4">
        <div class="w-full sm:max-w-2xl mt-6 px-6 py-4 bg-gray-900 text-white  shadow-md overflow-hidden sm:rounded-lg">
            <div class="d-flex flex flex-col items-center p-4 d-flex flex-col mt-5">
                <h1 class="justify-center">Twoje pary</h1>
                @foreach($users as $user)
                    <div class="flex flex-col d-flex items-center p-3 my-2 flex-row border-solid border-slate-400 border-2">
                        <h2 class="inline-block mx-5">{{$user->profile->name}}</h2>
                        <h2 class="inline-block mx-5">{{$user->profile->surname}}</h2>
                        <h2 class="inline-block mx-5">{{$user->profile->favourite_function}}</h2>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
