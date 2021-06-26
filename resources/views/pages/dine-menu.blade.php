@extends('slider-master')
@section('css')
<style>
  .bb-custom-wrapper nav{
    position: unset !important;
  }
  #bb-nav-prev{
    position: absolute;
    top: 0;
    left: 0;
    bottom: 0;
    width: 50% !important;
    height: 100% !important;
    z-index: 999;
    background: transparent;

  }
  #bb-nav-next{
    position: absolute;
    top: 0;
    right: 0;
    bottom: 0;
    width: 50% !important;
    height: 100% !important;
    z-index: 999;
    background: transparent;

  }
  .back-web{
    position: fixed;
    top: 10%;
    left: 5%;
    width: 37px;
    z-index: 10000;
    height: 50px;
  }
  .full-sc{
  display: block;
  width: 100% !important;
  height: 100% !important;
}
  
</style>
<link rel="stylesheet" href="{{ asset('public/css/bookblock.css') }}">
  <link rel="stylesheet" href="{{ asset('public/css/demo1.css') }}">
  <script src="{{ asset('public/js/modernizr.custom.js') }}"></script>

@endsection
@section('content')
  <section id="section-1" class="full-page" style="position: fixed; top: 0; left: 0;right: 0;bottom: 0;">
      <div class="main clearfix full-sc">
        <div class="bb-custom-wrapper full-sc">
          <div id="bb-bookblock" class="bb-bookblock full-sc">
            <div class="bb-item full-sc">
              <a class="full-sc"><img class="full-sc" src="{{ asset('public/images/images/slider1.png') }}" alt="image01"/></a>
            </div>
            <div class="bb-item ">
              <a class="full-sc"><img class="full-sc" src="{{ asset('public/images/images/slider2.png') }}" alt="image01"/></a>
            </div>
            <div class="bb-item">
              <a class="full-sc"><img class="full-sc" src="{{ asset('public/images/images/slider3.png') }}" alt="image01"/></a>
            </div>
            <div class="bb-item">
              <a class="full-sc"><img class="full-sc" src="{{ asset('public/images/images/slider4.png') }}" alt="image01"/></a>
            </div>
            <div class="bb-item">
              <a class="full-sc"><img class="full-sc" src="{{ asset('public/images/images/slider5.png') }}" alt="image01"/></a>
            </div>
            <div class="bb-item">
              <a class="full-sc"><img class="full-sc" src="{{ asset('public/images/images/slider6.png') }}" alt="image01"/></a>
            </div>
          </div>
          <nav>
            <a id="bb-nav-first"></a>
            <a id="bb-nav-prev"></a>
            <a id="bb-nav-next"></a>
            <a id="bb-nav-last"></a>
          </nav>
          <div class="back-web">
            <a href="{{ route('dine')}}" class="back-web__link">
              <img src="{{ asset('public/images/icons/back-web.png') }}" alt="">
            </a>
          </div>
        </div>
      </div>
    </section>

@endsection
@section('script')
    <script src="{{ asset('public/js/jquerypp.custom.js') }}"></script>
    <script src="{{ asset('public/js/jquery.bookblock.js') }}"></script>
    <script>
      var Page = (function() {
        
        var config = {
            $bookBlock : $( '#bb-bookblock' ),
            $navNext : $( '#bb-nav-next' ),
            $navPrev : $( '#bb-nav-prev' ),
            $navFirst : $( '#bb-nav-first' ),
            $navLast : $( '#bb-nav-last' )
          },
          init = function() {
            config.$bookBlock.bookblock( {
              speed : 800,
              shadowSides : 0.8,
              shadowFlip : 0.7
            } );
            initEvents();
          },
          initEvents = function() {
            
            var $slides = config.$bookBlock.children();

            // add navigation events
            config.$navNext.on( 'click touchstart', function() {
              config.$bookBlock.bookblock( 'next' );
              return false;
            } );

            config.$navPrev.on( 'click touchstart', function() {
              config.$bookBlock.bookblock( 'prev' );
              return false;
            } );

            config.$navFirst.on( 'click touchstart', function() {
              config.$bookBlock.bookblock( 'first' );
              return false;
            } );

            config.$navLast.on( 'click touchstart', function() {
              config.$bookBlock.bookblock( 'last' );
              return false;
            } );
            
            // add swipe events
            $slides.on( {
              'swipeleft' : function( event ) {
                config.$bookBlock.bookblock( 'next' );
                return false;
              },
              'swiperight' : function( event ) {
                config.$bookBlock.bookblock( 'prev' );
                return false;
              }
            } );

            // add keyboard events
            $( document ).keydown( function(e) {
              var keyCode = e.keyCode || e.which,
                arrow = {
                  left : 37,
                  up : 38,
                  right : 39,
                  down : 40
                };

              switch (keyCode) {
                case arrow.left:
                  config.$bookBlock.bookblock( 'prev' );
                  break;
                case arrow.right:
                  config.$bookBlock.bookblock( 'next' );
                  break;
              }
            } );
          };

          return { init : init };

      })();
    </script>
    <script>
        Page.init();
    </script>
@endsection