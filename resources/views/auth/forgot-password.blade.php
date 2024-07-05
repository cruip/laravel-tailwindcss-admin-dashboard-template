<x-authentication-layout>
    <h1 class="text-3xl text-gray-800 dark:text-gray-100 font-bold mb-6">{{ __('Reset your Password') }}</h1>
    @if (session('status'))
        <div class="mb-4 font-medium text-sm text-green-600">
            {{ session('status') }}
        </div>
    @endif
    <!-- Form -->
    <form method="POST" action="{{ route('password.email') }}">
        @csrf
        <div>
            <x-label for="email">{{ __('Email Address') }} <span class="text-red-500">*</span></x-label>
            <x-input id="email" type="email" name="email" :value="old('email')" required autofocus />                
        </div>
        <div class="flex justify-end mt-6">
            <x-button>
                {{ __('Send Reset Link') }}
            </x-button>
        </div>
    </form>
    <x-validation-errors class="mt-4" /> 
</x-authentication-layout>
