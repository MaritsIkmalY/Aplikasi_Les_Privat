<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Informasi Profil Murid') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __('Perbarui informasi Anda') }}
        </p>
    </header>


    <form method="post" action="/profile/student/{{ Auth::user()->id }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <div>
            <x-input-label for="grade" :value="__('Kelas')" />
            <select class="select w-full mt-1" id="grade" name="grade" type="text" required autofocus>
                <option disabled selected>Pilih kelas Anda</option>
                @foreach ($grade as $g)
                    <option @if ($student->grade_id == $g->id) selected @endif value="{{ $g->id }}">
                        {{ $g->name }}</option>
                @endforeach
            </select>
            <x-input-error class="mt-2" :messages="$errors->get('grade')" />
        </div>

        {{-- <div>
            <x-input-label for="school" :value="__('School')" />
            <x-text-input id="school" name="school" type="text" class="mt-1 block w-full" :value="old('name', $user->school)"
                required autofocus autocomplete="school" />
            <x-input-error class="mt-2" :messages="$errors->get('school')" />
        </div> --}}


        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Simpan') }}</x-primary-button>

            @if (session('status') === 'profile-updated')
                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-green-600">{{ __('Tersimpan') }}</p>
            @endif
        </div>
    </form>
</section>
