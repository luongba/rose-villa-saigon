@extends('masternew')
@section('content')
  <div class="innerpage-membership mgt-resize">
    <div class="header-tclub">
       @include('layouts.header_black')
    </div>
    <section class="banner-member">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <img src="{{asset('public/images/logo_mbs.png')}}" />
          </div>
        </div>
      </div> 
    </section>
    <membership-form type="founder"></membership-form>
  </div>
@endsection

