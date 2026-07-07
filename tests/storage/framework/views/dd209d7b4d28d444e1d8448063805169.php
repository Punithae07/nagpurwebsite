<section id="gallery" class="">
    <div class="container">
        <div class="section-content">
            <div class="row">
                <div class="col-md-12 wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.3s">
                    <h2 class="mt-0 text-uppercase font-28 line-bottom line-height-1">Photo 
                        <span class="text-theme-color-2 font-weight-400">Gallery</span>
                    </h2>

                    <!-- Portfolio Gallery Grid -->
                    <div class="gallery-isotope grid-4 gutter-small clearfix" data-lightbox="gallery">
                        <?php $__currentLoopData = $galleries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $galleryItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php
                                $randomIndex = array_rand($galleryItem->images);
                                $randomImage = $galleryItem->images[$randomIndex];
                            ?>
                            <div class="gallery-item">
                                <div class="thumb">
                                    <img style="width: 200px; height: 200px;" alt="project" src="<?php echo e(asset('storage/' . $randomImage)); ?>" class="img-fullwidth">
                                    <div class="overlay-shade"></div>
                                    <div class="icons-holder">
                                        <div class="icons-holder-inner">
                                            <div class="styled-icons icon-sm icon-dark icon-circled icon-theme-colored">
                                                <a href="<?php echo e(asset('storage/' . $randomImage)); ?>" data-lightbox-gallery="gallery">
                                                    <i class="fa fa-picture-o"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                    <!-- End Portfolio Gallery Grid -->

                    <!-- View All Button -->
                    <?php if($totalGalleries > 8): ?>
                        <div class="text-center mt-20">
                            <a href="<?php echo e(route('frontend.pages.gallery')); ?>" class="btn btn-theme-colored">View All Gallery</a>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>
<?php /**PATH C:\laragon\www\wp-filament-admin\resources\views/frontend/includes/gallery.blade.php ENDPATH**/ ?>