<?php
	include "../../Koneksi/koneksi.php";
?>
<center><h1 style="line-height:120%;margin:unset">DATA DOSEN
<h4 style="margin:unset">Pelayanan Mahasiswa Institut Agama Islam Darussalam</h4></h1></center>
<br><br><br>
<table border='1' cellspacing="0" cellpadding="10" align='center' width="100%">
								<thead>
									<th class="text-center" style="vertical-align:middle">No</th>
									<th class="text-center" style="vertical-align:middle">Kode Dosen</th>
									<th class="text-center" style="vertical-align:middle">Password</th>
									<th class="text-center" style="vertical-align:middle">Nama</th>
									<th class="text-center" style="vertical-align:middle">Jenis Kelamin</th>
								</thead>
								<tbody>
									<?php
										$selectMhs = "SELECT * FROM tbl_dosen";
										$query = mysqli_query($koneksi, $selectMhs);
										$no = 1;
										while($data = mysqli_fetch_array($query))
										{
									?>   
									<tr>
										<td class="text-center"><?php echo $no; ?></td>
										<td class="text-center"><?php echo $data['kode_dosen']; ?></td>
										<td class="text-center"><?php echo $data['password']; ?></td>
										<td class="text-center"><?php echo $data['nama_dosen']; ?></td>
										<td class="text-center"><?php echo $data['jenis_kelamin']; ?></td>
									</tr>
									<?php 
										$no++; 
										}
									?>
								</tbody>
</table>
<script>
	window.print();
</script>
