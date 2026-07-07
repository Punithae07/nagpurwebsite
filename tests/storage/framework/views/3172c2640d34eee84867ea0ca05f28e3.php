
<?php $__env->startSection('title', 'Gallery - ' . $year); ?>

<?php $__env->startSection('content'); ?>
    <div class="main-content">
        <div class="inner-page-banner-area" style="background-image: url('<?php echo e(asset('assets/img/banner/5.jpg')); ?>');">
            <div class="container">
                <div class="pagination-area">
                    <h1>Photo Gallery</h1>
                    <ul>
                        <li><a href="<?php echo e(url('/')); ?>">Home</a> -</li>
                        <li><a href="<?php echo e(route('frontend.pages.gallery')); ?>">Photo Gallery</a></li>
                        <li class="active text-gray-silver">Academic Year <?php echo e($year); ?></li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Section: Year Gallery -->
        <section class="about-page1-area">
            <div class="container">
                <div style="position: absolute;  right: 107px;    margin-top: -62px;">
                    <button class="default-big-btn" onclick="window.history.back()">Go Back</button>
                </div>
                <div class="row">
                    <?php if($galleries->count() > 0): ?>
                        <?php $__currentLoopData = $galleries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-md-4 mb-4">
                                <div class="gallery-item">
                                    <h3><a href="<?php echo e(route('gallery.show', $item->slug)); ?>"><?php echo e($item->title); ?></a></h3>
                                    <p><?php echo e($item->description); ?></p>
                                    <?php if(!empty($item->images) && is_array($item->images) && count($item->images) > 0): ?>
                                        <a href="<?php echo e(route('gallery.show', $item->slug)); ?>">
                                            <img src="<?php echo e(asset('storage/' . $item->images[0])); ?>" class="img-fluid"
                                                alt="<?php echo e($item->title); ?>"
                                                style="width: 100%; height: 300px; object-fit: cover;">
                                        </a>
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php else: ?>
                        <p class="text-center">No folders available for this year.</p>
                    <?php endif; ?>
                </div>
            </div>
        </section>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.subpage', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\Filament\auxiliumkochi\resources\views/frontend/pages/year-gallery.blade.php ENDPATH**/ ?>