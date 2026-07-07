 

 <div class="slider1-area overlay-default index1">
    <div class="bend niceties preview-1">
        <div id="ensign-nivoslider-3" class="slides">
            <?php $__currentLoopData = $sliders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $slider): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <img src="<?php echo e(asset('storage/' . $slider->image ?? '')); ?>" alt="slider" title="#slider-direction-<?php echo e($loop->index + 1); ?>" />
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</div>

<?php /**PATH C:\laragon\www\Filament\auxiliumkochi\resources\views/frontend/includes/slider.blade.php ENDPATH**/ ?>