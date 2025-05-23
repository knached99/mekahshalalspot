document.addEventListener("DOMContentLoaded", function () {
  const img = document.getElementById("zoomImg");
  const lens = document.getElementById("zoomLens");
  const reticle = document.getElementById("reticle");
  const zoomInButton = document.getElementById("zoomIn");
  const zoomOutButton = document.getElementById("zoomOut");

  let zoomLevel = 2;
  const maxZoomLevel = 5;
  const minZoomLevel = 1;
  const lensSize = 200;

  const isMobile = /Mobi|Android/i.test(navigator.userAgent);
  if (isMobile) return; // Disable zoom functionality on mobile

  function handleZoom(event) {
    const { left, top, width, height } = img.getBoundingClientRect();
    const pageX = event.pageX || (event.touches && event.touches[0].pageX);
    const pageY = event.pageY || (event.touches && event.touches[0].pageY);

    let x = pageX - left - window.scrollX;
    let y = pageY - top - window.scrollY;

    // Clamp x, y so lens stays inside image
    x = Math.max(0, Math.min(x, width));
    y = Math.max(0, Math.min(y, height));

    // Position the lens centered on cursor
    lens.style.left = `${x + left - lensSize / 2}px`;
    lens.style.top = `${y + top - lensSize / 2}px`;
    lens.style.width = `${lensSize}px`;
    lens.style.height = `${lensSize}px`;
    lens.style.display = "block";

    // Set background zoom effect
    lens.style.backgroundImage = `url('${img.src}')`;
    lens.style.backgroundSize = `${width * zoomLevel}px ${height * zoomLevel}px`;
    lens.style.backgroundPosition = `-${x * zoomLevel - lensSize / 2}px -${y * zoomLevel - lensSize / 2}px`;

    // Reticle follow
    reticle.style.left = `${pageX}px`;
    reticle.style.top = `${pageY}px`;
    reticle.style.display = "block";
  }

  function hideZoom() {
    lens.style.display = "none";
    reticle.style.display = "none";
  }

  // Event listeners
  img.addEventListener("mousemove", handleZoom);
  img.addEventListener("mouseleave", hideZoom);
  img.addEventListener("wheel", function (e) {
    e.preventDefault();
    if (e.deltaY < 0 && zoomLevel < maxZoomLevel) {
      zoomLevel += 0.2;
    } else if (e.deltaY > 0 && zoomLevel > minZoomLevel) {
      zoomLevel -= 0.2;
    }
  });

  zoomInButton.addEventListener("click", () => {
    if (zoomLevel < maxZoomLevel) zoomLevel += 0.5;
  });

  zoomOutButton.addEventListener("click", () => {
    if (zoomLevel > minZoomLevel) zoomLevel -= 0.5;
  });
});
