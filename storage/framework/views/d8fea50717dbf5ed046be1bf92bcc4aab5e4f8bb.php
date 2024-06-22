

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
    <h1 class="h3 mb-3 text-gray-800 font-weight-bold">Edit Biodata User</h1>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h5 class="font-weight-bold text-primary">Biodata <?php echo e($user->name); ?>

        </h5>
      </div>
      <div class="card-body">
        <form method="POST" action="<?php echo e(route('admin.update', $user->id)); ?>" enctype="multipart/form-data">
          <?php echo method_field('put'); ?>
          <?php echo csrf_field(); ?>
          
          <div class="form-group">
            <label for="name">Nama User</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Nama Pasien"
              value="<?php echo e($user->name); ?>">
          </div>
          <div class="form-group">
            <label for="email">Email User</label>
            <input type="text" class="form-control" id="email" name="email" placeholder="Email User"
              value="<?php echo e($user->email); ?>">
          </div>
          <div class="form-group">
            <label for="role">Role Dokter</label>
            <select name="role" class="form-control" id="role">
              <option value="admin" <?php echo e(($user->role === 'admin') ? 'Selected' : ''); ?>>admin</option>
              <option value="dokter" <?php echo e(($user->role === 'dokter') ? 'Selected' : ''); ?>>dokter</option>
              <option value="pasien" <?php echo e(($user->role === 'pasien') ? 'Selected' : ''); ?>>pasien</option>
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
<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Sistem-Informasi-Klinik\Sistem-Informasi-Klinik\resources\views/admin/pasien/edit.blade.php ENDPATH**/ ?>