<section>
    <header>
        <x-header-form>
            {{ __('Change User Data') }}
        </x-header-form>
    </header>

    <form method="post" action="{{ route('users.update', ['user' => $user]) }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <div>
            <x-input-label for="username" :value="__('Username')" />
            <x-text-input id="username" name="username" :value="old('username', $user->username)" type="text" class="mt-1 block w-full"
                autocomplete="username" />
            <x-input-error :messages="$errors->get('username')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email', $user->email)"
                required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="role" :value="__('Role')" />
            <x-select name="role" :options="$roles" :selected="count($user->roles) ? $user->roles[0]->id : $roles[0]->id" class="w-full" />
            <x-input-error :messages="$errors->get('role')" class="mt-2" />
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

        </div>
    </form>
</section>
