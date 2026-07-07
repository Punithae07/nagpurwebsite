<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>

    <!-- Meta Tags -->
    <meta name="viewport" content="width=device-width,initial-scale=1.0" />
    <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
    <meta name="description" content="StudyPress | Education & Courses HTML Template" />
    <meta name="keywords" content="academy, course, education, education html theme, elearning, learning," />
    <meta name="author" content="ThemeMascot" />

    <!-- Page Title -->
    <title>St. Mary's Anglo-Indian higher secondary school</title>

    <!-- Favicon and Touch Icons -->
    <link href="<?php echo e(asset('assets/images/favicon.png')); ?>" rel="shortcut icon" type="image/png">
    <link href="<?php echo e(asset('assets/images/apple-touch-icon.png')); ?>" rel="apple-touch-icon">
    <link href="<?php echo e(asset('assets/images/apple-touch-icon-72x72.png')); ?>" rel="apple-touch-icon" sizes="72x72">
    <link href="<?php echo e(asset('assets/images/apple-touch-icon-114x114.png')); ?>" rel="apple-touch-icon" sizes="114x114">
    <link href="<?php echo e(asset('assets/images/apple-touch-icon-144x144.png')); ?>" rel="apple-touch-icon" sizes="144x144">

    <!-- Stylesheet -->
    <link href="<?php echo e(asset('assets/css/bootstrap.min.css')); ?>" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!--<link href="css/bootstrap-icons.min.css" rel="stylesheet" type="text/css">-->
    <link href="<?php echo e(asset('assets/css/jquery-ui.min.css')); ?>" rel="stylesheet" type="text/css">
    <link href="<?php echo e(asset('assets/css/animate.css" rel="stylesheet')); ?>" type="text/css">
    <link href="<?php echo e(asset('assets/css/css-plugin-collections.css')); ?>" rel="stylesheet" />
    <!-- CSS | menuzord megamenu skins -->
    <link id="menuzord-menu-skins" href="<?php echo e(asset('assets/css/menuzord-skins/menuzord-rounded-boxed.css')); ?>"
        rel="stylesheet" />
    <!-- CSS | Main style file -->
    <link href="<?php echo e(asset('assets/css/style-main.css')); ?>" rel="stylesheet" type="text/css">
    <!-- CSS | Preloader Styles -->
    <link href="<?php echo e(asset('assets/css/preloader.css')); ?>" rel="stylesheet" type="text/css">
    <!-- CSS | Custom Margin Padding Collection -->
    <link href="<?php echo e(asset('assets/css/custom-bootstrap-margin-padding.css')); ?>" rel="stylesheet" type="text/css">
    <!-- CSS | Responsive media queries -->
    <link href="<?php echo e(asset('assets/css/responsive.css')); ?>" rel="stylesheet" type="text/css">
    <!-- CSS | Style css. This is the file where you can place your own custom css code. Just uncomment it and use it. -->
    <!-- <link href="css/style.css" rel="stylesheet" type="text/css"> -->

    <!-- Revolution Slider 5.x CSS settings -->
    <link href="<?php echo e(asset('assets/js/revolution-slider/css/settings.css')); ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo e(asset('assets/js/revolution-slider/css/layers.css')); ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo e(asset('assets/js/revolution-slider/css/navigation.css')); ?>" rel="stylesheet" type="text/css" />

    <!-- CSS | Theme Color -->
    <link href="<?php echo e(asset('assets/css/colors/theme-skin-color-set-1.css')); ?>" rel="stylesheet" type="text/css">

    <!-- external javascripts -->
    <script src="<?php echo e(asset('assets/js/jquery-2.2.4.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/jquery-ui.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/bootstrap.min.js')); ?>"></script>
    <!-- JS | jquery plugin collection for this theme -->
    <script src="<?php echo e(asset('assets/js/jquery-plugin-collection.js')); ?>"></script>

    <!-- Revolution Slider 5.x SCRIPTS -->
    <script src="<?php echo e(asset('assets/js/revolution-slider/js/jquery.themepunch.tools.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/revolution-slider/js/jquery.themepunch.revolution.min.js')); ?>"></script>
