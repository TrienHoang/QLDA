const mix = require('laravel-mix');

// Gộp & nén toàn bộ file CSS
mix.styles([
    'public/build/client/assets/vendors/bootstrap/css/bootstrap.min.css',
    'public/build/client/assets/vendors/fontawesome/css/all.min.css',
    'public/build/client/assets/vendors/nice-select/css/nice-select.css',
    'public/build/client/assets/vendors/animate/animate.min.css',
    'public/build/client/assets/vendors/meanmenu/css/meanmenu.css',
    'public/build/client/assets/vendors/jarallax/jarallax.css',
    'public/build/client/assets/vendors/owl-carousel/css/owl.carousel.min.css',
    'public/build/client/assets/vendors/owl-carousel/css/owl.theme.default.min.css',
    'public/build/client/assets/vendors/jquery-ui/jquery-ui.css',
    'public/build/client/assets/vendors/glightbox/css/glightbox.min.css',
    'public/build/client/assets/vendors/spacing/spacing.css',
    'public/build/client/assets/css/swiftcart.css',
], 'public/build/client/assets/css/app.css').version();

// Gộp & nén toàn bộ file JS
mix.scripts([
    'public/build/client/assets/vendors/jquery/jquery-3.7.0.min.js',
    'public/build/client/assets/vendors/bootstrap/js/bootstrap.bundle.min.js',
    'public/build/client/assets/vendors/nice-select/js/nice-select.js',
    'public/build/client/assets/vendors/wow/wow.js',
    'public/build/client/assets/vendors/meanmenu/js/meanmenu.js',
    'public/build/client/assets/vendors/jarallax/jarallax.min.js',
    'public/build/client/assets/vendors/jquery-ui/jquery-ui.js',
    'public/build/client/assets/vendors/jquery-magnific-popup/jquery.magnific-popup.min.js',
    'public/build/client/assets/vendors/jquery-validate/jquery.validate.min.js',
    'public/build/client/assets/vendors/owl-carousel/js/owl.carousel.min.js',
    'public/build/client/assets/vendors/swiper/js/swiper.min.js',
    'public/build/client/assets/vendors/imagesloaded/imagesloaded.min.js',
    'public/build/client/assets/vendors/isotope/isotope.js',
    'public/build/client/assets/vendors/countdown/countdown.min.js',
    'public/build/client/assets/vendors/ion.rangeSlider/ion.rangeSlider.min.js',
    'public/build/client/assets/vendors/glightbox/js/glightbox.min.js',
    'public/build/client/assets/js/swiftcart.js',
], 'public/build/client/assets/js/app.js').version();
