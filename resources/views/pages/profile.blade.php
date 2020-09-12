@extends('master')
@section('content')
  <div class="innerpage-membership">
    <section class="banner-member">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <img src="{{asset('public/images/logo_mbs.png')}}" />
          </div>
        <profile :user="{{$user->toJson()}}" avatar="{{$user->full_link_avatar}}"></profile>
        </div>
      </div> 
    </section>
  </div>
@endsection

