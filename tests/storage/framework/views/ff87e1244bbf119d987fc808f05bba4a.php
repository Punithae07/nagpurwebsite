<?php
    $mountedFormComponentActionsData = $getLivewire()->mountedFormComponentActionsData;

    $data = $mountedFormComponentActionsData[array_key_last($mountedFormComponentActionsData)];
?>

<div class="rounded-lg p-4 bg-gray-100 dark:bg-gray-950">
    <div class="grid gap-4" style="grid-template-columns: repeat(<?php echo e($data['columns']); ?>, minmax(0, 1fr))">
        <!--[if BLOCK]><![endif]--><?php if($data['asymmetric']): ?>
            <div
                class="bg-gray-300 dark:bg-gray-800 rounded-lg border border-dashed border-white dark:border-gray-600 p-0.5 text-center"
                style="grid-column: span <?php echo e($data['asymmetric_left']); ?>;"
            >
                <p>1</p>
            </div>
            <div
                class="bg-gray-300 dark:bg-gray-800 rounded-lg border border-dashed border-white dark:border-gray-600 p-0.5 text-center"
                style="grid-column: span <?php echo e($data['asymmetric_right']); ?>;"
            >
                <p>1</p>
            </div>
        <?php else: ?>
            <!--[if BLOCK]><![endif]--><?php $__currentLoopData = range(1, $data['columns']); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $column): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="bg-gray-300 dark:bg-gray-800 rounded-lg border border-dashed border-white dark:border-gray-600 p-0.5 text-center">
                    <p><?php echo e($column); ?></p>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
    </div>
</div>
<?php /**PATH C:\laragon\www\Filament\auxiliumkochi\vendor\awcodes\filament-tiptap-editor\src\/../resources/views/components/grid-modal-preview.blade.php ENDPATH**/ ?>