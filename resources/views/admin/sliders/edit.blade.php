@extends('admin.layout.master')

@push('js')
<script>
    window.addEventListener('load', function() {
        const imgSrc = document.querySelector('.image-box img').getAttribute("src");
        document.querySelector('.custom-file-image').addEventListener('change', function(event) {

            if (event.target.files[0]) {
                var tmppath = URL.createObjectURL(event.target.files[0]);
                document.querySelector('.image-box img').setAttribute("src",
                    URL.createObjectURL(event.target.files[0]));
            } else {
                document.querySelector('.image-box img').setAttribute("src", imgSrc);
            }
        })
    });
</script>
@endpush

@push('page_title')
Slayd Yenileme
@endpush
@push('section_title')
Slayd Redaktə Etmə
@endpush

@section('content')
<form action="{{ route('admin.sliders.update', $model->id) }}" method="POST" class="row mb-3" enctype="multipart/form-data">
    @csrf
    @method('PATCH')
    <div class="col-lg-8">
        <div class="card card-primary">
            <div class="card-body">

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
                <a href="{{route('admin.sliders.index')}}" class="btn btn-warning">Ləğv et</a>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="card mb-4">
            <div class="card-body">
                <div class="image-box">
                    <img src="{{$model->image??''}}" alt="" class="img-fluid">
                </div>
            </div>
        </div>
    </div>
</form>
@endsection