<?php
	include "../../Koneksi/koneksi.php";
?>
<center><h1 style="line-height:120%;margin:unset">DATA MAHASISWA
<h4 style="margin:unset">Pelayanan Mahasiswa Institut Agama Islam Darussalam</h4></h1></center>
<br><br><br>
<table border="1" cellspacing="0" cellpadding="10" align="center" width="100%">
    <thead>
                                        <tr>
                                            <th class="text-center" style="vertical-align:middle">No</th>
											<th class="text-center" style="vertical-align:middle">NPM</th>
											<th class="text-center" style="vertical-align:middle">Password</th>
											<th class="text-center" style="vertical-align:middle">Nama</th>
											<th class="text-center" style="vertical-align:middle">Program Studi</th>
											<th class="text-center" style="vertical-align:middle">Jenis Kelamin</th>
											<th class="text-center" style="vertical-align:middle">Tempat, Tanggal Lahir</th>
											<th class="text-center" style="vertical-align:middle">Alamat</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
										//mysqli_fetch_array($variabel yang menampung fungsi query)
										
										//mysli_query($koneksi, "query")
										$selectMhs = "SELECT * FROM tbl_mahasiswa ORDER BY prodi ASC";
										$query = mysqli_query($koneksi, $selectMhs);
										$no = 1;
										while($data = mysqli_fetch_array($query))
										{
									?>   
									<tr>
										<td class="text-center"><?php echo $no; ?></td>
										<td class="text-center"><?php echo $data['NPM']; ?></td>
										<td class="text-center"><?php echo $data['password']; ?></td>
										<td class="text-center"><?php echo $data['Nama']; ?></td>
										<td class="text-center"><?php echo $data['prodi']; ?></td>
										<td class="text-center"><?php echo $data['jenis_kelamin']; ?></td>
										<td class="text-center"><?php echo $data['tempatTglLahir']; ?></td>
										<td class="text-center"><?php echo $data['alamat']; ?></td>
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