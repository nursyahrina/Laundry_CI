<!DOCTYPE html>
<html><head>
    <title></title>
    <style>
    body {
    	width: 90%;
    	margin: auto;
    }

    table {
		border: 1px solid #ddd;
		width: 100%;
		margin-top: 20px;
		margin-bottom: 12px;
		border-collapse: collapse;
		text-align: left;
	}

	td, th {
		border: 1px solid #ddd;
		padding: 12px;
	}

	table th {
		font-weight: bold;
		text-align: left;
	}

	span {
		margin-left: 20px;
	}

	.center {
		text-align: center;
	}

	#no {
		width: 30px;
	}

	</style>
</head><body>
	<h5>L.A.U.N.D.R.Y</h5>
	<h1>Laporan Data Pelanggan</h1>
	<?php if ($jeniskelamin != '') {
		echo '<p>Jenis Kelamin: '.$jeniskelamin.'</p>';
	} ?>
    <table>
		<tr>
			<th class="center" id="no">No.</th>
            <th class="center">ID</th>
            <th>Nama Pelanggan</th>
            <th>Jenis Kelamin</th>
            <th>Alamat</th>
            <th>No. Hp</th>
		</tr>
		<?php
            $no = 1;
            foreach ($data_pelanggan as $pelanggan) {
        ?>
        <tr>
            <th class="center"><?php echo $no++ ?></th>
            <td class="center"><?php echo $pelanggan->pelanggan_id ?></td>
            <td><?php echo $pelanggan->nama_pelanggan ?></td>
            <td><?php echo $pelanggan->jeniskelamin ?></td>
            <td><?php echo $pelanggan->alamat ?></td>
            <td><?php echo $pelanggan->no_hp ?></td>
		</tr>
		<?php 
			}
		?>
	</table>
</body></html>