</head>

<body class="">
    <div id="wrapper" class="clearfix">
        <!-- preloader -->
        <div id="preloader">
            <div id="spinner">
                <div class="preloader-dot-loading">
                    <div class="cssload-loading"><i></i><i></i><i></i><i></i></div>
                </div>
            </div>
            <div id="disable-preloader" class="btn btn-default btn-sm">Disable Preloader</div>
        </div>


        <?php echo $__env->make('frontend.includes.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        
        <?php if(count($popups) > 0): ?>
            <?php $__currentLoopData = $popups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $popup): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div id="myModal<?php echo e($key); ?>" class="modal fade" role="dialog">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal"
                                    data-target="#myModal<?php echo e($key); ?>" aria-label="Close">&times;</button>
                            </div>
                            <div class="modal-body">
                                <img class="img-responsive"
                                    src="<?php echo e($popup->feature_image ? asset('storage/' . $popup->feature_image) : ''); ?>"
                                    alt="<?php echo e($popup->title); ?>">
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>

        <!-- Start main-content -->
        <div class="main-content">
            <?php echo $__env->make('frontend.includes.slider', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            <?php echo $__env->make('frontend.includes.flashNews', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            <?php echo $__env->make('frontend.includes.welcome', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            <?php echo $__env->make('frontend.includes.management', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            <?php echo $__env->make('frontend.includes.newsCelebrant', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            <?php echo $__env->make('frontend.includes.schoolCounts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            <?php echo $__env->make('frontend.includes.upcomingEvents', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            <?php echo $__env->make('frontend.includes.video', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            <?php echo $__env->make('frontend.includes.gallery', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        </div>

        <?php echo $__env->make('frontend.includes.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <a class="scrollToTop" href="index-mp-layout6.html#"><i class="fa fa-angle-up"></i></a>
    </div>
    <!-- end wrapper -->

    <!-- Footer Scripts -->
    <!-- JS | Custom script for all pages -->
    <script src="<?php echo e(asset('assets/js/custom.js')); ?>"></script>

    <!-- SLIDER REVOLUTION 5.0 EXTENSIONS
      (Load Extensions only on Local File Systems !
       The following part can be removed on Server for On Demand Loading) -->
    <script type="text/javascript"
        src="<?php echo e(asset('assets/js/revolution-slider/js/extensions/revolution.extension.actions.min.js')); ?>"></script>
    <script type="text/javascript"
        src="<?php echo e(asset('assets/js/revolution-slider/js/extensions/revolution.extension.carousel.min.js')); ?>"></script>
    <script type="text/javascript"
        src="<?php echo e(asset('assets/js/revolution-slider/js/extensions/revolution.extension.kenburn.min.js')); ?>"></script>
    <script type="text/javascript"
        src="<?php echo e(asset('assets/js/revolution-slider/js/extensions/revolution.extension.layeranimation.min.js')); ?>"></script>
    <script type="text/javascript"
        src="<?php echo e(asset('assets/js/revolution-slider/js/extensions/revolution.extension.migration.min.js')); ?>"></script>
    <script type="text/javascript"
        src="<?php echo e(asset('assets/js/revolution-slider/js/extensions/revolution.extension.navigation.min.js')); ?>"></script>
    <script type="text/javascript"
        src="<?php echo e(asset('assets/js/revolution-slider/js/extensions/revolution.extension.parallax.min.js')); ?>"></script>
    <script type="text/javascript"
        src="<?php echo e(asset('assets/js/revolution-slider/js/extensions/revolution.extension.slideanims.min.js')); ?>"></script>
    <script type="text/javascript"
        src="<?php echo e(asset('assets/js/revolution-slider/js/extensions/revolution.extension.video.min.js')); ?>"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css">
    <script src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    
    <script>
        $(document).ready(function(e) {
            var revapi = $(".rev_slider").revolution({
                sliderType: "standard",
                jsFileLocation: "js/revolution-slider/js/",
                sliderLayout: "auto",
                dottedOverlay: "none",
                delay: 5000,
                navigation: {
                    keyboardNavigation: "off",
                    keyboard_direction: "horizontal",
                    mouseScrollNavigation: "off",
                    onHoverStop: "off",
                    touch: {
                        touchenabled: "on",
                        swipe_threshold: 75,
                        swipe_min_touches: 1,
                        swipe_direction: "horizontal",
                        drag_block_vertical: false
                    },
                    arrows: {
                        style: "gyges",
                        enable: true,
                        hide_onmobile: false,
                        hide_onleave: true,
                        hide_delay: 200,
                        hide_delay_mobile: 1200,
                        tmp: '',
                        left: {
                            h_align: "left",
                            v_align: "center",
                            h_offset: 0,
                            v_offset: 0
                        },
                        right: {
                            h_align: "right",
                            v_align: "center",
                            h_offset: 0,
                            v_offset: 0
                        }
                    },
                    bullets: {
                        enable: true,
                        hide_onmobile: true,
                        hide_under: 800,
                        style: "hebe",
                        hide_onleave: false,
                        direction: "horizontal",
                        h_align: "center",
                        v_align: "bottom",
                        h_offset: 0,
                        v_offset: 30,
                        space: 5,
                        tmp: '<span class="tp-bullet-image"></span><span class="tp-bullet-imageoverlay"></span><span class="tp-bullet-title"></span>'
                    }
                },
                responsiveLevels: [1240, 1024, 778],
                visibilityLevels: [1240, 1024, 778],
                gridwidth: [1170, 1024, 778, 480],
                gridheight: [620, 768, 960, 720],
                lazyType: "none",
                parallax: "mouse",
                parallaxBgFreeze: "off",
                parallaxLevels: [2, 3, 4, 5, 6, 7, 8, 9, 10, 1],
                shadow: 0,
                spinner: "off",
                stopLoop: "on",
                stopAfterLoops: 0,
                stopAtSlide: -1,
                shuffle: "off",
                autoHeight: "off",
                fullScreenAutoWidth: "off",
                fullScreenAlignForce: "off",
                fullScreenOffsetContainer: "",
                fullScreenOffset: "0",
                hideThumbsOnMobile: "off",
                hideSliderAtLimit: 0,
                hideCaptionAtLimit: 0,
                hideAllCaptionAtLilmit: 0,
                debugMode: false,
                fallbacks: {
                    simplifyAll: "off",
                    nextSlideOnWindowFocus: "off",
                    disableFocusListener: false,
                }
            });
        });

        //Popup
        $(document).ready(function() {
            // Start by showing the first modal
            <?php if(count($popups) > 0): ?>
                $('#myModal0').modal('show');
            <?php endif; ?>

            // Loop through each modal to handle the closing event
            <?php $__currentLoopData = $popups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $popup): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                $('#myModal<?php echo e($key); ?>').on('hidden.bs.modal', function() {
                    // Show the next modal in the sequence if it exists
                    <?php if(isset($popups[$key + 1])): ?>
                        $('#myModal<?php echo e($key + 1); ?>').modal('show');
                    <?php endif; ?>
                });
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        });

        //Birthday Celebrants
        $(document).ready(function() {
            // Initialize the slick carousel
            $('.birthday-carousel').slick({
                infinite: true,
                slidesToShow: 1,
                slidesToScroll: 1,
                fade: false,
                autoplay: true,
                autoplaySpeed: 3000,
                arrows: true,
                dots: false,
                prevArrow: '<button type="button" class="slick-prev"><i class="fas fa-chevron-left"></i></button>',
                nextArrow: '<button type="button" class="slick-next"><i class="fas fa-chevron-right"></i></button>',
            });
        });
    </script>
</body>

</html>
<?php /**PATH C:\laragon\www\wp-filament-admin\resources\views/frontend/layouts/home.blade.php ENDPATH**/ ?>