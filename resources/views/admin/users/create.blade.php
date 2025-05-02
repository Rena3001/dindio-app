@extends('admin.layout.master')

@section('content')

<form action="{{ route('admin.users.store') }}" method="POST">
    @csrf
    <div class="form-group row">
        <label for="name" class="col-sm-2 col-form-label">Name</label>
        <div class="col-sm-4">
            <input type="text" name="name" id="name" class="form-control" placeholder="Enter name" value="{{ old('name') }}" required>
            @error('name')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <label for="email" class="col-sm-2 col-form-label">Email</label>
        <div class="col-sm-4">
            <input type="email" name="email" id="email" class="form-control" placeholder="Enter email" value="{{ old('email') }}" required>
            @error('email')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <label for="password" class="col-sm-2 col-form-label">Password</label>
        <div class="col-sm-4">
            <input type="password" name="password" id="password" class="form-control" placeholder="Enter password" required>
            @error('password')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <label for="password_confirmation" class="col-sm-2 col-form-label">Confirm Password</label>
        <div class="col-sm-4">
            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="Confirm password" required>
            @error('password_confirmation')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <div class="form-group row">
    <label for="role" class="col-sm-2 col-form-label">Role</label>
    <div class="col-sm-4">
        <select name="role" id="role" class="form-control" required>
        <option value="admin" 
            {{ old('role', isset($user) && $user->is_admin ? 'admin' : 'user') == 'admin' ? 'selected' : '' }}>
            Admin
        </option>

        <option value="user" 
            {{ old('role', isset($user) && $user->is_admin ? 'admin' : 'user') == 'user' ? 'selected' : '' }}>
            User
        </option>
            </select>
    </div>
</div>


    <div class="form-group row">
        <div class="col-sm-10 offset-sm-2">
            <button type="submit" class="btn btn-primary">Create User</button>
        </div>
    </div>
</form>

@endsection
