<?php $__env->startSection('title', $page->title); ?>
<?php $__env->startSection('content'); ?>
    <!-- Start page-content -->
    <div class="main-content">

        <!-- Section: inner-header -->
        <section class="inner-header divider parallax layer-overlay overlay-dark-5"
            data-bg-img="<?php echo e(asset('assets/images/bg/bg3.jpg')); ?>">
            <div class="container pt-70 pb-20">
                <!-- Section Content -->
                <div class="section-content">
                    <div class="row">
                        <div class="col-md-12">
                            <h2 class="title text-white"><?php echo e($page->title); ?></h2>
                            <ol class="breadcrumb text-left text-black mt-10">
                                <li><a href="<?php echo e(url('/')); ?>">Home</a></li>
                                <li class="active text-gray-silver"><?php echo e($page->title); ?></li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Section: About -->
        <section class="">
            <div class="container">
                <div class="section-content">
                    

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

    </div>
    <!-- end page-content -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.subpage', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\wp-filament-admin\resources\views/frontend/page.blade.php ENDPATH**/ ?>