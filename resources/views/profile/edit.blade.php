<x-layouts.admin>
    <div class="mb-6">
        <h1 class="font-display text-3xl text-ink">Profile</h1>
        <p class="text-muted">Kelola informasi akun Anda</p>
    </div>

    <div class="space-y-6">
        <div class="rounded-card border border-hairline bg-white p-6">
            <div class="max-w-xl">
                @include('profile.partials.update-profile-information-form')
            </div>
        </div>

        <div class="rounded-card border border-hairline bg-white p-6">
            <div class="max-w-xl">
                @include('profile.partials.update-password-form')
            </div>
        </div>

        <div class="rounded-card border border-hairline bg-white p-6">
            <div class="max-w-xl">
                @include('profile.partials.delete-user-form')
            </div>
        </div>
    </div>
</x-layouts.admin>
