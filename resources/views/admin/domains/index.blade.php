@extends('admin.layout.master')

@push('page_title')
    Domain Management
@endpush

@section('content')
<div class="container">
    <h1 class="my-4">Domain Management</h1>

    <a href="{{ route('admin.domains.create') }}" class="btn btn-primary mb-3">Add New Domain</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Domain Name</th>
                <th>User</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($domains as $domain)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $domain->domain_name }}</td>
                    <td>{{ $domain->user_id }}</td> 
                    <td>{{ $domain->is_active ? 'Active' : 'Inactive' }}</td>
                    <td>
                        <form action="{{ route('admin.domains.toggleStatus', $domain->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('PATCH')
                            <button type="submit" class="btn btn-sm {{ $domain->is_active ? 'btn-warning' : 'btn-success' }}">
                                {{ $domain->is_active ? 'Deactivate' : 'Activate' }}
                            </button>
                        </form>

                        <a href="{{ route('admin.domains.edit', $domain->id) }}" class="btn btn-sm btn-info">Edit</a>

                        <form action="{{ route('admin.domains.destroy', $domain->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
