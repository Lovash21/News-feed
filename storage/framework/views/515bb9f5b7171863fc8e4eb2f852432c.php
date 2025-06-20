<?php $__env->startSection('header'); ?>
<h1>Вход</h1>
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

<form action="<?php echo e(route('login-user')); ?>" method="POST">
    <?php echo csrf_field(); ?>
    <label for="email">Почта</label>
    <input id="email" type="email" name="email" value="<?php echo e(old('email')); ?>" autocomplete="email">
    <label for="password">Пароль</label>
    <input id="password" type="password" name="password" autocomplete="current-password">
    <button type="submit">Отправить</button>
</form>

<p>Нет аккаунта? <a href="<?php echo e(route('registration')); ?>">Зарегистрироваться</a></p>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\OSPanel\home\pratick\News\resources\views/auth.blade.php ENDPATH**/ ?>