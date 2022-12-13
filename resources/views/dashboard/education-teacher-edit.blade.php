<x-dashboard-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight">
            {{ __('Form Edit Education') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <form action="/profile/education/{{ $education->id }}" method="post">
                @csrf
                @method('put')
                <div class="mb-4">
                    <x-input-label for="education" :value="__('Education')" />
                    <x-text-input id="education" name="name" type="text" class="mt-1 block w-full" :value="old('name', $education->name)"
                        required autofocus />
                    <x-input-error class="mt-2" :messages="$errors->get('name')" />
                </div>
                <div class="mb-4">
                    <x-input-label for="description" :value="__('Description')" />
                    <x-text-input id="description" name="description" type="text" class="mt-1 block w-full"
                        :value="old('description', $education->description)" required autofocus />
                    <x-input-error class="mt-2" :messages="$errors->get('description')" />
                </div>
                <button class="btn btn-primary">Edit</button>
            </form>
        </div>
    </div>
</x-dashboard-layout>
