<template>
  <div> 
    <div v-if="show==1" class="form-group valid required field-input">
      <label for="ava"><span>{{ $t('form_membership.avatar') }}</span></label>
          <div id="preview" style="display:flex;">
            <img width="100" v-if="cropped" :src="cropped" />
          </div>
      <div class="field-wrap">
        <div class="wrapper">
          <div class="ct-upload">
            <input id="ava" type="file" accept="image/*" @change="croppie">
            <span class="testupload">{{ $t('form_membership.upload_photo') }}</span>
          </div>
          <p class="textcenter des-uploadavt">{{ $t('form_membership.upload_photo_desc') }}</p>
        </div> 
      </div>
    </div>
    <div v-if="show==2">
      <vue-croppie ref="croppieRef" 
        :enableResize="false"
        :enableOrientation="false" 
        :boundary="{ width: 450, height: 300}" 
        :viewport="{ width:300, height:300, 'type':'circle' }"
        >
      </vue-croppie>
      <div class="container">
        <div class="button2center">
          <button class="btn buttonmbs btback btf" type="button" @click="backTo">{{ $t('form_membership.back') }}</button>
          <button class="btn buttonmbs btnext btf" type="button" @click="crop">{{ $t('form_membership.submit') }}</button>
      </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: ['imageUrl'],
  data() {
    return {
      croppieImage: '',
      cropped: null,
      show: 1
    };
  },
  mounted() {
    this.cropped = this.imageUrl
      // console.log(this.$refs.croppieRef)
  },
  methods: {
    croppie (e) {
      this.show = 2
      this.$emit('showCrop')
      var files = e.target.files || e.dataTransfer.files;
      if (!files.length) return;

      var reader = new FileReader();
      reader.onload = e => {
        // console.log(this.$refs.croppieRef)
        this.$refs.croppieRef.bind({
          url: e.target.result
        });
      };

    reader.readAsDataURL(files[0]);
    },
    backTo(){
      this.$emit('hideCrop')
      this.show = 1
    },
    crop() {
      this.$emit('hideCrop')
      this.show = 1
      // Options can be updated.
      // Current option will return a base64 version of the uploaded image with a size of 600px X 450px.
      let options = {
        type: 'base64',
        size: { width: 400, height: 250 },
        format: 'jpeg',
        circle: true
      };
      this.$refs.croppieRef.result(options, output => {

        this.$emit('cropImage', output)
        this.cropped = this.croppieImage = output;
          // console.log(this.croppieImage);
        });
      }
  }
};
</script>