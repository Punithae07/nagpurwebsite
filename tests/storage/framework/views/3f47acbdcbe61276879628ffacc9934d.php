<?php $__env->startSection('title', $galleryItem->title); ?>
<?php $__env->startSection('content'); ?>
    <div class="main-content">
        <!-- Section: inner-header -->

        <div class="inner-page-banner-area" style="background-image: url('<?php echo e(asset('assets/img/banner/5.jpg')); ?>');">
            <div class="container">
                <div class="pagination-area">
                    <h1><?php echo e($galleryItem->title); ?></h1>
                    <ul>
                        <li><a href="<?php echo e(url('/')); ?>">Home</a> -</li>
                        <li><a href="<?php echo e(route('frontend.pages.gallery')); ?>">Photo Gallery</a></li>
                        <li class="active text-gray-silver"><?php echo e($galleryItem->title); ?></li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="about-page1-area">
            <div class="container">
                <div class="d-flex justify-content-end mb-3">
                    <button class="default-big-btn" onclick="window.history.back()">Go Back</button>
                </div>
                <h2><?php echo e($galleryItem->title); ?></h2>
                <p><?php echo e($galleryItem->description); ?></p>
                <p><small><?php echo e(\Carbon\Carbon::parse($galleryItem->publish_date)->format('d M, Y')); ?></small></p>

                <div class="row featuredContainer gallery-wrapper">
                    <?php $__currentLoopData = $galleryItem->images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6 library auditoriam">
                            <div class="gallery-box">
                                <img src="<?php echo e(asset('storage/' . $image)); ?>" class="img-fluid" alt="gallery">
                                <div class="gallery-content">
                                    <a href="<?php echo e(asset('storage/' . $image)); ?>" class="zoom">
                                        <i class="fa fa-link" aria-hidden="true"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.subpage', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\Filament\auxiliumkochi\resources\views/frontend/pages/single-gallery.blade.php ENDPATH**/ ?>