<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 text-white">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-4">
        <div class="container">
            <div class="row g-4">
                <div class="col-12">
                    <div class="p-4 bg-white shadow-sm rounded">
                        <div class="max-w-xl">
                            <livewire:profile.update-profile-information-form />
                        </div>
                    </div>
                </div>

                <div class="col-12">
                    <div class="p-4 bg-white shadow-sm rounded">
                        <div class="max-w-xl">
                            <livewire:profile.update-password-form />
                        </div>
                    </div>
                </div>

                <div class="col-12">
                    <div class="p-4 bg-white shadow-sm rounded">
                        <div class="max-w-xl">
                            <livewire:profile.delete-user-form />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>