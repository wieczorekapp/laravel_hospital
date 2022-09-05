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
    <?php if($errors->any()): ?>
      <div class="alert alert-danger">
        <ul>
          <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li><?php echo e($error); ?></li>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
      </div>
    <?php endif; ?>
    <h2>Dodawanie lekarza</h2>
      <form  action="<?php echo e(action('DoctorController@store')); ?>" method="post" role="form">
        <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>"/>

        <div class="form-group">
          <label for="name">Imię i nazwisko</label>
          <input type="text" class="form-control" name="name" />
        </div>

        <div class="form-group">
          <label for="email">Email</label>
          <input type="email" class="form-control" name="email" />
        </div>

        <div class="form-group">
          <label for="name">Hasło</label>
          <input type="password" class="form-control" name="password" />
        </div>

        <div class="form-group">
          <label for="phone">Telefon</label>
          <input type="text" class="form-control" name="phone" />
        </div>

        <div class="form-group">
          <label for="adress">Adres</label>
          <input type="text" class="form-control" name="adress" />
        </div>

        <div class="form-group">
          <label for="pesel">PESEL</label>
          <input type="text" class="form-control" name="pesel" />
        </div>

        <div class="form-group form-check">
          Specjalizacje <br />

            <?php $__currentLoopData = $specializations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $specialization): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <input type="checkbox" class="form-check-input" name="specializations[]" value="<?php echo e($specialization->id); ?>" />
              <label class="form-check-label" for="specializations[]"><?php echo e($specialization->name); ?></label><br />
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>

        <input type="hidden" name="status" value="Active"/>
        <input type="hidden" name="type" value="doctor"/>

        <input type="submit" value="Dodaj" class="btn btn-primary" />
      </form>
  </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('template', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>