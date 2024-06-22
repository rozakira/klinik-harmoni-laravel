

<?php $__env->startSection('content'); ?>
<!-- Main Content -->
<div id="content">
  <!-- Topbar -->
  <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
    <!-- Sidebar Toggle (Topbar) -->
    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
      <i class="fa fa-bars"></i>
    </button>
    <!-- Topbar Navbar -->
    <ul class="navbar-nav ml-auto">
      <div class="topbar-divider d-none d-sm-block"></div>
      <!-- Nav Item - User Information -->
      <li class="nav-item dropdown no-arrow">
        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
          aria-haspopup="true" aria-expanded="false">
          <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo e(Auth::user()->name); ?></span>
          <img class="img-profile rounded-circle" src="<?php echo e(asset('img/undraw_profile.svg')); ?>">
        </a>
        <!-- Dropdown - User Information -->
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault();
                                                   document.getElementById('logout-form').submit();">
            <?php echo e(__('Logout')); ?>

          </a>

          <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" class="d-none">
            <?php echo csrf_field(); ?>
          </form>
        </div>
      </li>
    </ul>
  </nav>
  <!-- End of Topbar -->
  <!-- Begin Page Content -->
  <div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800 font-weight-bold">
        Selamat Datang, <?php echo e(Auth::user()->name); ?>!
      </h1>
      
    </div>
    <!-- Content Row -->
    <div class="row">
      <!-- Earnings (Monthly) Card Example -->
      <div class="col-xl-4 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                  Jumlah Dokter</div>
                <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo e($dokter); ?></div>
              </div>
              <div class="col-auto">
                <i class="fas fa-calendar fa-2x text-gray-300"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Earnings (Monthly) Card Example -->
      <div class="col-xl-4 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                  Jumlah Pasien
                </div>
                <?php if(Auth::user()->role == 'dokter' && $perjanjians->count()): ?>
                <div class="h5 mb-0 font-weight-bold text-gray-800">
                  <?php echo e($perjanjians->count()); ?>

                </div>
                <?php elseif(Auth::user()->role == 'admin'): ?>
                <div class="h5 mb-0 font-weight-bold text-gray-800">
                  <?php echo e($pasien); ?>

                </div>
                <?php else: ?>
                <div class="h5 mb-0 font-weight-bold text-gray-800">
                  <?php echo e($pasien); ?>

                </div>
                <?php endif; ?>
              </div>
              <div class="col-auto">
                <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Earnings (Monthly) Card Example -->
      <div class="col-xl-4 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Jenis Obat
                </div>
                <div class="row no-gutters align-items-center">
                  <div class="col-auto">
                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php echo e($obat); ?></div>
                  </div>
                  <div class="col">

                  </div>
                </div>
              </div>
              <div class="col-auto">
                <i class="fas fa-2x fa-prescription-bottle-alt"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Content Row -->
    <div class="row">
      <!-- Area Chart -->
      <div class="col-xl-12 col-lg-12">
        <div class="card shadow mb-4">
          <?php if(Auth::user()->role == 'dokter' && $perjanjians->count()): ?>
          <!-- Card Header - Dropdown -->
          <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Perjanjian dengan pasien</h6>
          </div>
          <!-- Card Body -->
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>Nama Pasien</th>
                    <th>Nama Dokter</th>
                    <th>Spesialisasi Dokter</th>
                    <th>Waktu Perjanjian</th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th>Nama Pasien</th>
                    <th>Nama Dokter</th>
                    <th>Spesialisasi Dokter</th>
                    <th>Waktu Perjanjian</th>
                  </tr>
                </tfoot>
                <tbody>
                  <?php $__currentLoopData = $perjanjians; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $perjanjian): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <tr>
                    <td><?php echo e($perjanjian->nama_pasien); ?></td>
                    <td><?php echo e($perjanjian->nama_dokter); ?></td>
                    <td><?php echo e($perjanjian->spesialiasi_dokter); ?></td>
                    <td><?php echo e($perjanjian->waktu_perjanjian); ?></td>
                  </tr>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
              </table>
            </div>
          </div>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>
  <!-- /.container-fluid -->
</div>
<!-- End of Main Content -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\hp\Documents\Sistem-Informasi-Klinik\resources\views/home.blade.php ENDPATH**/ ?>