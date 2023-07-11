<?php 
require '../functions.php';
$keyword = $_GET["keyword"];

$query = "SELECT * FROM pembayaran WHERE
    id_petugas LIKE '%$keyword%' OR
    nisn LIKE '%$keyword%' OR
    tgl_bayar LIKE '%$keyword%' OR
    bulan_dibayar LIKE '%$keyword%' OR
    tahun_dibayar LIKE '%$keyword%' OR
    id_spp LIKE '%keyword%' OR
    jumlah_bayar LIKe '%keyword%'
    ";
$pembayaran = query($query);


 ?>
<table class="table table-striped" cellpadding="10" cellspacing="0">
              <thead>
                <tr>
                	<th>No</th>
                  <th>NAMA PETUGAS</th>
                  <th>NAMA</th>
                  <th>TANGGAL</th>
                  <th>BULAN</th>
                  <th>TAHUN</th>
                  <th>NOMINAL</th>
                  <th>JUMLAH</th>
                  <th>ACTION</th>
                </tr>
              </thead>
              <?php $i = 1; ?>
<?php foreach ( $pembayaran as $row ) :
	# code...
 ?>
              <tbody>
             
              	<tr>
              	<td><?= $i; ?> </td>
              	<td><?= $row["nama_lengkap"]; ?></td>
              	<td><?= $row["nama"]; ?></td>
              	<td><?= $row["tgl_bayar"]; ?></td>
              	<td><?= $row["bulan_dibayar"]; ?></td>
              	<td><?= $row["tahun_dibayar"]; ?></td>
              	<td><?= $row["nominal"]; ?></td>
              	<td><?= $row["jumlah_bayar"]; ?></td>
              	<td>
              		<a href="cetak-pembayaran.php?id_pembayaran=<?= $row["id_pembayaran"]; ?> " target="_blank"><button class="btn btn-primary btn-sm" ><i class="fas fa-print fa-2x"></i></button></a> 
				<button class="btn btn-danger">
                    <a href="hapus-pembayaran.php?id_pembayaran=<?= $row["id_pembayaran"]; ?>" style="color: white;" 
                      onclick="return confirm('Apakah anda yakin ingin menghapus data ini?');"><i class="fa fa-user-times"></i></a></button>

              	</td>
              	</tr>
              	<?php $i++; ?>
              <?php endforeach; ?>


              </tbody>
            </table>