@extends('admin.layout.master')

@push('page_title')
Yeni Kateqoriya
@endpush
@push('section_title')
Kateqoriya Əlavə Etmə
@endpush

@push('css')
<link href="{{asset('admin/assets/vendors/choices/choices.min.css')}}" rel="stylesheet">
@endpush
@push('js')
<script src="{{asset('admin/assets/vendors/choices/choices.min.js')}}"></script>

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

@section('content')
<form action="{{ route('admin.categories.store') }}" method="POST" class="row mb-3" enctype="multipart/form-data">
    @csrf
    <div class="col-lg-8 mb-2">
        <div class="card card-primary card-outline card-outline-tabs">
            <div class="card-header border-bottom-0 pb-0">
                <ul class="nav nav-underline fs-9" id="myTab" role="tablist">
                    @foreach ($langs as $key => $lang)
                    <li class="nav-item" role="presentation">
                        <a class="nav-link {{ $key === 0 ? 'active' : '' }} @error('title.' . $lang->code)text-danger @enderror"
                            id="{{ $lang->code . 'categories' }}" data-bs-toggle="tab"
                            href="#{{ 'categories' . $lang->code }}" role="tab"
                            aria-controls="{{ 'categories' . $lang->code }}"
                            aria-selected="{{ $key === 0 ? 'true' : 'false' }}">{{ '[' . strtoupper($lang->code) . ']' }}</a>
                    </li>
                    @endforeach
                </ul>
            </div>
            <div class="card-body">
                <div class="tab-content mt-3" id="myTabContent">
                    @foreach ($langs as $key => $lang)
                    <div class="tab-pane fade {{ $key === 0 ? 'active show' : '' }}"
                        id="{{ 'categories' . $lang->code }}" role="tabpanel"
                        aria-labelledby="{{ $lang->code . 'categories' }}">
                        <div class="form-group m-0">
                                <label class="m-0" for="title_{{ $lang->code }}">Başlıq
                                    {{ strtoupper($lang->code) }}</label>
                                <input type="text"
                                    class="form-control m-0 @error('title.' . $lang->code)is-invalid @enderror"
                                    id="title_{{ $lang->code }}" name="title[{{ $lang->code }}]"
                                    value="{{ old('title.' . $lang->code) }}">
                                @error('title.' . $lang->code)
                                <span class="error invalid-feedback">{{ $message }}</span>
                                @enderror
                        </div>
                        <div class="form-group m-0 mt-3">
                            <label class="m-0" for="description_{{ $lang->code }}">Description {{ strtoupper($lang->code) }}</label>
                            <textarea class="form-control m-0 @error('description.' . $lang->code)is-invalid @enderror"
                                id="description_{{ $lang->code }}" name="description[{{ $lang->code }}]">{{ old('description.' . $lang->code) }}</textarea>
                            @error('description.' . $lang->code)
                            <span class="error invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-6">
        <div class="card mb-2">
            <div class="card-body">
                <div class="form-group d-block">
                    <label class="m-0 mb-2" for="tag_ids">Tag seçin:</label>
                    <select name="tag_ids[]" class="form-select" id="organizerMultiple" data-choices="data-choices" multiple="multiple" data-options='{"removeItemButton":true,"placeholder":true}'>
                        @foreach ($tags as $tag)
                        <option value="{{$tag->id}}"
                            @if(is_array(old('tag_ids')) && in_array($tag->id, old('tag_ids'))) selected @endif
                        >{{$tag->name}}</option>
                        @endforeach
                    </select>
                    @error('tag_ids')
                    <span class="text-danger ml-2">{{$message}}</span>
                    @enderror
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="form-group d-flex">
                    <label class="m-0" for="image">Şəkil</label>
                    <input type="file" name="image"
                        class="custom-file-image form-control @error('image') is-invalid @enderror" id="image"
                        value="image">
                    @error('image')
                    <span class="error invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="image-box">
            <img src="" alt="" class="img-fluid">
        </div>
    </div>
    <div class="col-lg-12 mt-4">
        <div class="card-footer text-right">
            <button type="submit" class="btn btn-success">Əlavə et</button>
            <a href="{{route('admin.categories.index')}}" class="btn btn-warning">Ləğv et</a>
        </div>
    </div>
</form>

@endsection
