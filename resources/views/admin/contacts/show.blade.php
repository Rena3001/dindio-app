@extends('admin.layout.master')

@push('page_title')
"Əlaqə" Məlumatları
@endpush
@push('section_title')
Əlaqənin Ətraflı Məlumatları
@endpush

@section('content')
<div class="card card-primary mb-3">
    <div class="card-header">
        <h3 class="card-title d-flex justify-content-between align-items-center">Ətraflı
            <a href="{{route('admin.contacts.index')}}" class="btn btn-warning">
                Geri qayıt
            </a>
        </h3>
    </div>
    <div class="card-body">
        <div class="row" style="row-gap: 20px;">
            <div class="col-lg-4 col-md-6 col-sm-12">
                <div class="card border border-success">
                    <div class="card-body">
                        <h4 class="card-title text-warning">Ad və Soyad</h4>
                        <p class="card-text"><strong class="me-3 text-info"></strong>{{ $contact->fullname }}</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12">
                <div class="card border border-success">
                    <div class="card-body">
                        <h4 class="card-title text-warning">Email</h4>
                        <p class="card-text"><strong class="me-3 text-info"></strong>{{ $contact->email }}</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12">
                <div class="card border border-success">
                    <div class="card-body">
                        <h4 class="card-title text-warning">Nömrə</h4>
                        <p class="card-text"><strong class="me-3 text-info"></strong>{{ $contact->phone }}</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="card border border-success">
                    <div class="card-body">
                        <h4 class="card-title text-warning">Mesaj</h4>
                        <p class="card-text"><strong class="me-3 text-info"></strong>{{ $contact->message }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection