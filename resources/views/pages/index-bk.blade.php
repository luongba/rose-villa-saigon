
@extends('master')
@section('preload')
  <canvas id="mycanvas"></canvas>
  <div class="bg_rem" id="bg_rem">
    {{-- <canvas id="mycanvas"></canvas> --}}
  	<div class="biglogo">
  		<img class="scale0" src="{{asset('public/images/logo/logo_big_landing.png')}}" class="" data-sampler="Rose Villa Sai Gon" />
  	</div>
  	<div class="textlanding scale0">
      <p>-2020-</p>
      <p>Private Members Club</p>
      <p>Elegant escapism for the eternally curious</p>
    </div>
	 <div class="smalllogo">
  		<img src="{{asset('public/images/logo/logo_small_landing.png')}}" class="" data-sampler="Rose Villa Sai Gon" />
  	</div>

  </div>
  <div class="welcome-layout">
        <div class="textlanding scale0">
          <h1 class="wctext">Welcome To <br/>The World of Rose Villa</h1>
          <div class="openbutton scale0">
            <span class="clickviewsite">Enter</span>
            <span class="soundon">Sound On</span>
          </div>
        </div>
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
    <source type="audio/mp3" src="{{asset('public/assets/audio/Laura Fygi – La Vie En Rose.mp3')}}">
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
        <div class="headindex">
          <span>Explore Rose Villa</span>
          <span>Welcome Louis</span>
        </div>
	      @include('layouts.nav')
	    </div>
    </div>
  </div>
  
@endsection
@section('script')
<script src="{{asset('public/js/curtains.js')}}" type="text/javascript"></script>
<script src="{{asset('public/js/simple.plane.setup.js')}}" type="text/javascript"></script>


<script src="https://cdnjs.cloudflare.com/ajax/libs/pixi.js/5.1.3/pixi.min.js" type="text/javascript"></script>


<script type="text/javascript">
  const  canvas = document.getElementById('mycanvas');
  const app = new PIXI.Application({
    view : canvas,
    width: window.innerWidth,
    height: window.innerHeight,
  });

  app.stage.interactive = true;

  const top_left = PIXI.Sprite.from('http://rosevilla.tntechs.com.vn/public/images/imagesfloat/flower3.png');

  // bg.anchor.set(0.5);

  top_left.x = 10 / 2;
  top_left.y = 10 / 2;

  app.stage.addChild(top_left);

  app.stage.on('mousemove', pointerMove);

  function pointerMove(event) {
    console.log('alo')
    top_left.x = 102 / 2;
    top_left.y = 102 / 2;
  }
  top_left.on('mousemove', () => {
    console.log('alo1')
  });

  // create an array to store a reference to the dudes
const dudeArray = [];

const totaldudes = 6;

const buttonPositions = [
    175, 75,
    655, 75,
    410, 325,
    150, 465,
    685, 445,
    185, 945,
];

let count = 0;

for (let i = 0; i < totaldudes; i++) {
    count += 0.25;

    // create a new Sprite that uses the image name that we just generated as its source
    const dude = PIXI.Sprite.from(`/public/images/imagesfloat/flower${i+1}.png`);

    dude.anchor.set(0.5);
    dude.x = buttonPositions[i * 2];
    dude.y = buttonPositions[i * 2 + 1];
    console.log(buttonPositions[i * 2])

    // create some extra properties that will control movement
    dude.direction = Math.random() * Math.PI * 2;

    // this number will be used to modify the direction of the dude over time
    dude.turningSpeed = Math.random() - 0.8;

    // create a random speed for the dude between 0 - 2
    dude.speed = 2 + Math.random() * 2;

    // finally we push the dude into the dudeArray so it it can be easily accessed later
    dudeArray.push(dude);

    app.stage.addChild(dude);
}

