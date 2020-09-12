<template>
    <section v-else class="content-membership">
      <div class="header-mbs">
        <div class="container">
          <h3 v-if="type == 'founder'">{{ $t('form_membership.title_founder') }}</h3>
          <h3 v-if="type == 'regular'">{{ $t('form_membership.title_regular') }}</h3>
          <ul class="step-membership">
            <li v-for="(item,key) in steps" :class="step==key+1 ? 'currentstep' : ''">
              <span class="numberstep radius_50">{{ key+1 }}</span><span class="textli">{{ item }}</span>
            </li>
          </ul>
        </div>
      </div>
      <div class="stepmbs">
        <form class="form-mbs1 vvvv" method="post" action="" @submit.prevent="submit">
          <div ref="step1" class="stepmbs step1st" v-if="step == 1">
            <div class="container">
              <FormulateInput
                :wrapper-class="['form-group required']"
                :label="$t('form_membership.first_name')"
                type="text"
                v-model="model.first_name"
                name="first_name"
                validation="^required"
                :validation-messages="{
                  required: $t('form_membership.required', {attribute: $t('form_membership.first_name')})
                }"
              />
              <FormulateInput
                :wrapper-class="['form-group required']"
                :label="$t('form_membership.last_name')"
                type="text"
                v-model="model.last_name"
                name="last_name"
                validation="^required"
                :validation-messages="{
                  required: $t('form_membership.required', {attribute: $t('form_membership.last_name')})
                }"
              />
              <div :class="validphone ? 'errors' : ''" class="form-group required field-input">
                <label for="last-name"><span>{{ $t('form_membership.phonenumber') }}</span></label>
                <div class="field-wrap">
                  <vue-tel-input 
                  	mode="international"
                  	v-model="model.phone_number" 
                  	@validate="checkPhone" 
                  	:preferredCountries="['VN', 'US']" 
                  	:placeholder="$t('form_membership.phonenumber')"
                  ></vue-tel-input>
                </div>
                <ul class="formulate-input-errors" v-if="model.phone_number && validphone">
                  <li class="formulate-input-error">{{validphone}}</li>
                </ul>
              </div>
              <FormulateInput
                :wrapper-class="['form-group required']"
                :label="$t('form_membership.email')"
                type="email"
                v-model="model.email"
                name="email"
                validation="^required|email"
                :validation-messages="{
                  required: $t('form_membership.required', {attribute: $t('form_membership.email')})
                }"
              />
              <FormulateInput
                :wrapper-class="['form-group required']"
                :label="$t('form_membership.gender')"
                type="select"
                v-model="model.gender"
                name="gender"
                :options="{Male: $t('form_membership.gender_male'), Female: $t('form_membership.gender_female'), Other: $t('form_membership.gender_other'), PreferNotToSay: $t('form_membership.gender_secret')}"
                validation="^required"
                :placeholder="$t('form_membership.selectgender')"
                :validation-messages="{
                  required: $t('form_membership.required', {attribute: $t('form_membership.gender')})
                }"
              />
              <FormulateInput
                class="birthday_select lb-time"
                :wrapper-class="['form-group required']"
                :label="$t('form_membership.emrty')"
                type="select"
                v-model="model.day"
                name="day"
                :options="model.days"
                validation="^required"
                :placeholder="$t('form_membership.day')"
                :validation-messages="{
                  required: $t('form_membership.required', {attribute: $t('form_membership.day')})
                }"
              />
              <FormulateInput
                class="birthday_select lb-time label-birthday"
                :wrapper-class="['form-group required']"
                :label="$t('form_membership.dob')"
                type="select"
                v-model="model.month"
                name="month"
                :options="model.months"
                validation="^required"
                :placeholder="$t('form_membership.month')"
                :validation-messages="{
                  required: $t('form_membership.required', {attribute: $t('form_membership.month')})
                }"
                @change="changeMonth"
              />
              <FormulateInput
                class="birthday_select last lb-time"
                :wrapper-class="['form-group required']"
                :label="$t('form_membership.emrty')"
                type="select"
                v-model="model.year"
                name="year"
                :options="model.years"
                validation="^required"
                :placeholder="$t('form_membership.year')"
                :validation-messages="{
                  required: $t('form_membership.required', {attribute: $t('form_membership.year')})
                }"
              />
              <FormulateInput
                :wrapper-class="['form-group required']"
                :label="$t('form_membership.occu')"
                type="text"
                v-model="model.occupation"
                name="occupation"
                validation="^required"
                :validation-messages="{
                  required: $t('form_membership.required', {attribute: $t('form_membership.occu')})
                }"
              />
              <FormulateInput
                :wrapper-class="['form-group required']"
                :label="$t('form_membership.country')"
                type="select"
                v-model="model.country"
                name="country"
                :options="model.countries"
                validation="^required"
                :placeholder="$t('form_membership.selectcountry')"
                :validation-messages="{
                  required: $t('form_membership.required', {attribute: $t('form_membership.country')})
                }"
                @change="changeCountry"
              />
              <FormulateInput
                :wrapper-class="['form-group required']"
                :label="$t('form_membership.city')"
                type="select"
                v-model="model.city"
                name="city"
                :options="model.cities"
                validation="^required"
                :placeholder="$t('form_membership.selectcity')"
                :validation-messages="{
                  required: $t('form_membership.required', {attribute: $t('form_membership.city')})
                }"
              />
              <FormulateInput
                :wrapper-class="['form-group required']"
                :label="$t('form_membership.address_one')"
                type="text"
                v-model="model.address_one"
                name="address_one"
                validation="^required"
                :validation-messages="{
                  required: $t('form_membership.required', {attribute: $t('form_membership.address_one')})
                }"
              />
              <FormulateInput
                :wrapper-class="['form-group']"
                :label="$t('form_membership.address_two')"
                type="text"
                v-model="model.address_two"
                name="address_two"
                :validation-messages="{
                }"
              />
              <FormulateInput
                :wrapper-class="['form-group required']"
                :label="$t('form_membership.post_code')"
                type="text"
                v-model="model.post_code"
                name="post_code"
                validation="^required"
                :validation-messages="{
                  required: $t('form_membership.required', {attribute: $t('form_membership.post_code')})
                }"
              />

            </div>
          </div>

          <div ref="uploadimage" class="stepmbs step1st" v-if="step == 1">
            <croppie ref="childComponent" @showCrop="showCrop" @hideCrop="hideCrop" @cropImage="cropImage"></croppie>
          </div>
          <div class="stepmbs step2nd" v-if="step == 2 && type != 'founder'">
            <div class="container">
              <FormulateInput
                :wrapper-class="['form-group required']"
                :label="'1. '+$t('form_membership.reason')"
                type="textarea"
                v-model="model.reason"
                name="reason"
              />
              <FormulateInput
                :wrapper-class="['form-group required']"
                :label="'2. '+$t('form_membership.usage_criteria')"
                type="textarea"
                v-model="model.usage_criteria"
                name="usage_criteria"
              />
              <FormulateInput
                :wrapper-class="['form-group required']"
                :label="'3. '+$t('form_membership.bring_to')"
                type="textarea"
                v-model="model.bring_to"
                name="bring_to"
              />
              <FormulateInput
                :wrapper-class="['form-group required']"
                :label="'4. '+$t('form_membership.member_other')"
                type="textarea"
                v-model="model.member_other"
                name="member_other"
              />
            </div>
          </div>
          <div :class="classStep" class="stepmbs" v-if="(step == 2 && type == 'founder') || step == 3 && type != 'founder'">
            <div class="container">
              <div class="row flexrow centerflex">
              	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
              		<p class="textcenter des-step2">{{ $t('form_membership.step2_desc') }}</p>
              	</div>
                <div :class="[option.id == model.membership_type ? 'active' : '', 'col-lg-3 col-md-3 col-sm-6 col-xs-12']" v-for="option in options">
                    <div class="options-mbs radius_4">
                      <div class="ctbd1"></div>
                      <div class="ctbd2"></div>
                      <div class="ctbd3"></div>
                      <div class="ctbd4"></div>
                      <div class="ctbd5"></div>
                      <div class="ctbd6"></div>
                      <div class="ctbd7"></div>
                      <div class="ctbd8"></div>
                      <label :for="option.id" class="content-tp-mbs">
                          <h3><span>{{ option.name }}</span></h3>
                          <ul>
                            <li v-for="item in option.benefit_members">{{ item.name }}</li>
                          </ul>
                      </label>
                      <div class="optionchose">
                        <div class="bottom-option-mbs1" v-for="(priceType, key) in option.price">
                          <div class="choseop">
                            <input @change="changeType(option, priceType)" :id="option.id+'-'+key" type="radio" :value="option.id+'-'+key" v-model="model.frequency_type">
                            <label :for="option.id+'-'+key">
                              {{ priceType.name }} - ${{ priceType.price }}
                            </label>
                          </div>
                        </div>
                      </div>
                    </div>
                </div>
              </div>
            </div> 
          </div>
          <div :class="classStep" class="stepmbs" v-if="(step == 3 && type == 'founder') || step == 4">
          	<div class="container">
              <div class="ctstep4">
                <h4 class="underline">{{ $t('form_membership.amountdue') }}</h4>
                <p class="priceop">${{ model.packagePrice }}</p>
                <h4>{{ $t('form_membership.for') }} {{ model.packageName }} {{ $t('form_membership.membership') }}</h4>
                <h4 class="underline">{{ $t('form_membership.payment') }}</h4>
              </div> 
              <div class="agreestep4">
	              <p v-if="model.frequency == 'month_3'">{{ $t('form_membership.descriptionlaststep1') }}</p>
                <p v-if="model.frequency != 'month_3'">{{ $t('form_membership.descriptionlaststep15') }}</p>
              </div>
              <div class="agreestep4 pl25">
	              <input id="checkbox" type="checkbox" v-model="model.agree">
	              <label for="checkbox">{{ $t('form_membership.descriptionlaststep2') }}</label>
              </div>
           	</div>

          </div>
          <div ref="stepbutton" class="container" v-if="step != 0">
            <div class="button2center">
            <button class="buttonmbs btback btf" v-if="step >1 && step<=steps.length" type="button" @click="back
            ">{{ $t('form_membership.back') }}</button>
            <a href="Javascript:;" class="buttonmbs btnext btf" v-if="step<steps.length" type="button" @click="next">{{ $t('form_membership.next') }}</a>
            <!-- <button class="btn btn-primary buttonmbs btnext" v-if="step<steps.length" type="button" @click="next">Next</button> -->
            <button class="buttonmbs btnext btf" v-if="step==steps.length" type="submit">{{ $t('form_membership.submit') }}</button>
            </div>
          </div>
        </form>
      </div>
    </section>
