@extends('master')
@section('content')
  <div class="innerpage-style1 thankyou-page">
    <section class="innercontent simpe-content-page">
    	<div class="container">
    		<div class="content-thankyou-page">
          <img class="imgthankyou" src="{{asset('public/images/logo/logo_topthannkyou.png')}}" alt="Rose Villa Sài Gòn" width="85" height="85"/>
          <h3>{{ trans('pages.thankyou') }}</h3>
          <p>{{ trans('pages.thankcontent') }}</p>
          <p><strong>Warm Regards,<br/>
The Rose Villa Team.</strong></p>
    	  </div>
        <div class="clear"></div>
      </div>
    </section>
  </div>
@endsection