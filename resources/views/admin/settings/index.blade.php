@extends('admin.layout.master')

@push('page_title')
Ümumi Məlumatlar
@endpush
@push('section_title')
Saytin Statik Ümumi Məlumatları
@endpush

@section('content')

<div class="d-flex justify-content-end my-3">
    <a href="{{route('admin.settings.edit')}}" class="btn btn-warning">Məlumatları yenilə</a>
</div>
<div class="card card-primary  mb-3">
    <div class="card-header">
        <h3 class="card-title">Tərcüməsiz sahələr</h3>
    </div>
    <div class="card-body border-bottom">
        <div class="row" style="gap: 20px;">
            <!-- Simple fields -->
            <div class="col-lg-12">
                <div class="settings_fields">
                    <div class="w-fit">
                        <div class="card border border-success w-fit">
                            <div class="card-body">
                                <h4 class="card-title text-warning">Facebook linki</h4>
                                <p class="card-text">{{$settings->fb}}
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="w-fit">
                        <div class="card border border-success w-fit">
                            <div class="card-body">
                                <h4 class="card-title text-warning">Twitter linki</h4>
                                <p class="card-text">{{$settings->tw}}
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="w-fit">
                        <div class="card border border-success w-fit">
                            <div class="card-body">
                                <h4 class="card-title text-warning">Linkedin linki</h4>
                                <p class="card-text">{{$settings->in}}
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="w-fit">
                        <div class="card border border-success w-fit">
                            <div class="card-body">
                                <h4 class="card-title text-warning">Instagram linki</h4>
                                <p class="card-text">{{$settings->inst}}
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="w-fit">
                        <div class="card border border-success w-fit">
                            <div class="card-body">
                                <h4 class="card-title text-warning">Youtube linki</h4>
                                <p class="card-text">{{$settings->yt}}
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="w-fit">
                        <div class="card border border-success w-fit">
                            <div class="card-body">
                                <h4 class="card-title text-warning">Telefon nömrə</h4>
                                <p class="card-text">{{$settings->phone}}
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="w-fit">
                        <div class="card border border-success w-fit">
                            <div class="card-body">
                                <h4 class="card-title text-warning">Fax nömrə</h4>
                                <p class="card-text">{{$settings->fax}}
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="w-fit">
                        <div class="card border border-success w-fit">
                            <div class="card-body">
                                <h4 class="card-title text-warning">E-poçt ünvanı</h4>
                                <p class="card-text">{{$settings->email}}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="card border border-success">
                            <div class="card-body">
                                <h4 class="card-title text-warning">Xəritənin iframe-i</h4>
                                <p class="card-text">{!!$settings->iframe_map!!}
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="card border border-success">
                            <div class="card-body">
                                <h4 class="card-title text-warning">Haqqımızda səhifəsinin youtube linki</h4>
                                {!!$settings->about_iframe!!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card-header">
        <h3 class="card-title">Şəkillər</h3>
    </div>
    <div class="card-body border-bottom">
        <div class="row" style="row-gap: 20px;">
            <!-- Images -->
            <div class="col-lg-3 col-md-6">
                <div class="card">
                    <img class="card-img-top border-bottom py-2" src="{{$settings->image_logo_light != '#' ? $settings->image_logo_light : asset('admin/assets/img/elektrod_logo.svg')}}" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Açıq tema üçün yazılı Logo</h5>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="card">
                    <img class="card-img-top border-bottom py-2" src="{{$settings->image_logo_dark != '#' ? $settings->image_logo_dark : asset('admin/assets/img/elektrod_logo.svg')}}" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Tünd tema üçün yazılı Logo</h5>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-6">
                <div class="card">
                    <img class="card-img-top border-bottom py-2" src="{{$settings->favicon != '#' ? $settings->favicon : asset('admin/assets/img/elektrod_logo.svg')}}" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Servisler logo</h5>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-6">
                <div class="card">
                    <img class="card-img-top border-bottom py-2" src="{{$settings->category != '#' ? $settings->category : asset('admin/assets/img/elektrod_logo.svg')}}" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Kateqorilər logo</h5>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-6">
                <div class="card">
                    <img class="card-img-top border-bottom py-2" src="{{$settings->logo_light != '#' ? $settings->logo_light : asset('admin/assets/img/elektrod_logo.svg')}}" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Kategori Logosu</h5>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-6">
                <div class="card">
                    <img class="card-img-top border-bottom py-2" src="{{$settings->logo_dark != '#' ? $settings->logo_dark : asset('admin/assets/img/elektrod_logo.svg')}}" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Tünd tema Logosu</h5>
                    </div>
                </div>
            </div>


            <div class="col-lg-6 col-md-12">
                <div class="card">
                    <img class="card-img-top border-bottom py-2" src="{{$settings->about_banner != '#' ? $settings->about_banner : asset('admin/assets/img/elektrod_logo.svg')}}" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Haqqımızda Səhifəsinin Banner Şəkli</h5>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-12">
                <div class="card">
                    <img class="card-img-top border-bottom py-2"
                         src="{{ $settings->home_banner != '#' ? $settings->home_banner : asset('client/assets/images/presentation1.jpg') }}"
                         alt="Ana Səhifəsinin Banner Şəkli 1"
                         onerror="this.onerror=null; this.src='{{ asset('client/assets/images/presentation3.jpg') }}';">
                    <div class="card-body">
                        <h5 class="card-title">Ana Səhifəsinin Banner Şəkli 1</h5>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 col-md-12">
                <div class="card">
                    <img class="card-img-top border-bottom py-2"
                         src="{{ $settings->home_banner2 != '#' ? $settings->home_banner2 : asset('client/assets/images/presentation2.jpg') }}"
                         alt="Ana Səhifəsinin Banner Şəkli 2"
                         onerror="this.onerror=null; this.src='{{ asset('client/assets/images/presentation4.jpg') }}';">
                    <div class="card-body">
                        <h5 class="card-title">Ana Səhifəsinin Banner Şəkli 2</h5>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 col-md-12">
                <div class="card">
                    <img class="card-img-top border-bottom py-2"
                         src="{{ $settings->home_banner3 != '#' ? $settings->home_banner3 : asset('client/assets/images/presentation3.jpg') }}"
                         alt="Ana Səhifəsinin Banner Şəkli 3"
                         onerror="this.onerror=null; this.src='{{ asset('client/assets/images/presentation5.jpg') }}';">
                    <div class="card-body">
                        <h5 class="card-title">Ana Səhifəsinin Banner Şəkli 3</h5>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 col-md-12">
                <div class="card">
                    <img class="card-img-top border-bottom py-2"
                         src="{{ $settings->home_banner4 != '#' ? $settings->home_banner4 : asset('client/assets/images/presentation4.jpg') }}"
                         alt="Ana Səhifəsinin Banner Şəkli 4"
                         onerror="this.onerror=null; this.src='{{ asset('client/assets/images/presentation6.jpg') }}';">
                    <div class="card-body">
                        <h5 class="card-title">Ana Səhifəsinin Banner Şəkli 4</h5>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-12">
                <div class="card">
                    <img class="card-img-top border-bottom py-2"
                         src="{{ $settings->home_banner5 != '#' ? $settings->home_banner5 : asset('client/assets/images/presentation5.jpg') }}"
                         alt="Ana Səhifəsinin Banner Şəkli 5"
                         onerror="this.onerror=null; this.src='{{ asset('client/assets/images/presentation7.jpg') }}';">
                    <div class="card-body">
                        <h5 class="card-title">Ana Səhifəsinin Banner Şəkli 5</h5>
                    </div>
                </div>
            </div>


            <div class="col-lg-6 col-md-12">
                <div class="card">
                    <video autoplay loop muted plays-inline class="back_video">
                        <source src="{{ $settings->home_video != '#' ? $settings->home_video : asset('client/assets/images/about.mp4') }}" type="video/mp4" />
                    </video>
                    <div class="card-body">
                        <h5 class="card-title">Ana Səhifəsinin Videosu</h5>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-12">
                <div class="card">
                    <video autoplay loop muted plays-inline class="back_video">
                        <source src="{{ $settings->about_video != '#' ? $settings->about_video : asset('client/assets/images/about-page-video.mp4') }}" type="video/mp4" />
                    </video>
                    <div class="card-body">
                        <h5 class="card-title">Haqqimizda Videosu</h5>
                    </div>
                </div>
            </div>


            <div class="col-lg-6 col-md-12">
                <div class="card">
                    <img class="card-img-top border-bottom py-2" src="{{$settings->contact_image != '#' ? $settings->contact_image : asset('admin/assets/img/elektrod_logo.svg')}}" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Əlaqə Səhifəsinin Şəkli</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card-header">
        <h3 class="card-title">Tərcümə olunan sahələr</h3>
    </div>
    <div class="card-body">
        <div class="row" style="row-gap: 20px;">
            <div class="col-12">
                <div class="card border border-success">
                    <div class="card-body">
                        <h4 class="card-title text-warning">Ünvan</h4>
                        @foreach ($settings->addresses as $lang=>$value)
                        <p class="card-text border-top pt-2"><strong class="me-3 text-info">{{strtoupper($lang)}}</strong>{{$value}}
                        </p>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-md-5 col-12">
                <div class="card border border-success">
                    <div class="card-body">
                        <h4 class="card-title text-warning">Ana sehifədəki Haqqımızda Başlıq</h4>
                        @foreach ($settings->home_about_titles as $lang=>$value)
                        <p class="card-text border-top pt-2"><strong class="me-3 text-info">{{strtoupper($lang)}}</strong>{{$value}}
                        </p>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="col-md-7 col-12">
                <div class="card border border-success">
                    <div class="card-body">
                        <h4 class="card-title text-warning">Ana sehifədəki Haqqımızda Alt Başlıq</h4>
                        @foreach ($settings->home_about_subtitles as $lang=>$value)
                        <p class="card-text border-top pt-2"><strong class="me-3 text-info">{{strtoupper($lang)}}</strong>{{$value}}
                        </p>
                        @endforeach
                    </div>
                </div>
            </div>


            <div class="col-12">
                <div class="card border border-success">
                    <div class="card-body">
                        <h4 class="card-title text-warning">Ana sehifədəki Haqqımızda Təsvir</h4>
                        @foreach ($settings->home_about_descs as $lang=>$value)
                        <p class="card-text border-top pt-2" style="clear: both;"><strong class="me-3 text-info">{{strtoupper($lang)}}</strong>
                        </p>
                        <div class="pb-2">
                            {!!$value!!}
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="col-md-4 col-12">
                <div class="card border border-success">
                    <div class="card-body">
                        <h4 class="card-title text-warning">Alt hissə Başlıq</h4>
                        @foreach ($settings->footer_titles as $lang=>$value)
                        <p class="card-text border-top pt-2"><strong class="me-3 text-info">{{strtoupper($lang)}}</strong>{{$value}}
                        </p>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-12">
                <div class="card border border-success">
                    <div class="card-body">
                        <h4 class="card-title text-warning">Haqqımızda Başlıq</h4>
                        @foreach ($settings->about_titles as $lang=>$value)
                        <p class="card-text border-top pt-2"><strong class="me-3 text-info">{{strtoupper($lang)}}</strong>{{$value}}
                        </p>
                        @endforeach
                    </div>
                </div>
            </div>


            <div class="col-md-6 col-12">
                <div class="card border border-success ">
                    <div class="card-body">
                        <h4 class="card-title text-warning">Əlaqə Başlıq</h4>
                        @foreach ($settings->contact_titles as $lang=>$value)
                        <p class="card-text border-top pt-2"><strong class="me-3 text-info">{{strtoupper($lang)}}</strong>{{$value}}
                        </p>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-12">
                <div class="card border border-success ">
                    <div class="card-body">
                        <h4 class="card-title text-warning">Kateqoriyalar Başlıq</h4>
                        @foreach ($settings->categories_titles as $lang=>$value)
                        <p class="card-text border-top pt-2"><strong class="me-3 text-info">{{strtoupper($lang)}}</strong>{{$value}}
                        </p>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="col-12">
                <div class="card border border-success ">
                    <div class="card-body">
                        <h4 class="card-title text-warning">Haqqımızda Təsvir</h4>
                        @foreach ($settings->about_descs as $lang=>$value)
                        <p class="card-text border-top pt-2" style="clear: both;"><strong class="me-3 text-info">{{strtoupper($lang)}}</strong>
                        </p>
                        <div class="pb-2">
                            {!!$value!!}
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
