<template>
  <div class="crop-image">
    <div class="action d-flex">
      <h2>Crop Image</h2>
      <div class="d-flex">
        <button class="btn-secondary" @click="closeCrop">
          Cancel
        </button>
        <button class="btn-secondary" @click="getCropImage">
          Save
        </button>
      </div>
    </div>
    <div class="crop-window">
      <vue-cropper
        ref="cropper"
        v-bind="options"
      />
      <div class="d-flex actions-wrapper">
        <range-slider
          class="slider"
          v-bind="sliderOptions"
          v-model="sliderValue">
        </range-slider>
        <div class="rotate-action d-flex">
          <!-- <button @click="rotateLeft" class="btn"> -->
            <span class="glyphicon glyphicon-arrow-left"></span>
          <!-- </button> -->
          <button @click="rotateRight" class="btn">
            <!-- <img src="@/assets/logo.png" alt="icon-export" class="icon-export"> -->
          </button>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { VueCropper } from 'vue-cropper'
import RangeSlider from 'vue-range-slider'

export default {
  props: ['imageUrl'],
  data () {
    return {
      sliderOptions: {
        min: 10,
        max: 100,
        step: 5
      },
      sliderValue: 15,
      options: {
        img: this.imageUrl,
        full: true,
        canMove: true,
        fixedBox: false,
        autoCropWidth: 280,
        autoCropHeight: 280,
        autoCrop: true,
        fixedNumber: [1, 1],
        fixed: true
      }
    }
  },
  components: {
    VueCropper,
    RangeSlider
  },
  methods: {
    rotateLeft () {
      this.$refs.cropper.rotateLeft()
    },
    rotateRight () {
      this.$refs.cropper.rotateRight()
    },
    closeCrop () {
      this.$emit('close')
    },
    getCropImage () {
      this.$refs.cropper.getCropData(data => {
        this.$parent.$emit('get-data', data)
        this.closeCrop()
      })
    }
  },
  watch: {
    sliderValue (newVal, oldVal) {
      return this.$refs.cropper.changeScale(newVal - oldVal)
    }
  }
}
</script>