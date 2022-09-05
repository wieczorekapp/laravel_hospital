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
    <h2>Specjalizacje</h2>
    <a href="<?php echo e(URL::to('/specializations/create')); ?>"><button type="button" class="btn btn-primary btn-lg">Dodaj specjalizacje</button><a/>
    <table class="table table-hover">
     <thead>
       <tr>
         <th scope="col">Lp</th>
         <th scope="col">Nazwa specializacji</th>
       </tr>
     </thead>
     <tbody>

     <?php $__currentLoopData = $specialList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $specialization): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
       <tr>
         <th scope="row"><?php echo e($loop->iteration); ?></th>
         <td><a href="<?php echo e(URL::to('doctors/specializations/' .$specialization->id)); ?>"><?php echo e($specialization->name); ?></a></td>
       </tr>
     <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

     </tbody>
    </table>
  </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('template', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>