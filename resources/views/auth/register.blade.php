<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Zip Code -->
        <div class="mt-4">
            <x-input-label for="zip_code" :value="__('CEP')" />
            <x-text-input id="zip_code" class="block mt-1 w-full" type="text" name="address[zip_code]" :value="old('address.zip_code')" required autofocus maxlength="9" oninput="this.value = this.value.replace(/[^0-9-]/g, '').replace(/^(\d{5})(\d{1,3})$/, '$1-$2').slice(0, 9)" />
            <x-input-error :messages="$errors->get('address.zip_code')" class="mt-2" />
        </div>
        <!-- Street -->
        <div class="mt-4">
            <x-input-label for="street" :value="__('Street')" />
            <x-text-input id="street" class="block mt-1 w-full" type="text" name="address[street]" :value="old('address.street')" required autofocus />
            <x-input-error :messages="$errors->get('address.street')" class="mt-2" />
        </div>

        <!-- Neighborhood -->
        <div class="mt-4">
            <x-input-label for="neighborhood" :value="__('Neighborhood')" />
            <x-text-input id="neighborhood" class="block mt-1 w-full" type="text" name="address[neighborhood]" :value="old('address.neighborhood')" required autofocus />
            <x-input-error :messages="$errors->get('address.neighborhood')" class="mt-2" />
        </div>

        <!-- Number -->
        <div class="mt-4">
            <x-input-label for="number" :value="__('Number')" />
            <x-text-input id="number" class="block mt-1 w-full" type="text" name="address[number]" :value="old('address.number')" required autofocus />
            <x-input-error :messages="$errors->get('address.number')" class="mt-2" />
        </div>

        <!-- City -->
        <div class="mt-4">
            <x-input-label for="city" :value="__('City')" />
            <x-text-input id="city" class="block mt-1 w-full" type="text" name="address[city]" :value="old('address.city')" required autofocus />
            <x-input-error :messages="$errors->get('address.city')" class="mt-2" />
        </div>

        <!-- State -->
        <div class="mt-4">
            <x-input-label for="state" :value="__('State')" />
            <x-text-input id="state" class="block mt-1 w-full" type="text" name="address[state]" :value="old('address.state')" required autofocus />
            <x-input-error :messages="$errors->get('address.state')" class="mt-2" />
        </div>
        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>


        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>

    </form>
</x-guest-layout>
