                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                    </div>

                    <!-- Content Row -->
                    <div class="row">

                        <!-- Number of Rows of Karyawan Table -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                        Karyawan</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $n_karyawan ?></div>
                                </div>
                            </div>
                        </div>

                        <!-- Number of Rows of Pelanggan Table -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                        Pelanggan</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $n_pelanggan ?></div>
                                </div>
                            </div>
                        </div>

                        <!-- Number of Rows of Transaksi Table -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                        Transaksi</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $n_transaksi ?></div>
                                </div>
                            </div>
                        </div>

                        <!-- Number of Rows of Transaksi Aktif Table -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                        Transaksi Belum Selesai</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $n_transaksi_aktif ?></div>
                                </div>
                            </div>
                        </div>

                        <!-- Total Pendapatan (Tahun ini) -->
                        <div class="col-xl-4 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                        Pendapatan (Tahun ini)</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">Rp <?php echo $total_pendapatan ?></div>
                                </div>
                            </div>
                        </div>

                        <!-- Total Pengeluaran (Tahun ini) -->
                        <div class="col-xl-4 col-md-6 mb-4">
                            <div class="card border-left-danger shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                        Pengeluaran (Tahun ini)</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">Rp <?php echo $total_pengeluaran ?></div>
                                </div>
                            </div>
                        </div>

                        <!-- Total Keuntungan (Tahun ini) -->
                        <div class="col-xl-4 col-md-6 mb-4">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                        Keuntungan (Tahun ini)</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">Rp <?php echo $total_keuntungan ?></div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- End of Main Content -->