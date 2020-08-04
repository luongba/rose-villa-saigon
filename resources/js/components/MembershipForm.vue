<template>
    <section v-if="step==0"class="step0-ct">
      <div class="container">
        <input id="ef" type="radio" v-model="model.type_user" @change="next" value="0">
        <label for="ef" class="fisst">Early Founder</label>
        <input id="re" type="radio" v-model="model.type_user" @change="next" value="1">
        <label for="re">Regular Member</label>
      </div>
    </section>
    <section v-else class="content-membership">
      <div class="header-mbs">
        <div class="container">
          <h3 v-if="type == 'founder'">Founder Application</h3>
          <h3 v-if="type == 'regular'">Regular Application</h3>
          <ul class="step-membership">
            <li v-for="(item,key) in steps" :class="step==key+1 ? 'currentstep' : ''">
              <span class="numberstep radius_50">{{ key+1 }}</span><span class="textli">{{ item }}</span>
            </li>
          </ul>
        </div>
      </div>
      <div class="stepmbs step1st">
        <form class="form-mbs1" method="post" action="" @submit.prevent="submit">
          <div class="stepmbs step1st" v-if="step == 1">
            <div class="container">
              <vue-form-generator :schema="step1" :model="model" :options="formOptions"></vue-form-generator>
              <div class="form-group valid required field-input">
                <label for="ava"><span>Avatar</span></label>
                <div class="field-wrap">
                  <div class="wrapper">
                    <input id="ava" type="file" accept="image/*" @change="onFileChange">
                    <div id="preview" style="display:flex;">
                      <img width="100" v-if="image_preview" :src="image_preview" />
                    </div>
                  </div> 
                </div>
              </div>
            </div>
          </div>
          <div class="stepmbs step2nd" v-if="step == 2 && type != 'founder'">
            <div class="container">
              <vue-form-generator :schema="step2" :model="model" :options="formOptions"></vue-form-generator>
            </div>
          </div>
          <div :class="classStep" class="stepmbs" v-if="step == 2 && type == 'founder'">
            <div class="container">
              <div class="row flexrow centerflex">
                <div :class="[option.id == model.membership_type ? 'active' : '', 'col-lg-4 col-md-4 col-sm-6 col-xs-12']" v-for="option in options">
                    <div class="options-mbs radius_4 styleshadow">
                      <label :for="option.id" class="content-tp-mbs">
                          <h3><span>{{ option.name }}</span></h3>
                          <ul>
                            <li v-for="item in option.benefit_members">{{ item.name }}</li>
                          </ul>
                      </label>
                      <div class="bottom-option-mbs">
                        <div class="choseop">
                          <input :id="option.id" type="radio" :value="option.id" v-model="model.membership_type">
                          <span>Choose Plan</span>
                        </div>
                      </div>
                    </div>
                </div>
              </div>
            </div>
          </div>
          <div :class="classStep" class="stepmbs" v-if="step == 3 && type != 'founder'">
            <div class="container">
              <div class="row flexrow centerflex">
                <div :class="[option.id == model.membership_type ? 'active' : '', 'col-lg-4 col-md-4 col-sm-6 col-xs-12']" v-for="option in options">
                    <div class="options-mbs radius_4 styleshadow">
                      <label :for="option.id" class="content-tp-mbs">
                          <h3><span>{{ option.name }}</span></h3>
                          <ul>
                            <li v-for="item in option.benefit_members">{{ item.name }}</li>
                          </ul>
                      </label>
                      <div class="bottom-option-mbs">
                        <div class="choseop">
                          <input :id="option.id" type="radio" :value="option.id" v-model="model.membership_type">
                          <span>Choose Plan</span>
                        </div>
                      </div>
                    </div>
                </div>
              </div>
            </div> 
          </div>
          <div :class="classStep" class="stepmbs" v-if="(step == 3 && type == 'founder') || step == 4">
          	<div class="container">
          		<div class="row">
          			<div :class="model.vkl == 1 ? 'active' : ''" class="parentradio col-lg-6 col-md-6 col-sm-6 col-xs-12">
          				<div class="opst4 styleshadow radius_8">
                    <label for="op1" class="content-tp-mbs">
            					<h3>Price Frequency Option A</h3>
            					<div class="ct-opst4">
            						Anual<br>
            						$50
            					</div>
            					<div class="choseop ctj"><input v-model="model.vkl" name="op1" id="op1" type="radio" value="1"> <span>Choose</span></div>
                    </label>
          				</div>
          			</div>
          			<div :class="model.vkl == 0 ? 'active' : ''" class="parentradio col-lg-6 col-md-6 col-sm-6 col-xs-12">
          				<div class="opst4 styleshadow radius_8">
                    <label for="op2" class="content-tp-mbs">
            					<h3>Price Frequency Option B</h3>
            					<div class="ct-opst4">
            						Quarterly<br>
            						$30
            					</div>
            					<div class="choseop ctj"><input v-model="model.vkl" name="op1" id="op2" type="radio" value="0"> <span>Choose</span></div>
                    </label>
          				</div>
          			</div>
          		</div>
              <div class="agreestep4">
	              <input id="checkbox1" type="checkbox" v-model="model.agree">
	              <label for="checkbox1">I understand that I am applying to become a Member of Rose Villa. If accepted, I agree to arrange a payment for my joining fee and initial membership fee, and for all subsequent membership fees on an ongoing basis.</label>
              </div>
              <div class="agreestep4">
	              <input id="checkbox2" type="checkbox" v-model="model.agree2">
	              <label for="checkbox2">By applying I agree to abide the Rose Villa club sules and term & conditions of membership</label>
              </div>
           	</div>

          </div>
          <div class="container">
            <div class="button2center">
            <button class="btn btn-primary buttonmbs btback" v-if="step >1 && step<=steps.length" type="button" @click="back
            ">Back</button>
            <a href="Javascript:;" class="btn btn-primary buttonmbs btnext" v-if="step<steps.length" type="button" @click="next">Next</a>
            <!-- <button class="btn btn-primary buttonmbs btnext" v-if="step<steps.length" type="button" @click="next">Next</button> -->
            <button class="btn btn-primary buttonmbs btnext" v-if="step==steps.length" type="submit">Submit</button>
            </div>
          </div>
        </form>
      </div>
    </section>
