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
                    <h4>Contact Us</h4>
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                            <p><i class="fas fa-phone-alt"></i> 0123456789</p>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                            <p><i class="far fa-clock"></i> 06:00 - 22:00</p>
                        </div>
                    </div>
                     <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                            <p><i class="far fa-envelope"></i> resortrestaurant@rosevillsaigon.com</p>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                            <p><i class="fas fa-map-marker-alt"></i> No2 , District 9, Hồ Chí Minh city</p>
                        </div>
                    </div>
                </div>
                <div class="form-booking-popup">
                  <h4>Fill in the infomation</h4>
                  <form class="form-control-user" @submit.prevent="submit" data-parsley-validate>
                          <div class="row" v-if="model.type_booking==3">
                              <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <label>Start Date</label>
                                  <div class="form-group popup-input-style2">
                                       <input type="date" v-model="model.start_at" class="form-control-elm" value="" placeholder="Start Date" autocomplete="off" data-parsley-required>
                                  </div>
                              </div>
                              <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <label>End Date</label>
                                  <div class="form-group popup-input-style2">
                                       <input type="date" v-model="model.end_at" class="form-control-elm" value="" placeholder="End Date *" autocomplete="off" data-parsley-required>
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
                                       <input type="date" v-model="model.date" class="form-control-elm" value="" placeholder="Event Time *" autocomplete="off" data-parsley-required>
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
import $ from 'jquery'
import { BModal, VBModal } from 'bootstrap-vue'
export default {
  name: 'booking-form',
  props:['text'],
  data() {
   return {
    model: {
      type_booking: 3
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
    submit: function(){
      let _this = this
      let params = _this.model
      if(this.model.type_booking != 3){
        params.start_at = this.model.date +" "+ this.model.time
      }
      axios.post(
          './booking', params
        ).then(function(response){
          if(response.data.status == false){
            toastr.error(response.data.message)
          }else {
            this.$refs.closeModal.click();
            _this.model = {}
            toastr.success(response.data.message)
          }
        });
    }
  }
}
</script>
