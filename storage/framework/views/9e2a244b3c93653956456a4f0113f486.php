<?php $__env->startSection('header'); ?>
<h1>Новости науки</h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<section class="eight columns">
    <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <article class="blog_post">
        <div class="three columns">
        <a href="<?php echo e(route('statya', ['rubrics_id' => $post['rubric_id'], 'post_id' => $post['id']])); ?>" class="th"><img src="<?php echo e(asset('storage/' . $post['image'])); ?>" alt="desc" /></a>
        </div>
        <div class="nine columns">
         <a href="<?php echo e(route('statya', ['rubrics_id' => $post['rubric_id'], 'post_id' => $post['id']])); ?>"><h4><?php echo e($post['title']); ?></h4></a>
         <p> <?php echo e($post['lid']); ?></p>
         <?php if(auth()->guard()->check()): ?>
         <?php if(auth()->user()->isAdmin()): ?>
           <div>
            <form action="<?php echo e(route('delete', ['post_id' => $post['id'], 'rubrics_id' => $post['rubric_id']])); ?>" method="POST">
              <?php echo csrf_field(); ?>
              <?php echo method_field('DELETE'); ?>
              <button type="submit">Удалить</button>
            </form>
          </div>
         <?php endif; ?>
       <?php endif; ?>
         </div>
     </article>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</section>

<?php if(auth()->guard()->check()): ?>
      <?php if(auth()->user()->isAdmin()): ?>
      <section class="four columns">
        <H3>  &nbsp; </H3>
        <div class="panel">
          <h3>Админ-панель</h3>

        <ul class="accordion">
          <li class="active">
            <div class="title">
              <a href="<?php echo e(route('create')); ?>"><h5>Добавить статью</h5></a>
            </div>
          </li>
          <li class="active">
            <div class="title">
              <a href="<?php echo e(route('create-rubric')); ?>"><h5>Добавить рубрику</h5></a>
            </div>
          </li>
        </ul>

        </div>
      </section>
      <?php endif; ?>

    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer'); ?>
<section>

    <div class="section_dark">
    <div class="row">

    <h2></h2>

        <div class="two columns">
        <img src="<?php echo e(asset('images/thumb1.jpg')); ?>" alt="desc" />
        </div>

        <div class="two columns">
        <img src="<?php echo e(asset('images/thumb2.jpg')); ?>" alt="desc" />
        </div>

        <div class="two columns">
        <img src="<?php echo e(asset('images/thumb3.jpg')); ?>" alt="desc" />
        </div>

        <div class="two columns">
        <img src="<?php echo e(asset('images/thumb4.jpg')); ?>" alt="desc" />
        </div>

        <div class="two columns">
        <img src="<?php echo e(asset('images/thumb5.jpg')); ?>" alt="desc" />
        </div>

        <div class="two columns">
        <img src="<?php echo e(asset('images/thumb6.jpg')); ?>" alt="desc" />
        </div>


    </div>
    </div>

  </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\OSPanel\home\pratick\News\resources\views/index.blade.php ENDPATH**/ ?>