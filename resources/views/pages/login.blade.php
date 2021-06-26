@extends('masternew')
@section('css')
@endsection
@section('content')
<div class="login-bg">
{{--  <img class="bg-left" src="{{ asset('public/images/bg/contact-left-bg.png') }}" alt="">
  <img class="bg-right" src="{{ asset('public/images/bg/contact-right-bg.png') }}" alt=""> --}}
  <div class="header-tclub">
    @include('layouts.headernew')
  </div>
            <div class="container__contact">
                <div class="content-membership-enquiry-page" >
              <h1 class="title-bold">
                <span>Login</span>
        </h1>

            <form action="{{ route('login.loading') }}" method="POST" class="form-setting" id="form-1">
                @csrf
                <?php 
                  $message = Session::get('messages');
                  if ($message){
                    echo '<span style="color:red; width:100%;">'.$message.'</span>';
                    Session::put('messages',null);
                  }
                    
                ?>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <!-- country codes (ISO 3166) and Dial codes. -->
                <div class="form-gr d-f">
                  <label for="phone" class="form-label">Phone:</label>
                  <input id="phone" name="phone" type="tel" class="form-login @error('phone') is-invalid @enderror">
{{--                   <input id="phone" name="phone" type="text" class="form-login"> --}}
                </div>

                <div class="form-gr d-f">
                  <label for="password" class="form-label">Password:</label>
                  <input id="password" name="password" type="password" class="form-login">
                </div>
                <div class="button_login">
                  <button type="submit" class="form-submit2">Login</button>
                  <a class="form-submit2">Forgot Password?</a>
                </div>
                
      </form>
              </div>
  
</div>
</div>

@endsection
@section('script')
{{--     <script>
            var input = document.querySelector("#phone");
     var iti = window.intlTelInput(input, {
      initialCountry: "vn",
      utilsScript: "build/js/utils.js",
    });
    </script> --}}
@endsection

