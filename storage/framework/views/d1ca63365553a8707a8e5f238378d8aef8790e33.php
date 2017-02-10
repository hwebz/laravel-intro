<?php $__env->startSection('title'); ?>
	Greeting
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
	<div class="container">
		<h3>Welcome <?php echo e($name); ?> to our webpage</h3>
	</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>