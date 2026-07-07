<section class="divider parallax layer-overlay overlay-theme-colored-9" data-background-ratio="0.5"
    data-bg-img="<?php echo e(asset('assets/images/bg/bg2.jpg')); ?>">
    <div class="container pb-50">
        <div class="section-title">
            <div class="row">
                <div class="col-md-6">
                    <h2 class="mt-0 mb-0 text-uppercase line-bottom text-white font-28">Management
                        Speak<span class="font-30 text-theme-color-2">.</span></h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 mb-10">
                <div class="owl-carousel-2col boxed" data-dots="true">
                    <?php $__currentLoopData = $managementSpeak; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="item">
                            <div class="testimonial pt-10">
                                <div class="thumb pull-left mb-0 mr-0 pr-20">
                                    
                                        <img style="width: 131px !important;" class="img-circle" alt=""
                                        src="<?php echo e(asset('storage/' . $post->feature_image ?? '')); ?>"> 
                                </div>
                                <div class="ml-100">
                                    <h4 class="text-white mt-0"><?php echo e($post->title ?? ''); ?></h4>
                                    <p class="text-white"><?php echo e(Str::limit($post->excerpt ?? '', 200)); ?></p>
                                    <a href="<?php echo e($post->slug_url ?? ''); ?>"
                                        class="btn btn-flat btn-theme-colored text-uppercase mt-20 mb-sm-30 border-left-theme-color-2-4px">Read
                                        More</a>
                                    <?php if(isset($post->author)): ?>
                                        <p class="author mt-20">- <span
                                                class="text-theme-color-2"><?php echo e($post->author_name ?? ''); ?></span>,

                                            <small><em class="text-gray-lightgray"><?php echo e($post->author ?? ''); ?></em></small>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
    </div>
</section>
<?php /**PATH C:\laragon\www\wp-filament-admin\resources\views/frontend/includes/management.blade.php ENDPATH**/ ?>