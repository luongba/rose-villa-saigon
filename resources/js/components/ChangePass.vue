<template>
    <div>
      <form @submit.prevent="submit">
        <div ref="step1" class="stepmbs step1st">
          <div class="container">
            <FormulateInput
            :wrapper-class="['form-group']"
            :label="$t('old_password')"
            type="password"
            v-model="old_password"
            validation="^required"
            :validation-messages="{
              required: $t('form_membership.required', {attribute: $t('old_password')})
            }"
          />
          <FormulateInput
            :wrapper-class="['form-group']"
            :label="$t('new_password')"
            type="password"
            v-model="new_password"
            validation="^required"
            :validation-messages="{
              required: $t('form_membership.required', {attribute: $t('new_password')})
            }"
          />
          <FormulateInput
            :wrapper-class="['form-group']"
            :label="$t('confirm_password')"
            type="password"
            v-model="confirm_password"
            validation="^required"
            :validation-messages="{
              required: $t('form_membership.required', {attribute: $t('confirm_password')})
            }"
          />
          </div>
          <div class="button2center">
            <button ref="stepbutton" class="buttonmbs btnext btf" type="submit">{{ $t('form_membership.submit') }}</button>
          </div>
        </div>
      </form>
    </div>
</template>

<script>
export default {
  data() {
    return {
      old_password: null,
      new_password: null,
      confirm_password: null
    }
  },
  methods: {
    submit() {
      let params = {
        old_password: this.old_password,
        new_password: this.new_password,
        confirm_password: this.confirm_password
      }
      axios.post(
          './change-pass', params
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