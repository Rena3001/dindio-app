@extends('admin.layout.master')

@push('page_title')
Kateqoriyanın Məlumatları
@endpush
@push('section_title')
Kateqoriyanın Ətraflı Məlumatları
@endpush

@section('content')
<div class="card card-primary  mb-3">
    <div class="card-header">
        <h3 class="card-title d-flex justify-content-between align-items-center">Ətraflı
            <div class="btn-box">
                <a href="{{route('admin.categories.edit',$model->id)}}" class="btn btn-info">Yenilə</a>
                <a href="{{route('admin.categories.index')}}" class="btn btn-warning">Geri qayıt</a>
            </div>
        </h3>

    </div>
    <div class="card-body">
        <div class="row mb-3" style="gap: 20px;">
            <div class="col-lg-8">
                <div class="d-flex" style="gap: 20px;">
                    <div class="card border border-success w-fit">
                        <div class="card-body">
                            <h4 class="card-title text-warning">Başlıq</h4>
                            @foreach ($model->titles as $lang=>$value)
                            <p class="card-text"><strong class="me-3 text-info">{{strtoupper($lang)}}</strong>{{$value}}
                            </p>
                            @endforeach
                        </div>
                    </div>
                    <div class="card border border-success w-fit">
                        <div class="card-body">
                            <h4 class="card-title text-warning">Açıqlama</h4>
                            @foreach ($model->descriptions as $lang=>$value)
                            <p class="card-text"><strong class="me-3 text-info">{{strtoupper($lang)}}</strong>{{$value}}
                            </p>
                            @endforeach
                        </div>
                    </div>
                    <div class="card border border-success w-fit">
                        <div class="card-body">
                            <h4 class="card-title text-warning">Slaq</h4>
                            @foreach ($model->slugs as $lang=>$value)
                            <p class="card-text"><strong class="me-3 text-info">{{strtoupper($lang)}}</strong>{{$value}}
                            </p>
                            @endforeach
                        </div>
                    </div>
                    <div class="card border border-success w-fit">
                        <div class="card-body">
                            <h4 class="card-title text-warning">Yaranma tarixi</h4>
                            <p class="card-text">{{ $model->created_at }}
                            </p>
                        </div>
                    </div>
                    <div class="card border border-success w-fit">
                        <div class="card-body">
                            <h4 class="card-title text-warning">Dəyişmə tarixi</h4>
                            <p class="card-text">{{ $model->updated_at }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card border border-success w-fit">
                <div class="card-body">
                    <h4 class="card-title text-warning">Tag</h4>
                    <p class="card-text">
                        {{$model->tag->title}}
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
