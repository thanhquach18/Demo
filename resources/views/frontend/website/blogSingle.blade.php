@extends('frontend.template.root')
@section('content')
<header id="header">
    <div class="container">
      <nav class="navbar navbar-expand-lg navbar-light">
        <div class="navbar-top">
          <div class="d-flex justify-content-between align-items-center">
           
            <ul class="navbar-top-right-menu">
              <li class="nav-item">
                <a href="#" class="nav-link"><i class="mdi mdi-magnify"></i></a>
              </li>
              <li class="nav-item">
                <a href="{{ route('login.get') }}" class="nav-link">Login</a>
              </li>
              <li class="nav-item">
                <a href="{{ route('logout.get') }}" class="nav-link">Logout</a>
              </li>
            </ul>
          </div>
        </div>
        <div class="navbar-bottom">
          <div class="d-flex justify-content-between align-items-center">
            <div>
              <a class="navbar-brand" href="#"
                ><img src="{{ URL::asset('assets/images/logo.svg') }}" alt="" /></a>
            </div>
            <div>
              <button
                class="navbar-toggler"
                type="button"
                data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent"
                aria-expanded="false"
                aria-label="Toggle navigation"
              >
                <span class="navbar-toggler-icon"></span>
              </button>
              <div
                class="navbar-collapse justify-content-center collapse"
                id="navbarSupportedContent"
              >
                <ul
                  class="navbar-nav d-lg-flex justify-content-between align-items-center"
                >
                  <li>
                    <button class="navbar-close">
                      <i class="mdi mdi-close"></i>
                    </button>
                  </li>
                  <li class="nav-item active">
                    <a class="nav-link" href="{{ route('website.index') }}#home">Home</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="{{ route('website.index') }}#sport">Sport</a>
                  </li>
                  {{-- <li class="nav-item">
                    <a class="nav-link" href="pages/business.html">Business</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="pages/sports.html">Sports</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="pages/art.html">Art</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="pages/politics.html">POLITICS</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="pages/travel.html">Travel</a>
                  </li> --}}
                  <li class="nav-item">
                    <a class="nav-link" href="{{ route('website.index') }}#contact">Contact</a>
                  </li>
                </ul>
              </div>
            </div>
            <ul class="social-media">
              <li>
                <a href="#">
                  <i class="mdi mdi-facebook"></i>
                </a>
              </li>
              <li>
                <a href="#">
                  <i class="mdi mdi-youtube"></i>
                </a>
              </li>
              <li>
                <a href="#">
                  <i class="mdi mdi-twitter"></i>
                </a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
    </div>
  </header>
  <div class="container">
    <div class="row">
        
      <div class="col-sm-12">
        <div class="card aos-init aos-animate" data-aos="fade-up">
          <div class="card-body">
            <div class="aboutus-wrapper">
              <h1 class="mt-5">
                {{ $blog->title }}
              </h1>
              <p class="fs-13 text-muted mb-0">
                <span class="mr-2">{{ $blog->owner }}</span>{{ date('m/d/Y H:i:s', strtotime($blog->updated_at)) }}
              </p>
              <img src="{{ $blog->thumb }}" alt="banner" class="img-fluid mb-5">

              <p class="font-weight-600 fs-15 text-center">
                {{ $blog->short_description }}
              </p>
              <p class="font-weight-600 fs-15 mb-5 mt-4 text-center">
               
                        {!! $blog->content !!}    
                    
              </p>
            </div>
          </div>
        </div>
      </div>
    
    </div>
  </div>

</div>
@include('frontend.template.footer')
@endsection