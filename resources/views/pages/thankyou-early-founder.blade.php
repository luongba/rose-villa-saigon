@extends('masternew')
@section('content')
<div class="contact-bg">
{{--  <img class="bg-left" src="{{ asset('public/images/bg/contact-left-bg.png') }}" alt="">
  <img class="bg-right" src="{{ asset('public/images/bg/contact-right-bg.png') }}" alt=""> --}}
  <div class="to-up" style="display: none;">
          <a><i class="fas fa-chevron-up"></i></a>
      </div>
  <div class="header-resize">
    @include('layouts.headernew')
  </div>
            <div class="container__contact">
                <div class="content-membership-enquiry-page" >
              <img class="thankyou-text" src="{{ asset('public/images/images/thank-you-text.png') }}" alt="">

              <p class="text-content">THANK YOU FOR YOUR QUALITY TIME. YOUR DETAILS WILL NOW BE UPDATED IN OUR MEMBERSHIP SYSTEM.</p>
               <p class="text-content text-wc">
               <a href="mailto:workwithus@rosevillasaigon.com" class="mailto-rose"><span class="member__style">Welcome</span>@ROSEVILLASAIGON.COM</a></p>
            </p>
              <p class="text-content"><a style="color: #fff" href="{{ route('welcome') }}">ROSEVILLASAIGON.COM</a></p>
              <p></p>
              
              <p></p>
                
              </div>
            <div class="clear"></div>
          </div>
  
</div>

@endsection

