<section id="newsevent" class="">
    <div class="container">
        <div class="section-content">
            <div class="row">
                <?php if(count($latestNews) == 0): ?>
                    <p class="text-center">There are no Latest News at the moment. Please check back later.</p>
                <?php else: ?>
                    <div class="col-md-6 wow fadeInLeft" data-wow-duration="1s" data-wow-delay="0.3s">
                        <h2 class="mt-0 text-uppercase font-28 line-bottom line-height-1">Latest <span
                                class="text-theme-color-2 font-weight-400">News</span></h2>
                        <div class="bxslider bx-nav-top">
                            <?php $__currentLoopData = $latestNews->take(5); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $latestNewsItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div
                                    class="border-1px border-left-theme-color-2-6px media sm-maxwidth400 p-15 mt-0 mb-15">
                                    <div class="testimonial pt-10">
                                        <div class="thumb pull-left mb-0 mr-0 pr-20">
                                            <img width="75" class="img-circle" alt=""
                                                src="<?php echo e($latestNewsItem->feature_image ? asset('storage/' . $latestNewsItem->feature_image) : asset('assets/images/news/news.jpg')); ?>">
                                        </div>
                                        <div class="ml-100">
                                            <a
                                                href="<?php echo e($latestNewsItem->slug_url ?? ''); ?>"><?php echo e($latestNewsItem->title ?? ''); ?></a>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                        
                        <?php if(count($latestNews) > 1): ?>
                            <div class="text-center mt-20">
                                <a href="<?php echo e(route('frontend.pages.all-news')); ?>" class="btn btn-theme-color-2" style="color:white;">View All</a>
                            </div>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>

                

                <div class="col-md-6 wow fadeInLeft" data-wow-duration="1s" data-wow-delay="0.3s">
                    <h2 class="mt-0 text-uppercase font-28 line-bottom line-height-1">
                        Birthday <span class="text-theme-color-2 font-weight-400">Celebrant</span>
                    </h2>
                    <div class="birthday-carousel">
                        <?php if($birthdayCelebrants->count() > 0): ?>
                            <?php $__currentLoopData = $birthdayCelebrants; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $celebrant): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="birthday-item">
                                    <div class="birthday-image">
                                        <img src="https://photo.smartschoolplus.co.in/images/STMARYSCHN/StudentPhoto/<?php echo e($celebrant->photo); ?>"
                                            alt="<?php echo e($celebrant->name); ?>">
                                        <div class="overlay">
                                            <p class="birthday-name">
                                                <?php echo e($celebrant->name); ?><?php echo e($celebrant->class ? ' - ' . $celebrant->class : ''); ?>

                                            </p>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php else: ?>
                            <p style="color:white;">No Birthday Today</p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php /**PATH C:\laragon\www\wp-filament-admin\resources\views/frontend/includes/newsCelebrant.blade.php ENDPATH**/ ?>