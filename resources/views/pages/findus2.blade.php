@extends('master')
@section('content')
  <main>
    <div class="scroller">
      <div class="slideshow scroller__slideshow">

        <div class="slideshow__item" title="" style="background-image: url({{asset('public/images/singleroom/room1.jpg')}});"></div>
        <div class="slideshow__item" title="" style="background-image: url({{asset('public/images/singleroom/room2.jpg')}});"></div>
  
        
      </div>  
      <div class="scroller__launcher">
        <div class="slick-next scroller__launcher__arrow"></div>
      </div>
    </div>
    <div class="poster visual-pull-left-lap-and-up">
      <div class="about-ct ctbox1 singleframe"> 
        {{-- <h1 class="poster__title poster__title--ghost"></h1>
        <h1 class="poster__title visual-pull-left-lap-and-up"></h1> --}}
      <h1 class="title-innerpage2">
            <span><span>{{ trans('pages.How To Find Us') }}</span></span>
        </h1>
        <div class="abct-elm mapct">
          <div class="gmaps">
              <iframe src="https://www.google.com/maps/embed?pb=!1m28!1m12!1m3!1d354712.1334045692!2d106.49567992672108!3d10.80729720230469!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m13!3e6!4m5!1s0x317529111aa89f9d%3A0xd8f09cc0aa1b27f3!2zU8OibiBiYXkgcXXhu5FjIHThur8gVMOibiBTxqFuIE5o4bqldCwgVHJ1b25nIFNvbiBTdHJlZXQsIFRhbiBCaW5oLCBIbyBDaGkgTWluaCBDaXR5!3m2!1d10.818463099999999!2d106.6588245!4m5!1s0x3175275fcb6ea7f9%3A0x19929bf6418b6a33!2zUm9zZSBWaWxsYSBTYWlnb24sIFPhu5EgMTAgxJDGsOG7nW5nIHPhu5EgNTgsIFRo4bqjbyDEkGnhu4FuLCBRdeG6rW4gMiwgVGjDoG5oIHBo4buRIEjhu5MgQ2jDrSBNaW5oLCBWaWV0bmFt!3m2!1d10.8063278!2d106.7271267!5e0!3m2!1sen!2s!4v1596278988944!5m2!1sen!2s" width="350" height="350" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
            </div>
      </div>
    </div>
    </div>
  </main>

<link rel="stylesheet" href="{{asset('public/rosevilla/style.css')}}" type="text/css" media="screen" />
@endsection
@section('script')
<script src="{{asset('public/rosevilla/enquire.min.js')}}" type="text/javascript"></script>
<script src="{{asset('public/rosevilla/slick.min.js')}}"></script>
<script src="{{asset('public/rosevilla/script.js')}}" type="text/javascript"></script>
@endsection

