<?php $__env->startSection('title', 'Latest News'); ?>
<?php $__env->startSection('content'); ?>
    <!-- Start page-content -->
    <div class="main-content">

        <!-- Section: inner-header -->
        <div class="inner-page-banner-area" style="background-image: url('<?php echo e(asset('assets/img/banner/5.jpg')); ?>');">
            <div class="container">
                <div class="pagination-area">
                    <h1>All Latest News</h1>
                    <ul>
                        <li><a href="<?php echo e(url('/')); ?>">Home</a> -</li>
                        <li>All Latest News</li>
                    </ul>
                </div>
            </div>
        </div>

        <section class="about-page1-area">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 blog-pull-right">
                        <?php $__currentLoopData = $latestNews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $news): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="row mb-15">
                            <div class="col-sm-6 col-md-4">
                                <div class="thumb">
                                    <img style ="width:50% !important" alt="<?php echo e($news->title ?? ''); ?>" src="<?php echo e($news->feature_image ? asset('storage/' . $news->feature_image) : asset('assets/images/news/news.jpg')); ?>"
                                        class="img-fullwidth">
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-8">
                                <h4 class="line-bottom mt-0 mt-sm-20"><?php echo e($news->title); ?></h4>
                                <p><?php echo e(Str::limit($news->excerpt ?? '', 150)); ?></p>
                                <a class="btn btn-dark btn-theme-colored btn-sm text-uppercase mt-10"
                                    href="<?php echo e($news->slug_url ?? ''); ?>">view details</a>
                            </div>
                        </div>
                        <hr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        
                    </div>
                </div>
                
            </div>
        </section>

    </div>
    <!-- end page-content -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.subpage', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\Filament\auxiliumkochi\resources\views/frontend/pages/all-news.blade.php ENDPATH**/ ?>