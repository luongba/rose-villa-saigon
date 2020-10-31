<template>
    <div>
        <div class="container">
          <form @submit.prevent="submit">
              <div class="row flexrow centerflex">
              	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
              		<p class="textcenter des-step2">{{ $t('form_membership.step2_desc') }}</p>
              	</div>
                <div :class="[option.id == membership_type ? 'active' : '', 'col-lg-6 col-md-6 col-sm-6 col-xs-12']" v-for="option in options">
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
                            <input @change="changeType(option, priceType)" :id="option.id+'-'+key" type="radio" :value="option.id+'-'+key" v-model="frequency_type">
                            <label :for="option.id+'-'+key">
                              {{ priceType.name }} - ${{ priceType.price }}
                            </label>
                          </div>
                        </div>
                      </div>
                    </div>
                </div>
              </div>
              <div class="button2center">
                <button ref="stepbutton" class="buttonmbs btnext btf" type="submit">{{ $t('form_membership.submit') }}</button>
              </div> 
          </form>
        </div>
    </div>
</template>
<script>
export default {
  props:['membership_type', 'frequency'],
  data() {
    return {
      frequency_type: null,
      options: []
    }
  },
  computed: {
  },
  created() {
    if(this.membership_type && this.frequency)
      this.frequency_type = this.membership_type+'-'+this.frequency
    let _this = this
    // get member package
    axios.get(
      './membership-type',{
        params:{
          dob: "12-08-1920",
          city: "ha noi",
          type: 1
        }
      }
    ).then(function(response){
      _this.options = response.data
    })
  },
  methods: {
    changeType(option, priceType){
      let vkl = this.frequency_type
      // let arr_fre = vkl.split("-")
    	// console.log(priceType)
      // this.frequency = arr_fre[1]
      // this.membership_type = option.id
    },
    submit() {
      let vkl = this.frequency_type
      let arr_fre = vkl.split("-")
      let frequency = arr_fre[1]
      let membership_type = arr_fre[0]
      let params = {
        membership_type: membership_type,
        frequency: frequency
      }
      axios.post(
          './change-package', params
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