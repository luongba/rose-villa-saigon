
@extends('master')
@section('preload')
  <div class="loading">
    <div class="spinner">
          <i class="fas fa-spinner fa-spin fa-3x fa-fw"></i>
      </div>
  </div>
  {{-- @if(!session()->has('rem')) --}}
  <div id="page-wrap">
    <div class="bg_rem"></div>
     <div id="canvas"></div>
      <div class="curtain first-curtain">
        <img src="{{asset('public/images/rem/l1.png')}}" class="" data-sampler="simplePlaneTexture" />
      
      </div>
      <div class="curtain second-curtain">
      <img src="{{asset('public/images/rem/r1.png')}}" class="" data-sampler="simplePlaneTexture" />
      </div>
  </div>
  <audio id="audio" autoplay>
    <source type="audio/mp3" src="{{asset('public/assets/audio/La vie en rose - Louis Armstrong.mp3')}}">
  </audio>

  <style>
    #page-wrap {
      visibility: hidden;
    }
  .header,
  .content-custom-width {
      visibility: hidden;
    }
  </style>
@endsection
@section('content')
  <div class="landing landingstyle">
    <div class="innerpage-style1">
      <span class="bgimg"></span>
      <div class="container">
          @include('layouts.nav')
      </div>
    </div>
  </div>
@endsection
@section('script')
<script src="{{asset('public/js/curtains.js')}}" type="text/javascript"></script>
<script src="{{asset('public/js/simple.plane.setup.js')}}" type="text/javascript"></script>
<script>
      function ready() {
          setTimeout(function(){
            $('body').find('.loading').remove();
            $('body').find('.header').css('visibility','visible');
            $('body').find('#page-wrap').css('visibility','visible');
            $('body').find('.content-custom-width').css('visibility','visible');
          }, 3000);
      }
      $("#page-wrap").click(function() {
        $(".bg_rem").addClass('fade-out');
      });
      
      document.addEventListener("DOMContentLoaded", ready);
    </script>
@endsection