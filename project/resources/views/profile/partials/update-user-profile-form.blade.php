<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Twój profil') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __('Daj się poznać innym! Im bardziej spersonalizowany jest Twój profil, tym większa szansa na dobre dopasowanie!') }}
        </p>
    </header>

    <form id="user-profile-form" method="post" action="{{ route('userProfile.update') }}" enctype="multipart/form-data" class="mt-6 space-y-6">
        @csrf
        @method('patch')
        <div>
            <x-input-label for="name" :value="__('Imię')" />
            <x-text-input id="user-name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $userProfile->name)"/>
        </div>

        <div>
            <x-input-label for="surname" :value="__('Nazwisko')" />
            <x-text-input id="user-surname" name="surname" type="text" class="mt-1 block w-full" :value="old('surname', $userProfile->surname)"/>
        </div>

        <div>
            <x-input-label for="favourite_number" :value="__('Ulubiona liczba całkowita')" />
            <x-text-input id="user-favourite-number" name="favourite_number" type="number" class="mt-1 block w-full" :value="old('favourite_number', $userProfile->favourite_number)"/>
        </div>

        <div>
            <x-input-label for="favourite_function" :value="__('Ulubiona funkcja')" />
            <x-text-input id="user-favourite-function" name="favourite_function" type="text" class="mt-1 block w-full" :value="old('favourite_function', $userProfile->favourite_function)"/>
        </div>

        <div>
            <x-input-label for="description" :value="__('Twój opis')" />
            <textarea id="user-description" name="description" form="user-profile-form"
                      class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full mt-1 h-120 w-full block">{{$userProfile->description ?? ""}}</textarea>
        </div>

        <div>
            <x-input-label for="picture" :value="__('Twoje zdjęcie profilowe')" />
            <input class="form-control" id="user-picture" name="picture" type="file" accept="image/jpeg"/>
        </div>
        @if(file_exists($profileImagePath))
        <div>
            <img src="{{asset($profileImagePath)}}">
        </div>
        @endif

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Zapisz') }}</x-primary-button>

            @if (session('status') === 'userProfile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600"
                >{{ __('Zapisano.') }}</p>
            @endif
        </div>
    </form>
</section>
