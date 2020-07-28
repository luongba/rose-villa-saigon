<template>
  <div>
    <b-button data-toggle="modal" data-target="#modal-booking" :class="classname" @click="click">{{text}}</b-button>
  </div>
</template>

<script>
import { BModal, VBModal } from 'bootstrap-vue'
export default {
  name: 'button-show-modal',
  props:['text', 'classname', 'type', 'booking_id'],
  data() {
   return {
   }
  },
  mounted() {
      console.log(this.text)
  },
  methods: {
    click: function(){
      this.$eventBus.$emit('openBooking', this.booking_id, this.type)
    }
  }
}
</script>
