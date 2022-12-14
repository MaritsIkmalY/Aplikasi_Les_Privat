<x-dashboard-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if (Session::has('status'))
                <x-alert status="success">
                    {{ Session::get('status') }}
                </x-alert>
            @endif
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __('Welcome back , ') }} {{ __(Auth::user()->role->name) }} <span
                        class="!text-blue-500 font-semibold">{{ __(Auth::user()->username) }}</span>

                </div>
                @if (Auth::user()->role_id == 2)
                    <div>
                        Status :
                        {{ Auth::user()->teacher[0]->status ? 'Active' : 'Off' }}
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
                @endif
                @if (Auth::user()->role_id == 1)
                    <form action="{{ route('search') }}" method="post">
                        @csrf
                        <select name="daerah" class="select select-primary w-full max-w-xs">
                            <option disabled selected>Filter Daerah</option>
                            <option>Surabaya</option>
                            <option>Sampang</option>
                        </select>
                        <button class="btn btn-primary">Cari</button>
                    </form>

    
                    <a href="{{ route('dashboard') }}" class="btn bg-red-500 border-none">Hapus Filter</a>

                    <div class="flex gap-4">

                        @foreach ($teachers as $t)
                            <div
                                class="flex flex-col justify-center max-w-xs p-6 shadow-md rounded-xl mt-5 sm:px-12 bg-gray-50 text-gray-800">
                                <img src="{{ $t->user->profile_photo_path }}" alt=""
                                    class="w-32 h-32 mx-auto rounded-full bg-gray-500 aspect-square">
                                <div class="space-y-4 text-center divide-y divide-gray-300">
                                    <div class="my-2 space-y-1">
                                        <h2 class="text-xl font-semibold sm:text-2xl">{{ $t->user->name }}</h2>
                                        <p class="px-5 text-xs sm:text-base text-gray-600">{{ $t->category->name }}</p>
                                        <p class="px-5 text-xs sm:text-base text-gray-600">{{ $t->user->address }}</p>
                                    </div>
                                    <div class="flex items-center">
                                        <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                            </path>
                                        </svg>
                                        <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                            </path>
                                        </svg>
                                        <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                            </path>
                                        </svg>
                                        <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                            </path>
                                        </svg>
                                        <svg class="w-5 h-5 text-gray-300 dark:text-gray-500" fill="currentColor"
                                            viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                            </path>
                                        </svg>
                                        <p class="ml-2 text-sm font-medium text-gray-500 dark:text-gray-400">4.95 out of
                                            5
                                        </p>
                                    </div>
                                    <div class="flex justify-center pt-2 space-x-4 align-center">
                                        <button class="btn btn-success">Detail</button>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-dashboard-layout>
