
<div class="modal fade" id="register-popup" tabindex="-1" role="dialog" aria-labelledby="register-popup" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable userpopup" role="document">
    <div class="modal-content">
    	<div class="modal-header">
    		<img src="{{asset('public/images/logo.png')}}" />  
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
        	<div class="content-login content-popup">
        			<h3 class="modal-title">Đăng Ký</h3>
			        <form name="registerForm" class="form-control-user" method="post" action="" data-parsley-validate>
			        	<input type="hidden" name="role" value="2">
			          	<span id="error" class="text-danger"></span>
			             {{-- @include('error.messages') --}}
			            <div class="form-group popup-input-style">
		                   <input type="text" class="form-control-elm input-user" name="name" value="" placeholder="Họ Và Tên" autocomplete="off" data-parsley-required>
		                </div> 
		                <div class="form-group popup-input-style">
		                   	<input type="tel" class="form-control-elm input-phone" value="" id="phone_register" placeholder="Điện Thoại" autocomplete="off" data-parsley-required >
		                   	<input type="hidden" class="addphoneuser"  id="addphoneuser_register" name="phone" value="">
		                   	<span id="valid-register" class="hide">✓ Hợp lệ</span>
				            <span id="error-register" class="hide"></span>
		                </div>
		                <div class="form-group popup-input-style">
		                    <input type="password" class="form-control-elm input-password" name="password" placeholder="Mật Khẩu" autocomplete="off" data-parsley-required data-parsley-minlength="6">
		                    <span class="showpass" {{-- onclick="myFunction()" --}}></span>
		                </div>
		                <div class="form-group popup-input-style">
		                    <input type="password" class="form-control-elm input-password" name="password_confirmation" placeholder="Nhập Lại Mật Khẩu" autocomplete="off" data-parsley-required data-parsley-minlength="6">
		                    <span class="showpass" {{-- onclick="myFunction()" --}}></span>
		                </div>
		                <div class="form-group popup-input-style">
		                	<input type='submit' class='submitform radius_4 register_submit'  value='Đăng Ký'>
		                </div>
			        </form>
					<div class="bottom-form">
						<p class="sright">Bạn đã có tài khoản ? <a class="clickhere linkregister" data-toggle="modal" data-target="#popup-login" data-dismiss="modal" href="javascript:;">Đăng Nhập</a></p>
					</div>
					<div class="clear"></div>
			</div>

			<input type="hidden" name="home_page" value="{{route('welcome')}}">

        </div>
    </div>
  </div>
</div>