</template>
<script>
import moment from 'moment'
import VueFormGenerator from 'vue-form-generator'
import 'vue-form-generator/dist/vfg.css'
 
Vue.use(VueFormGenerator)

export default {
  props: ['type'],
  data() {
    return {
      options: {},
      countries: [],
      steps: [],
      step: 1,
      user_data: [],
      image_preview: null,
      model: {
        countries: ['Việt Nam'],
        cities: ['Thành phố Hồ Chí Minh', 'Hà Nội', 'Đà Nẵng', 'Hải Phòng', 'Cần Thơ'],
        years: [],
        months: [],
        days: [],
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
            inputType: 'number',
            label: 'Phone Number',
            model: 'phone',
            required: true,
            validator: VueFormGenerator.validators.number
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
            selectOptions: {
              noneSelectedText: "Select Gender",
              // hideNoneSelectedText: true,
            },
            values: ['Male', 'Female'],
            required: true,
            validator: VueFormGenerator.validators.required
          },
          {
            type: 'select',
            label: 'Year',
            model: 'year',
            selectOptions: {
              noneSelectedText: "Select Year",
            },
            styleClasses: 'birthday_select',
            values: function(model, schema){
              return model.years
            },
            required: true
          },
          {
            type: 'select',
            label: 'Month',
            model: 'month',
            selectOptions: {
              noneSelectedText: "Select Month",
            },
            styleClasses: 'birthday_select',
            values: function(model, schema){
              return model.months
            },
            onChanged: function(model, newVal, oldVal, field) {
              model.days = []
              if(newVal==2){
                for (var i = 1; i < 29; i++) {
                  model.days.push(i)
                }
                return
              }
              if(newVal==4 || newVal==6 || newVal==9 || newVal==11 ){
                for (var i = 1; i < 31; i++) {
                  model.days.push(i)
                }
                return
              }
              for (var i = 1; i < 32; i++) {
                model.days.push(i)
              }
            },
            required: true
          },
          {
            type: 'select',
            label: 'Day',
            model: 'day',
            selectOptions: {
              noneSelectedText: "Select Day",
            },
            styleClasses: 'birthday_select last',
            values: function(model, schema){
              return model.days
            },
            required: true
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
            type: 'select',
            inputType: 'text',
            label: 'Country',
            model: 'country',
            selectOptions: {
              noneSelectedText: "Select Country",
            },
            values: function(model, schema){
              return model.countries
            },
            required: true
          },
          {
            type: 'select',
            inputType: 'text',
            label: 'City',
            model: 'city',
            selectOptions: {
              noneSelectedText: "Select City",
            },
            values: function(model, schema){
              return model.cities
            },
            required: true,
            validator: VueFormGenerator.validators.string
          },
          {
            type: 'input',
            inputType: 'text',
            label: 'Stress Address line one',
            model: 'address_one',
            required: true,
            validator: VueFormGenerator.validators.string
          },
          {
            type: 'input',
            inputType: 'text',
            label: 'Stress Address line two',
            model: 'address_two',
            required: false
          },
          {
            type: 'input',
            inputType: 'text',
            label: 'Postal Code',
            model: 'post_code',
            required: true,
            validator: VueFormGenerator.validators.string
          },
          /*{
            type: 'submit',
            buttonText: 'Next',
            onSubmit(model, schema) {
              alert(this.step);
              this.step++
            },
            validateBeforeSubmit: true
          },*/

        ]
      },
      step2: {
        fields: [
          {
            type: 'textArea',
            label: 'WHY DO YOU WANT TO JOIN ROSE VILLA?',
            model: 'reason',
            // max: 500,
            rows: 4,
            required: true
          },
          {
            type: 'textArea',
            label: 'HOW WILL YOU USE THE CLUB?',
            model: 'usage_criteria',
            // max: 500,
            rows: 4,
            required: true
          },
          {
            type: 'textArea',
            label: 'WHAT WILL YOU BRING TO THE ROSE VILLA COMMUNITY?',
            model: 'bring_to',
            // max: 500,
            rows: 4,
            required: true
          },
          {
            type: 'textArea',
            label: 'DO YOU KNOW ANY OTHER RV MEMBERS WHO ARE PREPARED TO PROPOSE YOU?',
            model: 'member_other',
            // max: 500,
            rows: 4,
            required: true
          },
          /*{
            type: 'submit',
            buttonText: 'Next',
            onSubmit(model, schema) {
              alert('step 2');
              this.step++
            },
            validateBeforeSubmit: true
          },*/
        ]
      },
      stepPayment: {
        fields: [
          {
              type: "checkbox",
              label: "Status",
              model: "status",
              default: true
          }
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
    if(this.type == "founder"){
      this.model.type_user = 1
      this.steps = ['About You', 'Membership Type', 'Payment']
    }else {
      this.model.type_user = 2
      this.steps = ['About You', 'Why You?', 'Membership Type', 'Payment']
    }
    let _this = this
    // get countries
    if(this.type != "founder"){
      axios.get(
        'https://restcountries.eu/rest/v2/all'
      ).then(function(response){
        response.data.forEach(function(item){
          _this.model.countries.push(item.name)
        })
      });
    }
    for (var i = 1960; i < 2005; i++) {
      _this.model.years.push(i)
    }
    for (var i = 1; i < 13; i++) {
      _this.model.months.push(i)
    }
    for (var i = 1; i < 32; i++) {
      _this.model.days.push(i)
    }
  },
  computed: {
    classStep() {
      if(this.step == 2){
        return this.type == 'founder' ? "step3rd" : "step2nd"
      }else if(this.step == 3){
        return this.type == 'founder' ? "step4th" : "step3rd"
      }else {
        return "stepLast"
      }
    }
  },
  methods: {
    onFileChange(e) {
      const image = e.target.files[0];
      const reader = new FileReader();
      reader.readAsDataURL(image);
      reader.onload = e =>{
          this.image_preview = e.target.result;
          // console.log(this.image_preview);
      };
    },
    next: function(){
      let _this = this
      _this.model.dob = moment(_this.model.year + " " + _this.model.month + " " + _this.model.day).format('YYYY-MM-DD')

      if(this.step == 1){
        var years_old = moment().diff(_this.model.dob, 'years');
        console.log(years_old)

        if(
          !this.model.first_name || !this.model.last_name || !this.model.email
           || !this.model.gender || !this.model.year  || !this.model.month  || !this.model.day 
           || !this.model.occupation  || !this.model.country || !this.model.address_one
           || !this.model.city || !this.model.post_code
          ){
          toastr.error("Please fill all fields")
        }else if(years_old < 18) {
          toastr.error("You can not submit because year old < 18")
          return
        }else if(!this.image_preview) {
          toastr.error("Please select Avatar")
          return
        }else {
          // get member package
          axios.get(
            './membership-type',{
              params:{
                dob: _this.model.dob,
                city: _this.model.city,
                type: _this.type == 'founder' ? 1 : 2
              }
            }
          ).then(function(response){
            _this.options = response.data
          })

          this.step++
          return
        }
      }

      if(this.step == 2 && this.type != 'founder'){
        if(
          !this.model.reason || !this.model.bring_to || !this.model.usage_criteria|| !this.model.member_other
          ){
          toastr.error("Please fill all fields")
          return
        }else {
          this.step++
          return
        }
      }

      if((this.step == 3 && this.type != 'founder') || (this.step == 2 && this.type == 'founder')){
        if(!this.model.membership_type){
          toastr.error("Please choose membership type")
        }else {
          this.step++
          return
        }
      }

      /*if((this.step == 4 && this.type != 'founder') || (this.step == 3 && this.type == 'founder')){
        if(!this.model.checkbox1 || !this.model.checkbox2 ){
          toastr.error("Please agree")
        }else {
          this.step++
          return
        }
      }*/


    },
    submit: function(){
      console.log(this.step)
        if(!this.model.vkl ){
          toastr.error("Please select plan")
          return
        }
        if(!this.model.agree || !this.model.agree2 ){
          toastr.error("Please agree")
          return
        }
        let _this = this
        let params = _this.model
        params.gender = (_this.model.gender == "Male") ? 0 : 1
        params.dob = moment(_this.model.year + " " + _this.model.month + " " + _this.model.day).format('YYYY-MM-DD')
        params.avatar = _this.image_preview
        delete params['days']
        delete params['months']
        delete params['years']
        delete params['countries']
        delete params['cities']
        console.log(params)
        axios.post(
          './register-membership', params
        ).then(function(response){
          if(response.data.status == false){
            toastr.error(response.data.message)
          }else {
            toastr.success(response.data.message)
            setTimeout(() => window.location.href = './thank-you', 1500)
          }
        });
    },
    back: function(){
      this.step--
    }
  }
}
$(document).ready(function(){
  var rBtnVal = $('.ctj input').val();
    if(rBtnVal == "1"){
        $(this).closest('.parentradio').addClass('active');
    }else{ 
        $(this).closest('.parentradio').removeClass('active');
    }
});
</script>
