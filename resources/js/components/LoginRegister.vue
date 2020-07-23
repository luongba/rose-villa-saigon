<template>
	<div class="">
    <div id="recaptcha-container"></div>
		<div class="content-login content-popup" v-if="view == 'dangnhap'">
			<h3 class="modal-title">Đăng Nhập</h3>
	        <form name="loginForm" class="form-control-user" method="post" action="" data-parsley-validate @submit.prevent="dangnhap">
            
	          	<!-- <span v-if="err_text" class="text-danger">{{ err_text }}</span> -->
                <div class="form-group popup-input-style">
                  <vue-tel-input v-model="phone_number"  @validate="checkPhone" :preferredCountries="['VN', 'US']" ></vue-tel-input>
                  <p v-if="validphone">{{ validphone }}</p>
                </div>
                <div class="form-group popup-input-style">
                    <input v-model="password" type="password" class="form-control-elm input-password" placeholder="Password" autocomplete="off" data-parsley-required data-parsley-minlength="6">
                    
                </div>
                <div class="form-group popup-input-style">
                	<input type='submit' class='submitform radius_4' value='Đăng Nhập'>
                </div>

	        </form>
			<div class="bottom-form">
				<p class="linkforgots"><a @click="changeView('forgot')">Quên Mật Khẩu</a></p>
				<p class="sright">Bạn có tài khoản chưa? <a class="clickhere linkregister" @click="changeView('dangky')">Đăng Ký</a></p>
			</div>
			<div class="clear"></div>
		</div>
		<div class="content-login content-popup" v-if="view == 'dangky'">
			<h3 class="modal-title">Đăng Ký</h3>
	        <form data-parsley-validate @submit.prevent="dangky">
	        	<input type="hidden" name="role" value="2">
              <!-- <span v-if="err_text" class="text-danger">{{ err_text }}</span> -->
	            <div class="form-group popup-input-style">
                   <input v-model="name" type="text" class="form-control-elm input-user" placeholder="Họ Và Tên" autocomplete="off" data-parsley-required>
                </div> 
                <div class="form-group popup-input-style">
                  <vue-tel-input v-model="phone_number2"  @validate="checkPhone" :preferredCountries="['VN', 'US']" ></vue-tel-input>
                  <p v-if="validphone">{{ validphone }}</p>
                </div>
                <div class="form-group popup-input-style">
                    <input v-model="password" type="password" class="form-control-elm input-password" placeholder="Mật Khẩu" autocomplete="off" data-parsley-required data-parsley-minlength="6">
                </div>
                <div class="form-group popup-input-style">
                    <input v-model="repassword" type="password" class="form-control-elm input-password" placeholder="Nhập Lại Mật Khẩu" autocomplete="off" data-parsley-required data-parsley-minlength="6">
                </div>
                <div class="form-group popup-input-style">
                	<input type='submit' class='submitform radius_4' value='Đăng Ký'>
                </div>
	        </form>
			<div class="bottom-form">
				<p class="sright">Bạn đã có tài khoản ? <a class="clickhere linkregister" @click="changeView('dangnhap')">Đăng Nhập</a></p>
			</div>
			<div class="clear"></div>
		</div>
		<div class="content-login content-popup" v-if="view == 'forgot'">
			<h3 class="modal-title">Quên Mật Khẩu</h3>
	        <form data-parsley-validate @submit.prevent="forgotPassword">
              <!-- <span v-if="err_text" class="text-danger">{{ err_text }}</span> -->
              <p>Vui lòng nhập số điện thoại đăng ký</p>
              <div class="form-group popup-input-style">
                <vue-tel-input v-model="phone_number3"  @validate="checkPhone" :preferredCountries="['VN', 'US']" ></vue-tel-input>
                <p v-if="validphone">{{ validphone }}</p>
              </div>
              <div class="form-group popup-input-style">
              	<input type='submit' class='submitform radius_4' value='Xác nhận'>
              </div>
	        </form>
          <div class="bottom-form">
            <p class="sright">Quay lại <a class="clickhere linkregister" @click="changeView('dangnhap')">Đăng Nhập</a></p>
          </div>
			<div class="clear"></div>
		</div>
		<div class="content-login content-popup" v-if="view == 'checkpin'">
      <div class="titlepopup">
          <h3 class="modal-title">Nhập Mã Code</h3>
          <p>Vui lòng nhập mã xác minh được gửi tới số điện thoại của bạn</p>
      </div>
      <form class="form-control-pincode" data-parsley-validate @submit.prevent="checkpin">
          <!-- <span v-if="err_text" class="text-danger">{{ err_text }}</span> -->
          <input type="hidden" name="phone" value="">
          <div class="form-group">
            <PincodeInput
              v-model="pincode"
              :length=6
              placeholder=""
            />
        	</div>
        	<div class="form-group text50" v-if="1==2">
        		Không nhận đc mã ? Gửi lại
        	</div>
          <div class="form-group popup-input-style">
          	<input type='submit' class='submitform radius_4' value='Xác Nhận'>
          </div>
      </form>
			<div class="clear"></div>
		</div>
    <div class="content-login content-popup" v-if="view == 'changepass'">
        <h3 class="modal-title">Đặt Lại Mật Khẩu</h3>
        <form @submit.prevent="resetPassword" data-parsley-validate>
          <input type="hidden" name="phone" value="">
            <span id="error" class="text-danger"></span>
              <div class="form-group popup-input-style">
                  <input v-model="password" type="password" class="form-control-elm input-password" placeholder="Mật Khẩu" autocomplete="off" data-parsley-required data-parsley-minlength="6">
                  
              </div>
              <div class="form-group popup-input-style">
                  <input v-model="repassword" type="password" class="form-control-elm input-password" placeholder="Nhập Lại Mật Khẩu" autocomplete="off" data-parsley-required data-parsley-minlength="6">
                  
              </div>
              <div class="form-group popup-input-style">
                <input type='submit' class='submitform radius_4'  value='Xác Nhận'>
              </div>
        </form>
    </div>
	</div>
