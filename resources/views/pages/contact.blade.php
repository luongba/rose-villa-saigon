@extends('master')
@section('content')
  <div class="innerpage-style1 contact-page">
    <span class="leftpageimg"></span>
    <span class="rightpageimg"></span>
    <section class="innercontent content-inner50">
        <div class="contact-ct ctbox1">
          <h1 class="title-innerpage2">

            <span><span>{!! ($singlepage != null)?$singlepage->getTranslatedAttribute('title', config('app.locale'), 'fallbackLocale'):trans('pages.Contact Us') !!}</span></span>
          </h1>

                  <div class="ct-elm">
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
                              rosevillasaigon@support.com
                        </div>
                      </div>
                      <div class="formct ctfw">
                        <h3 class="title-section underline-custom left-underline">{{ trans('pages.Send message for us') }}</h3>
                        <form class="form-ct" method="post" action="{{ route('add_contact') }}">
                          @csrf 
                              <div class="form-group">
                                 <input type="text" class="form-control" id="name" name="name" placeholder="{{ trans('pages.Your name') }}" value="">
                                 
                              </div>
                              <div class="form-group">
                                 <input type="tel" class="form-control" id="phone" name="phone" placeholder="{{ trans('pages.Phone') }}" value="">
                                 
                              </div>
                              <div class="form-group">
                                 <input type="email" class="form-control" name="email" placeholder="Email" value="">
                              </div>
                              <div class="form-group">
                                 <input type="text" class="form-control" name="title" placeholder="{{ trans('pages.Title') }}" value="">
                              </div>
                              <div class="form-group">
                                <textarea class="form-control" name="content" rows="3" placeholder="{{ trans('pages.Content') }}" ></textarea>
                              </div>
                              <div class="submit-formct">
                                <button type="submit" class="btn btn-primary submitct">{{ trans('pages.Submit') }}</button>
                              </div>
                      </form>
                      </div>
                  </div>

        </div>
    </section>
  </div>
@endsection