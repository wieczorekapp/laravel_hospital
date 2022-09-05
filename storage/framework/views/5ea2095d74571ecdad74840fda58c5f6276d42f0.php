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
    <h2>Edycja lekarza</h2>
      <form  action="<?php echo e(action('DoctorController@editStore')); ?>" method="post" role="form">
        <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>"/>

        <input type="hidden" name="id" value="<?php echo e($doctor->id); ?>"/>
        <input type="hidden" name="type" value="<?php echo e($doctor->type); ?>"/>

        <div class="form-group">
          <label for="name">Imię i nazwisko</label>
          <input type="text" class="form-control" name="name" value="<?php echo e($doctor->name); ?>"/>
        </div>

        <div class="form-group">
          <label for="email">Email</label>
          <input type="email" class="form-control" name="email" value="<?php echo e($doctor->email); ?>"/>
        </div>

        <div class="form-group">
          <label for="phone">Telefon</label>
          <input type="text" class="form-control" name="phone" value="<?php echo e($doctor->phone); ?>"/>
        </div>

        <div class="form-group">
          <label for="adress">Adres</label>
          <input type="text" class="form-control" name="adress" value="<?php echo e($doctor->address); ?>"/>
        </div>

        <div class="form-group">
          <label for="pesel">PESEL</label>
          <input type="text" class="form-control" name="pesel" value="<?php echo e($doctor->pesel); ?>"/>
        </div>

        <div class="form-group form-check">
          Specjalizacje <br />

            <?php $__currentLoopData = $specializations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $specialization): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <?php if($doctor->specializations->contains($specialization->id)): ?>
                <input type="checkbox" class="form-check-input" name="specializations[]" value="<?php echo e($specialization->id); ?>" checked/>
                <label class="form-check-label" for="specializations[]"><?php echo e($specialization->name); ?></label><br />
              <?php else: ?>
                <input type="checkbox" class="form-check-input" name="specializations[]" value="<?php echo e($specialization->id); ?>" />
                <label class="form-check-label" for="specializations[]"><?php echo e($specialization->name); ?></label><br />
              <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>

        <div class="form-group">
          <label for="status"></label>
          <?php if($doctor->status == 'Active'): ?>
            Aktywny <input type="radio" class="form-control" name="status" value="Active" checked/>
            Nieaktywny <input type="radio" class="form-control" name="status" value="Inactive" />
          <?php else: ?>
            Aktywny <input type="radio" class="form-control" name="status" value="Active" />
            Nieaktywny <input type="radio" class="form-control" name="status" value="Inactive" checked/>
          <?php endif; ?>
        </div>


        <input type="submit" value="Zapisz zmiany" class="btn btn-primary" />
      </form>
  </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('template', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>