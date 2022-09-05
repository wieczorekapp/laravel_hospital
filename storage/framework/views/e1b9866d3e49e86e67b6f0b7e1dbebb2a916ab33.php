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
    <h2>Wizyty</h2>
    <a href="<?php echo e(URL::to('/visits/create')); ?>"><button type="button" class="btn btn-primary btn-lg">Dodaj wizytę</button><a/>
    <table class="table table-hover">
     <thead>
       <tr>
         <th scope="col">Lp</th>
         <th scope="col">Lekarz</th>
         <th scope="col">Pacjent</th>
         <th scope="col">Data</th>
       </tr>
     </thead>
     <tbody>

     <?php $__currentLoopData = $visitList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $visit): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
       <tr>
         <th scope="row"><?php echo e($loop->iteration); ?></th>
         <td><?php echo e($visit->doctor->name); ?></td>
         <td><?php echo e($visit->patient->name); ?></td>
         <td><?php echo e($visit->date); ?></td>
       </tr>
     <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

     </tbody>
    </table>
  </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('template', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>