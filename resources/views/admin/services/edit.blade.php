@extends('admin.layout.master')

@push('page_title')
Edit Service
@endpush

@push('section_title')
Service Editing
@endpush

@push('css')
<link href="{{ asset('admin/assets/vendors/choices/choices.min.css') }}" rel="stylesheet">
@endpush

@section('content')

<form action="{{ route('admin.services.update', $model->id) }}" method="POST" class="row mb-3" enctype="multipart/form-data">
    @csrf
    @method('PATCH')

    <div class="col-lg-8 mb-3">
        <div class="card">
            <div class="card-body">
                <div class="form-group mb-3">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name"
                           class="form-control @error('name') is-invalid @enderror"
                           value="{{ old('name', $model->name) }}">
                    @error('name')
                    <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea name="description" id="description"
                              class="form-control @error('description') is-invalid @enderror"
                              rows="5">{{ old('description', $model->description) }}</textarea>
                    @error('description')
                    <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                

            </div>
        </div>
    </div>

    <div class="col-lg-12 mt-4">
        <div class="text-end">
            <button type="submit" class="btn btn-success">Update</button>
            <a href="{{ route('admin.services.index') }}" class="btn btn-warning">Cancel</a>
        </div>
    </div>
</form>

@endsection

@push('js')
<script>
    document.getElementById('image').addEventListener('change', function (event) {
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = () => {
                document.querySelector('.image-box img').src = reader.result;
            };
            reader.readAsDataURL(file);
        }
    });
</script>
@endpush
