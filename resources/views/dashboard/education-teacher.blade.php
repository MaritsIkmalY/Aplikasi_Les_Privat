<x-dashboard-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight">
            {{ __('Education') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex flex-col gap-5">

            <!--modal-->
            <input type="checkbox" id="my-modal-4" class="modal-toggle" />
            <label for="my-modal-4" class="modal cursor-pointer">
                <label class="modal-box relative" for="">
                    <div class="text-2xl my-4">Education Form</div>
                    <form action={{ route('education.store') }} method="post">
                        @csrf
                        <div class="mb-4">
                            <x-input-label for="education" :value="__('Education')" />
                            <x-text-input id="education" name="name" type="text" class="mt-1 block w-full"
                                :value="old('name')" required autofocus />
                            <x-input-error class="mt-2" :messages="$errors->get('name')" />
                        </div>
                        <div class="mb-4">
                            <x-input-label for="description" :value="__('Description')" />
                            <x-text-input id="description" name="description" type="text" class="mt-1 block w-full"
                                :value="old('description')" required autofocus />
                            <x-input-error class="mt-2" :messages="$errors->get('description')" />
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </label>
            </label>

            <label class="btn btn-primary my-4" for="my-modal-4">Add education</label>
            @if (session('status') == 'success')
                <x-alert status="success">
                    Success Add Data.
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
                            <th>Education</th>
                            <th>Description</th>
                            <th>Action</th>
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
                                    <span class="badge bg-yellow-500 border-none cursor-pointer">edit</span>
                                    <span class="badge bg-red-500 border-none cursor-pointer">delete</span>
                                </th>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</x-dashboard-layout>
