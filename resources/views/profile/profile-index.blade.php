<x-dashboard-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight">
            {{ __('Informasi Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex flex-col gap-5">
                <!--profil photo-->
                <div class="flex flex-col items-center gap-4">
                    <h1 class="text-2xl font-semibold">Halaman Profile</h1>
                    <img class="mask mask-circle w-52" src="/storage/{{ Auth::user()->profile_photo_path }}" />

                </div>

                <!--Biodata-->
                <div class="flex flex-col gap-4 mt-5">
                    <div class="flex justify-between items-center">
                        <h1 class="text-2xl">Biodata</h1>
                        <a class="badge badge-lg bg-yellow-600 border-none p-4 flex gap-2 items-center"
                            href="{{ route('profile.edit') }}"><i data-feather="edit"></i>Edit Biodata</a>
                    </div>
                    <div class="divider"></div>
                    <p>Nama : {{ Auth::user()->name }}</p>
                    <p>Email : {{ Auth::user()->email }}</p>
                    <p>Alamat : {{ Auth::user()->address }}</p>
                    <p>No HP : {{ Auth::user()->phone }}</p>
                    @if (Auth::user()->role_id == 2)
                        <p>Mengajar :
                            {{ Auth::user()->teacher[0]->category ? Auth::user()->teacher[0]->category->name : '-' }}
                        </p>
                        <p>Biaya : {{ Auth::user()->teacher[0]->fee ? Auth::user()->teacher[0]->fee : '-' }}</p>
                        <p>Jadwal : {{ Auth::user()->teacher[0]->schedule ? Auth::user()->teacher[0]->schedule : '-' }}
                        </p>
                    @else
                        <p> Kelas : {{ Auth::user()->student[0]->grade ? Auth::user()->student[0]->grade->name : '-' }}
                        </p>
                    @endif
                </div>
                <div class="divider"></div>
                <!--pendidikan-->
                @if (Auth::user()->role_id == 2)
                    <div class="flex flex-col gap-4 mt-5">
                        <div class="flex justify-between items-center">
                            <h1 class="text-2xl">Pendidikan</h1>
                            <a class="badge badge-lg bg-yellow-600 border-none p-4 flex gap-2 items-center"
                                href="{{ route('education.index') }}"><i data-feather="edit"></i>Edit Pendidikan</a>
                        </div>
                        <div class="divider"></div>
                        @foreach ($teacher->education as $education)
                            <p>{{ $education->name }} - {{ $education->description }}</p>
                        @endforeach
                    </div>
                    <div class="divider"></div>

                    <!--sertif-->
                    <div class="flex flex-col gap-5">
                        <div class="flex justify-between items-center">
                            <h1 class="text-2xl">Sertifikat</h1>
                            <a class="badge badge-lg bg-yellow-600 border-none p-4 flex gap-2 items-center"
                                href="{{ route('certificate.index') }}"><i data-feather="edit"></i>Edit Sertifikat</a>
                        </div>
                        <div class="divider"></div>
                        <div class="flex gap-4 items-stretch">
                            @foreach ($teacher->certificate as $certificate)
                                <div class="card w-96 bg-base-100 shadow-xl">
                                    <figure><img src="/storage/{{ $certificate->file_path }}" alt="Shoes" />
                                    </figure>
                                    <div class="card-body">
                                        <h2 class="card-title">
                                            {{ $certificate->name }}
                                        </h2>
                                        <p>{{ $certificate->description }}</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                @endif
            </div>
            {{-- <div class="divider"></div> --}}
        </div>
    </div>
</x-dashboard-layout>
