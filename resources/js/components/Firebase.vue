<template>
	<div class="col-sm-12">
		hello
		<div id="recaptcha-container"></div>
		<label>Phone</label>
    <input v-model="phone_number" type="text" class="form-control">
		<a href="javascript:;" class="btn btn-primary" @click="click">send sms</a>
    <input v-model="user_code" type="text" class="form-control">
		<a href="javascript:;" class="btn btn-primary" @click="verification">verify sms</a>

            <VuePhoneNumberInput 
              v-model="phone_number"
              id="phone_number" 
              :preferred-countries="['VN', 'US']"
            />
	</div>
</template>

<script>
	import firebase from 'firebase';
import VuePhoneNumberInput from 'vue-phone-number-input';
import 'vue-phone-number-input/dist/vue-phone-number-input.css';

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
	let db = app.database()
	export default {
	  components: {
	    VuePhoneNumberInput
	  },
		data() {
			return {
				phone_number: '',
				verifyCode: '',
				user_code: ''
			};
		},
		mounted() {
			db.ref('test').orderByChild('name').on('value', (snapshot) => {
				// console.log(snapshot.val())
			});

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
	      // updateSignInButtonUI();
	    });

		},
		methods: {
			click: function(){

				var phoneNumber = this.phone_number;
				var appVerifier = window.recaptchaVerifier;
				firebase.auth().signInWithPhoneNumber(phoneNumber, appVerifier)
						.then(function (confirmationResult) {
		      // SMS sent. Prompt user to type the code from the message, then sign the
		      // user in with confirmationResult.confirm(code).
		      window.confirmationResult = confirmationResult;
		    	console.log(confirmationResult)
		    }).catch(function (error) {
		    	console.log(error)
		    	grecaptcha.reset(window.recaptchaWidgetId);
		    });
  		},
  		verification: function(){
  			var code = this.user_code;
				confirmationResult.confirm(code).then(function (result) {
				  // User signed in successfully.
				  console.log('Sucess')
				  // ...
				}).catch(function (error) {
				  // User couldn't sign in (bad verification code?)
		    	console.log(error)
				});
  		}
		}
	};
</script>

