<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    {{--<form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button class="ms-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>--}}

    <div class="login">
        <div class="login-content">
            <form  method="POST" action="{{ route('login') }}" name="login_form">
                @csrf
                <h1 class="text-center">Sign In</h1>
                <div class="text-muted text-center mb-4">
                    For your protection, please verify your identity.
                </div>

                <!-- Email Address -->
                <div class="mb-3">
                    <x-input-label for="email" :value="__('Email')"/>
                    <x-input-text id="email" type="email" name="email" :value="old('email')"  placeholder="username@address.com" required autofocus autocomplete="username" />
                </div>

                <!-- Password -->
                <div class="mb-3">
                    <div class="d-flex">
                        <x-input-label for="password" :value="__('Password')" />
                        @if (Route::has('password.request'))
                            <a class="ms-auto text-muted" href="{{ route('password.request') }}">
                                {{ __('Forgot your password?') }}
                            </a>
                        @endif
                    </div>

                    <x-input-text id="password" class="block mt-1 w-full"
                                  placeholder="Enter your password"
                                  type="password"
                                  name="password"
                                  required autocomplete="current-password" />

                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Remember Me -->
                <div class="mb-3">
                    <div class="form-check">
                        <input name="remember" id="remember_me" class="form-check-input" type="checkbox" />
                        <label class="form-check-label fw-500" for="remember_me">{{ __('Remember me') }}</label>
                    </div>
                </div>
                <x-primary-button>{{ __('Log in') }} </x-primary-button>

                <div class="text-center text-muted">
                    Don't have an account yet? <a href="{{route("register")}}">Sign up</a>.
                </div>
            </form>
        </div>

    </div>
</x-guest-layout>
