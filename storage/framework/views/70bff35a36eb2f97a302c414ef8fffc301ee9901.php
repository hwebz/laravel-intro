<?php $__env->startSection('title'); ?>
	Nice
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
	<div class="container">
		<h3><?php echo e($action); ?> <?php echo e($name); ?></h3>
	</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>