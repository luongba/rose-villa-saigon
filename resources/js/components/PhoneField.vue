<!-- phonefield.vue -->
<template>
    <vue-tel-input 
        v-model="value"
        :preferredCountries="['VN', 'US']" 
        :disabled="disabled"
        :maxlength="schema.max"
        :placeholder="schema.placeholder"
        :readonly="schema.readonly"
        placeholder="09xx-xxx-xxx"
        @validate="checkPhone"
      >
    </vue-tel-input>
</template>

<script>
  import {VueTelInput} from 'vue-tel-input'
  import { abstractField } from "vue-form-generator";

  export default {
    mixins: [ abstractField ],

    methods: {
      checkPhone: function(e){
        console.log(e.valid)
      }
    }
  }
</script>