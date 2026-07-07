  <div class="students-say-area">
      <h2 class="title-default-center">Management Speak</h2>
      <div class="container">
          <div class="rc-carousel" data-loop="true" data-items="2" data-margin="30" data-autoplay="false"
              data-autoplay-timeout="10000" data-smart-speed="2000" data-dots="true" data-nav="false"
              data-nav-speed="false" data-r-x-small="1" data-r-x-small-nav="false" data-r-x-small-dots="true"
              data-r-x-medium="2" data-r-x-medium-nav="false" data-r-x-medium-dots="true" data-r-small="2"
              data-r-small-nav="false" data-r-small-dots="true" data-r-medium="2" data-r-medium-nav="false"
              data-r-medium-dots="true" data-r-large="2" data-r-large-nav="false" data-r-large-dots="true">
              <?php $__currentLoopData = $managementSpeak; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <div class="single-item">
                      <div class="single-item-wrapper">
                          <div class="profile-img-wrapper"> <a href="<?php echo e($post->slug_url ?? ''); ?>"
                                  class="profile-img"><img class="profile-img-responsive img-circle"
                                      src="<?php echo e(asset('storage/' . $post->feature_image ?? '')); ?>" alt="Testimonial"></a>
                          </div>
                          <div class="tlp-tm-content-wrapper">
                              <?php if(isset($post->author)): ?>
                                  <h3 class="item-title"><a
                                          href="<?php echo e($post->slug_url ?? ''); ?>"><?php echo e($post->author_name ?? ''); ?></a></h3>
                              <?php endif; ?>
                              <span class="item-designation"><?php echo e($post->title ?? ''); ?></span>
                              <div class="item-content"><?php echo e(Str::limit($post->excerpt ?? '', 200)); ?></div>
                          </div>
                      </div>
                  </div>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </div>
      </div>
  </div>
<?php /**PATH C:\laragon\www\Filament\auxiliumkochi\resources\views/frontend/includes/management.blade.php ENDPATH**/ ?>