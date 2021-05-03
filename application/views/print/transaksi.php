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
		padding: 6px;
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
	<h1>Laporan Data Transaksi</h1>
	<?php 
		echo '<p>Transaksi selesai pada range waktu</p>';
		echo '<p>dari: '.$dari.'<span>sampai: '.$sampai.'</span></p>';
	?>
    <table>
		<tr>
			<th class="center" id="no">No.</th>
            <th class="center">ID Transaksi</th>
            <th class="center">ID Pelanggan</th>
            <th>Nama Pelanggan</th>
            <th class="center">ID Karyawan</th>
            <th>Nama Karyawan</th>
            <th>Berat (kg)</th>
            <th>Total (Rp)</th>
            <th>Tgl Order</th>
            <th>Tgl Selesai</th>
		</tr>
		<?php
            $no = 1;
            $total_pendapatan = 0;
            foreach ($data_transaksi as $transaksi) {
            	$total_pendapatan += $transaksi->total;
        ?>
        <tr>
            <th class="center"><?php echo $no++ ?></th>
            <td class="center"><?php echo $transaksi->transaksi_id ?></td>
            <td class="center"><?php echo $transaksi->pelanggan_id ?></td>
            <td><?php echo $transaksi->nama_pelanggan ?></td>
            <td class="center"><?php echo $transaksi->karyawan_id ?></td>
            <td><?php echo $transaksi->nama_karyawan ?></td>
            <td><?php echo $transaksi->berat ?></td>
            <td><?php echo $transaksi->total ?></td>
            <td><?php echo $transaksi->tgl_order ?></td>
            <td><?php if ($transaksi->tgl_selesai == '0000-00-00') { echo '-'; } else { echo $transaksi->tgl_selesai; } ?></td>
		</tr>
		<?php 
			}
		?>
		<tr>
			<td colspan="7"><b>Total Pendapatan</b></td>
			<td colspan="3"><b>Rp <?php echo $total_pendapatan ?></b></td>
		</tr>
	</table>
	<p>Ket: Format waktu tahun-bulan-hari (yyyy-mm-dd)</p>
	<script type="text/javascript">
		window.print();
	</script>
</body></html>