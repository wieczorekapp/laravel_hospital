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
    <h2>Lekarze</h2>
    <table class="table table-hover">
     <thead>
       <tr>
         <th scope="col">Lp</th>
         <th scope="col">Name</th>
         <th scope="col">PESEL</th>
         <th scope="col">Email</th>
         <th scope="col">Telefon</th>
       </tr>
     </thead>
     <tbody>

     <?php $__currentLoopData = $patientsList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $patient): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
       <tr>
         <th scope="row"><?php echo e($loop->iteration); ?></th>
         <td><a href="<?php echo e(URL::to('patients/' .$patient->id)); ?>"><?php echo e($patient->name); ?></a></td>
         <td><?php echo e($patient->pesel); ?></td>
         <td><?php echo e($patient->email); ?></td>
         <td><?php echo e($patient->phone); ?></td>
       </tr>
     <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

     </tbody>
    </table>
  </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('template', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>