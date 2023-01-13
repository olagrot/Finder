<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6">
                <p class="text-s60"> {{__($userProfile->name . " " . $userProfile->surname)}} </p>
                <div class="table h-400 w-full">
                    <div class="table-cell w-1/2 relative">
                        <div class="top-0">
                            <p class="mt-4">{{__('Ulubiona liczba: ' . $userProfile->favourite_number)}}</p>
                            <p class="mt-4">{{__('Ulubiona funkcja: ' . $userProfile->favourite_function)}}</p>
                            <p class="mt-4">{{__('Zdobytych punktów: ' . $userProfile->points)}}</p>
                            <p class="mt-4">{{__('Liga: ' . $userProfile->league)}}</p>
                            <p class="mt-4">{{__('Coś o sobie: ' . $userProfile->description)}}</p>
                        </div>
                    </div>
                    <div class="table-cell w-1/2">
                        @if(file_exists($profileImagePath))
                        <div>
                            <img class="max-w-300 max-h-300" src="{{asset($profileImagePath)}}">
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>