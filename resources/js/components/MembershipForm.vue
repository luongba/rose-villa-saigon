<template>
		<section v-if="step==0">
      <div class="container">
				<input id="ef" type="radio" v-model="model.type" @change="next" value="0">
				<label for="ef">Early Founder</label>
				<input id="re" type="radio" v-model="model.type" @change="next" value="1">
				<label for="re">Regular Member</label>
			</div>
		</section>
    <section v-else class="content-membership">
      <div class="container">
      	<h3>Regular Member</h3>
        <ul class="step-membership">
        	<li v-for="(item,key) in steps" :class="step==key+1 ? 'currentstep' : ''">
        		<span class="numberstep radius_50">{{ key+1 }}</span><span class="textli">{{ item }}</span>
        	</li>
        </ul>
        <div class="stepmbs step1st">
          <form class="form-mbs1" method="post" action="" @submit.prevent="submit" style="float: left">
         		<div class="stepmbs step1st" v-if="step == 1">
          		  <vue-form-generator :schema="step1" :model="model" :options="formOptions"></vue-form-generator>
						</div>
         		<div class="stepmbs step2nd" v-if="step == 2">
          		<vue-form-generator :schema="step2" :model="model" :options="formOptions"></vue-form-generator>
						</div>
         		<div class="stepmbs step3rd" v-if="step == 3">
          		<div class="row">
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12" v-for="option in options">
                    <label :for="option.id" class="content-tp-mbs">
                        <h3>{{ option.name }}</h3>
                        <ul>
                          <li v-for="item in option.benefit_members">{{ item.name }}</li>
                        </ul>
                        <button type="button">Choose Plan</button>
                    </label>
                    <input :id="option.id" type="radio" :value="option.id" v-model="model.type_id">
                </div>
            	</div>
              <button class="btn btn-primary" v-if="step==3" type="submit">Submit</button>
						</div>
          </form>
        </div>
      </div>
    </section>
</template>
<script>
import moment from 'moment'
import pikaday from 'pikaday'
import VueFormGenerator from 'vue-form-generator'
import 'vue-form-generator/dist/vfg.css'
 
Vue.use(VueFormGenerator)

export default {
	data() {
		return {
			options: {},
			steps: [
				'About You', 'Why You?', 'Membership Type'
			],
			step: 3,
			user_data: [],
			type: null,
			model: {
        /*name: 'John Doe',
        password: 'J0hnD03!x4',
        skills: ['Javascript', 'VueJS'],
        email: 'john.doe@gmail.com',
        status: true*/
      },
      step1: {
        fields: [
          {
            type: 'input',
            inputType: 'text',
            label: 'First Name',
            model: 'first_name',
            required: true,
            validator: VueFormGenerator.validators.string
          },
          {
            type: 'input',
            inputType: 'text',
            label: 'Last Name',
            model: 'last_name',
            required: true,
            validator: VueFormGenerator.validators.string
          },
          {
            type: 'input',
            inputType: 'email',
            label: 'Email',
            model: 'email',
            required: true,
            validator: VueFormGenerator.validators.email
          },
          {
            type: 'select',
            label: 'Gender',
            model: 'gender',
            values: ['Male', 'Female'],
            required: true,
            validator: VueFormGenerator.validators.required
          },
          {
            type: 'input',
            inputType: 'date',
            label: 'Date of Birth',
            model: 'dob',
            min: moment("1970-01-01").toDate(),
    				max: moment("2005-01-01").toDate(),
            required: true,
            validator: VueFormGenerator.validators.date
          },
          {
            type: 'input',
            inputType: 'text',
            label: 'Occupation',
            model: 'occupation',
            required: true,
            validator: VueFormGenerator.validators.string
          },
          {
            type: 'input',
            inputType: 'text',
            label: 'Country',
            model: 'country',
            required: true,
            validator: VueFormGenerator.validators.string
          },
          {
            type: 'input',
            inputType: 'text',
            label: 'Stress Address line one',
            model: 'address_1',
            required: true,
            validator: VueFormGenerator.validators.string
          },
          {
            type: 'input',
            inputType: 'text',
            label: 'Stress Address line two',
            model: 'address_2',
            required: true,
            validator: VueFormGenerator.validators.string
          },
          {
            type: 'input',
            inputType: 'text',
            label: 'City',
            model: 'city',
            required: true,
            validator: VueFormGenerator.validators.string
          },
          {
            type: 'input',
            inputType: 'text',
            label: 'Postal Code',
            model: 'postal_code',
            required: true,
            validator: VueFormGenerator.validators.string
          },
          {
            type: 'submit',
            buttonText: 'Next',
            class: 'dsagds',
            onSubmit(model, schema) {
              this.step++
            },
            validateBeforeSubmit: true
          },

        ]
      },
      step2: {
        fields: [
          {
            type: 'textArea',
            label: 'WHY DO YOU WANT TO JOIN ROSE VILLA?',
            model: 'why_you',
            // max: 500,
				    rows: 4,
            required: true
          },
          {
            type: 'textArea',
            label: 'HOW WILL YOU USE THE CLUB?',
            model: 'how_you',
            // max: 500,
				    rows: 4,
            required: true
          },
          {
            type: 'textArea',
            label: 'WHAT WILL YOU BRING TO THE ROSE VILLA COMMUNITY?',
            model: 'what_you',
            // max: 500,
				    rows: 4,
            required: true
          },
          {
            type: 'textArea',
            label: 'DO YOU KNOW ANY OTHER RV MEMBERS WHO ARE PREPARED TO PROPOSE YOU?',
            model: 'who_are',
            // max: 500,
				    rows: 4,
            required: true
          },
          {
            type: 'submit',
            buttonText: 'thu xem sao',
            validateBeforeSubmit: true
          },
        ]
      },
      formOptions: {
        validateAfterLoad: false,
        validateAfterChanged: true,
        validateAsync: true
      },
			err_text: ''
		};
	},
	mounted() {
    let _this = this
    axios.get(
      './membership-type'
    ).then(function(response){
      _this.options = response.data
      console.log(response)
    });
	},
	methods: {
		onValidated(isValid, errors) {
	  	console.log("Validation result: ", isValid, ", Errors:", errors);
      if(isValid){
        // this.step++
      }
	  },
		submit: function(){
      if(this.step < 3){
        this.step++
      }else {
        console.log(this.model)
      }
		}
	}
}
</script>