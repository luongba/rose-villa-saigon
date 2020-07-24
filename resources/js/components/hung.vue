<template>
	<div>
	  <p>{{ cuto }}</p>
    <input type="submit" name="" value="click" @click="comte"> 
	</div>
</template>

<script>
  export default {
    data() {
      return {
        cuto: "hung pro"
      };
    },
    methods: {
      // sayHello() {
      //   return "hung pro"
      // }
      comte() {
        alert('hahaha')
      }
    },
    computed: {
      
      
    }
  };
</script>
