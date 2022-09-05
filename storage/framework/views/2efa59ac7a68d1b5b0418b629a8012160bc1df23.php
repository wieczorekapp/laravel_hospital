<!doctype html>
<html lang="pl">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?php echo e(URL::asset('css/bootstrap.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(URL::asset('css/mystyle.css')); ?>">

    <title>System obsługi  <?php echo $__env->yieldContent('title'); ?> </title>
  </head>
  <body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <a class="navbar-brand" href="/doctors">Klinika</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <?php if(auth()->guard()->guest()): ?>

        <?php else: ?>
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" href="<?php echo e(URL::to('/doctors')); ?>">Lekarze <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo e(URL::to('/specializations')); ?>">Specializacje <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo e(URL::to('/visits')); ?>">Wizyty <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo e(URL::to('/patients')); ?>">Pacjenci <span class="sr-only">(current)</span></a>
            </li>
          </ul>
        <?php endif; ?>
        <!-- Right Side Of Navbar -->
        <ul class="navbar-nav ml-auto">
          <!-- Authentication Links -->
          <?php if(auth()->guard()->guest()): ?>
              <li class="nav-item">
                  <a class="nav-link" href="<?php echo e(route('login')); ?>"><?php echo e(__('Logowanie')); ?></a>
              </li>
              <?php if(Route::has('register')): ?>
                  <li class="nav-item">
                      <a class="nav-link" href="<?php echo e(route('register')); ?>"><?php echo e(__('Rejstracja')); ?></a>
                  </li>
              <?php endif; ?>
          <?php else: ?>
              <li class="nav-item dropdown">
                  <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                      <?php echo e(Auth::user()->name); ?> <span class="caret"></span>
                  </a>

                  <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                      <a class="dropdown-item" href="<?php echo e(route('logout')); ?>"
                          onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                          <?php echo e(__('Wyloguj')); ?>

                      </a>

                      <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                          <?php echo csrf_field(); ?>
                      </form>
                  </div>
              </li>
            <?php endif; ?>
          </ul>

      </div>
    </nav>


    <?php echo $__env->yieldContent('content'); ?>


    <footer class="text-center">Rok  <?php echo $__env->yieldContent('year'); ?></footer>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="<?php echo e(URL::asset('js/jquery-3.3.1.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('js/popper.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('js/bootstrap.min.js')); ?>"></script>

  </body>
</html>
