@extends('masternew')
@section('css')
<style>
  .form-profile {
    width: 100%;
    line-height: 18px;
    letter-spacing: 0.2em;
    color: #fff;
    display: block;
    text-align: center;
    height: 40px;
    padding: 0 5px;
    font-size: 18px;
    font-family: 'MatrixIIOT-Reg';
    border-bottom: none;
    border: none;
    background: url(public/images/bg/bg-input.png);
    background-repeat: no-repeat;
    background-size: 100% 100%; 
}
#formulate-global-5, #formulate-global-6, #formulate-global-7 {
    background: url(public/images/bg/border2.png) no-repeat !important;
}
.ct-upload {
    width: 250px;
    border: 1px solid #fff !important;
    text-align: center;
    color: #fff !important;
    position: relative;
    margin: 0px auto 20px auto;
}
.des-uploadavt {
    max-width: 240px;
    color: #fff !important;
    margin-left: auto;
    margin-right: auto;
    line-height: 18px;
}
.stepmbs{
    color: #fff !important;
}
</style>
@endsection
@section('content')

  <div class="bg-photo mt-0" style="background-image: url(public/images/bg/bg-profile.png);">
    <div class="box_container-scroll">
      <div class="header-tclub mb-4">
          @include('layouts.headernew')
        </div>
    <section class="banner-member">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <h1 class="title-innerpage-new mb-2">
                <span>Member Profile</span>
              </h1>
              <form class="form-fomat" action="{{ route('profile_update',[$user->id]) }}" method="post">
                @csrf
                  <div class="input-fomat">
                    <label class="color-white">Welcome</label>
                    <input type="text" name="fullName" value="{{$user->first_name. ' '. $user->last_name}}" style="font-size: 37px !important; font-family: snell;" class="form-profile">
                  </div>
                  <p class="icon-style " style="margin-bottom: 40px;">✦✦✦</p>
                  <div class="input-fomat">
                    <label class="color-white" for="exampleInputPassword1">CellPhone Number</label>
                    <input type="text" name="phone" value="{{$user->phone}}" class="form-profile">
                  </div>
                  <p class="icon-style " style="margin-bottom: 40px;">✦✦✦</p>
                  <div class="input-fomat">
                    <label class="color-white" for="exampleInputPassword1">Email</label>
                    <input type="text" name="email"  value="{{$user->email}}" class="form-profile">
                  </div>
                  <p class="icon-style " style="margin-bottom: 40px;">✦✦✦</p>
                  <div class="input-fomat">
                    <label class="color-white" for="exampleInputPassword1">Day of Bith</label>
                    <input type="text" name="day" value="{{$user->dob}}" class="form-profile">
                  </div>
                  <p class="icon-style " style="margin-bottom: 40px;">✦✦✦</p>
                  <div class="input-fomat">
                    <label class="color-white" for="exampleInputtext1">Occupation</label>
                    <input type="text" name="occupation" value="{{$user->occupation}}" class="form-profile">
                  </div>
                  <p class="icon-style " style="margin-bottom: 40px;">✦✦✦</p>
                  <div class="input-fomat">
                    <label class="color-white" for="exampleInputtext1">Residence address</label>
                    <input type="text" name="address" value="{{$user->address_one}}" class="form-profile">
                  </div>
                  <p class="icon-style " style="margin-bottom: 40px;">✦✦✦</p>
                  <div class="input-fomat">
                     <label class="color-white" for="exampleInputtext1">Membership type</label>
                    <p class="color-white">
                        {{$memberType->name}}
                    </p>
                </div>
                                        <p class="text-content"><a class="phone-size" href="tel:+842836362211">(+84) 28 3636 2211 . </a><a class="phone-size" href="tel:+842837442211">(+84) 28 3744 2211</a><br> NO.10 <span class="icon-resize">✦</span> STREET 58 <span class="icon-resize">✦</span> THAO DIEN WARD ✦ THU DUC <span class="icon-resize">✦</span> HO CHI MINH CITY <span class="icon-resize">✦</span> VIETNAM</p>
                                        <img style="width: 50px; height: 50px; display: block !important;" src="{{ asset('public/images/icons/no1.png') }}" alt="">
                 <p class="text-content text-wc" style="margin: 0">
                 <a href="mailto:workwithus@rosevillasaigon.com" class="mailto-rose"><span class="member__style">Welcome</span>@ROSEVILLASAIGON.COM</a></p>
              <p class="text-content"><a style="color: #fff" href="{{ route('welcome') }}">ROSEVILLASAIGON.COM</a></p>
                  <button type="submit" class="btn-submit">Submit</button>
                </form>
        </div>
    </div>
      </div> 
    </section>
  </div>
@endsection

