
<div class="modal fade" id="forgotpass-popup" tabindex="-1" role="dialog" aria-labelledby="forgotpass-popup" aria-hidden="true">
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
    			<h3 class="modal-title">Quên Mật Khẩu</h3>
		        <form name="forgotForm" class="form-control-user" method="post" action="" data-parsley-validate>
                    <p>Vui lòng nhập số điện thoại đăng ký</p>
	                <div class="form-group popup-input-style">
                       <input type="text" class="form-control-elm input-phone" value="" id="phone_forgot" placeholder="Điện Thoại" autocomplete="off" data-parsley-required>
	                   <input type="hidden" class="addphoneuser_forgot"  id="addphoneuser_forgot" name="phone" value="">
                        <span id="valid-forgot" class="hide">✓ Hợp lệ</span>
                        <span id="error-forgot" class="hide"></span>
                    </div>
	                <div class="form-group popup-input-style">
	                	<input type='submit' class='submitform radius_4 forgot_pass'  value='Xác nhận'>
	                </div>
		        </form>
                <div class="bottom-form">
                    <p class="sright">Quay lại <a class="clickhere linkregister" data-toggle="modal" data-target="#popup-login" data-dismiss="modal" href="javascript:;">Đăng Nhập</a></p>
                </div>
				<div class="clear"></div>
			</div>
        </div>
    </div>
  </div>
</div>

