document.addEventListener('DOMContentLoaded', function () {
    var carousel = document.querySelector('#carruselConVideo');
    var videos = carousel.querySelectorAll('video');

    carousel.addEventListener('slide.bs.carousel', function () {
        videos.forEach(function (video) {
            video.pause();
        });
    });
});