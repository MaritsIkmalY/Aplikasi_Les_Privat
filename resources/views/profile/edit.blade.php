<x-dashboard-layout>
    <x-slot name="header">
        <div class="text-xl breadcrumbs">
            <ul>
                <li><a href="{{ route('profile.index') }}">Informasi Profile</a></li>
                <li><a class="font-bold text-blue-500">Edit Biodata</a></li>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            @if (session('status') === 'profile-updated')
                <x-alert status="success">
                    Successs Updated
                </x-alert>
            @endif
            <div class="p-4 sm:p-8 bg-base-200 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            @if (Auth::user()->role_id == 1)
                <div class="p-4 sm:p-8 bg-base-200 shadow sm:rounded-lg">
                    <div class="max-w-xl">
                        @include('profile.partials.update-student-information-form')
                    </div>
                </div>
            @endif

            @if (Auth::user()->role_id == 2)
                <div class="p-4 sm:p-8 bg-base-200 shadow sm:rounded-lg">
                    <div class="max-w-xl">
                        @include('profile.partials.update-teacher-information-form')
                    </div>
                </div>
            @endif

            <div class="p-4 sm:p-8 bg-base-200 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-base-200 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
</x-dashboard-layout>
