<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Data Pasien</title>
  
  
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
  <header class="clearfix">
    <h1>KLINIK HARMONI</h1>
    <div id="company" class="clearfix">
      <div>Rekam Medis</div>
      <div>Jalan Unimal Bukit Indah</div>
      <div>(602) 519-0450</div>
      <div><a>klinikharmoni@email.com</a></div>
    </div>
    <br>
  </header>
  <main>
    <table class="table">
      <thead class="thead-light">
        <tr>
          <th scope="col">Nama Pasien</th>
          <th scope="col">Alamat Pasien</th>
          <th scope="col">Tanggal Berobat</th>
          <th scope="col">Keluhan</th>
          <th scope="col">Nama Dokter</th>
        </tr>
      </thead>
      <tbody>
        <?php $__currentLoopData = $pasiens; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pasien): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
          <td><?php echo e($pasien->nama_pasien); ?></td>
          <td><?php echo e($pasien->alamat_pasien); ?></td>
          <td><?php echo e($pasien->tgl_datang); ?></td>
          <td><?php echo e($pasien->keluhan_pasien); ?></td>
          <td><?php echo e($pasien->dokter->nama_dokter); ?></td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </tbody>
    </table>
    <div id="notices">
      <div>PERHATIAN:</div>
      <div class="notice">
        <strong>Segera menebus obat ke apoteker sesuai resep dokter</strong>
      </div>
    </div>
  </main>
  <footer>
    <h2>Semoga Lekas Sembuh</h2>
  </footer>
</body>

</html><?php /**PATH C:\Klinik-Harmoni\resources\views/cetak-pasien.blade.php ENDPATH**/ ?>