/*const container = new PIXI.Container();
app.stage.addChild(container);

const padding = 20;
const bounds = new PIXI.Rectangle(
    -padding,
    -padding,
    app.screen.width + padding * 2,
    app.screen.height + padding * 2,
);

  const maggots = [];
  for (var i = 0; i <= 6; i++) {
    const maggot = PIXI.Sprite.from(`http://rosevilla.tntechs.com.vn/public/images/imagesfloat/flower${i+1}.png`);
    maggot.anchor.set(0.9);
    container.addChild(maggot);

    maggot.direction = Math.random() * Math.PI * 0.2;
    maggot.speed = 1;
    maggot.turnSpeed = 0.2 //Math.random() - 0.8;

    maggot.x = Math.random() * bounds.width;
    maggot.y = Math.random() * bounds.height;

    // maggot.scale.set(1 + Math.random() * 0.3);
    maggot.original = new PIXI.Point();
    maggot.original.copy(maggot.scale);
    maggots.push(maggot)
    console.log(maggot.width)
  }

  let count = 0;

  app.ticker.add(() => {
      count += 0.05;

      for (let i = 0; i < maggots.length; i++) {
          const maggot = maggots[i];

          maggot.direction += maggot.turnSpeed * 0.01;
          maggot.x += Math.sin(maggot.direction) * maggot.speed;
          maggot.y += Math.cos(maggot.direction) * maggot.speed;

          maggot.rotation = -maggot.direction - Math.PI / 2;
          // maggot.scale.x = maggot.original.x + Math.sin(count) * 0.2;

          // wrap the maggots around as the crawl
          if (maggot.x < bounds.x) {
              maggot.x += bounds.width;
          } else if (maggot.x > bounds.x + bounds.width) {
              maggot.x -= bounds.width;
          }

          if (maggot.y < bounds.y) {
              maggot.y += bounds.height;
          } else if (maggot.y > bounds.y + bounds.height) {
              maggot.y -= bounds.height;
          }
      }
  });*/

  /*const  canvas = document.getElementById('mycanvas2');
  const app = new PIXI.Application({
    view : canvas,
    width: window.innerWidth,
    height: window.innerHeight,
  });
// document.body.appendChild(app.view);

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

const totalSprites = app.renderer instanceof PIXI.Renderer ? 9 : 1;
console.log(totalSprites)

for (let i = 0; i < totalSprites; i++) {
    // create a new Sprite
    const dude = PIXI.Sprite.from('http://rosevilla.tntechs.com.vn/public/images/imagesfloat/flower3.png');

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
*/

</script>
{{-- <script type="text/javascript">
	const  canvas = document.getElementById('mycanvas1');
  const app = new PIXI.Application({
    view : canvas,
    width: window.innerWidth,
    height: window.innerHeight,
  });
	try {
		d.current = new PIXI.Application({ width: window.innerWidth, height: window.innerHeight, view: u.current, transparent: !0, resolution: window.devicePixelRatio });
		var t = d.current.screen,
			n = t.width,
			r = t.height,
			a = r / 2,
			o = n / 2,
			i = 1.2 * Math.max(n, r);
		V.current = SE.find(function (e, t) {
			return e >= i || t === SE.length - 1;
		});
		var s = n / V.current,
			c = 0.625 * V.current,
			l = window.innerHeight / c;
		H.current = Math.max(s, l);
		var p = PIXI.Texture.from(Object(D.l)({ size: i, id: "cover/background_uboxbq", type: "jpg" }));
		(q.current = new PIXI.Sprite(p)), (q.current.y = a), (q.current.x = o), (q.current.scale.x = H.current), (q.current.scale.y = H.current), q.current.anchor.set(0.5, 0.5);
		var f = PIXI.Texture.from(Object(D.l)({ size: 3 * Math.max(n, r), id: "cover/branches_qdmotj" }));
		(Y.current = new PIXI.Sprite(f)),
			(Y.current.y = a),
			(Y.current.x = o),
			(Y.current.scale.x = 0.3),
			(Y.current.scale.y = 0.3),
			Y.current.anchor.set(0.5, 0.5),
			(K.current = new PIXI.Sprite(f)),
			(K.current.y = a),
			(K.current.x = o),
			(K.current.scale.x = 0.45),
			(K.current.scale.y = 0.45),
			K.current.anchor.set(0.5, 0.5),
			(Z.current = new PIXI.Sprite(f)),
			(Z.current.y = a),
			(Z.current.x = o),
			(Z.current.scale.x = 0.9),
			(Z.current.scale.y = 0.9),
			Z.current.anchor.set(0.5, 0.5),
			(z.current = new PIXI.Graphics()),
			z.current.beginFill(0),
			z.current.drawRect(0, 0, n, r),
			(z.current.alpha = 0),
			z.current.endFill(),
			d.current.stage.addChild(q.current),
			d.current.stage.addChild(Y.current),
			d.current.stage.addChild(K.current),
			d.current.stage.addChild(z.current),
			d.current.stage.addChild(Z.current),
			(y.current = { y: a, x: o }),
			ue();
	} catch (t) {
		var m = document.createElement("script");
		(m.onload = e), (m.src = "https://cdnjs.cloudflare.com/ajax/libs/pixi.js/5.1.3/pixi.min.js"), (m.async = !0), document.body.appendChild(m);
	}

</script> --}}
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
      $(document).on('click', '.bg_rem', function(){
         $(this).fadeOut(4000); 
      });
      $(document).on('click', '.clickviewsite', function(){
        // $(this).closest('.bg_rem').addClass("box-transition box-hidden");
         $(this).closest('.welcome-layout').fadeOut(4000); 
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


      });
      
      document.addEventListener("DOMContentLoaded", ready);
    </script>

@endsection