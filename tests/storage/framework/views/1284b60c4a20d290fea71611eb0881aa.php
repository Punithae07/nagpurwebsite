<?php $__env->startSection('title', $post->title); ?>
<?php $__env->startSection('content'); ?>
    <!-- Start page-content -->
    <div class="main-content">

        <!-- Section: inner-header -->
        <div class="inner-page-banner-area" style="background-image: url('<?php echo e(asset('assets/img/banner/5.jpg')); ?>');">
            <div class="container">
                <div class="pagination-area">
                    <h1><?php echo e($post->title); ?></h1>
                    <ul>
                        <li><a href="<?php echo e(url('/')); ?>">Home</a> -</li>
                        <li><?php echo e($post->title); ?></li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Section: About -->
        <section class="about-page1-area">
            <div class="container">
                <div class="section-content">
 <h2 class=""><?php echo e($post->title); ?></h2>
                    

                     <?php if($post->feature_image): ?>
                        <img src="<?php echo e(asset("storage/$post->feature_image")); ?>" alt="Featured Image">
                    <?php else: ?>
                        <img src="" alt="Featured Image">
                    <?php endif; ?>

                    <p><?php echo e($post->excerpt); ?></p>
                    <?php if(!empty($post->content)): ?>

                        <?php $__currentLoopData = $post->content; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $block): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php
                                $dataBlock = $block['data'];
                                $content = data_get($dataBlock, 'content');
                                $alt = data_get($dataBlock, 'alt');
                                $image = data_get($dataBlock, 'image');
                                $images = data_get($dataBlock, 'images');
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

<?php echo $__env->make('frontend.layouts.subpage', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\Filament\auxiliumkochi\resources\views/frontend/post.blade.php ENDPATH**/ ?>