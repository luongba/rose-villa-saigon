  <a class="logo-landing" href="http://rosevilla.tntechs.com.vn/public/storage/pdf/Rose%20Villa%20Saigon%20Privacy%20Policy%2027.6.20%20Edited%20No%20CC%20No%20Social.pdf" target="_blank"><img src="{{asset('public/images/logo/logo-rosevilla.png')}}" /></a>
  <section class="header-landing landingstyle">
    <div class="container-fluid">
      @if(Auth::user())
            <div class="dropdown user-menu custom-header-user hidden640">
	            <a class="dropdown-toggle username-bar" href="javascript:;" id="profile-menu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	                  {{Auth::user()->first_name}} {{Auth::user()->last_name}}
	             </a>
	            <ul class="dropdown-menu custom-dropmenu" aria-labelledby="profile-menu">
                <li class="profile-user">
                    <a href="javascript:;">
                    <span>{{ trans('pages.profile') }}</span></a>
                </li>
                <li class="member-user">
                    <a href="javascript:;">
                    <span>{{ trans('pages.membershippackage') }}</span></a>
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

