  <a class="logo-landing" href="{{route('welcome')}}"><img src="{{asset('public/images/logo.png')}}" /></a>
  <section class="header-landing landingstyle">
    <div class="container-fluid">
      @if(Auth::user())
            <div class="dropdown user-menu">
              <a class="dropdown-toggle username-bar" href="javascript:;" id="profile-menu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  {{Auth::user()->first_name}} {{Auth::user()->last_name}}
              </a>
            </div>
            <ul class="dropdown-menu custom-dropmenu" aria-labelledby="profile-menu">
              <li class="singout">
                  <a href="{{ route('logout_web') }}">
                  <span>{{ trans('pages.Logout') }}</span></a>
              </li>
            </ul>
      @else
        <div class="account-section">
            <a class="loginlink-landing" href="javascript:;"  data-toggle="modal" data-target="#popup-login">{{ trans('pages.Login') }}</a>
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

