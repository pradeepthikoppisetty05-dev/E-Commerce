<x-app-layout title="My Profile">
    <div class="container mt-4">
        <h2>My Profile</h2>

        {{-- Flash messages --}}
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        {{-- Update Profile --}}
        <div class="card mb-4">
            <div class="card-header"><h4>Update Profile</h4></div>
            <div class="card-body">
                <form method="POST" action="{{ route('profile.update') }}">
                    @csrf

                    <div class="mb-3">
                        <label>Name</label>
                        <input type="text" name="name"
                               value="{{ old('name', $user->name) }}"
                               class="form-control">
                        @error('name') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>

                    <div class="mb-3">
                        <label>Email</label>
                        <input type="email" name="email"
                               value="{{ old('email', $user->email) }}"
                               class="form-control">
                        @error('email') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>

                    <button class="btn btn-primary">Update Profile</button>
                </form>
            </div>
        </div>

        <hr>

        {{-- Change Password --}}
        <div class="card">
            <div class="card-header"><h4>Change Password</h4></div>
            <div class="card-body">
                <form method="POST" action="{{ route('profile.password') }}">
                    @csrf

                    <div class="mb-3">
                        <label>Current Password</label>
                        <input type="password" name="current_password" class="form-control">
                        @error('current_password') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>

                    <div class="mb-3">
                        <label>New Password</label>
                        <input type="password" name="new_password" class="form-control">
                        @error('new_password') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>

                    <div class="mb-3">
                        <label>Confirm New Password</label>
                        <input type="password" name="new_password_confirmation" class="form-control">
                    </div>

                    <button class="btn btn-primary">Change Password</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
