window.addEventListener("load", function() {

    function lerp (start, end, amt){
        return (1 - amt) * start + amt * end;
    }

    // track the mouse positions to send it to the shaders
    var mousePosition = {
        x: 0,
        y: 0,
    };
    // we will keep track of the last position in order to calculate the movement strength/delta
    var mouseLastPosition = {
        x: 0,
        y: 0,
    };

    var deltas = {
        max: 0,
        applied: 0,
    };

    // set up our WebGL context and append the canvas to our wrapper
    var webGLCurtain = new Curtains({
        container: "canvas",
        watchScroll: false // no need to listen for the scroll in this example
    });

    // handling errors
    webGLCurtain.onError(function() {
        // we will add a class to the document body to display original images
        document.body.classList.add("no-curtains");
    }).onContextLost(function() {
        // on context lost, try to restore the context
        webGLCurtain.restoreContext();
    });

    // get our plane element
    var planeElements = document.getElementsByClassName("curtain");
    var speed = 30;
    var steps = 4;

    var vs = `
        precision mediump float;

        // default mandatory variables
        attribute vec3 aVertexPosition;
        attribute vec2 aTextureCoord;

        uniform mat4 uMVMatrix;
        uniform mat4 uPMatrix;
        
        // our texture matrix uniform
        uniform mat4 simplePlaneTextureMatrix;

        // custom variables
        varying vec3 vVertexPosition;
        varying vec2 vTextureCoord;

        uniform float uTime;
        uniform vec2 uResolution;
        uniform vec2 uMousePosition;
        uniform float uMouseMoveStrength;


        void main() {

            vec3 vertexPosition = aVertexPosition;

            // get the distance between our vertex and the mouse position
            float distanceFromMouse = distance(uMousePosition, vec2(vertexPosition.x, vertexPosition.y));

            // calculate our wave effect
            float waveSinusoid = cos(5.0 * (distanceFromMouse - (uTime / 75.0)));

            // attenuate the effect based on mouse distance
            float distanceStrength = (0.4 / (distanceFromMouse + 0.4));

            // calculate our distortion effect
            float distortionEffect = distanceStrength * waveSinusoid * uMouseMoveStrength;

            // apply it to our vertex position
            vertexPosition.z +=  distortionEffect / 30.0;
            vertexPosition.x +=  (distortionEffect / 30.0 * (uResolution.x / uResolution.y) * (uMousePosition.x - vertexPosition.x));
            vertexPosition.y +=  distortionEffect / 30.0 * (uMousePosition.y - vertexPosition.y);

            gl_Position = uPMatrix * uMVMatrix * vec4(vertexPosition, 1.0);

            // varyings
            vTextureCoord = (simplePlaneTextureMatrix * vec4(aTextureCoord, 0.0, 1.0)).xy;
            vVertexPosition = vertexPosition;
        }
    `;

    var fs = `
        precision mediump float;

        varying vec3 vVertexPosition;
        varying vec2 vTextureCoord;

        uniform sampler2D simplePlaneTexture;

        void main() {
            // apply our texture
            vec4 finalColor = texture2D(simplePlaneTexture, vTextureCoord);

            // fake shadows based on vertex position along Z axis
            finalColor.rgb -= clamp(-vVertexPosition.z, 0.0, 1.0);
            // fake lights based on vertex position along Z axis
            finalColor.rgb += clamp(vVertexPosition.z, 0.0, 1.0);

            // handling premultiplied alpha (useful if we were using a png with transparency)
            finalColor = vec4(finalColor.rgb * finalColor.a, finalColor.a);

            gl_FragColor = finalColor;
        }
    `;

    // some basic parameters
    var params = {
        vertexShader: vs,
        fragmentShader: fs,
        widthSegments: 20,
        heightSegments: 20,
    
        uniforms: {
            resolution: { // resolution of our plane
                name: "uResolution",
                type: "2f", // notice this is an length 2 array of floats
                value: [planeElements[0].clientWidth, planeElements[0].clientHeight],
            },
            time: { // time uniform that will be updated at each draw call
                name: "uTime",
                type: "1f",
                value: 0,
            },
            mousePosition: { // our mouse position
                name: "uMousePosition",
                type: "2f", // again an array of floats
                value: [mousePosition.x, mousePosition.y],
            },
            mouseMoveStrength: { // the mouse move strength
                name: "uMouseMoveStrength",
                type: "1f",
                value: 0,
            }
        }
    };

    // create our plane
    var simplePlane = webGLCurtain.addPlane(planeElements[0], params);
    var simplePlanesecond = webGLCurtain.addPlane(planeElements[1], params);
    var animationsecond=false;
    simplePlanesecond && simplePlanesecond.onReady(function() {
        // set a fov of 35 to reduce perspective
        simplePlanesecond.setPerspective(10);

        // apply a little effect once everything is ready
        deltas.max = 2;

        // now that our plane is ready we can listen to mouse move event
        var wrapper = document.getElementById("page-wrap");
        var audio = document.getElementById("audio");
        var client_width = wrapper.clientWidth/2;
        var imgLeft = wrapper.children[1];
        var imgRight = wrapper.children[2];
        //simplePlanesecond.textures[0].setScale(0.25, 0.25);
        //simplePlanesecond.textures[0].setOffset(-0.5, 0);
        
        wrapper.addEventListener("mousemove", function(e) {
            if(!animationsecond){
                simplePlanesecond.setPerspective(10);
                handleMovement(e, simplePlanesecond);
            }
            
        });

        wrapper.addEventListener("click", function(e) {
            if(!animationsecond){
                animationsecond = true;
                simplePlanesecond.setPerspective(90);
     
                  var width = 0;
                  var step = 10;
                  var id = setInterval(frame, speed);
                  function frame() {
                    if (width > client_width) {
                      wrapper.innerHTML = "";
                      clearInterval(id);
                    } else {
                      step++;
                      width+= steps*(1+ 10/step); 

                      simplePlanesecond.setRelativePosition( 1*width,0, 0);
                      if (step >=100) {
                        
                      }

                    }
                  }


                simplePlanesecond.relativeTranslation.y = 2000;
                // handleMovement(e, simplePlanesecond);
                setTimeout(function(){
                    wrapper.style.display = 'none';
                    // document.getElementsByClassName("header");
                    // audio.remove();
                }, 6000);
            }
        });
        setTimeout(function(){
            wrapper.click();
        }, 1000);
    }).onRender(function() {
        // increment our time uniform
        simplePlanesecond.uniforms.time.value++;

        // decrease both deltas by damping : if the user doesn't move the mouse, effect will fade away
        deltas.applied += (deltas.max - deltas.applied) * 0.02;
        deltas.max += (0 - deltas.max) * 0.01;

        // send the new mouse move strength value
        simplePlanesecond.uniforms.mouseMoveStrength.value = deltas.applied;

    }).onAfterResize(function() {
        var planeBoundingRect = simplePlanesecond.getBoundingRect();
        simplePlanesecond.uniforms.resolution.value = [planeBoundingRect.width, planeBoundingRect.height];
    });
    var animation=false;

    // if there has been an error during init, simplePlane will be null
    simplePlane && simplePlane.onReady(function() {
        // set a fov of 35 to reduce perspective
        simplePlane.setPerspective(35);

        // apply a little effect once everything is ready
        deltas.max = 2;

        // now that our plane is ready we can listen to mouse move event
        var wrapper = document.getElementById("page-wrap");
        var audio = document.getElementById("audio");
        var client_width = wrapper.clientWidth/2;
        //simplePlane.textures[0].setScale(0.25, 0.25);
        //simplePlane.textures[0].setOffset(-0.5, 0);
        
        wrapper.addEventListener("mousemove", function(e) {
            if(!animation){
                simplePlane.setPerspective(10);
                handleMovement(e, simplePlane);
            }
            
        });

        
        wrapper.addEventListener("click", function(e) {
            // audio.play();
             if(!animation){
                animation = true;
            
                simplePlane.setPerspective(90);
     
                  var width = 0;
                  var step = 10;
                  var id = setInterval(frame, speed);
                  function frame() {
                    if (width > client_width) {
                      clearInterval(id);
                    } else {
                      step++;
                      width+= steps*(1+ 10/step); 
                      simplePlane.setRelativePosition( -1*width,0, 0);
                    }
                  }

                simplePlane.relativeTranslation.y = 2000;
                // handleMovement(e, simplePlane);
                setTimeout(function(){
                    wrapper.style.display = 'none';
                    // audio.remove();
                }, 6000);
                
            }
        });
        setTimeout(function(){
            wrapper.click();
        }, 1000);

    }).onRender(function() {
        // increment our time uniform
        simplePlane.uniforms.time.value++;

        // decrease both deltas by damping : if the user doesn't move the mouse, effect will fade away
        deltas.applied += (deltas.max - deltas.applied) * 0.02;
        deltas.max += (0 - deltas.max) * 0.01;

        // send the new mouse move strength value
        simplePlane.uniforms.mouseMoveStrength.value = deltas.applied;

    }).onAfterResize(function() {
        var planeBoundingRect = simplePlane.getBoundingRect();
        simplePlane.uniforms.resolution.value = [planeBoundingRect.width, planeBoundingRect.height];
    });



    // handle the mouse move event
    function handleMovement(e, plane) {
        
        // update mouse last pos
        mouseLastPosition.x = mousePosition.x;
        mouseLastPosition.y = mousePosition.y;

        var mouse = {};

        // touch event
        if(e.targetTouches) {

            mouse.x = e.targetTouches[0].clientX;
            mouse.y = e.targetTouches[0].clientY;
        }
        // mouse event
        else {
            mouse.x = e.clientX;
            mouse.y = e.clientY;
        }

        // lerp the mouse position a bit to smoothen the overall effect
        mousePosition.x = lerp(mousePosition.x, mouse.x, 0.3);
        mousePosition.y = lerp(mousePosition.y, mouse.y, 0.3);

        // convert our mouse/touch position to coordinates relative to the vertices of the plane
        var mouseCoords = plane.mouseToPlaneCoords(mousePosition.x, mousePosition.y);
        // update our mouse position uniform
        plane.uniforms.mousePosition.value = [mouseCoords.x, mouseCoords.y];

        // calculate the mouse move strength
        if(mouseLastPosition.x && mouseLastPosition.y) {
            var delta = Math.sqrt(Math.pow(mousePosition.x - mouseLastPosition.x, 2) + Math.pow(mousePosition.y - mouseLastPosition.y, 2)) / 30;
            delta = Math.min(4, delta);

            // update max delta only if it increased
            if(delta >= deltas.max) {
                deltas.max = delta;
            }
        }
    }
});
