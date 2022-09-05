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
    <div class="card">
      <div class="card-header">
        <?php echo e($patient->name); ?>

      </div>
      <div class="card-body">
        <table class="table table-hover">
          <tr>
            <td>PESEL</td>
            <td><?php echo e($patient->pesel); ?></td>
          </tr>
          <tr>
            <td>Email</td>
            <td><?php echo e($patient->email); ?></td>
          </tr>
          <tr>
            <td>Telefon</td>
            <td><?php echo e($patient->phone); ?></td>
          </tr>
          <tr>
            <td>Adres</td>
            <td><?php echo e($patient->address); ?></td>
          </tr>

        </table>
      </div>
    </div>
  </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('template', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>