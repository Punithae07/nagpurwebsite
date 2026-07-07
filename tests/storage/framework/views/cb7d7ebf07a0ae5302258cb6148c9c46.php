<?php $__env->startSection('title', __('Not Found')); ?>
<?php $__env->startSection('code', '404'); ?>
<?php $__env->startSection('message', __('Not Found')); ?>
<?php $__env->startSection('content'); ?>
    <!-- Start page-content -->
    <div class="main-content">

        <!-- Section: inner-header -->
        <section class="inner-header divider parallax layer-overlay overlay-dark-5"
            data-bg-img="<?php echo e(asset('assets/images/bg/bg3.jpg')); ?>">
            <div class="container pt-70 pb-20">
                <!-- Section Content -->
                <div class="section-content">
                    <div class="row">
                        <div class="col-md-12">
                            <h2 class="title text-white">404 Error</h2>
                            <ol class="breadcrumb text-left text-black mt-10">
                                <li><a href="<?php echo e(url('/')); ?>">Home</a></li>
                                <li class="active text-gray-silver">404 Error</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section>
            <div class="container">
                <div class="row">
                    <div class="col-md-12 blog-pull-right" style="text-align:center;">
                        <p  style="text-align:center;">Oops! Page Not Found</p>
                        <h1  style="text-align:center;">404</h1>
                        <p  style="text-align:center;"> We Are Sorry, but the Page You Requested Was <br>Not Found</p>
                        <div class="read-more-btn">
                            <i class="fa fa-home" aria-hidden="true" style="color: #222; font-size: 20px;"></i>
                            <a href="<?php echo e(url('/')); ?>" onclick="window.history.back(-1);"
                                style="font-size: 18px; color:blue;">Back to Home</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </div>
    <!-- end page-content -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.subpage', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\Filament\auxiliumkochi\resources\views/errors/404.blade.php ENDPATH**/ ?>