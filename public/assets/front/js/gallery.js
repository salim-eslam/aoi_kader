 // Get all video gallery items
 const videoGalleries = document.querySelectorAll('.video-gallery');
  
 // Add event listener to each video gallery item
 videoGalleries.forEach((videoGallery) => {
   videoGallery.addEventListener('click', (e) => {
     // Get the video ID
     const videoId = videoGallery.querySelector('iframe').src.split('embed/')[1];

     // Set the video ID to the modal video player
     document.getElementById('video-player').src = `https://www.youtube.com/embed/${videoId}`;

     // Show the modal
     $('#video-modal').modal('show');
   });
 });