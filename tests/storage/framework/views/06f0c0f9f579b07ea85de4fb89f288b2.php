<?php $__env->startSection('title', $page->title); ?>
<?php $__env->startSection('content'); ?>
    <!-- Start page-content -->
    <div class="main-content">

        <!-- Section: inner-header -->
        <div class="inner-page-banner-area" style="background-image: url('<?php echo e(asset('assets/img/banner/5.jpg')); ?>');">
            <div class="container">
                <div class="pagination-area">
                    <h1><?php echo e($page->title); ?></h1>
                    <ul>
                        <li><a href="<?php echo e(url('/')); ?>">Home</a> -</li>
                        <li><?php echo e($page->title); ?></li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Section: About -->
        <section class="about-page1-area">
            <div class="container">
                <div class="section-content">
                    <h2 class=""><?php echo e($page->title); ?></h2>

                    <?php if($page->feature_image): ?>
                        <img src="<?php echo e(asset("storage/$page->feature_image")); ?>" alt="Featured Image">
                    <?php endif; ?>
                    <p><?php echo e($page->excerpt); ?></p>

                    <?php if(!empty($page->content)): ?>
                        <?php $__currentLoopData = $page->content; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $block): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php
                                $dataBlock = $block['data'];
                                $content = data_get($dataBlock, 'content');
                                $alt = data_get($dataBlock, 'alt');
                                $url = data_get($dataBlock, 'url');
                                $level = data_get($dataBlock, 'level');
                            ?>
                            <?php switch($block['type']):
                                case ('heading'): ?>
                                    <?php echo "<$level>$content</$level>"; ?>

                                <?php break; ?>

                                <?php case ('Rich Editor'): ?>
                                    <?php echo $content; ?>

                                <?php break; ?>

                                <?php case ('TipTap Editor'): ?>
                                    <?php echo tiptap_converter()->asHTML($content); ?>

                                <?php break; ?>

                                <?php case ('image'): ?>
                                    <?php if($url): ?>
                                        <img src="<?php echo e(asset("storage/$url")); ?>" alt="<?php echo e($alt); ?>">
                                    <?php endif; ?>
                                <?php break; ?>

                                <?php case ('Multiple Images'): ?>
                                    <?php if(is_array($url) && count($url)): ?>
                                        <?php $__currentLoopData = $url; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <img src="<?php echo e(asset("storage/$item")); ?>" alt="<?php echo e($alt); ?>">
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                                <?php break; ?>

                                <?php default: ?>
                                    <div><?php echo e('Block type not recognized.'); ?></div>
                            <?php endswitch; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                </div>
            </div>
        </section>

        <!-- Load Activities section only if the page is 'activities' -->
        <?php if(!empty($activities) && $page->slug === 'activities'): ?>

            <section class="about-page1-area">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 blog-pull-right">
                            <?php $__currentLoopData = $activities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $activity): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="row mb-15">
                                    <div class="col-sm-6 col-md-4">
                                        <div class="thumb">
                                            <img style ="width:50% !important" alt="<?php echo e($activity->title ?? ''); ?>"
                                                src="<?php echo e($activity->feature_image ? asset('storage/' . $activity->feature_image) : asset('assets/images/news/news.jpg')); ?>"
                                                class="img-fullwidth">
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-8">
                                        <h4 class="line-bottom mt-0 mt-sm-20"><?php echo e($activity->title); ?></h4>
                                        <p><?php echo e(Str::limit($activity->excerpt ?? '', 150)); ?></p>
                                        <a class="default-big-btn disabled"
                                            href="<?php echo e($activity->slug_url ?? ''); ?>">view details</a>
                                    </div>
                                </div>
                                <hr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>

                </div>
            </section>
        <?php endif; ?>
    </div>
    <!-- end page-content -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.subpage', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\Filament\auxiliumkochi\resources\views/frontend/page.blade.php ENDPATH**/ ?>