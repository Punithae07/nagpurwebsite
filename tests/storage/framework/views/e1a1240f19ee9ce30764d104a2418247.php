<!doctype html>
<html class="no-js" lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <!-- Meta Tags -->
    <meta name="viewport" content="width=device-width,initial-scale=1.0" />
    <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
    <meta name="description" content="Auxilium Kochi - Together for a better world" />
    <meta name="keywords" content="Auxilium Kochi - Together for a better world" />
    <meta name="author" content="Auxilium Kochi - Together for a better world" />

    <title>Auxilium Kochi - Together for a better world</title>
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo e(asset('assets/img/favicon.png')); ?>">
    <!-- Normalize CSS -->
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/normalize.css')); ?>">
    <!-- Main CSS -->
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/main.css')); ?>">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/bootstrap.min.css')); ?>">
    <!-- Animate CSS -->
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/animate.min.css')); ?>">
    <!-- Font-awesome CSS-->
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/font-awesome.min.css')); ?>">
    <!-- Owl Caousel CSS -->
    <link rel="stylesheet" href="<?php echo e(asset('assets/vendor/OwlCarousel/owl.carousel.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/vendor/OwlCarousel/owl.theme.default.min.css')); ?>">
    <!-- Main Menu CSS -->
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/meanmenu.min.css')); ?>">
    <!-- nivo slider CSS -->
    <link rel="stylesheet" href="<?php echo e(asset('assets/vendor/slider/css/nivo-slider.css')); ?>" type="text/css" />
    <link rel="stylesheet" href="<?php echo e(asset('assets/vendor/slider/css/preview.css')); ?>" type="text/css" media="screen" />
    <!-- Datetime Picker Style CSS -->
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/jquery.datetimepicker.css')); ?>">
    <!-- Magic popup CSS -->
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/magnific-popup.css')); ?>">
    <!-- Switch Style CSS -->
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/hover-min.css')); ?>">
    <!-- ReImageGrid CSS -->
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/reImageGrid.css')); ?>">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="<?php echo e(asset('assets/style.css')); ?>">
    <!-- bootstrap-icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link  href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <!-- Modernizr Js -->
    <script src="<?php echo e(asset('assets/js/modernizr-2.8.3.min.js')); ?>"></script>
</head>

<body>

    <!-- Preloader Start Here -->
    <div id="preloader"></div>
    <!-- Preloader End Here -->
    <!-- Main Body Area Start Here -->
    <div id="wrapper">
        <!-- Header Area Start Here -->
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

        <?php echo $__env->make('frontend.includes.slider', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <?php echo $__env->make('frontend.includes.flashNews', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <?php echo $__env->make('frontend.includes.welcome', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <?php echo $__env->make('frontend.includes.management', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        

        <?php echo $__env->make('frontend.includes.video', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <?php echo $__env->make('frontend.includes.upcomingEvents', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <?php echo $__env->make('frontend.includes.schoolCounts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <?php echo $__env->make('frontend.includes.gallery', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <?php echo $__env->make('frontend.includes.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    </div>
    <!-- Main Body Area End Here -->
    <!-- jquery-->
    <script src="<?php echo e(asset('assets/js/jquery-2.2.4.min.js')); ?>" type="text/javascript"></script>
    <!-- Plugins js -->
    <script src="<?php echo e(asset('assets/js/plugins.js')); ?>" type="text/javascript"></script>
    <!-- Bootstrap js -->
    <script src="<?php echo e(asset('assets/js/bootstrap.min.js')); ?>" type="text/javascript"></script>
    <!-- WOW JS -->
    <script src="<?php echo e(asset('assets/js/wow.min.js')); ?>"></script>
    <!-- Nivo slider js -->
    <script src="<?php echo e(asset('assets/vendor/slider/js/jquery.nivo.slider.js')); ?>" type="text/javascript"></script>
    <script src="<?php echo e(asset('assets/vendor/slider/home.js')); ?>" type="text/javascript"></script>
    <!-- Owl Cauosel JS -->
    <script src="<?php echo e(asset('assets/vendor/OwlCarousel/owl.carousel.min.js')); ?>" type="text/javascript"></script>
    <!-- Meanmenu Js -->
    <script src="<?php echo e(asset('assets/js/jquery.meanmenu.min.js')); ?>" type="text/javascript"></script>
    <!-- Srollup js -->
    <script src="<?php echo e(asset('assets/js/jquery.scrollUp.min.js')); ?>" type="text/javascript"></script>
    <!-- jquery.counterup js -->
    <script src="<?php echo e(asset('assets/js/jquery.counterup.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/waypoints.min.js')); ?>"></script>
    <!-- Countdown js -->
    <script src="<?php echo e(asset('assets/js/jquery.countdown.min.js')); ?>" type="text/javascript"></script>
    <!-- Isotope js -->
    <script src="<?php echo e(asset('assets/js/isotope.pkgd.min.js')); ?>" type="text/javascript"></script>
    <!-- Magic Popup js -->
    <script src="<?php echo e(asset('assets/js/jquery.magnific-popup.min.js')); ?>" type="text/javascript"></script>
    <!-- Gridrotator js -->
    <script src="<?php echo e(asset('assets/js/jquery.gridrotator.js')); ?>" type="text/javascript"></script>
    <!-- Custom Js -->
    <script src="<?php echo e(asset('assets/js/main.js')); ?>" type="text/javascript"></script>

    <script>
        // Modal Popup
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
      //  $(document).ready(function() {
            // Initialize the slick carousel
          //  $('.birthday-carousel').slick({
          //      infinite: true,
           //     slidesToShow: 1,
           //     slidesToScroll: 1,
           //     fade: false,
           //     autoplay: true,
            //    autoplaySpeed: 3000,
            //    arrows: true,
            //    dots: false,
             //   prevArrow: '<button type="button" class="slick-prev"><i class="fas fa-chevron-left"></i></button>',
             //   nextArrow: '<button type="button" class="slick-next"><i class="fas fa-chevron-right"></i></button>',
           // });
        //});
    </script>
</body>

<!-- Mirrored from www.radiustheme.com/demo/html/academics/academics/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 05 Sep 2024 11:37:30 GMT -->

</html>
<?php /**PATH C:\laragon\www\Filament\auxiliumkochi\resources\views/frontend/layouts/home.blade.php ENDPATH**/ ?>