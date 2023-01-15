<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Znajdz pare') }}
        </h2>
    </x-slot>
    {{-- adapted from resources/views/components/auth-card.blade.php --}}
    <div class="min-h-screen flex flex-col items-center pt-8 py-4 rounded-md">
        <div class=" w-full sm:max-w-2xl mt-6 px-6 py-4 bg-gray-900 text-white  shadow-md overflow-hidden sm:rounded-lg">
            @if($match)
                <div class="p-4 d-flex flex flex-col items-center space-y-4">
                    <h1 class="justify-center">Znaleziono matematyka!</h1>
                    <h2>{{$match->profile->name}}</h2>
                    <h2>{{$match->profile->surname}}</h2>
                    <h2>{{$match->profile->favourite_function}}</h2>
                </div>
            <div class="flex flex-col items-center">
                <form method="post">
                    @csrf
                    <input name="matchId" value="{{$match->id}}" class="hidden">
                    <input formaction="/match/accept" type="submit" name="accept" class="d-block bg-emerald-500 p-4"
                           value="Wspaniały biorę go!">
                    <input formaction="/match/deny" type="submit" name="deny"  class="d-block bg-red-500 p-4"
                           value="Meh, znajdź innego">
                </form>
            </div>
            @else
                <h1>Niestety nie znaleziono nikogo spełniającego twoje wymagania</h1>
            @endif


        </div>
    </div>
</x-app-layout>
