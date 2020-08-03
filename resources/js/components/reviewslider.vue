<template>
   <div class="api-calling">
   		<div id="testimonial-slider" class="carousel slide carousel-fade" data-ride="carousel">
	   		<ol class="carousel-indicators">
	          	<li data-target="#testimonial-slider" data-slide-to="0" class="active"></li>
	          	<li data-target="#testimonial-slider" data-slide-to="1"></li>
	          	<li data-target="#testimonial-slider" data-slide-to="2"></li>
	        </ol>
	       <div class="carousel-inner" >
	       		<div :class="[key==0 ? 'active' : '', 'carousel-item']" v-for="(reviewelm,key) in rvsl">
	                <p v-html="reviewelm.description"></p>
	                <h4><span>{{ reviewelm.topic }}</span><br/>{{ reviewelm.reviewers }}</h4>
	            </div>  
	       </div>
	    </div>
   </div>
</template>

<script>
	
   	export default {
   		name: 'vtno1',
   		props:['rvsl'],
	    mounted() {
	        console.log(this.rvsl)
	    },
   	}
</script>

<style lang="scss" scoped>

</style>
