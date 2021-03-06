<x-guest-layout>
  <div class="lg:hidden">
    <x-jet-authentication-card>

      <img class="flex-grow w-3/5 object-cover" src="{{ 'images/authbg.jpg' }}">

      <div class="flex items-center px-6 py-5 w-2/5">
        <form method="POST" action="{{ route('register') }}">
          @csrf

          <div class="mb-6 text-center">
            <p class="text-2xl font-bold mb-3">Welcome to <span class="text-indigo-600"><a
                  href="/">Laboratory!</a></span>
            <p class="px-2 max-w-full text-base mx-auto">Create an account to start the adventure</p>
            <x-jet-validation-errors class="mt-4" />
          </div>
          <div>
            <x-jet-label for="name" value="{{ __('Name') }}" />
            <x-jet-input id="name" class="block mt-1 w-full placeholder-gray-400" type="text" name="name"
              placeholder="Kevin Johnson" :value="old('name')" required autofocus autocomplete="name" />
          </div>

          <div class="mt-4">
            <x-jet-label for="email" value="{{ __('Email') }}" />
            <x-jet-input id="email" class="block mt-1 w-full placeholder-gray-400" type="email" name="email"
              placeholder="john@example.com" :value="old('email')" required />
          </div>

          <div class="mt-4">
            <x-jet-label for="password" value="{{ __('Password') }}" />
            <x-jet-input id="password" class="block mt-1 w-full placeholder-gray-400" type="password" name="password"
              placeholder="Must have at least 6 characters" required autocomplete="new-password" />
          </div>

          <div class="mt-4">
            <x-jet-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
            <x-jet-input id="password_confirmation" class="block mt-1 w-full placeholder-gray-400" type="password"
              name="password_confirmation" placeholder="Re-enter password" required autocomplete="new-password" />
          </div>

          @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
            <div class="mt-4">
              <x-jet-label for="terms">
                <div class="flex items-center">
                  <x-jet-checkbox name="terms" id="terms" />

                  <div class="ml-2 text-xs">
                    {!! __('I agree to the :terms_of_service and :privacy_policy', [
    'terms_of_service' => '<a target="_blank" href="' . route('terms.show') . '" class="underline text-xs text-gray-600 hover:text-gray-900">' . __('Terms of Service') . '</a>',
    'privacy_policy' => '<a target="_blank" href="' . route('policy.show') . '" class="underline text-xs text-gray-600 hover:text-gray-900">' . __('Privacy Policy') . '</a>',
]) !!}
                  </div>
                </div>
              </x-jet-label>
            </div>
          @endif

          <div class="flex items-center justify-between mt-4">
            <a class="text-sm text-indigo-600 hover:text-indigo-900" href="{{ route('login') }}">
              {{ __('Already registered?') }}
            </a>

            <x-jet-button class="ml-4">
              {{ __('Register') }}
            </x-jet-button>
          </div>
        </form>
      </div>
    </x-jet-authentication-card>
  </div>

  {{-- Responsive Content --}}
  <div class="hidden lg:block">
    <section class="flex">
      <main class="w-96 bg-red-400 space-y-5 block md:hidden">
        <div>
          <img class="object-cover h-screen" src="{{ 'images/authbg.jpg' }}" alt="reader">
        </div>
      </main>

      <main class="flex-auto bg-white py-8 px-6 md:px-20 sm:px-8">

        <div class="mb-6 text-center">
          <p class="text-2xl font-bold mb-3">Welcome to <span class="text-indigo-600"><a href="/">Laboratory!</a></span>
          <p class="px-2 max-w-full text-base mx-auto sm:text-sm">Create an account to start the adventure</p>
          <x-jet-validation-errors class="mt-4" />
        </div>

        <section class="flex flex-col">
          <form method="POST" action="{{ route('register') }}">
            @csrf
            <div class="mt-1">
              <x-jet-label for="name" value="{{ __('Name') }}" />
              <x-jet-input id="name" class="block mt-1 w-full placeholder-gray-400" type="text" name="name"
                placeholder="Kevin Johnson" :value="old('name')" required autofocus autocomplete="name" />
            </div>

            <div class="mt-4">
              <x-jet-label for="email" value="{{ __('Email') }}" />
              <x-jet-input id="email" class="block mt-1 w-full placeholder-gray-400" type="email" name="email"
                placeholder="john@example.com" :value="old('email')" required />
            </div>

            <div class="mt-4">
              <x-jet-label for="password" value="{{ __('Password') }}" />
              <x-jet-input id="password" class="block mt-1 w-full placeholder-gray-400" type="password" name="password"
                placeholder="Password" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
              <x-jet-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
              <x-jet-input id="password_confirmation" class="block mt-1 w-full placeholder-gray-400" type="password"
                name="password_confirmation" placeholder="Re-enter password" required autocomplete="new-password" />
            </div>

            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
              <div class="mt-4">
                <x-jet-label for="terms">
                  <div class="flex items-center">
                    <x-jet-checkbox name="terms" id="terms" />

                    <div class="ml-2 text-xs">
                      {!! __('I agree to the :terms_of_service and :privacy_policy', [
    'terms_of_service' => '<a target="_blank" href="' . route('terms.show') . '" class="underline text-xs text-gray-600 hover:text-gray-900">' . __('Terms of Service') . '</a>',
    'privacy_policy' => '<a target="_blank" href="' . route('policy.show') . '" class="underline text-xs text-gray-600 hover:text-gray-900">' . __('Privacy Policy') . '</a>',
]) !!}
                    </div>
                  </div>
                </x-jet-label>
              </div>
            @endif

            <div class="flex items-center justify-between mt-4">
              <a class="text-sm text-indigo-600 hover:text-indigo-900" href="{{ route('login') }}">
                {{ __('Already registered?') }}
              </a>

              <x-jet-button class="ml-4">
                {{ __('Register') }}
              </x-jet-button>
            </div>
          </form>
        </section>
      </main>
    </section>
  </div>
</x-guest-layout>
