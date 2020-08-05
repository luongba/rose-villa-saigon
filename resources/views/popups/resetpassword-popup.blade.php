
<div class="modal fade" id="resetpassword-popup" tabindex="-1" role="dialog" aria-labelledby="resetpassword-popup" aria-hidden="true">
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
        		<h3 class="modal-title">Đặt Lại Mật Khẩu</h3>
		        <form name="contactForm" class="form-control-user" method="post" action="" data-parsley-validate>
		        	<input type="hidden" name="phone" value="">
		          	<span id="error" class="text-danger"></span>
		             {{-- @include('error.messages') --}}
	                <div class="form-group popup-input-style">
	                    <input type="password" class="form-control-elm input-password" name="password" placeholder="Mật Khẩu" autocomplete="off" data-parsley-required data-parsley-minlength="6">
	                    <span class="showpass" {{-- onclick="myFunction()" --}}></span>
	                </div>
	                <div class="form-group popup-input-style">
	                    <input type="password" class="form-control-elm input-password" name="password_confirm" placeholder="Nhập Lại Mật Khẩu" autocomplete="off" data-parsley-required data-parsley-minlength="6">
	                    <span class="showpass" {{-- onclick="myFunction()" --}}></span>
	                </div>
	                <div class="form-group popup-input-style">
	                	<input type='submit' class='submitform reset_pass radius_4'  value='Xác Nhận'>
	                </div>
		        </form>
			</div>
        </div>
    </div>
  </div>
</div>

