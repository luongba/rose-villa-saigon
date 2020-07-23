@extends('master')
@section('content')
  <div class="innerpage-style1">
    <span class="leftpageimg"></span>
    <span class="rightpageimg"></span>
    <section class="banner-innerpage">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <h1>
              <span class="title-icon-left"></span>
              <span class="title-icon-right"></span>
              <span class="title-icon-top"></span>
              <span class="title-icon-bottom"></span>
               Events
            </h1>
          </div>
        </div>
      </div>   
    </section>
    <section class="innercontent">
      <div class="event-elm event-left">
        <div class="event-ct">
          <div class="bgevent-ct">
            <h3 class="title-post-1">Meeting & Event 1</h3>
            <div class="ctevent">
              Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc ac mollis risus. Vivamus sed ex porttitor, ullamcorper eros vitae, feugiat elit. Sed fermentum et metus vel lobortis. Maecenas sit amet ante laoreet, efficitur eros a, rutrum nulla. Suspendisse at nulla tempor, sollicitudin mi ut, tempus est. Nam vel sapien at velit lobortis suscipit in eu urna. Fusce enim justo, ullamcorper id diam id, consectetur mollis magna. Quisque pellentesque magna a leo eleifend rhoncus. Aliquam eu accumsan diam, vel rhoncus augue.
            </div>
            <a href="javascript:;" class="bookingaction radius_4" data-toggle="modal" data-target="#events-popup">Booking Event</a>
            <div class="clear"></div>
          </div>
        </div>
        <div class="eventimg">
          <img  src="{{asset('public/images/event-img1.png')}}" />
        </div>
      </div>

      <div class="event-elm event-right">
        <div class="event-ct">
          <div class="bgevent-ct">
            <h3 class="title-post-1">Meeting & Event 1</h3>
            <div class="ctevent">
              Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc ac mollis risus. Vivamus sed ex porttitor, ullamcorper eros vitae, feugiat elit. Sed fermentum et metus vel lobortis. Maecenas sit amet ante laoreet, efficitur eros a, rutrum nulla. Suspendisse at nulla tempor, sollicitudin mi ut, tempus est. Nam vel sapien at velit lobortis suscipit in eu urna. Fusce enim justo, ullamcorper id diam id, consectetur mollis magna. Quisque pellentesque magna a leo eleifend rhoncus. Aliquam eu accumsan diam, vel rhoncus augue.
            </div>
            <a href="javascript:;" class="bookingaction radius_4" data-toggle="modal" data-target="#events-popup">Booking Event</a>
            <div class="clear"></div>
          </div>
        </div>
        <div class="eventimg">
          <img  src="{{asset('public/images/event-img1.png')}}" />
        </div>
      </div>

      <div class="event-elm event-left">
        <div class="event-ct">
          <div class="bgevent-ct">
            <h3 class="title-post-1">Meeting & Event 1</h3>
            <div class="ctevent">
              Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc ac mollis risus. Vivamus sed ex porttitor, ullamcorper eros vitae, feugiat elit. Sed fermentum et metus vel lobortis. Maecenas sit amet ante laoreet, efficitur eros a, rutrum nulla. Suspendisse at nulla tempor, sollicitudin mi ut, tempus est. Nam vel sapien at velit lobortis suscipit in eu urna. Fusce enim justo, ullamcorper id diam id, consectetur mollis magna. Quisque pellentesque magna a leo eleifend rhoncus. Aliquam eu accumsan diam, vel rhoncus augue.
            </div>
            <a href="javascript:;" class="bookingaction radius_4" data-toggle="modal" data-target="#events-popup">Booking Event</a>
            <div class="clear"></div>
          </div>
        </div>
        <div class="eventimg">
          <img  src="{{asset('public/images/event-img1.png')}}" />
        </div>
      </div>

      <div class="event-elm event-right">
        <div class="event-ct">
          <div class="bgevent-ct">
            <h3 class="title-post-1">Meeting & Event 1</h3>
            <div class="ctevent">
              Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc ac mollis risus. Vivamus sed ex porttitor, ullamcorper eros vitae, feugiat elit. Sed fermentum et metus vel lobortis. Maecenas sit amet ante laoreet, efficitur eros a, rutrum nulla. Suspendisse at nulla tempor, sollicitudin mi ut, tempus est. Nam vel sapien at velit lobortis suscipit in eu urna. Fusce enim justo, ullamcorper id diam id, consectetur mollis magna. Quisque pellentesque magna a leo eleifend rhoncus. Aliquam eu accumsan diam, vel rhoncus augue.
            </div>
            <a href="javascript:;" class="bookingaction radius_4" data-toggle="modal" data-target="#events-popup">Booking Event</a>
            <div class="clear"></div>
          </div>
        </div>
        <div class="eventimg">
          <img  src="{{asset('public/images/event-img1.png')}}" />
        </div>
      </div>
    </section>
  </div>
  <div class="vl"></div>
  @include('popups.events-popup')
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
