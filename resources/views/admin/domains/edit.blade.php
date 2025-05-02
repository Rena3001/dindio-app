@extends('admin.layout.master')

@section('content')

<form action="{{ route('admin.domains.update', $domain->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="form-group">
        <label for="domain_name">Domain Name</label>
        <input type="text" name="domain_name" id="domain_name" class="form-control" value="{{ old('domain_name', $domain->domain_name) }}" required>
    </div>

    <div class="form-group">
        <label for="user_id">User ID</label>
        <input type="number" name="user_id" id="user_id" class="form-control" value="{{ old('user_id', $domain->user_id) }}" required>
    </div>

    

    <button type="submit" class="btn btn-primary">Update Domain</button>
</form>

@endsection