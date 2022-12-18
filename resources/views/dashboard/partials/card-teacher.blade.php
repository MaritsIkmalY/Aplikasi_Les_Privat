@if (count($teachers) == 0)
    <div class="p-4 w-full">
        <x-alert status="info">Data guru tidak ditemukan...</x-alert>
    </div>
@else
    @foreach ($teachers as $t)
        <div class="flex flex-col justify-center max-w-xs p-6 shadow-md rounded-xl mt-5 sm:px-12 bg-base-200">
            {{-- Avatar Online --}}
            @if ($t->status == true)
                <div class="flex justify-center">
                    <div class="avatar online">
                        <div class="w-48 rounded-full">
                            <img src="/storage/{{ $t->user->profile_photo_path }}" />
                        </div>
                    </div>
                </div>
            @else
                <div class="flex justify-center">
                    <div class="avatar offline">
                        <div class="w-48 rounded-full">
                            <img src="/storage/{{ $t->user->profile_photo_path }}" />
                        </div>
                    </div>
                </div>
            @endif
            <div class="space-y-4">
                <h2 class="font-semibold text-center my-2 h-10">{{ $t->user->name }}</h2>
                <div class="my-2 space-y-1 flex flex-col gap-2 text-sm">
                    <div class="px-5 flex items-center gap-1">
                        <i data-feather="book-open"></i>{{ $t->category->name }}
                    </div>
                    <div class="px-5 flex items-center gap-1">
                        <i data-feather="map-pin"></i> {{ $t->user->address }}
                    </div>
                    <div class="px-5 font-bold text-blue-600">
                        Rp {{ $t->fee ? $t->fee : '-' }} / jam
                    </div>
                </div>
                <div class="flex items-center">
                    <div>
                        ⭐
                    </div>
                    <p class="ml-2 text-sm font-medium">
                        {{ $t::getRate($t) }} out of
                        5
                    </p>
                </div>
                <div class="flex justify-center pt-2 space-x-4 align-center">
                    <a href="/dashboard/{{ $t->id }}"
                        class="btn btn-sm bg-blue-600 border-none hover:bg-blue-500">Detail</a>
                </div>
            </div>
        </div>
    @endforeach

@endif
