<?php extract(collect($attributes->getAttributes())->mapWithKeys(function ($value, $key) { return [Illuminate\Support\Str::camel(str_replace([':', '.'], ' ', $key)) => $value]; })->all(), EXTR_SKIP); ?>
<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag; ?>
<?php foreach($attributes->onlyProps(['statePath','editor']) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $attributes = $attributes->exceptProps(['statePath','editor']); ?>
<?php foreach (array_filter((['statePath','editor']), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>
<?php if (isset($component)) { $__componentOriginal2c002c17d4f40eae2f8ee8134980f584 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal2c002c17d4f40eae2f8ee8134980f584 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'filament-tiptap-editor::components.tools.source','data' => ['statePath' => $statePath,'editor' => $editor]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('filament-tiptap-editor::tools.source'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['state-path' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($statePath),'editor' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($editor)]); ?>

<?php echo e($slot ?? ""); ?>

 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal2c002c17d4f40eae2f8ee8134980f584)): ?>
<?php $attributes = $__attributesOriginal2c002c17d4f40eae2f8ee8134980f584; ?>
<?php unset($__attributesOriginal2c002c17d4f40eae2f8ee8134980f584); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal2c002c17d4f40eae2f8ee8134980f584)): ?>
<?php $component = $__componentOriginal2c002c17d4f40eae2f8ee8134980f584; ?>
<?php unset($__componentOriginal2c002c17d4f40eae2f8ee8134980f584); ?>
<?php endif; ?><?php /**PATH C:\laragon\www\Filament\auxiliumkochi\storage\framework\views/90f943a836ee13ad918d9e290693da5b.blade.php ENDPATH**/ ?>