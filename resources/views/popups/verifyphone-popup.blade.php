
<div class="modal fade" id="v-phone-popup" tabindex="-1" role="dialog" aria-labelledby="v-phone-popup" aria-hidden="true">
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
                    <div class="titlepopup">
                        <h3 class="modal-title">Nhập Mã Code</h3>
                        <p>Vui lòng nhập mã xác minh được gửi tới số điện thoại của bạn</p>
                    </div>
			        <form class="form-control-pincode" method="post" action="" data-parsley-validate>
                        <input type="hidden" name="phone" value="">
		                <div class="form-group">
                        	<input type="text" id="pincode-input2" name="pin" value="">
                    	</div>
                    	<div class="form-group text50">
                    		Không nhận đc mã ? Gửi lại
                    	</div>
		                <div class="form-group popup-input-style">
		                	<input type='submit' class='submitform  radius_4'  value='Xác Nhận'>
		                </div>
			        </form>
					<div class="clear"></div>
			</div>
        </div>
    </div>
  </div>
</div>

