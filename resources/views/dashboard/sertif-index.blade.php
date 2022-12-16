<x-dashboard-layout>
    <x-slot name="header">
        <div class="text-xl breadcrumbs">
            <ul>
                <li><a href="{{ route('profile.index') }}">Informasi Profile</a></li>
                <li><a class="font-bold text-blue-500">Sertifikat</a></li>
        </div>
    </x-slot>

    <x-slot name="modal">
        <x-modal2 id="my-modal-5">
            <div class="text-2xl my-4">Formulir Sertifikat</div>
            <form action={{ route('certificate.store') }} method="post" enctype="multipart/form-data">
                @csrf
                <div class="mb-4">
                    <x-input-label for="name" :value="__('Nama Sertifikat')" />
                    <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name')"
                        required autofocus />
                    <x-input-error class="mt-2" :messages="$errors->get('name')" />
                </div>

                <div class="mb-4">
                    <x-input-label for="file_path" :value="__('File Sertifikat (*png,jpg,pdf)')" />
                    <input id="file_path" name="file_path" type="file"
                        class="mt-1 block file-input file-input-primary w-full" required />
                    <x-input-error class="mt-2" :messages="$errors->get('file_path')" />
                </div>

                <div class="mb-4">
                    <x-input-label for="description" :value="__('Deskripsi')" />
                    <x-text-input id="description" name="description" type="text" class="mt-1 block w-full"
                        :value="old('description')" required />
                    <x-input-error class="mt-2" :messages="$errors->get('description')" />
                </div>

                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </x-modal2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex flex-col gap-5">
            <label for="my-modal-5" class="btn btn-primary">Tambah Sertifikat</label>
            @if (Session::has('status'))
                <x-alert status="success">
                    {{ Session::get('status') }}
                </x-alert>
            @endif
            <div class="overflow-x-auto w-full">
                <table class="table w-full">
                    <!-- head -->
                    <thead>
                        <tr>
                            <th>
                                #
                            </th>
                            <th>Nama Sertifikat</th>
                            <th>File Sertifikat</th>
                            <th>Deskripsi</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- row 1 -->
                        @foreach ($certificates as $certificate)
                            <tr>
                                <th>
                                    {{ $loop->iteration }}
                                </th>
                                <td>
                                    <div>
                                        {{ $certificate->name }}
                                    </div>
                                </td>
                                <td>
                                    <a href="/storage/{{ $certificate->file_path }}"
                                        class="hover:underline cursor-pointer" download>
                                        {{ $certificate->file_path }}
                                    </a>
                                </td>
                                <td>
                                    <div>
                                        {{ $certificate->description }}
                                    </div>
                                </td>

                                <th>
                                    <a href="/profile/certificate/{{ $certificate->id }}/edit"
                                        class="badge bg-yellow-500 border-none cursor-pointer">Perbarui</a>
                                    <form action="/profile/certificate/{{ $certificate->id }}" method="post" id="form"
                                        class="inline">
                                        @csrf
                                        @method('delete')
                                        <button class="badge bg-red-500 border-none cursor-pointer" id="button-delete-certif">Hapus</button>
                                    </form>
                                </th>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-dashboard-layout>
