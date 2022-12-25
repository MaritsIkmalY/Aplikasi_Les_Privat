<div>
    @if (!is_null(Auth::user()->name) && !is_null(Auth::user()->student->grade_id))
        <label for="my-modal-1" class="btn btn-primary btn-sm">Filter</label>
        <div class="my-3 flex gap-3 items-center">
            @if (Request::get('daerah'))
                <span class="px-4 py-2 flex items-center text-base rounded-full text-blue-600  bg-blue-200 ">
                    {{ Request::get('daerah') }}
                </span>
            @endif
            @if (Request::get('category'))
                <span class="px-4 py-2 flex items-center text-base rounded-full text-blue-600  bg-blue-200 ">
                    {{ Request::get('category') }}
                </span>
            @endif
            @if (Request::get('category') || Request::get('daerah'))
                <a href="{{ route('dashboard') }}" class="px-4 py-2  text-base rounded-full text-white  bg-red-500 ">
                    Hapus filter
                    <button class="bg-transparent hover">
                        <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor"
                            class="ml-4" viewBox="0 0 1792 1792">
                            <path
                                d="M1490 1322q0 40-28 68l-136 136q-28 28-68 28t-68-28l-294-294-294 294q-28 28-68 28t-68-28l-136-136q-28-28-28-68t28-68l294-294-294-294q-28-28-28-68t28-68l136-136q28-28 68-28t68 28l294 294 294-294q28-28 68-28t68 28l136 136q28 28 28 68t-28 68l-294 294 294 294q28 28 28 68z">
                            </path>
                        </svg>
                    </button>
                </a>
            @endif
        </div>
        <div class="flex gap-4 flex-wrap justify-center">
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
