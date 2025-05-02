@extends('admin.layout.master')

@push('js')
<script>
    window.addEventListener('load', function() {
        const boxImage = document.querySelector('.image-box');
        const imgSrc = document.querySelector('.image-box img').getAttribute("src");
        document.querySelector('.custom-file-image').addEventListener('change', function(event) {
            if (event.target.files[0]) {
                var tmppath = URL.createObjectURL(event.target.files[0]);
                document.querySelector('.image-box img').setAttribute("src",
                    URL.createObjectURL(event.target.files[0]));
                    boxImage.classList.remove('d-none');
            } else {
                document.querySelector('.image-box img').setAttribute("src", imgSrc);
                if (!imgSrc) {
                    boxImage.classList.add('d-none');
                }
            }
        })
    });
</script>
@endpush

@push('page_title')
Dil yeniləmə
@endpush
@push('section_title')
Dil Redaktə Etmə
@endpush

@section('content')
<form action="{{ route('admin.langs.update', $model->id) }}" method="POST" class="row mb-3" enctype="multipart/form-data">
    @csrf
    @method('PATCH')
    <div class="col-lg-7 mb-4">
        <div class="card card-primary">
            <div class="card-body">
                <div class="form-group">
                    <label for="code">Dilin kodu</label>
                    <input type="text" name="code" class="form-control @error('code') is-invalid @enderror" id="code" value="{{ old('code', $model->code) }}">
                    @error('code')
                    <span class="error invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="language">Dil</label>
                    <input type="text" name="language" class="form-control @error('language') is-invalid @enderror" id="language" value="{{ old('language', $model->language) }}">
                    @error('language')
                    <span class="error invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group d-flex">
                    <label for="image">Şəkil</label>
                    <input type="file" name="image" class="custom-file-image form-control @error('image') is-invalid @enderror" id="image" value="{{ old('image') }}">
                    @error('image')
                    <span class="error invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer text-right">
                <button type="submit" class="btn btn-primary">Yadda saxla</button>
                <a href="{{route('admin.langs.index')}}" class="btn btn-warning">Ləğv et</a>
            </div>
        </div>
    </div>
    <div class="col-lg-5">
        <div class="image-box @if (!$model->image)d-none @endif">
            <img src="{{$model->image??''}}" alt="" class="img-fluid">
        </div>
    </div>
</form>
@endsection