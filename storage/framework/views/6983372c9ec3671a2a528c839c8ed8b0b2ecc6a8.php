<?php $__env->startSection('title'); ?>
	Home page
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
	<div class="container">
		<div class="row">
		<div class="col-md-3">
				<h3>Add action</h3>
				<?php if(count($errors->actionErrors) > 0): ?>
					<?php $__currentLoopData = $errors->actionErrors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<div class="alert alert-danger" role="alert">
						  <?php echo e($error); ?>

						</div>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				<?php endif; ?>
				<?php if(isset($action_message)): ?>
					<div class="alert alert-success" role="alert">
						  <span class="sr-only">Message:</span>
						  <?php echo e($action_message); ?>

						</div>
				<?php endif; ?>
				<form action="<?php echo e(route('addaction')); ?>" method="post">
					<div class="form-group">
						<label for="actionname">Action name</label>
						<input type="text" class="form-control" id="actionname" name="actionname">
					</div>
					<div class="form-group">
						<label for="niceness">Niceness</label>
						<input type="text" class="form-control" id="niceness" name="niceness">
					</div>
					<input type="hidden" name="_token" value="<?php echo e(Session::token()); ?>">
					<input type="submit" class="btn btn-primary" value="Submit">
				</form>
			</div>
			<div class="col-md-3">
				<h3>Action game</h3>
				<form action="<?php echo e(route('benice')); ?>" method="post">
					<div class="form-group">
						<label for="action">Greeting type</label>
						<select name="action" id="action" class="form-control">
							<?php $__currentLoopData = $actions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $action): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<option value="<?php echo e($action->name); ?>"><?php echo e($action->name); ?></option>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
				<?php if(count($errors->userErrors) > 0): ?>
					<?php $__currentLoopData = $errors->userErrors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
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
			<div class="col-md-3">
				<?php $__currentLoopData = $logged_actions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $logged_action): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<li>
						<?php echo e($logged_action->nice_action->name); ?>

						<ul>
							<?php $__currentLoopData = $logged_action->nice_action->categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<li><?php echo e($category->name); ?></li>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						</ul>
					</li>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			</div>
		</div>
	</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>