<?php extract(collect($attributes->getAttributes())->mapWithKeys(function ($value, $key) { return [Illuminate\Support\Str::camel(str_replace([':', '.'], ' ', $key)) => $value]; })->all(), EXTR_SKIP); ?>
<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag; ?>
<?php foreach($attributes->onlyProps(['statePath']) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $attributes = $attributes->exceptProps(['statePath']); ?>
<?php foreach (array_filter((['statePath']), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>
<?php if (isset($component)) { $__componentOriginal9d0e0d3dae5be2b4072c8372b2a70ecf = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9d0e0d3dae5be2b4072c8372b2a70ecf = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'filament-tiptap-editor::components.tools.paragraph','data' => ['statePath' => $statePath]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('filament-tiptap-editor::tools.paragraph'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['state-path' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($statePath)]); ?>

<?php echo e($slot ?? ""); ?>

 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9d0e0d3dae5be2b4072c8372b2a70ecf)): ?>
<?php $attributes = $__attributesOriginal9d0e0d3dae5be2b4072c8372b2a70ecf; ?>
<?php unset($__attributesOriginal9d0e0d3dae5be2b4072c8372b2a70ecf); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9d0e0d3dae5be2b4072c8372b2a70ecf)): ?>
<?php $component = $__componentOriginal9d0e0d3dae5be2b4072c8372b2a70ecf; ?>
<?php unset($__componentOriginal9d0e0d3dae5be2b4072c8372b2a70ecf); ?>
<?php endif; ?><?php /**PATH C:\laragon\www\Filament\auxiliumkochi\storage\framework\views/0e252beea3d62297dbb1a6218604151a.blade.php ENDPATH**/ ?>