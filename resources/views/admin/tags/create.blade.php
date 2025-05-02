@extends('admin.layout.master')

@push('page_title')
Yeni Taq
@endpush
@push('section_title')
Taq Əlavə Etmə
@endpush

@push('css')
<link href="{{ asset('admin/assets/vendors/choices/choices.min.css') }}" rel="stylesheet">
@endpush

@section('content')
<form action="{{ route('admin.tags.store') }}" method="POST" class="row mb-3" enctype="multipart/form-data">
    @csrf
    <div class="col-lg-8 mb-2">
        <div class="card card-primary card-outline card-outline-tabs">
            <div class="card-header border-bottom-0 pb-0">
                <ul class="nav nav-underline fs-9" id="myTab" role="tablist">
                    @foreach ($langs as $key => $lang)
                    <li class="nav-item" role="presentation">
                        <a class="nav-link {{ $key === 0 ? 'active' : '' }} @error('title.' . $lang->code)text-danger @enderror"
                            id="{{ $lang->code . 'tags' }}" data-bs-toggle="tab"
                            href="#{{ 'tags' . $lang->code }}" role="tab"
                            aria-controls="{{ 'tags' . $lang->code }}"
                            aria-selected="{{ $key === 0 ? 'true' : 'false' }}">{{ '[' . strtoupper($lang->code) . ']' }}</a>
                    </li>
                    @endforeach
                </ul>
            </div>
            <div class="card-body">
                <div class="tab-content mt-3" id="myTabContent">
                    @foreach ($langs as $key => $lang)
                    <div class="tab-pane fade {{ $key === 0 ? 'active show' : '' }}"
                        id="{{ 'tags' . $lang->code }}" role="tabpanel"
                        aria-labelledby="{{ $lang->code . 'tags' }}">
                        <div class="form-group m-0">
                            <label class="m-0" for="title_{{ $lang->code }}">Başlıq {{ strtoupper($lang->code) }}</label>
                            <input type="text"
                                class="form-control m-0 @error('title.' . $lang->code)is-invalid @enderror"
                                id="title_{{ $lang->code }}" name="title[{{ $lang->code }}]"
                                value="{{ old('title.' . $lang->code) }}">
                            @error('title.' . $lang->code)
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
            <img src="" alt="" class="img-fluid">
        </div>
    </div>
    <div class="col-lg-12 mt-4">
        <div class="card-footer text-right">
            <button type="submit" class="btn btn-success">Əlavə et</button>
            <a href="{{ route('admin.tags.index') }}" class="btn btn-warning">Ləğv et</a>
        </div>
    </div>
</form>

@endsection
