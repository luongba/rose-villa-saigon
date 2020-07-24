<template>
	<div class="slider">
		<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
			<ol class="carousel-indicators">
				<li data-target="#carouselExampleIndicators" data-slide-to="0"></li>
				<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
				<li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
				<li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
				<li data-target="#carouselExampleIndicators" data-slide-to="4"></li>
			</ol>
			<div class="carousel-inner" v-for="elmimg in data">
				<div class="carousel-item">
					 {{elmimg}}
				</div>
			</div>
		</div>
	</div>
</template>

<script>
  export default {
    data() {
      return {
        data: [
          'images/slider1.png',
          'images/slider1.png',
		  'images/slider1.png',
		  'images/slider1.png',
		  'images/slider1.png',
        ],
      };
    },
  };
</script>

