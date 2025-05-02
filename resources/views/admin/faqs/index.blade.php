@extends('admin.layout.master')

@section('title', 'FAQs')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>FAQs</h1>
        <a href="{{ route('admin.faqs.create') }}" class="btn btn-primary">Add New FAQ</a>
    </div>

    @if($faqs->isEmpty())
        <div class="alert alert-info">No FAQs found.</div>
    @else
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Question</th>
                    <th>Answer</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($faqs as $faq)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $faq->question }}</td>
                        <td>{{ Str::limit($faq->answer, 50) }}</td>
                        <td>{{ $faq->is_active ? 'Active' : 'Inactive' }}</td>
                        <td>
                            <form action="{{ route('admin.faqs.toggleStatus', $faq->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('PATCH')
                                <button type="submit" class="btn btn-sm {{ $faq->is_active ? 'btn-warning' : 'btn-success' }}">
                                {{ $faq->is_active ? 'Deactivate' : 'Activate' }}
                                </button>
                            </form>
                            <a href="{{ route('admin.faqs.edit', $faq->id) }}" class="btn btn-sm btn-warning">Edit</a>
                            <form action="{{ route('admin.faqs.destroy', $faq->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection