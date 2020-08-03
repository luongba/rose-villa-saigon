  <a class="logo-landing" href="{{route('welcome')}}"><img src="{{asset('public/images/images/logo-vien-den.png')}}" /></a>
  <section class="header-landing landingstyle">
    <div class="container-fluid">
      @if(Auth::user())
            <div class="dropdown user-menu custom-header-user">
	            <a class="dropdown-toggle username-bar" href="javascript:;" id="profile-menu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	                  {{Auth::user()->first_name}} {{Auth::user()->last_name}}
	             </a>
	            <ul class="dropdown-menu custom-dropmenu" aria-labelledby="profile-menu">
	              <li class="singout">
	                  <a href="{{ route('logout_web') }}">
	                  <span>Đăng Xuất</span></a>
	              </li>
	            </ul>
            </div>
           
      @else
        <div class="account-section">
            <a class="loginlink-landing" href="javascript:;"  data-toggle="modal" data-target="#popup-login">Login</a>
        </div>
      @endif
      <button type="button" id="menu-btn" class="menuhome navbar-toggle collapsed">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button> <!-- Responsive nav button end -->
    </div>
  </section>

