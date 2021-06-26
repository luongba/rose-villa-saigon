<div class="header-box mgb-resize">

	<ul class="header__list">
		<li class="header__item">
			<a href="{{route('the-club')}}" class="header__link" style="color: #000 !important;">{{ trans('pages.Club') }}</a>
		</li>
		<li class="header__item">
			<a href="{{URL::to('stay/deluxe-suites')}}" class="header__link" style="color: #000 !important;">{{ trans('pages.Stay') }}</a>
		</li>
		<li class="header__item">
			<a  class="header__link" style="color: #000 !important;" href="{{URL::to('celebrate/the-atelier')}}">{{ trans('pages.Celebrate') }}</a>
		</li>
		<li class="header__item">
			<a href="{{URL::to('dine/rose-garden')}}" class="header__link" style="color: #000 !important;">{{ trans('pages.Dine') }}</a>
		</li>
		<li class="header__item">
			<a href="{{URL::to('entertain/rose-garden')}}" class="header__link" style="color: #000 !important;">{{ trans('pages.Entertain') }}</a>
		</li>
	</ul>
	<a class="homelinklogo" href="{{route('welcome')}}" target="_blank"><img class="logo__img-new" src="{{asset('public/images/logo/logo-new-black.png')}}" /></a>
	<ul class="header__list">
		<li class="header__item">
			<a href="{{URL::to('relax/the-spa')}}" class="header__link" style="color: #000 !important;">{{ trans('pages.Relax') }}</a>
		</li>
		<li class="header__item">
			<a href="{{route('shop')}}" class="header__link" style="color: #000 !important;">{{ trans('pages.Shop') }}</a>
		</li>
		<li class="header__item">
			<a href="{{route('contact')}}" class="header__link" style="color: #000 !important;">{{ trans('pages.Contact Us') }}</a>
		</li>
		@if(Auth::user())
            <div class="dropdown user-menu hidden640">
	            <a class="dropdown-toggle username-bar" href="javascript:;" id="profile-menu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color: #000; text-shadow: none">
	                 {{Auth::user()->first_name}} {{Auth::user()->last_name}}
	             </a>
	            <ul class="dropdown-menu custom-dropmenu" aria-labelledby="profile-menu">
                <li class="profile-user">
                    <a href="{{ route('profile_index')}}">
                    <span>{{ trans('pages.profile') }}</span></a>
                </li>
                <li class="member-user">
                    <a href="{{ route('profile_membership')}}">
                    <span>{{ trans('pages.membershippackage') }}</span></a>
                </li>
                <li class="member-user">
                    <a href="{{ route('profile_changepasss')}}">
                    <span>{{ trans('pages.changepass') }}</span></a>
                </li>
                <li class="singout">
                    <a href="{{ route('logout_web') }}">
                    <span>{{ trans('pages.Logout') }}</span></a>
                </li>
	            </ul>
            </div>
      @else
        <div class="hidden640">
            <a class="loginlink-landing" style="color: #000; text-shadow: none;" href="javascript:;"  data-toggle="modal" data-target="#popup-login">{{ trans('pages.Login') }}</a>
        </div>
      @endif
		                    <li class="optionlang">
        <div class="chooselang">
            <span class="{{ config('app.locale') == "en" ? 'active' : '' }}"  id="en">EN</span>
            <span class="{{ config('app.locale') == "vi" ? 'active' : '' }}"  id="vi">VI</span>
             <i class="fas fa-caret-down"></i>
          </div>
        <ul class="select-lang">
            <li>
                <a class="{{ config('app.locale') == "en" ? 'active' : '' }}" href="./change-language/en">EN</a>
            </li>
            <li>
                <a class="{{ config('app.locale') == "vi" ? 'active' : '' }}"  href="./change-language/vi">VI</a>
            </li>
        </ul>

      </li>
      <li class="header__item">
            <img src="{{ asset('public/images/icons/bell.png') }}" class="bell-noti" alt="">
        </li>
	</ul>
        <div class="notify-member" style="background: #000">
        <div class="close-noti">
            <i class="fas fa-times icon__notify"></i>
        </div>
    </div>
</div>
                   