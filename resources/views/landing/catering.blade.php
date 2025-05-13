<x-header />
<x-navbar />
<link href="{{ asset('css/cateringMenuImageStyling.css') }}" rel="stylesheet" />

@if (!empty($cateringMenuImage))
    <h4 class="text-center mb-2 mt-3 fw-bold" id="displayText">Hover on image to zoom in</h4>
    <div class="image-container">
        <img id="zoomImg" src="{{ asset('storage/' . $cateringMenuImage) }}" class="zoom-image">
        <div id="zoomLens" class="zoom-lens"></div>
        <div id="reticle" class="reticle"></div>
    </div>
@else
    <h4 class="text-center mb-2 mt-3 fw-bold">Catering menu coming Soon!</h4>
@endif

<!-- Hidden Canvas for AI Upscaling -->
<canvas id="upscaleCanvas" style="display: none;"></canvas>

<x-footer />
