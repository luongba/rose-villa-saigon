<template>
  <form class="form-ct" method="post" @submit.prevent="submit()">
    <div class="form-group">
      <input type="text" class="form-control" id="name" v-model="fdata.name" :placeholder="$t('pages.Your name')">
    </div>
    <div class="form-group">
      <input type="tel" class="form-control" id="phone" v-model="fdata.phone" :placeholder="$t('pages.Phone')">
    </div>
    <div class="form-group">
       <input type="email" class="form-control" v-model="fdata.email" placeholder="Email">
    </div>
    <div class="form-group">
       <input type="text" class="form-control" v-model="fdata.title" :placeholder="$t('pages.Title')" value="">
    </div>
    <div class="form-group">
      <textarea class="form-control" v-model="fdata.content" rows="3" :placeholder="$t('pages.Content')" ></textarea>
    </div>
    <div class="submit-formct">
      <button type="submit" class="btn btn-primary submitct">{{ $t('pages.Submit') }}</button>
    </div>
</form>
</template>
<script>
export default {
  name: 'ContactForm',
  data() {
    return {
      fdata: {}
    };
  },
  methods: {
    submit() {
      let _this = this
        axios.post(
          './contact',
          this.fdata
        ).then(function(response){
          // _this.err_text = ''
          if(response.data.status == false){
            toastr.error(response.data.message)
          }else {
            _this.fdata = {}
            toastr.success(response.data.message)
          }
        });
      }
  }
};
</script>