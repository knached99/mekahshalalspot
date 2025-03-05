<x-header/>
<x-navbar/>
<link href="{{asset('css/cateringMenuImageStyling.css')}}" rel="stylesheet"/>

<h4 class="text-center mb-2 mt-3 fw-bold" id="displayText">Hover on image to zoom in</h4>
<div class="image-container">
    <img id="zoomImg" src="{{ asset('images/afghan_catering_menu.png') }}" class="zoom-image">
    <div id="zoomLens" class="zoom-lens"></div>
    <div id="reticle" class="reticle"></div>
</div>

<!-- Hidden Canvas for AI Upscaling -->
<canvas id="upscaleCanvas" style="display: none;"></canvas>

<x-footer/>

