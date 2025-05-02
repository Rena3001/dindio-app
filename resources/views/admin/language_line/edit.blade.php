@extends('admin.layout.master')

@push('page_title')
Tərcümə yeniləmə
@endpush
@push('section_title')
Tərcümə Redaktə Etmə
@endpush

@section('content')
<form action="{{ route('admin.language_line.update', $model->id) }}" method="POST" class="row mb-3">
    @csrf
    @method('PATCH')
    <div class="col-lg-7">
        <div class="card card-primary card-outline card-outline-tabs">
            <div class="card-header border-bottom-0 pb-0">
                <ul class="nav nav-underline" id="custom-tabs-four-tab" role="tablist">
                    @foreach ($langs as $key => $lang)
                    <li class="nav-item" role="presentation">
                        <a class="nav-link {{ $key === 0 ? 'active' : '' }} @error('text.' . $lang->code) text-danger @enderror" id="{{ $lang->code . 'language_line' }}" data-bs-toggle="tab" href="#{{ 'language_line' . $lang->code }}" role="tab" aria-controls="{{ 'language_line' . $lang->code }}" aria-selected="{{ $key === 0 ? 'true' : 'false' }}">{{ '[' . strtoupper($lang->code) . ']' }}</a>
                    </li>
                    @endforeach
                </ul>
            </div>
            <div class="card-body">
                <div class="tab-content" id="custom-tabs-four-tabContent">
                    @foreach ($langs as $key => $lang)
                    <div class="tab-pane fade {{ $key === 0 ? 'show active' : '' }}" id="{{ 'language_line' . $lang->code }}" role="tabpanel" aria-labelledby="custom-tabs-four-home-tab">
                        <div class="form-group m-0">
                            <label for="text.{{ $lang->code }}" class="m-0">Mətn  {{ strtoupper($lang->code) }}</label>
                            <input type="text" class="form-control m-0  @error('text.' . $lang->code) is-invalid @enderror" id="text.{{ $lang->code }}" name="text[{{ $lang->code }}]" value="{{ old('text' . '.' . $lang->code, isset($model->text[$lang->code]) ? $model->text[$lang->code] : '') }}">
                            @error('text.' . $lang->code)
                            <span class="error invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    @endforeach

                </div>
            </div>
            <!-- /.card -->
        </div>
    </div>
    <div class="col-lg-5">
        <div class="card card-primary">
            <div class="card-body">
                <div class="form-group">
                    <label for="group">Qrup</label>
                    <input type="text" name="group" class="form-control @error('group') is-invalid @enderror" id="group" value="{{ old('group', $model->group) }}">
                    @error('group')
                    <span class="error invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="key">Açar söz</label>
                    <input type="text" name="key" class="form-control @error('key') is-invalid @enderror" id="key" value="{{ old('key', $model->key) }}">
                    @error('key')
                    <span class="error invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer text-right">
                <button type="submit" class="btn btn-primary">Yadda Saxla</button>
                <a href="{{route('admin.language_line.index')}}" class="btn btn-warning">Ləğv et</a>
            </div>
        </div>
    </div>
</form>
@endsection