<x-guest-layout>

    <x-auth-card>
    <!-- Validation Errors -->
        <x-auth-validation-errors class="my-4" :errors="$errors" />
        <x-slot name="logo">
            <a href="{{asset('/')}}">
                <x-application-logo class="w-20 h-20" />
            </a>
        </x-slot>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />



        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus/>
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Password')" />

                <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="current-password"  />
            </div>

            <!-- Remember Me -->
            <div class=" my-4 flex items-center justify-between">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-gold-600 shadow-sm focus:border-gold-300 focus:ring focus:ring-gold-200 focus:ring-opacity-50" name="remember">
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
                  @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif
            </div>


            <x-button class="w-full flex justify-center">
                    {{ __('Log in') }}
                </x-button>
                <a class="underline block text-sm text-gray-600 hover:text-gray-900 mt-3 text-center" href="{{ route('register') }}">
                        {{ __('Register yourself') }}
                    </a>
        </form>
    </x-auth-card>
</x-guest-layout>
