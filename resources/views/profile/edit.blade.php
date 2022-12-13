<x-dashboard-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xlleading-tight">
            {{ __('Profil') }}
        </h2>
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
                        @include('profile.partials.update-student-information-form', [
                            'grade' => $grade,
                        ])
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
