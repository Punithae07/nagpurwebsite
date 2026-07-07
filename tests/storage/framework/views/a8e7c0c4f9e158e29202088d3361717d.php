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
    <title><?php echo $__env->yieldContent('title'); ?> - St. Mary's Anglo-Indian higher secondary school</title>

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

    <style>
        .filament-tiptap-grid,
        .filament-tiptap-grid-builder {
            display: grid;
            gap: 1rem;
            box-sizing: border-box;
        }

        .filament-tiptap-grid[type^="asymetric"] {
            grid-template-columns: 1fr;
            grid-template-rows: auto;
        }

        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        td,
        th {
            border: 1px solid #dddddd;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #dddddd;
        }
        .section-content{
                text-align: justify;
        }
    </style>
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

        <!-- Start main-content -->
        <div class="main-content">

            <?php echo $__env->yieldContent('content'); ?>

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

</body>

</html>
<?php /**PATH C:\laragon\www\wp-filament-admin\resources\views/frontend/layouts/subpage.blade.php ENDPATH**/ ?>