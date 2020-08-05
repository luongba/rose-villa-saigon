<nav class="navbar nav-site">
	<div class="closemenu"><i class="fas fa-times"></i></div>
    <ul class="navbar-nav">
        <li class="nav-item {{ Route::currentRouteNamed('about') ? 'active' : '' }}"><a class="nav-link" href="{{route('about')}}">About Us</a></li>
        <li class="nav-item has-child-menu">
            <a class="nav-link" href="javascript:;">Membership</a>
            <ul class="sub-menu">
                <li><a href="{{route('regularmember')}}">Regular Application</a></li>
                <li><a href="{{route('founder')}}">Founder Application</a></li>
            </ul>
        </li>
        <li class="nav-item has-child-menu">
        	<a class="nav-link" href="javascript:;">Rooms</a>
        	<ul class="sub-menu">
                @foreach($list_room as $val_room)
        		<li><a href="{{route('singleroom',['slug'=>$val_room->slug])}}">{{$val_room->name}}</a></li>
                @endforeach
        	</ul>
        </li>
        <li class="nav-item {{ Route::currentRouteNamed('fooddrink') ? 'active' : '' }}"><a class="nav-link" href="{{route('fooddrink')}}">Food & Drinks</a></li>
        <li class="nav-item {{ Route::currentRouteNamed('spa') ? 'active' : '' }}"><a class="nav-link" href="{{route('spa')}}">Wellness & Beauty</a></li>
        <li class="nav-item {{ Route::currentRouteNamed('shop') ? 'active' : '' }}"><a class="nav-link" href="{{route('shop')}}">Shop</a></li>
        <li class="nav-item {{ Route::currentRouteNamed('events') ? 'active' : '' }}"><a class="nav-link" href="{{route('events')}}">Events</a></li>
        <li class="nav-item {{ Route::currentRouteNamed('contact') ? 'active' : '' }}"><a class="nav-link" href="{{route('contact')}}">Contact Us</a></li>
        <li class="nav-item {{ Route::currentRouteNamed('findus') ? 'active' : '' }}"><a class="nav-link" href="{{route('findus')}}">How To Find Us</a></li>
    </ul>
</nav>
    