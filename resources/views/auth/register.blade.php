<x-guest-layout>
    <form method="POST" action="{{ route('register.create') }}">
        @csrf
        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')"/>
            <x-text-input id="name"
                          class="block mt-1 w-full"
                          type="text"
                          name="name"
                          :value="old('name')"
                          required
                          autofocus
                          autocomplete="username"/>
            <x-input-error :messages="$errors->get('name')" class="mt-2"/>
        </div>
        <!-- Phone -->
        <div class="mt-4">
            <x-input-label for="phone" :value="__('Phone')"/>
            <x-text-input id="phone"
                          class="block mt-1 w-full"
                          type="text"
                          name="phone"
                          :value="old('phone')"
                          required
                          autocomplete="phone"/>
            <x-input-error :messages="$errors->get('email')" class="mt-2"/>
        </div>
        <!-- Submit -->
        <div class="flex items-center justify-end mt-4">
            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
