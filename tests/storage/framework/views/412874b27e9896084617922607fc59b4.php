<div class="news-event-area">
    <div class="container">
        <div class="row">
            
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 news-inner-area">
                <h2 class="title-default-left">Latest News</h2>
                <?php if(count($latestNews) <= 0): ?>
                    <p class="text-center">There are no Latest News at the moment. Please check back later.</p>
                <?php else: ?>
                    <ul class="news-wrapper">
                        <?php $__currentLoopData = $latestNews->take(5); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $latestNewsItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li>
                                <div class="news-img-holder">
                                    <a href="<?php echo e($latestNewsItem->slug_url ?? '#'); ?>">
                                        <img src="<?php echo e($latestNewsItem->feature_image ? asset('storage/' . $latestNewsItem->feature_image) : asset('assets/images/news/news.jpg')); ?>"
                                             class="img-responsive" alt="<?php echo e($latestNewsItem->title ?? ''); ?>">
                                    </a>
                                </div>
                                <div class="news-content-holder">
                                    <h3>
                                        <a href="<?php echo e($latestNewsItem->slug_url ?? '#'); ?>"><?php echo e($latestNewsItem->title ?? ''); ?></a>
                                    </h3>
                                    <p><?php echo e(\Illuminate\Support\Str::limit($latestNewsItem->excerpt, 100)); ?></p>
                                </div>
                            </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                    <?php if(count($latestNews) > 2): ?>
                        <div class="news-btn-holder">
                            <a href="<?php echo e(route('frontend.pages.all-news')); ?>" class="view-all-accent-btn">View All</a>
                        </div>
                    <?php endif; ?>
                <?php endif; ?>
            </div>
            

            
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 event-inner-area">
                <h2 class="title-default-left">Upcoming Events</h2>
                <?php if(count($upcomingEvents) <= 0): ?>
                    <p class="text-center">There are no upcoming events at the moment. Please check back later.</p>
                <?php else: ?>
                    <ul class="event-wrapper">
                        <?php $__currentLoopData = $upcomingEvents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $event): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li class="wow bounceInUp" data-wow-duration="2s" data-wow-delay=".1s">
                                <div class="news-img-holder">
                                        <img style="" 
                                             class="img-responsive" 
                                             alt="<?php echo e($event->title ?? ''); ?>"
                                             src="<?php echo e($event->feature_image ? asset('storage/' . $event->feature_image) : asset('assets/images/blog/3.jpg')); ?>">
                                   
                                </div>
                                <div class="event-content-holder">
                                    <h3><a href="<?php echo e($event->slug_url ?? '#'); ?>"><?php echo e($event->title ?? ''); ?></a></h3>
                                    <p><?php echo e(\Illuminate\Support\Str::limit($event->excerpt, 100)); ?></p>
                                    <ul>
                                        <li><?php echo e(\Carbon\Carbon::parse($event->date)->format('d/m/y')); ?></li>
                                    </ul>
                                </div>
                            </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                    <?php if(count($upcomingEvents) > 2): ?>
                        <div class="event-btn-holder">
                            <a href="<?php echo e(route('frontend.pages.all-events')); ?>" class="view-all-primary-btn">View All</a>
                        </div>
                    <?php endif; ?>
                <?php endif; ?>
            </div>
            
        </div>
    </div>
</div>
<?php /**PATH C:\laragon\www\Filament\auxiliumkochi\resources\views/frontend/includes/upcomingEvents.blade.php ENDPATH**/ ?>