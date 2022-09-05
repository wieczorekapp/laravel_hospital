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
    <h2>Dodawanie wizyt</h2>
      <form  action="<?php echo e(action('VisitController@store')); ?>" method="post" role="form">
        <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>"/>

        <div class="form-group">
          <label for="doctor">Lekarz:</label>
          <select name="doctor">
            <?php $__currentLoopData = $doctorsList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $doctor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <option value="<?php echo e($doctor->id); ?>"><?php echo e($doctor->name); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </select>
        </div>

        <div class="form-group">
          <label for="patient">Pacjent:</label>
          <select name="patient">
            <?php $__currentLoopData = $patientsList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $patient): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <option value="<?php echo e($patient->id); ?>"><?php echo e($patient->name); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </select>
        </div>

        <div class="form-group">
          <label for="date">Data</label>
          <input type="text" class="form-control" name="date" />
        </div>

        <input type="submit" value="Dodaj" class="btn btn-primary" />
      </form>
  </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('template', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>