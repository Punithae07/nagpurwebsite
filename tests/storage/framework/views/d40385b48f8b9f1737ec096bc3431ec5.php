<header id="header" class="header">
    <div class="header-top bg-theme-color-2 sm-text-center p-0">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="widget no-border m-0">
                        <ul class="list-inline font-13 sm-text-center mt-5">
                            <li>
                                <a class="text-white" href="javascript:void(0)"><i class="fa fa-envelope mail-icon"
                                        aria-hidden="true"></i>stmarys.aihss@gmail.com</a>
                            </li>
                            <li class="text-white">|</li>
                            <li>
                                <a class="text-white" href="javascript:void(0)"><i class="fa fa-phone call-icon"
                                        aria-hidden="true"></i>044 – 25382152</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="widget no-border m-0 mr-15 pull-right flip sm-pull-none sm-text-center">
                        <ul
                            class="styled-icons icon-circled icon-sm pull-right flip sm-pull-none sm-text-center mt-sm-15">
                            <li><a href="javascript:void(0)"><i class="fa fa-facebook text-white"></i></a></li>
                            <li><a href="javascript:void(0)"><i class="fa fa-twitter text-white"></i></a></li>
                            <li><a href="javascript:void(0)"><i class="fa fa-google-plus text-white"></i></a></li>
                            <li><a href="javascript:void(0)"><i class="fa fa-instagram text-white"></i></a></li>
                            <li><a href="javascript:void(0)"><i class="fa fa-linkedin text-white"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="header-middle p-0 bg-lightest xs-text-center">
        <div class="container pt-0 pb-0">
            <div class="row">
                <div class="col-xs-12 col-sm-3 col-md-8">
                    <div class="widget no-border m-0">
                        <a href="javascript:void(0)"><img class="main-logo"
                                src="<?php echo e(asset('assets/images/logo-wide-2.png')); ?>" alt=""></a>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-2 col-md-2">
                    <div class="widget no-border pull-right sm-pull-none sm-text-center mt-10 mb-10 m-0">
                        <a class="btn btn-flat btn-theme-colored btn-lg mt-5" href="javascript:void(0)">Parent Access<i
                                class="fa fa-angle-double-right font-16 ml-10"></i></a>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-2 col-md-2">
                    <div class="widget no-border pull-right sm-pull-none sm-text-center mt-10 mb-10 m-0">
                        <a class="btn btn-flat btn-theme-colored btn-lg mt-5" href="javascript:void(0)">Fee Payment
                            Portal<i class="fa fa-angle-double-right font-16 ml-10"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="header-nav">
        <div class="header-nav-wrapper navbar-scrolltofixed bg-theme-colored border-bottom-theme-color-2-1px">
            <div class="container">
                <nav id="menuzord" class="menuzord bg-theme-colored flip menuzord-responsive">
                    <ul class="menuzord-menu">
                        <li class="active"><a href="<?php echo e(url('/')); ?>">Home</a></li>
                        <?php $__currentLoopData = Helper::getMenus(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li>
                                <?php if($menu->is_url): ?>
                                    <a href="<?php echo e($menu->url); ?>"><?php echo e($menu->name); ?></a>
                                <?php else: ?>
                                    <a href="<?php echo e(route($menu->page ? $menu->page->slug : '')); ?>"><?php echo e($menu->name); ?></a>
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
                                <li><a href="<?php echo e(route('frontend.pages.video-gallery')); ?>">Video Gallery</a></li>
                            </ul>
                        </li>

                        <li><a href="<?php echo e(route('frontend.pages.contact-us')); ?>">Contact Us</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>

</header>
<?php /**PATH C:\laragon\www\wp-filament-admin\resources\views/frontend/includes/header.blade.php ENDPATH**/ ?>