</template>
<script>
import moment from 'moment'
import {VueTelInput} from 'vue-tel-input'
// import VueFormGenerator from 'vue-form-generator'
import 'vue-form-generator/dist/vfg.css'
import Croppie from './Croppie.vue'

// Vue.use(VueFormGenerator)

export default {
  components: {Croppie},
  props: ['type'],
  data() {
    return {
      validphone: '',
      options: {},
      countries: [],
      steps: [],
      step: 1,
      image_preview: null,
      model: {
        countries: {"VN": "Vietnam"},
        cities: {},
        years: [],
        months: [],
        days: []
      },
      show: 0,
      err_text: ''
    };
  },
  mounted() {
    if(this.type == "founder"){
      this.model.type_user = 1
      this.steps = [
                this.$t('form_membership.step1_title'), 
                this.$t('form_membership.step3_title'), 
                this.$t('form_membership.step4_title')
                ]
    }else {
      this.model.type_user = 2
      this.steps = [
                this.$t('form_membership.step1_title'), 
                this.$t('form_membership.step2_title'), 
                this.$t('form_membership.step3_title'), 
                this.$t('form_membership.step4_title')
                ]
    }
    let _this = this
    // get countries
    if(this.type != "founder"){
      axios.get(
        './country'
      ).then(function(response){
        // console.log(response.data)
        _this.model.countries = response.data.data
      });
    }
    _this.model.years = {}
    for (var i = 1960; i < 2005; i++) {
      _this.model.years[i] = i
      // _this.model.years.push(i)
    }
    _this.model.months = {}
    for (var i = 1; i < 13; i++) {
      _this.model.months[i] = i
      // _this.model.months.push(i)
    }
    _this.model.days = {}
    for (var i = 1; i < 32; i++) {
      _this.model.days[i] = i
      // _this.model.days.push(i)
    }
    // get member package
    axios.get(
      './membership-type',{
        params:{
          dob: "12-08-1920",
          city: "ha noi",
          type: _this.type == 'founder' ? 1 : 2
        }
      }
    ).then(function(response){
      _this.options = response.data
    })
    // console.log(this.$refs)
  },
  created(){
    
  },
  computed: {
    classStep() {
      if(this.step == 2){
        return this.type == 'founder' ? "step3rd" : "step2nd"
      }else if(this.step == 3){
        return this.type == 'founder' ? "step4th" : "step3rd"
      }else if(this.step == 1){
        return "stepFirst"
      }else {
        return "stepLast"
      }
    }
  },
  methods: {
    showCrop(){
      this.$refs.step1.classList.add('d-none');
      this.$refs.stepbutton.classList.add('d-none');
    },
    hideCrop(){
      this.$refs.step1.classList.remove('d-none');
      this.$refs.stepbutton.classList.remove('d-none');
      let top = this.$refs.uploadimage.offsetTop
      window.scrollTo(0, top)
    },
    cropImage(data){
          this.image_preview = data;
    },
    backTo() {
      this.step = 1
    },
    crop() {
      this.backTo()
    },
    getKeyByValue(object, value) {
      return Object.keys(object).find(key => object[key] === value);
    },
    changeMonth: function(e){
      // console.log(e)
      this.model.days = {}
      let newVal = this.model.month
      if(newVal==2){
        for (var i = 1; i < 29; i++) {
        this.model.days[i] = i
        }
        return
      }
      if(newVal==4 || newVal==6 || newVal==9 || newVal==11 ){
        for (var i = 1; i < 31; i++) {
        this.model.days[i] = i
        }
        return
      }
      for (var i = 1; i < 32; i++) {
        this.model.days[i] = i
      }
    },
    changeCountry: function(){
      let _this = this
      let newVal = this.model.country
      axios.get(
        './province-by-country', {
          params:{
            country: newVal
          }
        }
      ).then(function(response){
        _this.model.cities = response.data.data
      });
    },
    checkPhone: function(e){
      if(!e.valid){
        this.validphone = this.$t('form_membership.error_phone')
      }else {
        this.validphone = ''
        this.model.phone = e.number.e164
      }
    },
    changeType(option, priceType){
      let vkl = this.model.frequency_type
      let arr_fre = vkl.split("-")
    	console.log(priceType)
      this.model.frequency = arr_fre[1]
      this.model.membership_type = option.id
      this.model.packageName = priceType.name
      this.model.packagePrice = priceType.price
      // this.model.price = option.price
    },
    onFileChange(e) {
      let _this = this
      const image = e.target.files[0];
      const reader = new FileReader();
      reader.readAsDataURL(image);
      reader.onload = e =>{
          this.image_preview = e.target.result;
          this.show = 1
          // this.$emit('croppie', e.target.result);
          // this.$refs.childComponent.croppie(e.target.result);
          this.$refs.croppieRef.bind({
            url: e.target.result
          });
      };
    },
    next: function(e){
      e.preventDefault()
      let _this = this
      let dob = [_this.model.year, _this.model.month, _this.model.day]
      _this.model.dob = moment(_this.model.year + "-" + ('0' + _this.model.month).slice(-2) + "-" + ('0' + _this.model.day).slice(-2)).format('YYYY-MM-DD')
      if(this.step == 1){
        var years_old = moment().diff(_this.model.dob, 'years');
        // console.log(years_old, _this.model.dob)

        if(
          !this.model.first_name || !this.model.last_name || !this.model.email || !this.model.phone
           || !this.model.gender || !this.model.year  || !this.model.month  || !this.model.day 
           || !this.model.occupation  || !this.model.country || !this.model.address_one
           || !this.model.city || !this.model.post_code
          ){
          toastr.error(this.$t('form_membership.general_error_message'))
        }else if(years_old < 18) {
          toastr.error(this.$t('form_membership.error_age'))
          return
        }else if(!this.image_preview) {
          toastr.error(this.$t('form_membership.error_avatar'))
          return
        }else {
        	// validate
  		    axios.post(
  		      './check-phone-email', {
  		          phone: _this.model.phone,
  		          email: _this.model.email
  		      }
  		    ).then(function(response){
  		      if(response.data.status == false){
  		        toastr.error(response.data.message)
              _this.step = 1
  		        return false
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
              _this.step++
              return
            }
  		    })

        }
      }

      if(this.step == 2 && this.type != 'founder'){
        if(
          !this.model.reason || !this.model.bring_to || !this.model.usage_criteria|| !this.model.member_other
          ){
          toastr.error(this.$t('form_membership.general_error_message'))
          return
        }else {
          this.step++
          return
        }
      }

      if((this.step == 3 && this.type != 'founder') || (this.step == 2 && this.type == 'founder')){
        if(!this.model.membership_type){
          toastr.error(this.$t('form_membership.error_select'))
        }else {
          this.step++
          return
        }
      }


    },
    submit: function(){
      console.log(this.step)
        if(!this.model.frequency ){
          toastr.error(this.$t('form_membership.error_select'))
          return
        }
        if(!this.model.agree ){
          toastr.error("Please agree")
          return
        }
        let _this = this
        let params = _this.model
        params.gender = (_this.model.gender == "Male") ? 0 : 1
        params.country = this.model.countries[this.model.country]
        params.city = this.model.cities[this.model.city]
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
</script>
