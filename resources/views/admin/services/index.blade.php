@extends('admin.layout.master')

@push('page_title')
Services
@endpush

@push('section_title')
Service List
@endpush

@section('content')
    <h1>Services</h1>

    <!-- Create Button -->
    <a href="{{ route('admin.services.create') }}" class="btn btn-success mb-3">Create New Service</a>

    <table class="table">
    <p>Xidmətlərin sayı: {{ $serviceCount }}</p>

        <thead>
            <tr>
                <th>Name</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($services as $service)
                <tr>
                    <td>{{ $service->name }}</td>
                    <td>{{ $service->status == 1 ? 'Active' : 'Inactive' }}</td>
                    <td>
                        <!-- Edit -->
                        <a href="{{ route('admin.services.edit', $service->id) }}" class="btn btn-primary btn-sm">Edit</a>

                        <!-- Toggle Status -->
                        <form action="{{ route('admin.services.toggleStatus', $service->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('PATCH')
                            <button type="submit" class="btn btn-warning btn-sm">
                                {{ $service->status == 1 ? 'Deactivate' : 'Activate' }}
                            </button>
                        </form>

                        <!-- Delete -->
                        <form action="{{ route('admin.services.destroy', $service->id) }}" method="POST" style="display:inline;" onsubmit="return confirmDelete()">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>


                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
@script

<script>
    function confirmDelete() {
        return confirm('Are you sure you want to delete this service?');
    }
</script>
@endscript
