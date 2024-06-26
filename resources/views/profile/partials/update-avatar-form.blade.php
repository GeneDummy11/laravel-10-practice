<section>
    <header>
        <img class="w-40 h-40 rounded-full" src="{{ "/storage/$user->avatar" }}" alt="user avatar" />

        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            User Avatar
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            Update your account's avatar.
        </p>

        @if (session('message'))
            <p class="text-red-400">
                {{ session('message') }}
            </p>
        @endif
    </header>

    <form method="post" action="{{ route('profile.avatar') }}" enctype="multipart/form-data" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <div>
            <x-input-label for="name" value="Avatar" />
            <x-text-input id="avatar" name="avatar" type="file" class="mt-1 block w-full" :value="old('avatar', $user->avatar)" required autofocus autocomplete="avatar" />
            <x-input-error class="mt-1" :messages="$errors->get('avatar')" />
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>
        </div>
    </form>
</section>
