<section id="home">
  <div class="container-fluid p-0">
    <!-- Slider Revolution Start -->
    <div class="rev_slider_wrapper">
      <div class="rev_slider" data-version="5.0">
        <ul>
          <?php $__currentLoopData = $sliders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $slider): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li data-index="rs-<?php echo e($loop->index); ?>" data-transition="slidingoverlayhorizontal" data-slotamount="default" data-easein="default" data-easeout="default" data-masterspeed="default" data-thumb="<?php echo e(asset($slider->thumbnail ?? '')); ?>" data-rotate="0" data-saveperformance="off" data-title="Web Show" data-description="">
              <!-- MAIN IMAGE -->
              <img src="<?php echo e(asset('storage/'.$slider->image ?? '')); ?>" alt="" data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" class="rev-slidebg" data-bgparallax="6" data-no-retina>
            </li>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
      </div>
    </div>
    <!-- Slider Revolution Ends -->

    
  </div>
</section><?php /**PATH C:\laragon\www\wp-filament-admin\resources\views/frontend/includes/slider.blade.php ENDPATH**/ ?>