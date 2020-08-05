<template>
   <div class="api-calling">
      <div id="testimonial-slider" class="carousel slide carousel-fade" data-ride="carousel">
        <ol class="carousel-indicators">
              <li data-target="#testimonial-slider" data-slide-to="0" class="active"></li>
              <li data-target="#testimonial-slider" data-slide-to="1"></li>
              <li data-target="#testimonial-slider" data-slide-to="2"></li>
          </ol>
         <div class="carousel-inner" >
            <div  :class="[key==0 ? 'active' : '', 'carousel-item']" v-for="(rv,key) in review" class="carousel-item">
                  <p v-html="rv.description"></p>
                  <h4><span>{{ rv.topic }}</span><br/>{{ rv.reviewers }}</h4>
              </div>  
         </div>
      </div>
   </div>
</template>

<script>
   export default {
      data() {
           return {
               review: []
           }
       },
       created() {
        axios.post('./reviews')
           .then(response => this.review = response.data );
       }

   }
</script>

<style lang="scss" scoped>

</style>

