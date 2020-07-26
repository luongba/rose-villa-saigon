@extends('master')
@section('content')
  <div class="landing landingstyle">
    <div class="innerpage-style1">
      <span class="leftpageimg"></span>
      <span class="rightpageimg"></span>
      <div class="container">
          @include('layouts.nav')
      </div>
    </div>
  </div>
@endsection

@section('script')
<script>
      // function ready() {
      //     setTimeout(function(){
      //       $('body').find('.loading').remove();
      //       $('body').find('.header').css('visibility','visible');
      //       $('body').find('#page-wrap').css('visibility','visible');
      //       $('body').find('.content-custom-width').css('visibility','visible');
      //     }, 3000);
      // }

      // document.addEventListener("DOMContentLoaded", ready);
    </script>
@endsection
