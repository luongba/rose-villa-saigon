<div class="box__content-right">
    <div class="opLanguage">
        <ul class="language">
            <li class="language__item {{ config('app.locale') == "en" ? 'active' : '' }}">
                <a class="{{ config('app.locale') == "en" ? 'active' : '' }}" href="./change-language/en">ENG</a>
            </li>
            <li class="language__item {{ config('app.locale') == "vi" ? 'active' : '' }}">
                <a class="{{ config('app.locale') == "vi" ? 'active' : '' }}"  href="./change-language/vi">VIE</a>
            </li>
        </ul>
</div>
        <div class="header__icon-noti">
            <img src="{{ asset('public/images/icons/bell.png') }}" class="bell-noti" alt="">
            <div class="notify-member">
                <h1 class="title_noti">Notification</h1>
                <div class="content__noti-box">
                    <p class="content_noti">• In response to the covid-19 pandemic,ROSE VILLA SAIGON follows closely all government guidelines to ensure the safety and comfort of our members and staff.</p>
                    <p class="content_noti">• Please follow our website for the latest news and activities at ROSE VILLA SAIGON.</p>
                </div>
                <img class="notifi_no" src="{{ asset('public/images/icons/no.png') }}" alt="">
                
            </div>
    </div>
</div>
<div class="header-box">

	<ul class="header__list header__list1">
		<li class="header__item">
			<a href="{{route('the-club')}}" class="header__link">{{ trans('pages.Club') }}</a>
		</li>
		<li class="header__item">
			<a href="{{URL::to('stay/')}}" class="header__link">{{ trans('pages.Stay') }}</a>
		</li>
		<li class="header__item">
			<a  class="header__link" href="{{URL::to('celebrate/')}}">{{ trans('pages.Celebrate') }}</a>
		</li>
		<li class="header__item">
			<a href="{{URL::to('dine')}}" class="header__link">{{ trans('pages.Dine') }}</a>
		</li>
				<li class="header__item">
			<a href="{{URL::to('entertain')}}" class="header__link">{{ trans('pages.Entertain') }}</a>
		</li>
		
	</ul>
	<a class="homelinklogo logo-center" href="{{route('welcome')}}" target="_blank"><img class="logo__img-new" src="{{asset('public/images/logo/logo-new.png')}}" /></a>
	<ul class="header__list header__list2">
		<li class="header__item">
			<a href="{{route('shop')}}" class="header__link">{{ trans('pages.Shop') }}</a>
		</li>
		<li class="header__item">
			<a href="{{URL::to('relax')}}" class="header__link">{{ trans('pages.Relax') }}</a>
		</li>
		
		

		<li class="header__item">
			<a href="{{route('contactus')}}" class="header__link">{{ trans('pages.Contact Us') }}</a>
		</li>
				@if(Auth::user())
        <li class="header__item">
            <a href="{{route('your-membership')}}" class="header__link">Your Membership</a>
        </li>
      @else
      <li class="header__item">
            <a href="{{route('login')}}" class="header__link">Your Membership</a>
        </li>
      @endif
      </li>
		
	</ul>
	
</div>

