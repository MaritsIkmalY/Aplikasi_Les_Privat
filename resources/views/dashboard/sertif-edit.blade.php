<x-dashboard-layout>
    <x-slot name="header">
        <div class="text-xl breadcrumbs">
            <ul>
                <li><a href="{{ route('profile.index') }}">Informasi Profile</a></li>
                <li><a href="{{ route('certificate.index') }}">Sertifikat</a></li>
                <li><a class="font-bold text-blue-500">Form Perbarui Sertifikat</a></li>
            </ul>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex flex-col gap-5">
            <div class="text-2xl my-4">Formulir Perbarui Sertifikat</div>
            <form action="/profile/certificate/{{ $certificate->id }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('patch')
                <div class="mb-4">
                    <x-input-label for="name" :value="__('Nama Sertifikat')" />
                    <x-text-input id="name" name="name" type="text" class="mt-1 block w-full"
                        :value="old('name', $certificate->name)" autofocus />
                    <x-input-error class="mt-2" :messages="$errors->get('name')" />
                </div>

                <div class="mb-4">
                    <x-input-label for="file_path" :value="__('File Sertifikat (*png,jpg,pdf)')" />
                    <div>File Sebelumnya : <a href="/storage/{{ $certificate->file_path }}"
                            class="text-blue-500 font-semibold">{{ $certificate->file_path }}</a></div>
                    <input id="file_path" name="file_path" type="file"
                        class="mt-1 block file-input file-input-primary w-full"
                        :value="old('file_path', $certificate - > file_path)" />
                    <x-input-error class="mt-2" :messages="$errors->get('file_path')" />
                </div>

                <div class="mb-4">
                    <x-input-label for="description" :value="__('Deskripsi')" />
                    <x-text-input id="description" name="description" type="text" class="mt-1 block w-full"
                        :value="old('description', $certificate->description)" />
                    <x-input-error class="mt-2" :messages="$errors->get('description')" />
                </div>
                <button type="submit" class="btn btn-primary">Perbarui</button>
            </form>
        </div>
    </div>
</x-dashboard-layout>
