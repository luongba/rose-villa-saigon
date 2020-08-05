<nav class="navbar nav-site">
	<div class="closemenu"><i class="fas fa-times"></i></div>
    <ul class="navbar-nav">
        <li class="nav-item has-child-menu">
        	<a class="nav-link" href="javascript:;">{{ trans('pages.Rooms') }}</a>
        	<ul class="sub-menu">
                @foreach($list_room as $val_room)
        		<li><a href="{{route('singleroom',['slug'=>$val_room->slug])}}">{{$val_room->name}}</a></li>
                @endforeach
        	</ul>
        </li>
        <li class="nav-item {{ Route::currentRouteNamed('fooddrink') ? 'active' : '' }}"><a class="nav-link" href="{{route('fooddrink')}}">{{ trans('pages.Food & Drinks') }}</a></li>
        <li class="nav-item {{ Route::currentRouteNamed('spa') ? 'active' : '' }}"><a class="nav-link" href="{{route('spa')}}">{{ trans('pages.Wellness & Beauty') }}</a></li>
        <li class="nav-item {{ Route::currentRouteNamed('shop') ? 'active' : '' }}"><a class="nav-link" href="{{route('shop')}}">{{ trans('pages.Shop') }}</a></li>
        <li class="nav-item {{ Route::currentRouteNamed('events') ? 'active' : '' }}"><a class="nav-link" href="{{route('events')}}">{{ trans('pages.Events') }}</a></li>
        <li class="nav-item {{ Route::currentRouteNamed('about') ? 'active' : '' }}"><a class="nav-link" href="{{route('about')}}">{{ trans('pages.About Us') }}</a></li>
        <li class="nav-item {{ Route::currentRouteNamed('contact') ? 'active' : '' }}"><a class="nav-link" href="{{route('contact')}}">{{ trans('pages.Contact Us') }}</a></li>
    </ul>
</nav>
    