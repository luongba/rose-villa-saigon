  <div class="logo-landing">
  <a class="homelinklogo" href="{{route('welcome')}}" target="_blank"><img src="{{asset('public/images/logo/logo.png')}}" /></a>
  <a class="maplinklogo" href="http://rosevilla.tntechs.com.vn/public/storage/maps/maplogo.jpg" target="_blank">
    <img src="{{asset('public/images/logo/mapclick.png')}}" />
  </a>
  </div>
  <section class="header-landing landingstyle">
    <div class="container-fluid">
      @if(Auth::user())
            <div class="dropdown user-menu custom-header-user hidden640">
	            <a class="dropdown-toggle username-bar" href="javascript:;" id="profile-menu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	                  Welcome {{Auth::user()->first_name}} {{Auth::user()->last_name}}
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
        <div class="account-section hidden640">
            <a class="loginlink-landing" href="javascript:;"  data-toggle="modal" data-target="#popup-login">{{ trans('pages.Login') }}</a>
        </div>
      @endif
      <div class="head_textmenu">
        <div class="textmenu">
          Explore Rose Villa
        </div>
      </div>
      
      <button type="button" id="menu-btn" class="menuhome navbar-toggle collapsed">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button> <!-- Responsive nav button end -->
      <div class="optionlang">
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

      </div>
    </div>
  </section>
  <div class="landing landingstyle">
    <div class="innerpage-style1 fixheightfull">
      <div class="container indexmenu sc0">
        @include('layouts.nav')
      </div>
    </div>
  </div>
