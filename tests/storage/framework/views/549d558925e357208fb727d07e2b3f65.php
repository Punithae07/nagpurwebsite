<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag; ?>
<?php foreach($attributes->onlyProps([
    'file' => null,
    'actions' => [],
]) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $attributes = $attributes->exceptProps([
    'file' => null,
    'actions' => [],
]); ?>
<?php foreach (array_filter(([
    'file' => null,
    'actions' => [],
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>

<!--[if BLOCK]><![endif]--><?php if($file): ?>
<?php if (isset($component)) { $__componentOriginal511d4862ff04963c3c16115c05a86a9d = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal511d4862ff04963c3c16115c05a86a9d = $attributes; } ?>
<?php $component = Illuminate\View\DynamicComponent::resolve(['component' => $getFieldWrapperView()] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('dynamic-component'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\DynamicComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
    <div class="flex justify-center overflow-hidden border border-gray-300 rounded dark:border-gray-700 checkered h-48 flex-shrink-0 relative">
        <!--[if BLOCK]><![endif]--><?php if(str($file['type'])->contains('image')): ?>
            <img
                src="<?php echo e($file['url']); ?>"
                alt="<?php echo e($file['alt'] ?? ''); ?>"
                width="<?php echo e($file['width']); ?>"
                height="<?php echo e($file['height']); ?>"
                loading="lazy"
                class="overflow-hidden h-full w-auto border border-gray-300 rounded dark:border-gray-900 checkered"
            />
        <?php elseif(str($file['type'])->contains('video')): ?>
            <video controls src="<?php echo e($file['url']); ?>"></video>
        <?php else: ?>
            <?php if (isset($component)) { $__componentOriginaldf8a712998df2199f6fd7a9afac78c10 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginaldf8a712998df2199f6fd7a9afac78c10 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'curator::components.document-image','data' => ['label' => ''.e($file['name']).'','iconSize' => 'xl','class' => 'p-4 rounded','type' => $file['type']]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('curator::document-image'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['label' => ''.e($file['name']).'','icon-size' => 'xl','class' => 'p-4 rounded','type' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($file['type'])]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginaldf8a712998df2199f6fd7a9afac78c10)): ?>
<?php $attributes = $__attributesOriginaldf8a712998df2199f6fd7a9afac78c10; ?>
<?php unset($__attributesOriginaldf8a712998df2199f6fd7a9afac78c10); ?>
<?php endif; ?>
<?php if (isset($__componentOriginaldf8a712998df2199f6fd7a9afac78c10)): ?>
<?php $component = $__componentOriginaldf8a712998df2199f6fd7a9afac78c10; ?>
<?php unset($__componentOriginaldf8a712998df2199f6fd7a9afac78c10); ?>
<?php endif; ?>
        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

        <div class="absolute top-0 right-0 flex bg-gray-900 divide-x divide-gray-700 rounded-bl-lg shadow-md">
            <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $actions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $action): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php echo e(($action)(['item' => $file])); ?>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
        </div>
    </div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal511d4862ff04963c3c16115c05a86a9d)): ?>
<?php $attributes = $__attributesOriginal511d4862ff04963c3c16115c05a86a9d; ?>
<?php unset($__attributesOriginal511d4862ff04963c3c16115c05a86a9d); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal511d4862ff04963c3c16115c05a86a9d)): ?>
<?php $component = $__componentOriginal511d4862ff04963c3c16115c05a86a9d; ?>
<?php unset($__componentOriginal511d4862ff04963c3c16115c05a86a9d); ?>
<?php endif; ?>
<?php endif; ?><!--[if ENDBLOCK]><![endif]--><?php /**PATH C:\laragon\www\Filament\auxiliumkochi\vendor\awcodes\filament-curator\src\/../resources/views/components/forms/edit-preview.blade.php ENDPATH**/ ?>