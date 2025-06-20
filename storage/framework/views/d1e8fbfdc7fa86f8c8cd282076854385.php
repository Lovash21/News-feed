<?php $__env->startSection('header'); ?>
<h4><?php echo e($header); ?></h4>
    <article>
             <div class="twelve columns">
                 <h1><?php echo e($post['title']); ?></h1>
                      <p class="excerpt">
                      <?php echo e($post['lid']); ?>

                      </p>    
             </div>
    </article>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<p> <img src="<?php echo e(asset('storage/'. $post['image'])); ?>" alt="desc" width=400 align=left hspace=30>
      
    <?php echo e($post['content']); ?>

    
    </p>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\OSPanel\home\pratick\News\resources\views/statya.blade.php ENDPATH**/ ?>