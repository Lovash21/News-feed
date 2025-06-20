<?php $__env->startSection('header'); ?>
<h1>Создание новости</h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<?php if($errors->any()): ?>
        <div class="alert alert-danger">
            <ul>
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($error); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
<?php endif; ?>

<form action="<?php echo e(route('store-rubric')); ?>" method="POST">
    <?php echo csrf_field(); ?>
    <label for="name">Название рубрики</label>
    <input id="name" type="text" name="name" value="<?php echo e(old('name')); ?>" autocomplete="off">
    <button type="submit">Отправить</button>
</form>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\OSPanel\home\pratick\News\resources\views/rubric.blade.php ENDPATH**/ ?>