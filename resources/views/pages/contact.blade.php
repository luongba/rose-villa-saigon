@extends('master')
@section('content')
  <div class="bgfix bgonpage" style="background-image: url({{asset('').'public/storage/'.$singlepage->image}});"></div>

  <div class="innerpage-style1 contact-page">
    <span class="leftpageimg"></span>
    <span class="rightpageimg"></span>
    <section class="innercontent content-inner100" style="padding-top: 70px;">
        <div class="contact-ct ctbox1">
          <h1 class="title-innerpage2">
            <span><span>{!! ($singlepage != null)?$singlepage->getTranslatedAttribute('title', config('app.locale'), 'fallbackLocale'):trans('pages.Contact Us') !!}</span></span>
          </h1>

                  <div class="ct-elm scrollcustom">
                      <div class="ctfw">
                        <p>{!! ($singlepage != null)?$singlepage->getTranslatedAttribute('body', config('app.locale'), 'fallbackLocale'):'No Data' !!}</p>
                      </div>
                      <div class="infoct ctfw">
                        <div class="infoctcolumn">
                            <img class="icon-ct" src="{{asset('public/images/icon-ct1.png')}}" />
                              {{ trans('pages.Address Rose Villa Saigon') }}
                        </div>
                        <div class="infoctcolumn">
                            <img class="icon-ct" src="{{asset('public/images/icon-ct2.png')}}" />
                              028 3636 2211
                        </div>
                        <div class="infoctcolumn">
                            <img class="icon-ct" src="{{asset('public/images/icon-ct3.png')}}" />
                              contact@rosevillasaigon.com
                        </div>
                      </div>
                      <div class="formct ctfw">
                        <h3 class="title-section underline-custom left-underline">{{ trans('pages.Send message for us') }}</h3>
                       		<contact-form></contact-form>

                      </div>
                  </div>

        </div>
    </section>
  </div>
@endsection