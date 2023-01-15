<x-app-layout>
    {{-- adapted from resources/views/components/auth-card.blade.php --}}
    <div class="min-h-screen flex flex-col items-center pt-6 sm:pt-0 bg-gray-100 py-4">
        <div>
            <div class="p-4 bg-white d-flex flex-col mt-5">
                <h1 class="justify-center">Twoje pary</h1>
                @foreach($users as $user)
                    <div class="d-flex p-3 my-2 flex-row border-solid border-slate-400 border-2">
                        <h2 class="inline-block mx-5">{{$user->profile->name}}</h2>
                        <h2 class="inline-block mx-5">{{$user->profile->surname}}</h2>
                        <h2 class="inline-block mx-5">{{$user->profile->favourite_function}}</h2>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
