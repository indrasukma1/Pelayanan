<?php
	include "../../../Koneksi/koneksi.php";
	$kode_prodi    	  = $_GET['kode_prodi'];
	$kode_kelas    	  = $_GET['kode_kelas'];
	$nama_prodi    	  = $_GET['nama_prodi'];
?>
<center><h1 style="line-height:120%;margin:unset">DATA DETAIL KELAS
<h4 style="margin:unset">Institut Agama Islam Darussalam</h4></h1></center>
<br><br><br>

<table border="1" cellspacing="0" cellpadding="10" align="center" width="100%">
    <thead>
        <tr>
            <th class="text-center" style="vertical-align:middle">No</th>
			<th class="text-center" style="vertical-align:middle">Program Studi</th>
			<th class="text-center" style="vertical-align:middle">Kode Kelas</th>
			<th class="text-center" style="vertical-align:middle">Nama Mahasiswa</th>
        </tr>
    </thead>
								<tbody>
									<?php
										//mysqli_fetch_array($variabel yang menampung fungsi query)
										
										//mysli_query($koneksi, "query")
										$prodi = "SELECT kode_prodi, kode_kelas, tbl_mahasiswa.NPM, Nama FROM tbl_detail_kelas 
													INNER JOIN tbl_mahasiswa
													ON tbl_detail_kelas.NPM=tbl_mahasiswa.NPM
													WHERE kode_kelas='$kode_kelas' AND kode_prodi='$kode_prodi' 
													ORDER BY Nama ASC";
										$query = mysqli_query($koneksi, $prodi);
										$no = 1;
										while($data = mysqli_fetch_array($query))
										{
									?>   
									<tr>
										<td class="text-center"><?php echo $no; ?></td>
										<td class="text-center"><?php echo $nama_prodi; ?></td>
										<td class="text-center"><?php echo $data['kode_kelas']; ?></td>
										<td class="text-center"><?php echo $data['Nama']; ?></td>
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