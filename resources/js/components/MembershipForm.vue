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
          <h3 v-if="model.type_user == 0">Early Founder</h3>
          <h3 v-if="model.type_user != 0">Regular Member</h3>
          <ul class="step-membership">
            <li v-for="(item,key) in steps" :class="step==key+1 ? 'currentstep' : ''">
              <span class="numberstep radius_50">{{ key+1 }}</span><span class="textli">{{ item }}</span>
            </li>
          </ul>
        </div>
      </div>
      <div class="stepmbs step1st">
        <form class="form-mbs1" method="post" action="" @submit.prevent="submit" style="float: left; width: 100%">
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
              <button class="btn btn-primary buttonmbs" v-if="step<3" type="button" @click="next">Next</button>
            </div>
          </div>
          <div class="stepmbs step2nd" v-if="step == 2">
            <div class="container">
              <vue-form-generator :schema="step2" :model="model" :options="formOptions"></vue-form-generator>
              <button class="btn btn-primary buttonmbs" v-if="step<3" type="button" @click="next">Next</button>
            </div>
          </div>
          <div class="stepmbs step3rd" v-if="step == 3">
            <div class="container">
              <div class="row flexrow">
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
            <div class="container">
              <button class="btn btn-primary buttonmbs" v-if="step==3" type="submit">Submit</button>
            </div>
        </form>
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
      countries: [],
      steps: [
        'About You', 'Why You?', 'Membership Type'
      ],
      step: 1,
      user_data: [],
      type: null,
      image_preview: null,
      model: {
        countries: [],
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
              hideNoneSelectedText: true,
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
              hideNoneSelectedText: true,
            },
            styleClasses: 'birthday_select',
            values: function(model, schema){
              return model.months
            },
            required: true
          },
          {
            type: 'select',
            label: 'Day',
            model: 'day',
            selectOptions: {
              hideNoneSelectedText: true,
            },
            styleClasses: 'bithday_select last',
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
            label: 'City',
            model: 'city',
            required: true,
            validator: VueFormGenerator.validators.string
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
      formOptions: {
        validateAfterLoad: false,
        validateAfterChanged: false,
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
    });
    axios.get(
      'https://restcountries.eu/rest/v2/all'
    ).then(function(response){
      response.data.forEach(function(item){
        _this.model.countries.push(item.name)
      })
    });
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
      let vkl = moment(_this.model.year + " " + _this.model.month + " " + _this.model.day).format('YYYY-MM-DD')
      console.log(vkl)
      if(this.step == 0){
          this.step++
          return
      }
      if(this.step == 1){
        if(
          !this.model.first_name || !this.model.last_name || !this.model.email
           || !this.model.gender || !this.model.year  || !this.model.month  || !this.model.day 
           || !this.model.occupation  || !this.model.country || !this.model.address_one
           || !this.model.city || !this.model.post_code
          ){
          toastr.error("Please fill all fields")
        }else if(!this.image_preview) {
          toastr.error("Please select Avatar")
          return
        }else {
          this.step++
          return
        }
      }

      if(this.step == 2){
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
    },
    submit: function(){
      console.log(this.step)
        let _this = this
        let params = _this.model
        params.gender = (_this.model.gender == "Male") ? 0 : 1
        params.dob = moment(_this.model.year + " " + _this.model.month + " " + _this.model.day).format('YYYY-MM-DD')
        params.avatar = _this.image_preview
        console.log(params)
        return
        axios.post(
          './register-membership', params
        ).then(function(response){
          if(response.data.status == false){
            toastr.error(response.data.message)
          }else {
            toastr.success(response.data.message)
            setTimeout(() => window.location.href = './', 1500)
          }
        });
    }
  }
}
</script>
