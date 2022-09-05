<?php $__env->startSection('title'); ?>
  <?php if(isset($title)): ?>
    - <?php echo e($title); ?>

  <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('year'); ?>
  <?php if(isset($year)): ?>
    - <?php echo e($year); ?>

  <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
  <div class="container">
    <h2>Dodawanie specjalizacji</h2>
      <form  action="<?php echo e(action('SpecializationController@store')); ?>" method="post" role="form">
        <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>"/>
        <div class="form-group">
          <label for="name">Nazwa specjalizacji</label>
          <input type="text" class="form-control" name="name" />
        </div>
        <input type="submit" value="Dodaj" class="btn btn-primary" />
      </form>
  </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('template', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>