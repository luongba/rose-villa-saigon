<template>
    <div>
        vbvdbds
    </div>
</template>
<script>
export default {
  props:['user'],
  data() {
   return {
    model: {
        
    },
    options: []
   }
  },
  created() {
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
  }
}
</script>