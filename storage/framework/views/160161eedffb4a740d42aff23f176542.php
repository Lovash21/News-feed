

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

<form action="<?php echo e(route('store')); ?>" method="POST" enctype="multipart/form-data">
    <?php echo csrf_field(); ?>
    <label for="title">Заголовок</label>
    <input id="title" type="text" name="title" value="<?php echo e(old('title')); ?>" autocomplete="off">
    <label for="lid">Краткое описание</label>
    <input id="lid" type="text" name="lid" value="<?php echo e(old('lid')); ?>" autocomplete="off">
    <label for="content">Контент</label>
    <input id="content" type="text" name="content" value="<?php echo e(old('content')); ?>" autocomplete="off">
    <label for="rubric">Рубрика</label>
    <select id="rubric" name="rubric_id">
        <?php $__currentLoopData = $rubrics; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rubric): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option value="<?php echo e($rubric['id']); ?>" <?php if($rubric['id'] === old('rubric_id')): echo 'selected'; endif; ?>><?php echo e($rubric['name']); ?></option>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </select>
    <label for="image">Изображение</label>
    <input id="image" name="image" type="file">
    <button type="submit">Отправить</button>
</form>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\OSPanel\home\pratick\News\resources\views/create.blade.php ENDPATH**/ ?>