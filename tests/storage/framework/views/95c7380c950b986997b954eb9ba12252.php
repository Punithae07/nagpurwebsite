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
<?php if (isset($component)) { $__componentOriginal549789eafc8ea00fca4312a9c93cc78f = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal549789eafc8ea00fca4312a9c93cc78f = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'filament-tiptap-editor::components.tools.underline','data' => ['statePath' => $statePath,'editor' => $editor]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('filament-tiptap-editor::tools.underline'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['state-path' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($statePath),'editor' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($editor)]); ?>

<?php echo e($slot ?? ""); ?>

 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal549789eafc8ea00fca4312a9c93cc78f)): ?>
<?php $attributes = $__attributesOriginal549789eafc8ea00fca4312a9c93cc78f; ?>
<?php unset($__attributesOriginal549789eafc8ea00fca4312a9c93cc78f); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal549789eafc8ea00fca4312a9c93cc78f)): ?>
<?php $component = $__componentOriginal549789eafc8ea00fca4312a9c93cc78f; ?>
<?php unset($__componentOriginal549789eafc8ea00fca4312a9c93cc78f); ?>
<?php endif; ?><?php /**PATH C:\laragon\www\Filament\auxiliumkochi\storage\framework\views/0e4d74a2ab582b9665ab8d95f87df1e2.blade.php ENDPATH**/ ?>