<?php $__env->startSection('title', 'Gallery'); ?>
<?php $__env->startSection('content'); ?>
    <div class="main-content">
        <!-- Section: inner-header -->
        <div class="inner-page-banner-area" style="background-image: url('<?php echo e(asset('assets/img/banner/5.jpg')); ?>');">
            <div class="container">
                <div class="pagination-area">
                    <h1>Gallery</h1>
                    <ul>
                        <li><a href="<?php echo e(url('/')); ?>">Home</a> -</li>
                        <li>Gallery</li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Section: Gallery -->
        <section class="about-page1-area">
            <div class="container">
                <div class="row">
                    <?php if(count($yearWithRandomImage) > 0): ?>
                        <?php $__currentLoopData = $yearWithRandomImage; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $year => $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-md-4 mb-4">
                                <div class="gallery-item">
                                    <h2><a href="<?php echo e(route('gallery.year', $year)); ?>">Academic Year <?php echo e($year); ?></a>
                                    </h2>
                                    <?php if($data['randomImage']): ?>
                                        <a href="<?php echo e(route('gallery.year', $year)); ?>">
                                            <img src="<?php echo e(asset('assets/images/blog/preloader.gif')); ?>" class="img-fluid"
                                                alt="<?php echo e($year); ?>">
                                        </a>
                                    <?php else: ?>
                                        <p>No images available for this year.</p>
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php else: ?>
                        <p class="text-center">No images available</p>
                    <?php endif; ?>
                </div>
            </div>
        </section>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.subpage', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\Filament\auxiliumkochi\resources\views/frontend/pages/gallery.blade.php ENDPATH**/ ?>