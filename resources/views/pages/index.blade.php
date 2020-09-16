
@extends('master')
@section('preload')

  <div class="bg_rem" id="bg_rem">
  	<div class="biglogo">
  		<img class="scale0" src="{{asset('public/images/logo/logo_big_landing.png')}}" class="" data-sampler="Rose Villa Sai Gon" />
  	</div>
  	<div class="textlanding scale0">
      <h1 class="wctext">Welcome To <br/>Rosevilla Sai Gon</h1>
      <p>-2020-</p>
      <p>Elegant escapism for the eternally curious</p>
      <div class="openbutton scale0">
        <span class="clickviewsite">Enter</span>
        <span class="soundon">Sound On</span>
      </div>
    </div>


{{--   	<div class="smalllogo">
  		<img src="{{asset('public/images/logo/logo_small_landing.png')}}" class="" data-sampler="Rose Villa Sai Gon" />
  	</div> --}}
    <div id="sky">
      <div id="cloud1" class="cloud"></div>
      <div id="cloud2" class="cloud"></div>
      <div id="cloud3" class="cloud"></div>
      <div id="cloud4" class="cloud"></div>
    </div>
  </div>
  <div class="loading">
    <div class="spinner">
          <i class="fas fa-spinner fa-spin fa-3x fa-fw"></i>
      </div>
  </div>
  {{-- @if(!session()->has('rem')) --}}
  <div id="page-wrap" class="page-wrap">
    
     <div id="canvas"></div>
      <div class="curtain first-curtain">
        <img src="{{asset('public/images/rem/r1.jpeg')}}" class="" data-sampler="simplePlaneTexture" />
      </div>
      <div class="curtain second-curtain">
      <img src="{{asset('public/images/rem/r1.jpeg')}}" class="" data-sampler="simplePlaneTexture" />
      </div>
  </div>
  <audio id="audio" loop>
    <source type="audio/mp3" src="{{asset('public/assets/audio/Louis Armstrong - La Vie En Rose.mp3')}}">
  </audio>
  <div class="audio-control loop">
  		<span class="turnon" onclick="disableMute()" title="TURN ON SOUND"></span>
  		<span class="turnoff" onclick="enableMute()" title="MUTED"></span>
  </div>

  
@endsection
@section('style')
<style>
    #page-wrap {
      visibility: hidden;
    }
  .header,
  .content-custom-width {
      visibility: hidden;
    }
  </style>
@endsection
@section('content')
  <div class="landing landingstyle">
    <div class="innerpage-style1 fixheightfull">
    	<span class="leftpageimg"></span>
   		<span class="rightpageimg"></span>	
      	<span class="bgimg"></span>
	    <div class="container">
	        {{-- @include('layouts.nav') --}}
	    </div>
    </div>
  </div>
@endsection
@section('script')
<script src="{{asset('public/js/curtains.js')}}" type="text/javascript"></script>
<script src="{{asset('public/js/simple.plane.setup.js')}}" type="text/javascript"></script>
<script src="{{asset('public/js/vendor.js')}}"></script>
<script src="{{asset('public/js/jqfloat.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pixi.js/5.1.3/pixi.min.js"></script>

<script type="text/javascript">
  const app = new PIXI.Application();
document.body.appendChild(app.view);

const sprites = new PIXI.ParticleContainer(10000, {
    scale: true,
    position: true,
    rotation: true,
    uvs: true,
    alpha: true,
});
app.stage.addChild(sprites);

// create an array to store all the sprites
const maggots = [];

const totalSprites = app.renderer instanceof PIXI.Renderer ? 10000 : 100;

for (let i = 0; i < totalSprites; i++) {
    // create a new Sprite
    const dude = PIXI.Sprite.from('http://rosevilla.tntechs.com.vn/public/images/logo/logo_big_landing.png');

    dude.tint = Math.random() * 0xE8D4CD;

    // set the anchor point so the texture is centerd on the sprite
    dude.anchor.set(0.5);

    // different maggots, different sizes
    dude.scale.set(0.8 + Math.random() * 0.3);

    // scatter them all
    dude.x = Math.random() * app.screen.width;
    dude.y = Math.random() * app.screen.height;

    dude.tint = Math.random() * 0x808080;

    // create a random direction in radians
    dude.direction = Math.random() * Math.PI * 2;

    // this number will be used to modify the direction of the sprite over time
    dude.turningSpeed = Math.random() - 0.8;

    // create a random speed between 0 - 2, and these maggots are slooww
    dude.speed = (2 + Math.random() * 2) * 0.2;

    dude.offset = Math.random() * 100;

    // finally we push the dude into the maggots array so it it can be easily accessed later
    maggots.push(dude);

    sprites.addChild(dude);
}

