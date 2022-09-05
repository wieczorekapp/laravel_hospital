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
    <a href="<?php echo e(URL::to('/doctors/create')); ?>"><button type="button" class="btn btn-primary btn-lg">Dodaj lekarza</button></a>

    <table class="table table-hover">
     <thead>
       <tr>
         <th scope="col">Lp</th>
         <th scope="col">Imię i nazwisko</th>
         <th scope="col">Email</th>
         <th scope="col">Telefon</th>
         <th scope="col">Specjalizacje</th>
         <th scope="col">Status</th>
         <th scope="col">Operacje</th>
       </tr>
     </thead>
     <tbody>

     <?php $__currentLoopData = $doctorList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $doctor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
       <tr>
         <th scope="row"><?php echo e($loop->iteration); ?></th>
         <td><a href="<?php echo e(URL::to('doctors/' .$doctor->id)); ?>"><?php echo e($doctor->name); ?></a></td>
         <td><?php echo e($doctor->email); ?></td>
         <td><?php echo e($doctor->phone); ?></td>
         <td>
           <ul>
             <?php $__currentLoopData = $doctor->specializations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $specialization): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <li><?php echo e($specialization->name); ?></li>
             <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
         </ul>
        </td>
        <td><?php echo e($doctor->status); ?></td>
        <td>
          <a class="btn btn-primary btn-sm" href="<?php echo e(URL::to('doctors/delete/' .$doctor->id)); ?>" role="button" onclick="return confirm('Czy napewno chcesz usunąć?')">Usuń</a>
          <a class="btn btn-primary btn-sm" href="<?php echo e(URL::to('doctors/edit/' .$doctor->id)); ?>" role="button">Edytuj</a>
       </tr>
     <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

     </tbody>
    </table>
    <?php $__currentLoopData = $statistics; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $stat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <?php if($stat->status == 'Active'): ?>
        Liczba dostępnych lekarzy: <strong><?php echo e($stat->user_count); ?></strong><br />
      <?php endif; ?>
      <?php if($stat->status == 'Inactive'): ?>
        Liczba niedostępnych lekarzy: <strong><?php echo e($stat->user_count); ?></strong><br />
      <?php endif; ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('template', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>