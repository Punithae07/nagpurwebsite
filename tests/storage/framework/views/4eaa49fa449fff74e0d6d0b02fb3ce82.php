<header>
    <div id="header1" class="header1-area">
        <div class="main-menu-area bg-primary" id="sticker">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-2 col-md-3">
                        <div class="logo-area"> <a href="<?php echo e(url('/')); ?>"><img class="img-responsive"
                                    src="<?php echo e(asset('assets/img/logo-2.png')); ?>" alt="logo"></a> </div>
                    </div>
                    <div class="col-lg-8 col-md-9">
                        <nav id="desktop-nav">
                            <ul class="menuzord-menu">
                                <li class="active"><a href="<?php echo e(url('/')); ?>">Home</a></li>
                                <?php $__currentLoopData = Helper::getMenus(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li>
                                        <?php if($menu->is_url): ?>
                                            <a href="<?php echo e($menu->url); ?>"><?php echo e($menu->name); ?></a>
                                        <?php else: ?>
                                            <a
                                                href="<?php echo e(route($menu->page ? $menu->page->slug : '')); ?>"><?php echo e($menu->name); ?></a>
                                        <?php endif; ?>

                                        <?php if($menu->has('children') && $menu->children->isNotEmpty()): ?>
                                            
                                            <ul class="dropdown">
                                                <?php $__currentLoopData = $menu->children; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $child): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <li>
                                                        <?php if($child->is_url): ?>
                                                            <a href="<?php echo e($child->url); ?>"><?php echo e($child->name); ?></a>
                                                        <?php else: ?>
                                                            <a
                                                                href="<?php echo e(route($child->page ? $child->page->slug : '')); ?>"><?php echo e($child->name); ?></a>
                                                        <?php endif; ?>
                                                    </li>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </ul>
                                        <?php endif; ?>
                                    </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <li>
                                    <a href="javascript:void(0)">Gallery</a>
                                    <ul class="dropdown">
                                        <li><a href="<?php echo e(route('frontend.pages.gallery')); ?>">Photo Gallery</a></li>
                                        <li><a href="<?php echo e(route('frontend.pages.video-gallery')); ?>">Video Gallery</a>
                                        </li>
                                    </ul>
                                </li>

                                <li><a href="<?php echo e(route('frontend.pages.contact-us')); ?>">Contact Us</a></li>
                            </ul>
                        </nav>
                    </div>
                    <div class="col-lg-2 d-none d-lg-block">
                        <div class="apply-btn-area"> <a href="#" class="apply-now-btn">Online Fee</a> </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Mobile Menu Area Start -->
    <div class="mobile-menu-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="mobile-menu">
                        <nav id="dropdown">
                            <ul class="menuzord-menu">
                                <li class="active"><a href="<?php echo e(url('/')); ?>">Home</a></li>
                                <?php $__currentLoopData = Helper::getMenus(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li>
                                        <?php if($menu->is_url): ?>
                                            <a href="<?php echo e($menu->url); ?>"><?php echo e($menu->name); ?></a>
                                        <?php else: ?>
                                            <a
                                                href="<?php echo e(route($menu->page ? $menu->page->slug : '')); ?>"><?php echo e($menu->name); ?></a>
                                        <?php endif; ?>

                                        <?php if($menu->has('children') && $menu->children->isNotEmpty()): ?>
                                            
                                            <ul class="dropdown">
                                                <?php $__currentLoopData = $menu->children; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $child): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <li>
                                                        <?php if($child->is_url): ?>
                                                            <a href="<?php echo e($child->url); ?>"><?php echo e($child->name); ?></a>
                                                        <?php else: ?>
                                                            <a
                                                                href="<?php echo e(route($child->page ? $child->page->slug : '')); ?>"><?php echo e($child->name); ?></a>
                                                        <?php endif; ?>
                                                    </li>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </ul>
                                        <?php endif; ?>
                                    </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <li>
                                    <a href="javascript:void(0)">Gallery</a>
                                    <ul class="dropdown">
                                        <li><a href="<?php echo e(route('frontend.pages.gallery')); ?>">Photo Gallery</a></li>
                                        <li><a href="<?php echo e(route('frontend.pages.video-gallery')); ?>">Video Gallery</a>
                                        </li>
                                    </ul>
                                </li>

                                <li><a href="<?php echo e(route('frontend.pages.contact-us')); ?>">Contact Us</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Mobile Menu Area End -->
</header>
<?php /**PATH C:\laragon\www\Filament\auxiliumkochi\resources\views/frontend/includes/header.blade.php ENDPATH**/ ?>