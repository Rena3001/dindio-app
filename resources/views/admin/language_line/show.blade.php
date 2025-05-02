@extends('admin.layout.master')

@push('page_title')
Statik Tərcümənin Məlumatları
@endpush
@push('section_title')
Statik Tərcümənin Ətraflı Məlumatları
@endpush

@section('content')
<div class="card card-primary  mb-3">
    <div class="card-header">
        <h3 class="card-title d-flex justify-content-between align-items-center">Ətraflı
            <div class="btn-box">
                <a href="{{route('admin.language_line.edit', $model->id)}}" class="btn btn-info">Yenilə</a>
                <a href="{{route('admin.language_line.index')}}" class="btn btn-warning">Geri qayıt</a>
            </div>
        </h3>

    </div>
    <div class="card-body">
        <div class="row" style="gap: 20px;">
            <div class="col-lg-4 col-md-6">
                <div class="card text-white bg-primary">
                    <div class="card-body">
                        <h4 class="card-title text-white">Qrup</h4>
                        <p class="card-text">{{$model->group}}</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="card text-white bg-info">
                    <div class="card-body">
                        <h4 class="card-title text-white">Açar söz</h4>
                        <p class="card-text">{{$model->key}}</p>
                    </div>
                </div>
            </div>

            <div class="col-md-12">
                <div class="card border border-success w-fit">
                    <div class="card-body">
                        <h4 class="card-title text-warning">Mətn</h4>
                        @foreach ($model->text as $lang=>$value)
                        <p class="card-text"><strong class="me-3 text-info">{{strtoupper($lang)}}</strong>{{$value}}
                        </p>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection