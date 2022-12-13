<section>
    <header>
        <h2 class="text-lg font-medium">
            {{ __('Informasi Profil') }}
        </h2>

        <p class="mt-1 text-sm">
            {{ __('Perbarui profilmu') }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>


    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6 flex-1" enctype="multipart/form-data">
        @csrf
        @method('patch')
        <div>
            @if (is_null($user->profile_photo_path))
                <img class="mask mask-circle w-52" src="/storage/default.jpg" />
            @else
                <img class="mask mask-circle w-52" src="/storage/{{ $user->profile_photo_path }}" />
            @endif
            <x-input-label for="photo" :value="__('Foto Profil')" class="mt-3" />
            <input class="file-input file-input-bordered w-full" type="file" name="profile_photo_path" id="photo"
                class="mt-1 block w-full">
            <x-input-error class="mt-2" :messages="$errors->get('profile_photo_path')" />
        </div>

        <div>
            <x-input-label for="username" :value="__('Nama Pengguna')" />
            <x-text-input id="username" name="username" type="text" class="mt-1 block w-full" :value="old('name', $user->username)"
                required autofocus autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('username')" />
        </div>

        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', $user->email)"
                required autocomplete="email" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && !$user->hasVerifiedEmail())
                <div>
                    <p class="text-sm mt-2 text-gray-800">
                        {{ __('Email tidak terverifikasi') }}

                        <button form="send-verification"
                            class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            {{ __('Klik untuk mengirim verifikasi kembali') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-green-600">
                            {{ __('Tautan verifikasi telah dikirim ke email Anda') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <div>
            <x-input-label for="name" :value="__('Nama')" />
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $user->name)"
                autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <div>
            <x-input-label for="phone" :value="__('No HP')" />
            <x-text-input id="phone" name="phone" type="text" class="mt-1 block w-full" :value="old('phone', $user->phone)"
                autofocus autocomplete="phone" />
            <x-input-error class="mt-2" :messages="$errors->get('phone')" />
        </div>

        <div>
            <x-input-label for="address" :value="__('Alamat')" />
            <x-text-input id="address" name="address" type="text" class="mt-1 block w-full" :value="old('address', $user->address)"
                autofocus autocomplete="address" />
            <x-input-error class="mt-2" :messages="$errors->get('address')" />
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Simpan') }}</x-primary-button>

            @if (session('status') === 'profile-updated')
                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-green-600">{{ __('Tersimpan') }}</p>
            @endif
        </div>
    </form>



</section>
