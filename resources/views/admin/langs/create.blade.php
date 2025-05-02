@extends('admin.layout.master')
@push('js')
<script>
window.addEventListener('load', function() {
    document.querySelector('.custom-file-image').addEventListener('change', function(event) {
        if (event.target.files[0]) {
            var tmppath = URL.createObjectURL(event.target.files[0]);
            document.querySelector('.image-box img').setAttribute("src",
                URL.createObjectURL(event.target.files[0]));
        } else {
            document.querySelector('.image-box img').setAttribute("src", '');
        }
    })
});
</script>
@endpush

@push('page_title')
Yeni dil
@endpush
@push('section_title')
Dil Əlavə Etmə
@endpush

@section('content')
<form action="{{ route('admin.langs.store') }}" method="POST" class="row mb-3" enctype="multipart/form-data">
    @csrf
    <div class="col-lg-7 mb-4">
        <div class="card card-primary">
            <div class="card-body table_of_langs">
                <div class="form-group d-flex">
                    <label for="code">Dilin Kodu</label>
                    <input type="text" name="code" class="form-control @error('code') is-invalid @enderror" id="code"
                        value="{{ old('code') }}">
                    @error('code')
                    <span class="error invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group d-flex">
                    <label for="language">Dil</label>
                    <input type="text" name="language" class="form-control @error('language') is-invalid @enderror"
                        id="language" value="{{ old('language') }}">
                    @error('language')
                    <span class="error invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group d-flex">
                    <label for="image">Şəkil</label>
                    <input type="file" name="image"
                        class="custom-file-image form-control @error('image') is-invalid @enderror" id="image"
                        value="image">
                    @error('image')
                    <span class="error invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="card-footer text-right">
                <button type="submit" class="btn btn-success">Əlavə et</button>
                <a href="{{route('admin.langs.index')}}" class="btn btn-warning">Ləğv et</a>
            </div>
        </div>
    </div>
    <div class="col-lg-5">
        <div class="image-box">
            <img src="" alt="" class="img-fluid">
        </div>
    </div>
</form>
@endsection