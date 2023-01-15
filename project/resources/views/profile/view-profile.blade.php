<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6">
                <p class="text-s60"> {{__($userProfile->name . " " . $userProfile->surname)}} </p>
                <div class="table h-400 w-full">
                    <div class="table-cell w-1/2 relative">
                        <div class="top-0 absolute">
                            <p class="mt-4">{{__('Ulubiona liczba: ' . $userProfile->favourite_number)}}</p>
                            <p class="mt-4">{{__('Ulubiona funkcja: ' . $userProfile->favourite_function)}}</p>
                            <p class="mt-4">{{__('Zdobytych punktów: ' . $userProfile->points)}}</p>
                            <p class="mt-4">{{__('Liczy jako: ' . $userLeague)}}</p>
                            <p class="mt-4">{{__('Coś o sobie: ' . $userProfile->description)}}</p>
                        </div>
                    </div>
                    <div class="table-cell w-1/2">
                        @if(file_exists($profileImagePath))
                        <div class="text-center flex items-center justify-center mt-8 mb-6">
                            <img class="max-w-300 max-h-300" src="{{asset($profileImagePath)}}">
                        </div>
                        @else
                        <div class="text-center">
                            <div>Dodaj swoje zdjęcie profilowe w ustawieniach!</div>
                            <div class="flex items-center justify-center mt-8 mb-6">
                                <img class="mt-8" src="{{asset("assets/profileImages/image_default.jpg")}}">
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
