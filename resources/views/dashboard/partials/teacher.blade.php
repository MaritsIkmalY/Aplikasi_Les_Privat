<div>
    @if (!is_null(Auth::user()->name) && !is_null(Auth::user()->teacher->category_id))
        <div>
            Status :
            {{ Auth::user()->teacher->status ? 'Active' : 'Off' }}
        </div>
        <!--status ready-->
        <div>
            <form action="{{ route('teacher.status') }}" method="post">
                @csrf
                @method('put')
                <input type="submit" name="status" value="true" class="btn btn-success" />
                <input type="submit" name="status" value="false" class="btn bg-red-500 border-none" />
            </form>
        </div>
    @else
        <div>
            <p>
                Isi biodata diri terlebih dahulu
                <a class="text-decoration-none" href="{{ route('profile.index') }}">Biodata Diri</a>
            </p>
        </div>
    @endif
</div>
