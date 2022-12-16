<div>
    @if (!is_null(Auth::user()->name) && !is_null(Auth::user()->student[0]->grade_id))
        <label for="my-modal-1" class="btn btn-primary btn-sm">Filter</label>
        <div class="my-3 flex gap-3 items-center">
            @if (Request::get('daerah'))
                <div class="badge badge-lg bg-blue-600 border-none ">{{ Request::get('daerah') }}
                </div>
            @endif
            @if (Request::get('category'))
                <div class="badge badge-lg bg-blue-600 border-none "> {{ Request::get('category') }}
                </div>
            @endif
            @if (Request::get('category') || Request::get('daerah'))
                <a href="{{ route('dashboard') }}" class="badge badge-lg bg-red-500 border-none p-3"><i data-feather="x"
                        class="mr-2"></i> Hapus</a>
            @endif
        </div>
        <div class="flex gap-4">
            @include('dashboard.partials.card-teacher')
        </div>
    @else
        <div>
            <p>
                Isi biodata diri terlebih dahulu
                <a class="text-decoration-none" href="{{ route('profile.index') }}">Biodata
                    Diri</a>
            </p>
        </div>
    @endif
</div>
