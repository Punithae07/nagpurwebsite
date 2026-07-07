<section id="blog">
    <div class="container pt-40">
        <div class="section-content">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="mt-0 text-uppercase font-28 line-bottom line-height-1">Upcoming <span
                            class="text-theme-color-2 font-weight-400">Events</span></h2>

                    <?php if(count($upcomingEvents) <= 0): ?>
                        <p class="text-center">There are no upcoming events at the moment. Please check back later.</p>
                    <?php else: ?>
                        <div class="owl-carousel-3col owl-nav-top" data-nav="true">
                            <?php $__currentLoopData = $upcomingEvents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $event): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="item">
                                    <article class="post clearfix bg-lighter">
                                        <div class="entry-header">
                                            <div class="post-thumb thumb">
                                                <img style="width:367px !important; height:246px !important;"
                                                    class="img-responsive img-fullwidth" alt="<?php echo e($event->title ?? ''); ?>"
                                                    src="<?php echo e($event->feature_image ? asset('storage/' . $event->feature_image) : asset('assets/images/blog/3.jpg')); ?>">
                                            </div>
                                            <div
                                                class="entry-date media-left text-center flip bg-theme-colored border-top-theme-color-2-3px pt-5 pr-15 pb-5 pl-15">
                                                <ul>
                                                    <li class="font-16 text-white font-weight-600">
                                                        <?php echo e(\Carbon\Carbon::parse($event->date)->format('d')); ?></li>
                                                    <li class="font-12 text-white text-uppercase">
                                                        <?php echo e(\Carbon\Carbon::parse($event->date)->format('M')); ?></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="entry-content p-15 pt-10 pb-10">
                                            <div class="entry-meta media no-bg no-border mt-0 mb-10">
                                                <div class="media-body pl-0">
                                                    <div class="event-content pull-left flip">
                                                        <h4
                                                            class="entry-title text-white text-uppercase font-weight-600 m-0 mt-5">
                                                            <a
                                                                href="<?php echo e($event->slug_url ?? ''); ?>"><?php echo e($event->title ?? ''); ?></a>
                                                        </h4>
                                                    </div>
                                                </div>
                                            </div>
                                            <p class="mt-5">
                                                <?php echo e(\Illuminate\Support\Str::limit($event->excerpt, 100)); ?><a
                                                    class="text-theme-color-2 font-12 ml-5"
                                                    href="<?php echo e($event->slug_url ?? ''); ?>"> View Details</a></p>
                                        </div>
                                    </article>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>

                        <?php if(count($upcomingEvents) > 2): ?>
                            <div class="text-center mt-20">
                                <a href="<?php echo e(route('frontend.pages.all-events')); ?>" class="btn btn-theme-colored">View All Events</a>
                            </div>
                        <?php endif; ?>
                    <?php endif; ?>

                </div>
            </div>
        </div>
    </div>
</section>
<?php /**PATH C:\laragon\www\wp-filament-admin\resources\views/frontend/includes/upcomingEvents.blade.php ENDPATH**/ ?>