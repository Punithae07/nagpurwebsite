<div class="fl-nw">
    <div class="container">
        <div class="row">
            <div style="border-right: 2px solid #f2184f;" class="col-md-2">
                <h4 style="color: aliceblue;">
                    <i style="padding-right: 10px; color: #f2184f" class="bi bi-megaphone-fill"></i>Announcement
                </h4>
            </div>
            <div class="col-md-10">
                <marquee style="margin-top: 9px;" onmouseover="this.stop()" onmouseout="this.start()">
                    <?php $__currentLoopData = $flashNews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $news): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <ul style="display: inline-block; list-style:none; padding-right: 10px;">
                            <li>
                                <i class="faa-burst animated "></i>
                                <a class="admission" style="color:#ffffff;" href="<?php echo e($news->slug_url ?? ''); ?>">
                                    <?php echo e($news->title); ?>

                                </a>
                                <img src="<?php echo e(asset('assets/images/news/new_icon.gif')); ?>" data-src="<?php echo e(asset('assets/images/news/new_icon.gif')); ?>" decoding="async" class="lazyloaded" data-eio-rwidth="25" data-eio-rheight="13">
                                <noscript>
                                    <img src="<?php echo e(asset('assets/images/news/new_icon.gif')); ?>" data-eio="l">
                                </noscript>
                            </li>
                        </ul>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </marquee>
            </div>
        </div>
    </div>
</div>
<?php /**PATH C:\laragon\www\wp-filament-admin\resources\views/frontend/includes/flashNews.blade.php ENDPATH**/ ?>