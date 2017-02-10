<?php $__env->startSection('title'); ?>
	Home page
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
	<div class="container">
		<div class="row">
			<div class="col-md-3">
				<h3>Action game</h3>
				<form action="<?php echo e(route('benice')); ?>" method="post">
					<div class="form-group">
						<label for="action">Greeting type</label>
						<select name="action" id="action" class="form-control">
							<option value="Greet">Greet</option>
							<option value="Kiss">Kiss</option>
							<option value="Hug">Hug</option>
						</select>
					</div>
					<div class="form-group">
						<label for="name">Your name</label>
						<input type="text" class="form-control" id="name" name="name">
					</div>
					<input type="hidden" name="_token" value="<?php echo e(Session::token()); ?>">
					<input type="submit" class="btn btn-primary" value="Submit">
				</form>
			</div>
			<div class="col-md-3">
				<h3>Login</h3>
				<?php if(count($errors) > 0): ?>
					<?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<div class="alert alert-danger" role="alert">
						  <?php echo e($error); ?>

						</div>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				<?php endif; ?>
				<?php if(isset($message)): ?>
					<div class="alert alert-success" role="alert">
						  <span class="sr-only">Message:</span>
						  <?php echo e($message); ?>

						</div>
				<?php endif; ?>
				<form action="<?php echo e(route('login')); ?>" method="post">
					<div class="form-group">
						<label for="username">Username</label>
						<input class="form-control" type="text" name="username" id="username">
					</div>
					<div class="form-group">
						<label for="password">Password*</label>
						<input class="form-control" type="password" name="password" id="password">
					</div>
					<input type="hidden" name="_token" value="<?php echo e(Session::token()); ?>">
					<input type="submit" class="btn btn-primary" value="Submit">
				</form>
			</div>
		</div>
	</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>