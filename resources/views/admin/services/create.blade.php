@extends('admin.layout.master')

@push('page_title')
New Service
@endpush

@push('section_title')
Add Service
@endpush

@push('css')
<link href="{{ asset('admin/assets/vendors/choices/choices.min.css') }}" rel="stylesheet">
@endpush

@section('content')
<form action="{{ route('admin.services.store') }}" method="POST" class="row mb-3" enctype="multipart/form-data">
    @csrf
    <div class="col-lg-8 mb-2">
        <div class="card card-primary card-outline card-outline-tabs">
            <div class="card-body">
                <div class="tab-content mt-3" id="myTabContent">
                    <div class="tab-pane fade active show" id="services" role="tabpanel" aria-labelledby="services">
                        <div class="form-group m-0">
                            <label class="m-0" for="title">Name</label>
                            <input type="text" class="form-control m-0 @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name.en') }}">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                        </div>
                        <div class="form-group m-0 mt-3">
                            <label class="m-0" for="description">Description</label>
                            <textarea class="form-control m-0 @error('description') is-invalid @enderror" id="description" name="description">{{ old('description') }}</textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-12 mt-4">
        <div class="card-footer text-right">
            <button type="submit" class="btn btn-success">Add</button>
            <a href="{{ route('admin.services.index') }}" class="btn btn-warning">Cancel</a>
        </div>
    </div>
</form>
@endsection

@push('js')
<script>
    // Image Preview before upload
    document.getElementById('image').addEventListener('change', function(event) {
        const file = event.target.files[0];
        const reader = new FileReader();

        reader.onload = function() {
            const previewImage = document.getElementById('image-preview');
            previewImage.src = reader.result;
        };

        if (file) {
            reader.readAsDataURL(file);
        }
    });
</script>
@endpush