// create a bounding box box for the little maggots
const dudeBoundsPadding = 100;
const dudeBounds = new PIXI.Rectangle(
    -dudeBoundsPadding,
    -dudeBoundsPadding,
    app.screen.width + dudeBoundsPadding * 2,
    app.screen.height + dudeBoundsPadding * 2,
);

let tick = 0;

app.ticker.add(() => {
    // iterate through the sprites and update their position
    for (let i = 0; i < maggots.length; i++) {
        const dude = maggots[i];
        dude.scale.y = 0.95 + Math.sin(tick + dude.offset) * 0.05;
        dude.direction += dude.turningSpeed * 0.01;
        dude.x += Math.sin(dude.direction) * (dude.speed * dude.scale.y);
        dude.y += Math.cos(dude.direction) * (dude.speed * dude.scale.y);
        dude.rotation = -dude.direction + Math.PI;

        // wrap the maggots
        if (dude.x < dudeBounds.x) {
            dude.x += dudeBounds.width;
        } else if (dude.x > dudeBounds.x + dudeBounds.width) {
            dude.x -= dudeBounds.width;
        }

        if (dude.y < dudeBounds.y) {
            dude.y += dudeBounds.height;
        } else if (dude.y > dudeBounds.y + dudeBounds.height) {
            dude.y -= dudeBounds.height;
        }
    }

    // increment the ticker
    tick += 0.1;
});

</script>
<script type="text/javascript">
      function ready() {
          setTimeout(function(){
            $('body').find('.loading').remove();
            $('body').find('.header').css('visibility','visible');
            $('body').find('#page-wrap').css('visibility','visible');
            $('body').find('.content-custom-width').css('visibility','visible');
            $('body').find('.scale0').addClass('scale1');
          }, 1000);
      }
      $(document).on('click', '.clickviewsite', function(){
        // $(this).closest('.bg_rem').addClass("box-transition box-hidden");
         $(this).closest('.bg_rem').fadeOut(4000); 
        $('.wctext').addClass('bkv');
        $('#cloud1').addClass('ltout');
        $('#cloud2').addClass('lbout');
        $('#cloud3').addClass('rbout');
        $('#cloud4').addClass('rtout');
        var audio = document.getElementById("audio");
        audio.play();
        
      });
      // $(document).on('transitionend webkitTransitionEnd oTransitionEnd', '.bg_rem', function () {
      //   $(this).hide('slow');
      //     var audio = document.getElementById("audio");
      //     setTimeout(function(){
      //         // audio.remove();
      //     }, 1000);
      // });

      
      var vid = document.getElementById("audio");

		function enableMute() { 
		  vid.muted = true;
		  $('.audio-control').removeClass('control-on').addClass('control-off');
		} 

		function disableMute() { 
		  vid.muted = false;
		  $('.audio-control').removeClass('control-off').addClass('control-on');
		} 
      document.addEventListener('DOMContentLoaded', function() {
        /*var box = document.getElementsByClassName('bg_rem')[0],
            button = document.getElementsByClassName('bg_rem')[0];

        button.addEventListener('click', function(e) {
          if (box.classList.contains('box-hidden')) {
            // show
            box.classList.add('box-transition');
            box.clientWidth; // force layout to ensure the now display: block and opacity: 0 values are taken into account when the CSS transition starts.
            box.classList.remove('box-hidden');
          } else {
            // hide
            box.classList.add('box-transition');
            box.classList.add('box-hidden');
          }
        }, false);

        box.addEventListener('transitionend', function() {
          box.classList.remove('box-transition');
        }, false);*/

      });
      
      document.addEventListener("DOMContentLoaded", ready);
    </script>
    <script>
$(document).ready(function() {

  //jqfloat.js script
  $('.cloud').each(function() {
    $(this).jqFloat({
      width:Math.floor(Math.random()*11)*11,
      height:11,
      speed:Math.floor(Math.random()*11)*100 + 500
    });
  }); 

});
</script>
@endsection