  <a class="logo-landing" href="{{route('welcome')}}"><img src="{{asset('public/images/logo.png')}}" /></a>
  <section class="header-landing landingstyle">
    <div class="container-fluid">
      @auth 
      @else
          <div class="account-section">
              <a class="loginlink-landing" href="javascript:;"  data-toggle="modal" data-target="#popup-login">Đăng Nhập</a>
          </div>
      @endauth
      <button type="button" id="menu-btn" class="menuhome navbar-toggle collapsed">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button> <!-- Responsive nav button end -->
    </div>
  </section>

