
  document.addEventListener("DOMContentLoaded", function () {
    const img = document.getElementById("zoomImg");
    const lens = document.getElementById("zoomLens");
    const reticle = document.getElementById("reticle");

    const zoomLevel = 2; // Zoom Level 
    const lensSize = 200; // Lens Size 

    // Function for handling zoom on both desktop and mobile
    function handleZoom(event) {
      const { left, top, width, height } = img.getBoundingClientRect();
      let x, y;

      if (event.type === "mousemove") {
        // For mouse movement
        x = event.clientX - left - lensSize / 2;
        y = event.clientY - top - lensSize / 2;
      } else if (event.type === "touchmove") {
        // For touch devices
        const touch = event.touches[0];
        x = touch.clientX - left - lensSize / 2;
        y = touch.clientY - top - lensSize / 2;
      }

      // Ensure the lens does not go outside of image bounds
      x = Math.max(0, Math.min(x, width - lensSize));
      y = Math.max(0, Math.min(y, height - lensSize));

      lens.style.left = `${x + left}px`;
      lens.style.top = `${y + top}px`;
      lens.style.width = `${lensSize}px`; // Ensure lens stays square
      lens.style.height = `${lensSize}px`; // Ensure lens stays square
      lens.style.display = "block";

      // Set zoomed background
      lens.style.backgroundImage = `url('${img.src}')`;
      lens.style.backgroundSize = `${width * zoomLevel}px ${height * zoomLevel}px`;
      lens.style.backgroundPosition = `-${x * zoomLevel}px -${y * zoomLevel}px`;

      // Move reticle with cursor or touch
      reticle.style.left = `${event.clientX || event.touches[0].clientX}px`;
      reticle.style.top = `${event.clientY || event.touches[0].clientY}px`;
      reticle.style.display = "block";
    }

    // Mouse events
    img.addEventListener("mousemove", handleZoom);

    // Mobile touch events
    img.addEventListener("touchmove", handleZoom);

    // Hide lens and reticle when mouse leaves or touch ends
    img.addEventListener("mouseleave", function () {
      lens.style.display = "none";
      reticle.style.display = "none";
    });

    img.addEventListener("touchend", function () {
      lens.style.display = "none";
      reticle.style.display = "none";
    });
  });

