<x-guest-layout>
    <x-auth-card>
        
        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4 text-center" :errors="$errors" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- logo -->
            <a class="flex items-center justify-center text-gray-600 font-bold p-5 mb-4 md:mb-0" href="">
                <!-- title -->
                <span class="ml-3 text-2xl">mokumoku会員登録</span>
            </a>

            <!-- Name -->
            <div>
                <x-label for="name" :value="__('ユーザー名')" />

                <x-input id="name" class="block mt-5 w-full" type="text" name="name" :value="old('name')" required autofocus />
            </div>

            <!-- Email Address -->
            <div class="mt-12">
                <x-label for="email" :value="__('メールアドレス')" />

                <x-input id="email" class="block mt-5 w-full" type="email" name="email" :value="old('email')" required />
            </div>

            <!-- Password -->
            <div class="mt-12">
                <x-label for="password" :value="__('パスワード')" />

                <x-input id="password" class="block mt-5 w-full"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-12">
                <x-label for="password_confirmation" :value="__('パスワード確認用')" />

                <x-input id="password_confirmation" class="block mt-5 w-full"
                                type="password"
                                name="password_confirmation" required />
            </div>

            <div class="flex items-center justify-end mt-12">
                <a class="underline text-lg text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('すでに登録済みの方はこちら') }}
                </a>

                <x-button class="ml-4">
                    {{ __('ユーザー登録') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>