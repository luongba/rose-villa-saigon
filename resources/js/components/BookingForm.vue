<template>
    <div id="modal-booking" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="res-popup" aria-hidden="true">
      
      <div class="modal-dialog modal-dialog-scrollable bookingpopup radius_6" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h3>{{text}}</h3>
            <button type="button" class="close hidden" data-dismiss="modal" aria-label="Close" ref="closeModal">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
            <div class="modal-body">
                <div class="inforose-popup">
                    <h4>{{ $t('form_membership.contactus') }}</h4>
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                            <p><i class="fas fa-phone-alt"></i>+84915877479</p>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                            <p><i class="far fa-clock"></i> 06:00 - 22:00</p>
                        </div>
                    </div>
                     <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                            <p><i class="far fa-envelope"></i> booking@rosevillsaigon.com</p>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                            <p><i class="fas fa-map-marker-alt"></i> {{ $t('form_membership.addressrovilla') }}</p>
                        </div>
                    </div>
                </div>
                <div class="form-booking-popup">
                  <h4>{{ $t('form_membership.fillinfo') }}</h4>
                  <form class="form-control-user" @submit.prevent="submit" data-parsley-validate>
                          <div class="row" v-if="model.type_booking==3">
                              <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <label>{{ $t('form_membership.startdate') }}</label>
                                  <div class="form-group popup-input-style2">
					            	<datepicker 
					            		input-class="form-control-elm" 
					            		v-model="model.start_at"
					            		format="MM/dd/yyyy"
					            		placeholder="mm/dd/yyyy"
					            		:disabled-dates="disabledDates"
					            		@input="changeDate($event, 'start_at')"
					            	></datepicker>
                                  </div>
                              </div>
                              <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <label>{{ $t('form_membership.enddate') }}</label>
                                  <div class="form-group popup-input-style2">
					            	<datepicker 
					            		input-class="form-control-elm" 
					            		v-model="model.end_at"
					            		format="MM/dd/yyyy"
					            		placeholder="mm/dd/yyyy"
					            		:disabled-dates="disabledDatesEnd"
					            		@input="changeDate($event, 'end_at')"
					            	></datepicker>
                                  </div>
                              </div>
                          </div>
                          <div class="row">
                              <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                  <div class="form-group popup-input-style2">
                                       <input type="text" v-model="model.name" class="form-control-elm" value="" placeholder="Name *" autocomplete="off" data-parsley-required>
                                  </div>
                              </div>
                              <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                  <div class="form-group popup-input-style2">
                                       <input type="email" v-model="model.email" class="form-control-elm" value="" placeholder="Email *" autocomplete="off" data-parsley-required>
                                  </div>
                              </div>
                          </div>
                          <div class="row">
                              <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                  <div class="form-group popup-input-style2">
                                       <input type="tel" v-model="model.phone" class="form-control-elm" value="" placeholder="Mobile Phone *" autocomplete="off" data-parsley-required>
                                  </div>
                              </div>
                              <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                  <div class="form-group popup-input-style2">
                                       <input type="number" v-model="model.number_guest" class="form-control-elm" value="" placeholder="No. of Guest *" autocomplete="off" data-parsley-required>
                                  </div>
                              </div>
                          </div>
                          <div class="row" v-if="model.type_booking!=3">
                              <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                  <div class="form-group popup-input-style2">
					            	<datepicker 
					            		input-class="form-control-elm" 
					            		v-model="model.date"
					            		format="MM/dd/yyyy"
					            		placeholder="mm/dd/yyyy"
					            		:disabled-dates="disabledDates"
					            	></datepicker>
                                  </div>
                              </div>
                              <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                  <div class="form-group popup-input-style2">
                                       <input type="time" v-model="model.time" class="form-control-elm" value="" placeholder="Event Date *" autocomplete="off" data-parsley-required>
                                  </div>
                              </div>
                          </div>
                          <div class="row">
                              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                  <div class="form-group popup-input-style2">
                                      <textarea v-model="model.description" placeholder="Special Request"></textarea>
                                  </div>
                              </div>
                          </div>
                          <!-- <div class="row">
                              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                  <div class="form-group popup-input-style2">
                                     <input type='submit' class='submitform radius_4 forgot_pass'  value='BOOKING NOW'>
                                  </div>
                              </div>
                          </div> -->
                          <div class="row buttonpopup">
                              <div class="form-group popup-input-style2">
                                 <input type='submit' class='submitform radius_4 forgot_pass'  value='BOOKING NOW'>
                              </div>
                          </div>
                  </form>
                </div>
            </div>
          </div>
        </div>
    </div>
</template>

<script>
import Datepicker from 'vuejs-datepicker'
import moment from 'moment'
import $ from 'jquery'
import { BModal, VBModal } from 'bootstrap-vue'
export default {
  name: 'booking-form',
  props:['text'],
  components: {
    Datepicker
  },
  data() {
  	const now = new Date()
    const today = new Date(now.getFullYear(), now.getMonth(), now.getDate())
  	const minDate = new Date(today)
   return {
    model: {
      type_booking: 3,
    }
   }
  },
  computed: {
  	disabledDates() {
  		return {
	  		to: new Date()
  		}
  	},
  	disabledDatesEnd() {
  		let start_at = this.model.start_at != '' ? this.model.start_at : new Date()
  		return {
	  		to: start_at ?? new Date()
  		}
  	}
  },
  created() {
    this.$eventBus.$on('openBooking', (booking_id, type) => {
      this.model.booking_id = booking_id
      this.model.type_booking = type
    })
  },
  methods: {
  	changeDate: function(e, model){
  		if(this.model.start_at && this.model.end_at){
	  		var from = moment(this.model.start_at)
			var to = moment(this.model.end_at);

			if (from > to) {
				if(model == 'start_at'){
			   		this.model.end_at = ''
				}else {
			   		this.model.start_at = ''
				}
			}
		}
  	},
    submit: function(){
      let _this = this
      let params = _this.model
      if(this.model.type_booking != 3){
        params.start_at = this.model.date +" "+ this.model.time
      }else {
      	params.start_at = moment(this.model.start_at).format('YYYY-MM-DD')
      	params.end_at = moment(this.model.end_at).format('YYYY-MM-DD')
      }
      params.date = moment(this.model.date).format('YYYY-MM-DD')
      axios.post(
          './booking', params
        ).then(function(response){
          if(response.data.status == false){
            toastr.error(response.data.message)
          }else {
            _this.model = {}
            toastr.success(response.data.message)
            _this.$refs.closeModal.click();
          }
        });
    }
  }
}
</script>
