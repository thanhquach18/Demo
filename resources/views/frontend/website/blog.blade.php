@extends('frontend.template.root')
<div class="container">
  <div class="col-sm-12">
    <div class="card aos-init aos-animate" data-aos="fade-up">
      <div class="card-body">
        <div class="row">
          <div class="col-sm-12">
            <h1 class="font-weight-600 mb-4">
              Tin Mới Trong Ngày
            </h1>
          </div>
        </div>
        <div class="row">
          @foreach ($blogs as $item)
          <div class="col-lg-8">
            <div class="row">
              <div class="col-sm-4 grid-margin">
                <div class="rotate-img">
                  <img src="{{ $item->thumb }}"  alt="banner" class="img-fluid">
                </div>
              </div>
              <div class="col-sm-8 grid-margin">
                <h2 class="font-weight-600 mb-2">
                  <a href="{{ route('website.blog.single', ['slug' => $item->slug]) }}">{{ $item->title }}</a>
                </h2>
                <p class="fs-13 text-muted mb-0">
                  <span class="mr-2">{{ $item->owner }}</span>{{ date('m/d/Y H:i:s', strtotime($item->updated_at)) }}
                </p>
                <p class="fs-15">
                  {{ $item->short_description }}
                </p>
              </div>
            </div>          
          </div>
          @endforeach
        </div>
      </div>
    </div>
  </div>
</div>