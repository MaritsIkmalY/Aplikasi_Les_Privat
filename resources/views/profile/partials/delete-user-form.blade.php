<section class="space-y-6">
    <header>
        <h2 class="text-lg font-medium">
            {{ __('Hapus Akun') }}
        </h2>

        <p class="mt-1 text-sm">
            {{ __('Setelah akun Anda dihapus, semua sumber daya dan datanya akan dihapus secara permanen. Sebelum menghapus akun Anda, harap unduh data atau informasi apa pun yang ingin Anda pertahankan.') }}
        </p>
    </header>

    <x-danger-button x-data="" x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')">
        {{ __('Hapus Akun') }}</x-danger-button>

    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <form method="post" action="{{ route('profile.destroy') }}" class="p-6">
            @csrf
            @method('delete')

            <h2 class="text-lg font-medium">Apakah anda yakin ingin menghapus akun?</h2>

            <p class="mt-1 text-sm">
                {{ __('Sekali anda menghapus akun maka segala data akan terhapus secara permanen. Masukkan kata sandi untuk mengkonfirmasi bahwa anda ingin menghapus akun.') }}
            </p>

            <div class="mt-6">
                <x-input-label for="password" value="Password" class="sr-only" />

                <x-text-input id="password" name="password" type="password" class="mt-1 block w-3/4"
                    placeholder="Kata sandi" />

                <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />
            </div>

            <div class="mt-6 flex justify-end">
                <x-secondary-button x-on:click="$dispatch('close')">
                    {{ __('Batal') }}
                </x-secondary-button>

                <x-danger-button class="ml-3">
                    {{ __('Hapus akun') }}
                </x-danger-button>
            </div>
        </form>
    </x-modal>
</section>
