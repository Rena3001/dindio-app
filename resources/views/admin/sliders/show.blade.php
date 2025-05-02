@extends('admin.layout.master')

@push('page_title')
Slaydın Məlumatları
@endpush
@push('section_title')
Slaydın Ətraflı Məlumatları
@endpush

@section('content')
<div class="card card-primary  mb-3">
    <div class="card-header">
        <h3 class="card-title d-flex justify-content-between align-items-center">
            Ətraflı
            <div class="btn-box">
                <a href="{{route('admin.sliders.edit', $model->id)}}" class="btn btn-info">Yenilə</a>
                <a href="{{route('admin.sliders.index')}}" class="btn btn-warning">Geri qayıt</a>
            </div>
        </h3>
    </div>
    <div class="card-body">
        <div class="row" style="gap: 20px;">
            @if ($model->image)
            <div class="col-lg-4 col-md-6">
                <div class="card border border-info">
                    <div class="card-body">
                        <img class="img-fluid" src="{{$model->image}}" alt="">
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection