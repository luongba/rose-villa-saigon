<div class="loading">
  <div class="spinner">
        <i class="fas fa-spinner fa-spin fa-3x fa-fw"></i>
    </div>
</div>
  {{-- @if(!session()->has('rem')) --}}
      <div id="page-wrap">
         <div id="canvas"></div>
          <div class="curtain first-curtain">
            <img src="{{asset('public/images/picture_curtain_left.jpeg')}}" class="" data-sampler="simplePlaneTexture" />
          
          </div>
          <div class="curtain second-curtain">
          <img src="{{asset('public/images/picture_curtain_right.jpeg')}}" class="" data-sampler="simplePlaneTexture" />
          </div>
      </div>
      <audio id="audio" autoplay>
        <source type="audio/mp3" src="{{asset('public/assets/audio/La vie en rose - Louis Armstrong.mp3')}}">
      </audio>
      <script src="{{asset('public/js/curtains.js')}}" type="text/javascript"></script>
      <script src="{{asset('public/js/simple.plane.setup.js')}}" type="text/javascript"></script>
      {{-- <?php
        session()->put('rem',true);
      ?> --}}

<style type="text/css">
  #page-wrap {
    visibility: hidden;
  }
  .loading {
      background-color: rgba(0,0,0,.5);
      position: absolute;
      width: 100%;
      height: 100%;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      z-index: 99999;
  }
  .spinner {
      position: absolute;
      top: 50%;
      left: 50%;
      margin-top: -20px;
      margin-left: -25px;
      width: 50px;
      height: 40px;
      text-align: center;
      font-size: 10px;
      color: #fff;
  }
  .header, .content-custom-width {
    visibility: hidden;
  }
</style>
  {{-- @endif  --}}


@extends('master')
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
<script>
      function ready() {
          setTimeout(function(){
            $('body').find('.loading').remove();
            $('body').find('.header').css('visibility','visible');
            $('body').find('#page-wrap').css('visibility','visible');
            $('body').find('.content-custom-width').css('visibility','visible');
          }, 3000);
      }

      document.addEventListener("DOMContentLoaded", ready);
    </script>
@endsection