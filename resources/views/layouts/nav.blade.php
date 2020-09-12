<nav class="navbar nav-site">
	<div class="closemenu"><i class="fas fa-times"></i></div>
    <div class="mobileuser">
        @if(Auth::user())
                <div class="dropdown user-menu custom-header-user">
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
            <div class="account-section show640">
                <a class="loginlink-landing" href="javascript:;"  data-toggle="modal" data-target="#popup-login">{{ trans('pages.Login') }}</a>
            </div>
         @endif
    </div>
    <ul class="navbar-nav">
        <li class="nav-item {{ Route::currentRouteNamed('welcome') ? 'active' : '' }}"><a class="nav-link" href="{{route('welcome')}}">{{ trans('pages.home') }}</a></li>
        <li class="nav-item {{ Route::currentRouteNamed('about') ? 'active' : '' }}"><a class="nav-link" href="{{route('getPage',['slug'=>'about'])}}">{{ trans('pages.About Us') }}</a></li>
        <li class="nav-item has-child-menu">
            <a class="nav-link" href="javascript:;">{{ trans('pages.Membership') }}</a>
            <ul class="sub-menu">
                <li><a href="{{route('regularmember')}}">Regular Application</a></li>
                <li><a href="{{route('founder')}}">Founder Application</a></li>
            </ul>
        </li>
        <li class="nav-item has-child-menu">
        	<a class="nav-link" href="javascript:;">{{ trans('pages.Rooms') }}</a>
        	<ul class="sub-menu">
                @foreach($list_room as $val_room)
        		<li><a href="{{route('singleroom',['slug'=>$val_room->slug])}}">{{$val_room->getTranslatedAttribute('name', config('app.locale'), 'fallbackLocale')}}</a></li>
                @endforeach
        	</ul>
        </li>
		    <li class="nav-item has-child-menu">
            <a class="nav-link" href="javascript:;">{{ trans('pages.Food & Drinks') }}</a>
            <ul class="sub-menu">
                @foreach($list_areaParty as $val_areaParty)
                <li><a href="{{route('singlefooddrink',['slug'=>$val_areaParty->slug])}}">{{$val_areaParty->getTranslatedAttribute('title', config('app.locale'), 'fallbackLocale')}}</a></li>
                @endforeach
            </ul>
        </li>
        <li class="nav-item {{ Route::currentRouteNamed('spa') ? 'active' : '' }}"><a class="nav-link" href="{{route('spa')}}">{{ trans('pages.Wellness & Beauty') }}</a></li>
        <li class="nav-item {{ Route::currentRouteNamed('shop') ? 'active' : '' }}"><a class="nav-link" href="{{route('shop')}}">{{ trans('pages.Shop') }}</a></li>
        <li class="nav-item {{ Route::currentRouteNamed('events') ? 'active' : '' }}"><a class="nav-link" href="{{route('events')}}">{{ trans('pages.Events') }}</a></li>
        <li class="nav-item {{ Route::currentRouteNamed('contact') ? 'active' : '' }}"><a class="nav-link" href="{{route('contact')}}">{{ trans('pages.Contact Us') }}</a></li>

        <li class="nav-item {{ Route::currentRouteNamed('findus') ? 'active' : '' }}"><a class="nav-link" href="{{route('findus')}}">{{ trans('pages.How To Find Us') }}</a></li>
    </ul>
</nav>
    