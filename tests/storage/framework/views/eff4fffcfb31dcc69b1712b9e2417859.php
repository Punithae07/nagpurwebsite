<?php $__env->startSection('title', 'Video Gallery'); ?>
<?php $__env->startSection('content'); ?>
    <div class="main-content">
        <!-- Section: inner-header -->
        <div class="inner-page-banner-area" style="background-image: url('<?php echo e(asset('assets/img/banner/5.jpg')); ?>');">
            <div class="container">
                <div class="pagination-area">
                    <h1>Video Gallery</h1>
                    <ul>
                        <li><a href="<?php echo e(url('/')); ?>">Home</a> -</li>
                        <li>Video Gallery</li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Section: Gallery -->
        <section class="about-page1-area">
            <div class="container">
            <h2>Video Gallery</h2>
                <div class="row">
                
                    <?php if(count($videos) > 0): ?>
                        <?php $__currentLoopData = $videos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $video): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-md-4 mb-4">
                                <div class="gallery-item">
                                    <h2><?php echo e($video->title); ?></h2>
                                    <?php
                                        // Check if the link is a YouTube link and format it for embedding
                                        $parsedUrl = parse_url($video->link);
                                        $isYouTube =
                                            isset($parsedUrl['host']) && $parsedUrl['host'] === 'www.youtube.com';
                                        $embedUrl = $isYouTube
                                            ? 'https://www.youtube.com/embed/' . (explode('v=', $video->link)[1] ?? '')
                                            : $video->link;
                                    ?>
                                    <!-- Show video using iframe -->
                                    <iframe width="100%" height="100px" src="<?php echo e($embedUrl); ?>" frameborder="0"
                                        allowfullscreen></iframe>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php else: ?>
                        <p class="text-center">No videos available</p>
                    <?php endif; ?>
                </div>
            </div>
        </section>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.subpage', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\Filament\auxiliumkochi\resources\views/frontend/pages/video-gallery.blade.php ENDPATH**/ ?>