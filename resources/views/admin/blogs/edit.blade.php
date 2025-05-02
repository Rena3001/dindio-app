@extends('admin.layout.master')

@push('page_title')
Bloq yeniləmə
@endpush
@push('section_title')
Bloq Redaktə Etmə
@endpush

@push('css')
<link href="{{asset('admin/assets/vendors/choices/choices.min.css')}}" rel="stylesheet">
@endpush

@section('content')

<form action="{{ route('admin.blogs.update', $model->id) }}" method="POST" class="row mb-3" enctype="multipart/form-data">
    @csrf
    @method('PATCH')
    <div class="col-lg-8 mb-2">
        <div class="card card-primary card-outline card-outline-tabs">
            <div class="card-header border-bottom-0">
                <ul class="nav nav-underline fs-9" id="myTab" role="tablist">
                    @foreach ($langs as $key => $lang)
                    <li class="nav-item" role="presentation">
                        <a class="nav-link {{ $key === 0 ? 'active' : '' }} @error('title.' . $lang->code)text-danger @enderror"
                            id="{{ $lang->code . 'blogs' }}" data-bs-toggle="tab"
                            href="#{{ 'blogs' . $lang->code }}" role="tab"
                            aria-controls="{{ 'blogs' . $lang->code }}"
                            aria-selected="{{ $key === 0 ? 'true' : 'false' }}">{{ '[' . strtoupper($lang->code) . ']' }}</a>
                    </li>
                    @endforeach
                </ul>
            </div>
            <div class="card-body">
                <div class="tab-content mt-3" id="myTabContent">
                    @foreach ($langs as $key => $lang)
                    <div class="tab-pane fade {{ $key === 0 ? 'active show' : '' }}"
                        id="{{ 'blogs' . $lang->code }}" role="tabpanel"
                        aria-labelledby="{{ $lang->code . 'blogs' }}">
                        <div class="form-group">
                            <label class="m-0" for="title_{{ $lang->code }}">Başlıq {{ strtoupper($lang->code) }}</label>
                            <input type="text"
                                class="form-control @error('title.' . $lang->code)is-invalid @enderror"
                                id="title_{{ $lang->code }}" name="title[{{ $lang->code }}]"
                                value="{{ old('title.' . $lang->code, isset($model->json_title[$lang->code]) ? $model->json_title[$lang->code] : '') }}">
                            @error('title.' . $lang->code)
                            <span class="error invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group mt-3">
                            <label class="m-0" for="description_{{ $lang->code }}">Description {{ strtoupper($lang->code) }}</label>
                            <textarea class="form-control @error('description.' . $lang->code)is-invalid @enderror"
                                id="description_{{ $lang->code }}" name="description[{{ $lang->code }}]">{{ old('description.' . $lang->code, isset($model->json_description[$lang->code]) ? $model->json_description[$lang->code] : '') }}</textarea>
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
        <div class="image-box">
            <img src="{{ $model->image ?? '' }}" alt="" class="img-fluid">
        </div>
    </div>
    <div class="col-lg-12 mt-4">
        <div class="card-footer text-right">
            <button type="submit" class="btn btn-success">Yenilə</button>
            <a href="{{ route('admin.blogs.index') }}" class="btn btn-warning">Ləğv et</a>
        </div>
    </div>
</form>
@endsection
