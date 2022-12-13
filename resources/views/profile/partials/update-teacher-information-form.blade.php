<section>
    <header>
        <h2 class="text-lg font-medium ">
            {{ __('Profil Pengajar') }}
        </h2>

        <p class="mt-1 text-sm ">
            {{ __('Perbarui profil Anda') }}
        </p>
    </header>


    <form method="post" action="/profile/teacher/{{ Auth::user()->id }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <div>
            <x-input-label for="category" :value="__('Bidang')" />
            <select class="select w-full mt-1" id="category" name="category_id" type="text" required autofocus>
                <option disabled selected>Pilih bidang Anda</option>
                @foreach ($categories as $category)
                    <option @if ($teacher->category_id == $category->id) selected @endif value="{{ $category->id }}">
                        {{ $category->name }}</option>
                @endforeach
            </select>
            <x-input-error class="mt-2" :messages="$errors->get('category_id')" />
        </div>

        <div>
            <x-input-label for="fee" :value="__('Biaya')" />
            <x-text-input id="fee" name="fee" type="text" class="mt-1 block w-full" :value="old('fee', $teacher->fee)"
                required autofocus autocomplete="fee" />
            <x-input-error class="mt-2" :messages="$errors->get('fee')" />
        </div>

        <div>
            <x-input-label for="schedule" :value="__('Jadwal')" />
            <x-text-input id="schedule" name="schedule" type="text" class="mt-1 block w-full" :value="old('time', $teacher->schedule)"
                required autofocus autocomplete="schedule" />
            <x-input-error class="mt-2" :messages="$errors->get('schedule')" />
        </div>

        {{-- <div>
            <x-input-label for="education" :value="__('Education')" />
            <x-text-input id="education" name="education" type="text" class="mt-1 block w-full" :value="old('education')"
                required autofocus autocomplete="education" />
            <x-input-error class="mt-2" :messages="$errors->get('education')" />
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
