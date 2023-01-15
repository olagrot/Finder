<x-app-layout>
    {{-- adapted from resources/views/components/auth-card.blade.php --}}
    <div class="min-h-screen flex flex-col items-center pt-6 sm:pt-0 bg-gray-100 py-4">
        <div>
            @if($match)
                <div class="p-4 bg-white d-flex flex-col space-y-4 mt-5">
                    <h1 class="justify-center">Znaleziono matematyka!</h1>
                    <h2>{{$match->profile->name}}</h2>
                    <h2>{{$match->profile->surname}}</h2>
                    <h2>{{$match->profile->favourite_function}}</h2>
                </div>
                <form method="post" class="bg-white">
                    @csrf
                    <input name="matchId" value="{{$match->id}}" class="hidden">
                    <input formaction="/match/accept" type="submit" name="accept" class="d-block bg-emerald-500 p-4"
                           value="Wspaniały biorę go!">
                    <input formaction="/match/deny" type="submit" name="deny"  class="d-block bg-red-500 p-4"
                           value="Meh, znajdź innego">
                </form>
            @else
                <h1>Niestety nie znaleziono nikogo spełniającego twoje wymagania</h1>
            @endif

        </div>
    </div>
</x-app-layout>