</template>
<style type="text/css" media="screen">
  .vue-tel-input {
    border: none !important;
    border-bottom: 1px solid #fff !important;
  }
  .vti__input {
    border-bottom: none !important;
  }
  .vti__dropdown-item {
    color: #000 !important;
  }
</style>
<script>
  import firebase from 'firebase';
  import {VueTelInput} from 'vue-tel-input'
  import PincodeInput from 'vue-pincode-input';

  let firebaseConfig = {
    apiKey: "AIzaSyDHgi1RtHQO4skHHgbbEtNh4jZ8d2QZeP4",
    authDomain: "test-92b85.firebaseapp.com",
    databaseURL: "https://test-92b85.firebaseio.com",
    projectId: "test-92b85",
    storageBucket: "test-92b85.appspot.com",
    messagingSenderId: "456137702762",
    appId: "1:456137702762:web:8ed55e2f0f17b91b8a3913",
    measurementId: "G-R4YZGNFX95"
  };

  export default {
  	components: {
      VueTelInput,PincodeInput
	},
    data() {
      return {
        view: 'dangnhap',
        phone_number: '',
        phone_number2: '',
        phone_number3: '',
        name: '',
        phone: '',
        password: '',
        repassword: '',
        pincode: '',
        typepin: '',
        validphone: '',
        err_text: ''
      };
    },
    mounted() {
      window.recaptchaVerifier = new firebase.auth.RecaptchaVerifier('recaptcha-container', {
        'size': 'invisible',
        'callback': function(response) {
          console.log(response)
          // reCAPTCHA solved, allow signInWithPhoneNumber.
          onSignInSubmit();
        }
      });
      recaptchaVerifier.render().then(function(widgetId) {
        window.recaptchaWidgetId = widgetId;
      });
    },
    methods: {
    	changeView: function(view){
    		this.view = view
    	},
    	checkPhone: function(e){
          // console.log(e.valid,e.number)
        if(!e.valid){
          this.validphone = "Phone number not valid"
        }else {
          this.validphone = ''
          this.phone = e.number.e164
          // console.log(this.phone)
        }
    	},
      dangnhap: function(e){
        let _this = this
        if(this.validphone == ''){
          axios.post(
            './login-web',
            { phone: this.phone, password: this.password }
          ).then(function(response){
            // _this.err_text = ''
            if(response.data.status == false){
              // _this.err_text = response.data.message
              toastr.error(response.data.message)
            }else {
              // _this.err_text = response.data.message
              toastr.success(response.data.message)
              setTimeout(() => window.location.reload(), 1500)
            }
          });
        }
      },
      dangky: function(e){
        let _this = this
        _this.typepin = ''
        if(this.validphone == ''){
          axios.post(
            './registration',
            { name: this.name, phone: this.phone, password: this.password, password_confirmation: this.repassword }
          ).then(function(response){
            // _this.err_text = ''
            if(response.data.status == false){
              // _this.err_text = response.data.message
              toastr.error(response.data.message)
            }else {
              var phoneNumber = _this.phone;
              var appVerifier = window.recaptchaVerifier;
              firebase.auth().signInWithPhoneNumber(phoneNumber, appVerifier)
                  .then(function (confirmationResult) {
                // SMS sent. Prompt user to type the code from the message, then sign the
                // user in with confirmationResult.confirm(code).
                window.confirmationResult = confirmationResult;
                // console.log(confirmationResult)
                _this.view = 'checkpin'
              }).catch(function (error) {
                console.log(error)
                grecaptcha.reset(window.recaptchaWidgetId);
                toastr.error(error.message)
              });
            }
          });
        }
      },
      forgotPassword: function(e){
        let _this = this
        _this.typepin = 'forgot'
        if(this.validphone == ''){
          axios.post(
            './forgot_password',
            { phone: this.phone}
          ).then(function(response){
            // _this.err_text = ''
            if(response.data.status == false){
              // _this.err_text = response.data.message
              toastr.error(response.data.message)
            }else {
              var phoneNumber = _this.phone;
              var appVerifier = window.recaptchaVerifier;
              firebase.auth().signInWithPhoneNumber(phoneNumber, appVerifier)
                  .then(function (confirmationResult) {
                // SMS sent. Prompt user to type the code from the message, then sign the
                // user in with confirmationResult.confirm(code).
                window.confirmationResult = confirmationResult;
                // console.log(confirmationResult)
              }).catch(function (error) {
                console.log(error)
                grecaptcha.reset(window.recaptchaWidgetId);
              });
              _this.view = 'checkpin'
            }
          });
        }
      },
      resetPassword: function(e){
        let _this = this
        axios.post(
          './update_password',
          { phone: this.phone, password: this.password, password_confirmation: this.repassword}
        ).then(function(response){
          // _this.err_text = ''
          if(response.data.status == false){
            // _this.err_text = response.data.message
            toastr.error(response.data.message)
          }else {
            toastr.success(response.data.message)
            setTimeout(() => _this.view = 'dangnhap', 500)
          }
        });
      },
      checkpin: function(e){
        let _this = this
        // console.log(window.confirmationResult)
        var code = this.pincode;
        confirmationResult.confirm(code).then(function (result) {
          // User signed in successfully.
          if( _this.typepin == 'forgot'){
            _this.view = 'changepass'
            return
          }
          axios.post(
            './confirm-registration',
            { name: _this.name, phone: _this.phone, password: _this.password, password_confirmation: _this.repassword }
          ).then(function(response){
            // _this.err_text = ''
            if(response.data.status == false){
              // _this.err_text = response.data.message
              toastr.error(response.data.message)
            }else {
              // _this.err_text = response.data.message
               toastr.success(response.data.message)
              setTimeout(() => _this.view = 'dangnhap', 500)
            }
          });
          // ...
        }).catch(function (error) {
          // User couldn't sign in (bad verification code?)
          console.log(error)
          // _this.err_text = 'Mã Pin không chính xác'
           toastr.error('Mã Pin không chính xác')
        });
      },
    }
  };
</script>
