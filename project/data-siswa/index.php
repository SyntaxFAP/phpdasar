<?php 
require "functions.php";

$siswa = query("SELECT * FROM dataSiswa");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Siswa</title>
    <!-- fontAwesome -->
    <script src="https://kit.fontawesome.com/7dfe115e0d.js" crossorigin="anonymous"></script>
    <!-- BOOTSTRAP -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script>
        function printOtherPage(url) {
            var printWindow = window.open(url, '_blank');
            printWindow.addEventListener('load', function() {
                printWindow.print();
                printWindow.close();
            }, true);
        }
    </script>
</head>
<body >
    <div class="container">
        
        <h1 class="primary-heading text-center mb-5 mt-5">Masukkan Data Siswa</h1>
        
        <!-- alerts -->

        <form action="" method="post" enctype="multipart/form-data">
            <div class="input_data_wrapper mb-5">
                <div class="input_data mb-3">
                    <div class="row">
                        <div class="col">
                            <input type="text" class="form-control" name="nama" placeholder="Nama" required>
                        </div>
                        <div class="col">
                            <input type="text" class="form-control" name="nis" placeholder="NIS (maxlength: 8)"  maxlength="8" required>
                        </div>
                        <div class="col">
                            <input type="text" class="form-control" name="rayon" placeholder="Rayon (contoh: Cicurug 7)" required>
                        </div>
                        <div class="col">
                            <input type="text" class="form-control" name="jurusan" placeholder="Jurusan" required>
                        </div>
                        <br>
                        <br>
                        <div class="mb-3">
                            <label for="formFile" class="form-label">Pilih gambar Siswa :</label>
                            <input class="form-control" type="file" id="formFile">
                        </div>
                    </div>
                </div>
                <div class="action">
                    <button type="submit" class="btn btn-success" name="tambah"><i class="fa-solid fa-plus"></i>Tambah</button>
                    <a class="btn btn-danger" href="deleteAll.php" role="button" onclick="return confirm('Ingin menghapus semua data?')"> <i class="fa-solid fa-arrow-rotate-right"></i>Reset</a>
                    <button type="button" class="btn btn-primary" name="cetak" onclick="printOtherPage('print.php')"><i class="fa-solid fa-print"></i>Cetak</button>
                </div>
            </div>
    
            <hr>
    
            <div class="data_wrapper">
                <div class="little-title">List Data</div>

                <table class="table table-striped table-hover">
                    <thead class="table-success">
                      <tr>
                        <th scope="col">No</th>
                        <th scope="col">Gambar</th>
                        <th scope="col">Nama</th>
                        <th scope="col">NIS</th>
                        <th scope="col">Rayon</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody class="table-group-divider">
                    <?php $i = 1; ?>
                    <?php if(!empty($siswa)) : ?>
                    <?php foreach($siswa as $key => $row) : ?>
                      <tr>
                        <th scope="row"><?= $i; ?></th>
                        <td><?= $row['gambar'] ?></td>
                        <td><?= $row['nama'] ?></td>
                        <td><?= $row['nis'] ?></td>
                        <td><?= $row['rayon'] ?></td>
                        <td><?= $row['jurusan'] ?></td>
                        <td>
                            <center><a class="btn btn-warning" title="perbarui" href="update.php?id=<?= $key ?>" role="button"><i class="fa-solid fa-pen"></i></a>
                            <a class="btn btn-danger" title="hapus satu baris data" href="deleteRow.php?id=<?= $key ?>" role="button" onclick="return confirm('hapus?')"><i class="fa-solid fa-trash"></i></a></center>
                        </td>
                      </tr>
                      <?php $i++; ?>
                      <?php endforeach; ?>
                      <?php else : ?>
                        <td colspan="6"><center>Tidak ada data</center></td>
                    <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
