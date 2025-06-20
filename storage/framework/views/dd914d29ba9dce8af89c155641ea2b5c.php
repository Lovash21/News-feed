<!DOCTYPE html>

<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="en"> <!--<![endif]-->
<head>
  <meta charset="utf-8" />

  <!-- Set the viewport width to device width for mobile -->
  <meta name="viewport" content="width=device-width" />

  <title><?php echo $__env->yieldContent('title', 'Новости науки'); ?></title>
  
  <!-- Included CSS Files (Uncompressed) -->
  <!--
  <link rel="stylesheet" href="stylesheets/foundation.css">
  -->
  
  <!-- Included CSS Files (Compressed) -->
  <link rel="stylesheet" href="<?php echo e(asset('stylesheets/foundation.min.css')); ?>">
       <link rel="stylesheet" href="<?php echo e(asset('stylesheets/main.css')); ?>">
  <link rel="stylesheet" href="<?php echo e(asset('stylesheets/app.css')); ?>">

  <script src="<?php echo e(asset('javascripts/modernizr.foundation.js')); ?>"></script>
  
  <link rel="stylesheet" href="<?php echo e(asset('fonts/ligature.css')); ?>">
  
  <!-- Google fonts -->
<link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300|Playfair+Display:400italic' rel='stylesheet' type='text/css' />

  <!-- IE Fix for HTML5 Tags -->
  <!--[if lt IE 9]>
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
  <![endif]-->

</head>

<body>

<!-- ######################## Main Menu ######################## -->
 
<nav>

     <div class="twelve columns header_nav">
     <div class="row">
        <ul id="menu-header" class="nav-bar horizontal">
        
          <li><a href="<?php echo e(route('home')); ?>">Главная</a></li>
          <?php $__currentLoopData = $rubrics; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rubric): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <li><a href="<?php echo e(route('rubrika', ['rubrics_id' => $rubric['id']])); ?>"><?php echo e($rubric['name']); ?></a></li>  
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

          <?php if(auth()->guard()->guest()): ?>
          <li><a href="<?php echo e(route('login')); ?>">Вход</a></li>
          <li><a href="<?php echo e(route('registration')); ?>">Регистрация</a></li>
          <?php endif; ?>

          <?php if(auth()->guard()->check()): ?>
            <li><a href="<?php echo e(route('logout')); ?>">Выйти</a></li>
          <?php endif; ?>
        </ul>
      </div>  
      </div>
      
</nav>
<!-- END main menu -->  
      
<header>
  <div class="row">
    <?php echo $__env->yieldContent('header'); ?>
  </div>
</header>

<!-- ######################## Section ######################## -->

<section class="section_light">
  <div class="row">
    <?php echo $__env->yieldContent('content'); ?>
  </div>
</section>


<?php echo $__env->yieldContent('footer'); ?>

<!-- ######################## Footer ######################## -->  
      
<footer>

      <div class="row">
      
          <div class="twelve columns footer">
              <a href="" class="lsf-icon" style="font-size:16px; margin-right:15px" title="twitter">Twitter</a> 
              <a href="" class="lsf-icon" style="font-size:16px; margin-right:15px" title="facebook">Facebook</a>
              <a href="" class="lsf-icon" style="font-size:16px; margin-right:15px" title="pinterest">Pinterest</a>
              <a href="" class="lsf-icon" style="font-size:16px" title="instagram">Instagram</a>
          </div>
          
      </div>

</footer>		  

<!-- ######################## Scripts ######################## --> 

    <!-- Included JS Files (Compressed) -->
    <script src="<?php echo e(asset('javascripts/foundation.min.js')); ?>" type="text/javascript"></script> 
    <!-- Initialize JS Plugins -->
     <script src="<?php echo e(asset('javascripts/app.js')); ?>" type="text/javascript"></script>
</body>
</html><?php /**PATH D:\OSPanel\home\pratick\News\resources\views/layouts/app.blade.php ENDPATH**/ ?>