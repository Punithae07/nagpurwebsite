<div class="gallery-area1">
    <div class="container">
        <div class="row gallery-wrapper">
            <h2 class="title-default-left">Latest Gallery</h2>
            <?php $__currentLoopData = $galleries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $galleryItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php
                    // Check if the images field is already an array, if not, decode it
                    $images = is_array($galleryItem->images)
                        ? $galleryItem->images
                        : json_decode($galleryItem->images, true);
                    // Ensure that $images is an array and not empty
                    if (is_array($images) && count($images) > 0) {
                        $randomIndex = array_rand($images);
                        $randomImage = $images[$randomIndex];
                    } else {
                        $randomImage = null;
                    }
                ?>
                <?php if($randomImage): ?>
                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12">
                        <div class="gallery-box">
                            <img src="<?php echo e(asset('storage/' . $randomImage)); ?>" class="img-responsive" alt="gallery">
                            <div class="gallery-content">
                                <a href="<?php echo e(asset('storage/' . $randomImage)); ?>" class="zoom"><i class="fa fa-link"
                                        aria-hidden="true"></i></a>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            <?php if($totalGalleries > 8): ?>
                <div class="event-btn-holder">
                    <a href="<?php echo e(route('frontend.pages.gallery')); ?>" class="view-all-primary-btn">View All</a>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>
<?php /**PATH C:\laragon\www\Filament\auxiliumkochi\resources\views/frontend/includes/gallery.blade.php ENDPATH**/ ?>