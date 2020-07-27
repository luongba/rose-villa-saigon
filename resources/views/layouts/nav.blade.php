<nav class="navbar nav-site">
	<div class="closemenu"><i class="fas fa-times"></i></div>
    <ul class="navbar-nav">
        <li class="nav-item has-child-menu">
        	<a class="nav-link" href="javascript:;">Rooms</a>
        	<ul class="sub-menu">
        		<li><a href="javascript:;">2 Bedroom Suites</a></li>
        		<li><a href="javascript:;">Junior Suites</a></li>
        		<li><a href="javascript:;">Deluxe Suites</a></li>
        	</ul>
        </li>
        <li class="nav-item {{ Route::currentRouteNamed('fooddrink') ? 'active' : '' }}"><a class="nav-link" href="{{route('fooddrink')}}">Food & Drinks</a></li>
        <li class="nav-item {{ Route::currentRouteNamed('spa') ? 'active' : '' }}"><a class="nav-link" href="{{route('spa')}}">Wellness & Beauty</a></li>
        <li class="nav-item {{ Route::currentRouteNamed('shop') ? 'active' : '' }}"><a class="nav-link" href="{{route('shop')}}">Shop</a></li>
        <li class="nav-item {{ Route::currentRouteNamed('events') ? 'active' : '' }}"><a class="nav-link" href="{{route('events')}}">Events</a></li>
        <li class="nav-item {{ Route::currentRouteNamed('about') ? 'active' : '' }}"><a class="nav-link" href="{{route('about')}}">About Us</a></li>
        <li class="nav-item {{ Route::currentRouteNamed('contact') ? 'active' : '' }}"><a class="nav-link" href="{{route('contact')}}">Contact Us</a></li>
    </ul>
</nav>
    