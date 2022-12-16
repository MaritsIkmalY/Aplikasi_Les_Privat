@foreach ($order as $o)
    <div class="bg-base-100 rounded-md p-5 font-semibold flex flex-col gap-2 drop-shadow-md">
        <div class="flex flex-col items-center gap-2 my-2">
            <div class="avatar">
                <div class="w-24 rounded-full ring ring-primary ring-offset-base-100 ring-offset-2">
                    <img src="{{ $o->student->user->profile_photo_path }}" />
                </div>
            </div>
            <div>From : {{ $o->student->user->name }}</div>
            <div class="text-blue-500">
                Rp. {{ $o->teacher->fee }}
            </div>
        </div>
        <div>
            <button class="btn btn-accent">Accept</button>
            <button class="btn btn-error">Reject</button>
        </div>
    </div>
@endforeach
