<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Student Profile Information') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __('Update your student profile information.') }}
        </p>
    </header>


    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <div>
            <x-input-label for="grade" :value="__('Grade')" />
            <select class="select w-full mt-1" id="grade" name="grade" type="text" required autofocus>
                <option disabled selected>Select yout grade</option>
                @foreach ($grade as $g)
                    <option :value="{{ $g->id }}">{{ $g->name }}</option>
                @endforeach
            </select>
            <x-input-error class="mt-2" :messages="$errors->get('grade')" />
        </div>

        <div>
            <x-input-label for="school" :value="__('School')" />
            <x-text-input id="school" name="school" type="text" class="mt-1 block w-full" :value="old('name', $user->school)"
                required autofocus autocomplete="school" />
            <x-input-error class="mt-2" :messages="$errors->get('school')" />
        </div>


        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'profile-updated')
                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-green-600">{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>
