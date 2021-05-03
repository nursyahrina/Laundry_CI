<!DOCTYPE html>
<html><head>
    <title></title>
    <style>
    body {
    	width: 80%;
    	margin: auto;
    	text-align: center;
    }

    table {
		width: 100%;
		margin-top: 20px;
		border-collapse: collapse;
		text-align: left;
	}

	td {
		padding: 12px;
	}

	.line {
		border-bottom: 1px solid black;
	}

	table td {
		font-weight: bold;
		text-align: left;
	}

	span {
		margin-left: 20px;
	}

	.right {
		text-align: right;
	}

	</style>
</head><body>
	<h4>L.A.U.N.D.R.Y</h4>
	<h1 class="line">Nota Transaksi</h1>
    <table>
		<tr>
            <td>No Transaksi</td>
            <td class="right"><?php echo $data_transaksi[0]->transaksi_id ?></td>
        </tr>
        <tr>
            <td>Karyawan</td>
            <td class="right"><?php echo $data_transaksi[0]->nama_karyawan ?></td>
        </tr>
        <tr class="line">
            <td>Tgl Order</td>
            <td class="right"><?php echo $data_transaksi[0]->tgl_order ?></td>
        </tr>
        <tr>
            <td>Pelanggan</td>
            <td class="right"><?php echo $data_transaksi[0]->nama_pelanggan ?></td>
        </tr>
        <tr>
            <td>Berat Cucian</td>
            <td class="right"><?php echo $data_transaksi[0]->berat ?> kg</td>
        </tr>
        <tr class="line">
            <td>Biaya</td>
            <td class="right">Rp 7000/kg</td>
        </tr>
        <tr>
            <td><b>Total</b></td>
            <td class="right"><b>Rp <?php echo $data_transaksi[0]->total ?></b></td>
        </tr>
	</table>
	<p>Terima kasih sudah menggunakan jasa kami. Ditunggu kunjungan Anda yang berikutnya.</p>
	<script type="text/javascript">
		window.print();
	</script>
</body></html>