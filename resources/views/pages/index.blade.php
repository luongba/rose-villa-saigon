
@extends('master')
@section('preload')
  <div class="bg_rem" id="bg_rem"></div>
  <div class="loading">
    <div class="spinner">
          <i class="fas fa-spinner fa-spin fa-3x fa-fw"></i>
      </div>
  </div>
  {{-- @if(!session()->has('rem')) --}}
  <div id="page-wrap" class="page-wrap">
    
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
      <span class="leftpageimg"></span>
      <span class="rightpageimg"></span>
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
      document.addEventListener('DOMContentLoaded', function() {
        var box = document.getElementsByClassName('bg_rem')[0],
            button = document.getElementsByClassName('page-wrap')[0];

        button.addEventListener('click', function(e) {
          if (box.classList.contains('box-hidden')) {
            // show
            box.classList.add('box-transition');
            box.clientWidth; // force layout to ensure the now display: block and opacity: 0 values are taken into account when the CSS transition starts.
            box.classList.remove('box-hidden');
          } else {
            // hide
            box.classList.add('box-transition');
            box.classList.add('box-hidden');
          }
        }, false);

        box.addEventListener('transitionend', function() {
          box.classList.remove('box-transition');
        }, false);
      });
      
      document.addEventListener("DOMContentLoaded", ready);
    </script>
@endsection