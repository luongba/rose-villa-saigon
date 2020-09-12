<template>
    <div>
        <form class="form-mbs1" method="post" action="" @submit.prevent="submit">
          <div ref="step1" class="stepmbs step1st">
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
              <div class="required field-input formulate-input">
                <label for="last-name"><span>{{ $t('form_membership.phonenumber') }}</span></label>
                <div class="field-wrap form-group ">
                  <vue-tel-input 
                  	mode="international"
                  	v-model="model.phone" 
                  	:preferredCountries="['VN', 'US']" 
                  	:placeholder="$t('form_membership.phonenumber')"
                    disabled
                  ></vue-tel-input>
                </div>
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
                disabled
              />
              <FormulateInput
                :wrapper-class="['form-group required']"
                :label="$t('form_membership.gender')"
                type="select"
                v-model="model.gender"
                name="gender"
                :options="{0: $t('form_membership.gender_male'), 1: $t('form_membership.gender_female'), 2: $t('form_membership.gender_other'), 3: $t('form_membership.gender_secret')}"
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
                v-model="day"
                name="day"
                :options="days"
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
                v-model="month"
                name="month"
                :options="months"
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
                v-model="year"
                name="year"
                :options="years"
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
                :options="countries"
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
                :options="cities"
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
            <div ref="uploadimage" class="stepmbs step1st">
              <croppie ref="childComponent" :imageUrl="avatar" @showCrop="showCrop" @hideCrop="hideCrop" @cropImage="cropImage"></croppie>
            </div>
            <button ref="stepbutton" class="buttonmbs btnext btf" type="submit">{{ $t('form_membership.submit') }}</button>
        </form>
    </div>
</template>
<script>
import moment from 'moment'
import Croppie from './Croppie.vue'
export default {
  props:['user', 'avatar'],
  components: {Croppie},
  data() {
    return {
      countries: {"VN": "Vietnam"},
      cities: {},
      years: {},
      months: {},
      days: {},
      model: {},
      dob: {},
      day: null,
      month: null,
      year: null,
      image_preview: null
    }
  },
  created() {
    let _this = this
    this.model = this.user
    // get countries
    // if(this.user.type_user){
    //   axios.get(
    //     './country'
    //   ).then(function(response){
    //     _this.countries = response.data.data
    //   });
    // }
    // let newVal = this.user.country
    // axios.get(
    //   './province-by-country', {
    //     params:{
    //       country: newVal
    //     }
    //   }
    // ).then(function(response){
    //   _this.cities = response.data.data
    // });
    _this.years = {}
    for (var i = 1960; i < 2005; i++) {
      _this.years[i] = i
    }
    _this.months = {}
    for (var i = 1; i < 13; i++) {
      _this.months[i] = i
    }
    _this.days = {}
    for (var i = 1; i < 32; i++) {
      _this.days[i] = i
    }
      var mm = moment(this.user.dob)
      this.year = mm.get('year')
      this.month = mm.get('month') +1
      this.day = mm.get('date')
  },
  computed: {
    // countries() {
    //   if(this.user.type_user){
    //     var vl = {}
    //     axios.get(
    //       './country'
    //     ).then(function(response){
    //       vl = response.data.data
    //     })
    //     console.log(vl);
    //     return vl
    //   }
    // },
    // cities() {
    //   let newVal = this.user.country
    //   var vl = {}
    //   axios.get(
    //     './province-by-country', {
    //       params:{
    //         country: newVal
    //       }
    //     }
    //   ).then(function(response){
    //     vl = response.data.data
    //   })
    //   return vl
    // }
    // model() {
    //   var model = this.user
    //   return model
    // }
  },
  async mounted() {
      const { data } = await axios.get('./country');
      this.countries = data.data;

      let _this = this
      let newVal = this.getKeyByValue(this.countries, this.user.country)
      this.model.country = newVal
      axios.get(
        './province-by-country', {
          params:{
            country: newVal
          }
        }
      ).then(function(response){
        _this.cities = response.data.data
        let city_key = _this.getKeyByValue(response.data.data, _this.user.city)
        _this.model.city = city_key
      });
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
    changeMonth: function(e){
      // console.log(e)
      this.days = {}
      let newVal = this.model.month
      if(newVal==2){
        for (var i = 1; i < 29; i++) {
        this.days[i] = i
        }
        return
      }
      if(newVal==4 || newVal==6 || newVal==9 || newVal==11 ){
        for (var i = 1; i < 31; i++) {
        this.days[i] = i
        }
        return
      }
      for (var i = 1; i < 32; i++) {
        this.days[i] = i
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
        _this.cities = response.data.data
      });
    },
    getKeyByValue(object, value) {
      return Object.keys(object).find(key => object[key] === value);
    },
    submit: function(){
      let _this = this
      _this.model.dob = moment(_this.year + "-" + ('0' + _this.month).slice(-2) + "-" + ('0' + _this.day).slice(-2)).format('YYYY-MM-DD')
      
      let model = this.model
      var params = {
        first_name: model.first_name,
        last_name: model.last_name,
        gender: model.gender,
        dob: model.dob,
        occupation: model.occupation,
        address_one: model.address_one,
        address_two: model.address_two,
        post_code: model.post_code,
      }
      params.country = this.countries[this.model.country]
      params.city = this.cities[this.model.city]
      params.avatar = _this.image_preview
      
      axios.post(
          './change-profile', params
        ).then(function(response){
          if(response.data.status == false){
            toastr.error(response.data.message)
          }else {
            toastr.success(response.data.message)
          }
          console.log(_this.model);
        });

    }
  }
}
</script>