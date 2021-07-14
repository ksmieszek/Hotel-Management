<x-guest-layout>
    <x-auth-card>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Password')" />

                <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="current-password" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-button class="ml-3">
                    {{ __('Log in') }}
                </x-button>
            </div>
            <div class="flex items-center justify-start mt-4">
                <a class="underline text-sm text-white hover:text-gray-300"  href="{{ route('register') }}" >
                   Don't have account yet?
                </a>
            </div>

            <div class="flex items-center justify-start mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-white hover:text-gray-300" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                    
                @endif
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
