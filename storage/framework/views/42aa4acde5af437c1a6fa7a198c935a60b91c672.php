

<?php $__env->startSection('content'); ?>
<!-- Main Content -->
<div id="content">

  <!-- Topbar -->
  <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

    <!-- Sidebar Toggle (Topbar) -->
    <form class="form-inline">
      <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
        <i class="fa fa-bars"></i>
      </button>
    </form>


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
    <h1 class="h3 mb-3 text-gray-800">Dokter</h1>
    <p>Edit biodata dokter</p>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
      <div class="card-body">
        <form method="POST" action="<?php echo e(route('admin-dokter.update', $dokter->id)); ?>" enctype="multipart/form-data">
          <?php echo method_field('put'); ?>
          <?php echo csrf_field(); ?>
          
          <div class="form-group">
            <label for="nama_dokter">Nama Dokter</label>
            <input type="text" class="form-control" id="nama_dokter" name="nama_dokter" placeholder="Nama Dokter"
              value="<?php echo e($dokter->nama_dokter); ?>">
          </div>
          <div class="form-group">
            <label for="alamat_dokter">Alamat</label>
            <textarea name="alamat_dokter" class="form-control" id="exampleFormControlTextarea1"
              rows="3"><?php echo e($dokter->alamat_dokter); ?></textarea>
          </div>
          <div class="form-group">
            <label for="spesialisasi_dokter">Spesialisasi</label>
            <select name="spesialisasi_dokter" class="form-control" id="spesialisasi_dokter">
              <option value="Poli Umum" <?php echo e(($dokter->spesialisasi_dokter === 'Poli Umum') ? 'Selected' : ''); ?>>Poli
                Umum
              </option>
              <option value="Poli Anak" <?php echo e(($dokter->spesialisasi_dokter === 'Poli Anak') ? 'Selected' : ''); ?>>Poli
                Anak
              </option>
              <option value="Poli Lansia" <?php echo e(($dokter->spesialisasi_dokter === 'Poli Lansia') ? 'Selected' : ''); ?>>
                Poli
                Lansia
              </option>
            </select>
          </div>
          <button type="submit" class="btn btn-info">Update</button>
        </form>
      </div>
    </div>

  </div>
  <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Sistem-Informasi-Klinik\Sistem-Informasi-Klinik\resources\views/admin/dokter/edit.blade.php ENDPATH**/ ?>