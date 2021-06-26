@extends('masternew')
@section('content')
  <div class="innerpage-membership mt-resize">
     <div class="to-up" style="display: none;">
          <a><i class="fas fa-chevron-up"></i></a>
      </div>
       @include('layouts.header_black')
    <section class="banner-member">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <img src="{{asset('public/images/logo_mbs.png')}}" />
          </div>
        <change-password></change-password>
        </div>
      </div> 
    </section>
  </div>
@endsection

