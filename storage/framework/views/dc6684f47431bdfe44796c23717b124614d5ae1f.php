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
        <?php echo e($doctor->name); ?>

      </div>
      <div class="card-body">
        <table class="table table-hover">
          <tr>
            <td>Email</td>
            <td><?php echo e($doctor->email); ?></td>
          </tr>
          <tr>
            <td>Telefon</td>
            <td><?php echo e($doctor->phone); ?></td>
          </tr>
          <tr>
            <td>Adres</td>
            <td><?php echo e($doctor->address); ?></td>
          </tr>
          <tr>
            <td>Status</td>
            <td><?php echo e($doctor->status); ?></td>
          </tr>

          <tr>
            <td>Specjalizacje</td>
            <td>
              <ul>
                  <?php $__currentLoopData = $doctor->specializations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $specialization): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                   <li><?php echo e($specialization->name); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </ul>
            </td>
          </tr>
        </table>
      </div>
    </div>
  </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('template', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>