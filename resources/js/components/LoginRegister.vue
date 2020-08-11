<template>
	<div class="">
    <div id="recaptcha-container" style="visibility: hidden;"></div>
		<div class="content-login content-popup" v-if="view == 'dangnhap'">
			<h3 class="modal-title">{{ $t('form_membership.login') }}</h3>
      <form name="loginForm" class="form-control-user" method="post" action="" data-parsley-validate @submit.prevent="dangnhap">
        
        	<!-- <span v-if="err_text" class="text-danger">{{ err_text }}</span> -->
          <div class="form-group popup-input-style">
            <vue-tel-input v-model="phone_number"  @validate="checkPhone" :preferredCountries="['VN', 'US']" placeholder="09xx-xxx-xxx"></vue-tel-input>
            <p v-if="validphone">{{ validphone }}</p>
          </div>
          <div class="form-group popup-input-style">
              <input v-model="password" type="password" class="form-control-elm input-password" placeholder="123-456" autocomplete="off" data-parsley-required data-parsley-minlength="6"> 
          </div>
          <div class="form-group popup-input-style">
          	<input type='submit' class='submitform radius_4' value='Login'>
          </div>

      </form>
			<div class="bottom-form">
				<p class="linkforgots"><a @click="changeView('forgot')">{{ $t('form_membership.lostpass') }}</a></p>
				<!-- <p class="sright">Bạn có tài khoản chưa? <a class="clickhere linkregister" @click="changeView('dangky')">Đăng Ký</a></p> -->
			</div>
			<div class="clear"></div>
		</div>
		<div class="content-login content-popup" v-if="view == 'dangky'">
			<h3 class="modal-title">Đăng Ký</h3>
	        <form data-parsley-validate @submit.prevent="dangky">
	        	<input type="hidden" name="role" value="2">
              <div class="form-group popup-input-style">
                <input v-model="first_name" type="text" class="form-control-elm input-user" placeholder="First Name" autocomplete="off" data-parsley-required>
              </div> 
              <div class="form-group popup-input-style">
                <input v-model="last_name" type="text" class="form-control-elm input-user" placeholder="Last Name" autocomplete="off" data-parsley-required>
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
			<h3 class="modal-title">{{ $t('form_membership.lostpass') }}</h3>
	        <form data-parsley-validate @submit.prevent="forgotPassword">
              <!-- <span v-if="err_text" class="text-danger">{{ err_text }}</span> -->
              <p>{{ $t('form_membership.desforgot') }}</p>
              <div class="form-group popup-input-style">
                <vue-tel-input v-model="phone_number3"  @validate="checkPhone" :preferredCountries="['VN', 'US']" ></vue-tel-input>
                <p v-if="validphone">{{ validphone }}</p>
              </div>
              <div class="form-group popup-input-style">
              	<input type='submit' class='submitform radius_4' value='Submit'>
              </div>
	        </form>
          <div class="bottom-form">
            <p class="sright">{{ $t('form_membership.backto') }}<a class="clickhere linkregister" @click="changeView('dangnhap')">{{ $t('form_membership.login') }}</a></p>
          </div>
			<div class="clear"></div>
		</div>
		<div class="content-login content-popup" v-if="view == 'checkpin'">
      <div class="titlepopup">
          <h3 class="modal-title">{{ $t('form_membership.veryfycoe') }}</h3>
          <p>{{ $t('form_membership.veryfycoedes') }}</p>
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
          <div class="form-group popup-input-style">
          	<input type='submit' class='submitform radius_4' value='Xác Nhận'>
          </div>
      </form>
			<div class="clear"></div>
		</div>
    <div class="content-login content-popup" v-if="view == 'changepass'">
        <h3 class="modal-title">{{ $t('form_membership.resetpassword') }}</h3>
        <form @submit.prevent="resetPassword" data-parsley-validate>
          <input type="hidden" name="phone" value="">
            <span id="error" class="text-danger"></span>
              <div class="form-group popup-input-style">
                  <input v-model="password" type="password" class="form-control-elm input-password" placeholder="password" autocomplete="off" data-parsley-required data-parsley-minlength="6">
                  
              </div>
              <div class="form-group popup-input-style">
                  <input v-model="repassword" type="password" class="form-control-elm input-password" placeholder="password confirm" autocomplete="off" data-parsley-required data-parsley-minlength="6">
                  
              </div>
              <div class="form-group popup-input-style">
                <input type='submit' class='submitform radius_4'  value='Confirm'>
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
  let app = firebase.initializeApp(firebaseConfig)

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
        first_name: '',
        last_name: '',
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
          console.log(e.valid,e.number)
        if(!e.valid){
          this.validphone = this.$t('form_membership.error_phone')
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
            './login',
            { phone: _this.phone, password: _this.password }
          ).then(function(response){
            // _this.err_text = ''
            if(response.data.status == false){
              // _this.err_text = response.data.message
              toastr.error(response.data.message)
            }else {
              toastr.success(response.data.message)
              if(response.data.data.url){
                setTimeout(() => window.location.href = response.data.data.url, 1500)
              }else{
                setTimeout(() => window.location.reload(), 1500)
              }
            }
          });
        }
      },
      dangky: function(e){
        let _this = this
        _this.typepin = ''
        if(this.validphone == ''){
          axios.post(
            './register',
            { first_name: this.first_name, last_name: this.last_name, phone: this.phone, password: this.password, password_confirmation: this.repassword }
          ).then(function(response){
            // _this.err_text = ''
            if(response.data.status == false){
              // _this.err_text = response.data.message
              toastr.error(response.data.message)
            }else {
              toastr.success(response.data.message)
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
            { first_name: _this.first_name, last_name: _this.last_name, phone: _this.phone, password: _this.password, password_confirmation: _this.repassword }
          ).then(function(response){
            // _this.err_text = ''
            if(response.data.status == false){
              // _this.err_text = response.data.message
              toastr.error(response.data.message)
            }else {
              // _this.err_text = response.data.message
              toastr.success(response.data.message)
              setTimeout(() => window.location.href = response.data.data.url, 1500)
              // setTimeout(() => _this.view = 'dangnhap', 500)
            }
          });
          // ...
        }).catch(function (error) {
          // User couldn't sign in (bad verification code?)
          console.log(error)
          toastr.error(error.message)
        });
      },
    }
  };
</script>
