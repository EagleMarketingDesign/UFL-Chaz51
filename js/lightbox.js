(function () {
    // Open the Modal
    function openModal() {
        document.getElementById("lightbox").style.display = "block";
    }

    // Close the Modal
    function closeModal() {
        document.getElementById("lightbox").style.display = "none";
    }

    // Close when clicked on the overlay
    document.getElementById('lightbox').addEventListener('click', function (e) {
        if (e.target.id === 'lightbox') closeModal();
    });

    var slideIndex = 1;
    showSlides(slideIndex);

    // Next/previous controls
    function plusSlides(n) {
        showSlides(slideIndex += n);
    }

    // Thumbnail image controls
    function currentSlide(n) {
        showSlides(slideIndex = n);
    }

    function showSlides(n) {
        var i;
        var slides = document.getElementsByClassName("lightbox-slide");
        var dots = document.getElementsByClassName("ligthbox-thumb");
        var captionText = document.getElementById("lightbox-caption");
        if (n > slides.length) { slideIndex = 1 }
        if (n < 1) { slideIndex = slides.length }
        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
        }
        for (i = 0; i < dots.length; i++) {
            dots[i].className = dots[i].className.replace(" active", "");
        }
        slides[slideIndex - 1].style.display = "block";
        dots[slideIndex - 1].className += " active";
        captionText.innerHTML = dots[slideIndex - 1].alt;
    }
    window.lightbox = {
        open: openModal,
        close: closeModal,
        slide: currentSlide,
        next: function () {
            plusSlides(1);
        },
        previous: function () {
            plusSlides(-1);
        },
    };
})();
