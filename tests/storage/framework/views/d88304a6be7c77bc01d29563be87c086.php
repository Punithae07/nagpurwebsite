<?php $__env->startSection('title', 'All Upcoming Events'); ?>
<?php $__env->startSection('content'); ?>
    <!-- Start page-content -->
    <div class="main-content">

        <!-- Section: inner-header -->
        <div class="inner-page-banner-area" style="background-image: url('<?php echo e(asset('assets/img/banner/5.jpg')); ?>');">
            <div class="container">
                <div class="pagination-area">
                    <h1>All Upcoming Events</h1>
                    <ul>
                        <li><a href="<?php echo e(url('/')); ?>">Home</a> -</li>
                        <li>All Upcoming Events</li>
                    </ul>
                </div>
            </div>
        </div>

        <section class="about-page1-area">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 blog-pull-right">
                        <div class="row">
                            <?php $__currentLoopData = $upcomingEvents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $event): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="col-sm-6 col-md-4">
                                    <div class="service-block bg-white">
                                        <div class="thumb">
                                            <img alt="<?php echo e($event->title); ?>" src="<?php echo e($event->feature_image ? asset('storage/'.$event->feature_image) :  asset('assets/images/blog/3.jpg')); ?>" class="img-fullwidth">
                                            <h4 class="text-white mt-0 mb-0">
                                                <span class="price"><?php echo e(\Carbon\Carbon::parse($event->publish_date)->format('d, F Y')); ?></span>
                                            </h4>
                                        </div>
                                        <div class="content text-left flip p-25 pt-0">
                                            <h4 class="line-bottom mb-10"><?php echo e($event->title); ?></h4>
                                            <p><?php echo e(Str::limit($event->excerpt, 100)); ?></p>
                                            <a class="btn btn-dark btn-theme-colored btn-sm text-uppercase mt-10" href="<?php echo e($event->slug_url ?? ''); ?>">view details</a>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                        
                    </div>
                </div>
            </div>
        </section>

    </div>
    <!-- end page-content -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.subpage', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\Filament\auxiliumkochi\resources\views/frontend/pages/all-events.blade.php ENDPATH**/ ?>