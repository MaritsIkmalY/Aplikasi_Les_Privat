<x-dashboard-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight">
            {{ __('Pendidikan') }}
        </h2>
    </x-slot>

    <x-slot name="modal">
        <x-modal2 id="my-modal-4">
            <div class="text-2xl my-4">Formulir Pendidikan Pengajar</div>
            <form action={{ route('education.store') }} method="post">
                @csrf
                <div class="mb-4">
                    <x-input-label for="education" :value="__('Pendidikan')" />
                    <x-text-input id="education" name="name" type="text" class="mt-1 block w-full" :value="old('name')"
                        required autofocus />
                    <x-input-error class="mt-2" :messages="$errors->get('name')" />
                </div>
                <div class="mb-4">
                    <x-input-label for="description" :value="__('Deskripsi')" />
                    <x-text-input id="description" name="description" type="text" class="mt-1 block w-full"
                        :value="old('description')" required autofocus />
                    <x-input-error class="mt-2" :messages="$errors->get('description')" />
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </x-modal2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex flex-col gap-5">
            <!--modal-->

            <label class="btn btn-primary my-4" for="my-modal-4">Tambah Pendidikan</label>
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
                            <th>Pendidikan</th>
                            <th>Deskripsi</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- row 1 -->
                        @foreach ($education as $d)
                            <tr>
                                <th>
                                    {{ $loop->iteration }}
                                </th>
                                <td>
                                    <div>
                                        <div>{{ $d->name }}</div>
                                    </div>
                                </td>
                                <td>
                                    {{ $d->description }}
                                </td>

                                <th>
                                    <a href="/profile/education/{{ $d->id }}/edit"
                                        class="badge bg-yellow-500 border-none cursor-pointer">Perbarui</a>
                                    <form action="/profile/education/{{ $d->id }}" method="post" class="inline">
                                        @csrf
                                        @method('delete')
                                        <button class="badge bg-red-500 border-none cursor-pointer">Hapus</button>
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
