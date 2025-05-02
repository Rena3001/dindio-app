@extends('admin.layout.master')

@section('content')
<div class="container">
    <h1>Create Domain</h1>
    <form action="{{ route('admin.domains.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="domain_name">Domain Name</label>
            <input type="text" name="domain_name" id="domain_name" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="user_id">User ID</label>
            <input type="number" name="user_id" id="user_id" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="is_active">Is Active</label>
            <select name="is_active" id="is_active" class="form-control" required>
                <option value="1">Yes</option>
                <option value="0">No</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Create Domain</button>
    </form>
</div>
@endsection