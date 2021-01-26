                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3 d-flex justify-content-between">
                            <h4 class="my-auto font-weight-bold text-primary">Data Karyawan</h4>
                            <div class="d-flex">
                                <a href="#" class="btn btn-warning shadow-sm" data-toggle="modal" data-target="#cetakKaryawan"><i
                                class="fas fa-print fa-sm text-white-50"></i> Print</a>
                                <a href="#" class="btn btn-danger shadow-sm mx-2" data-toggle="modal" data-target="#cetakPDFKaryawan"><i
                                class="fas fa-file fa-sm text-white-50" ></i> Cetak PDF</a>
                                <a href="#" class="btn btn-primary shadow-sm mx-2" data-toggle="modal" data-target="#addKaryawan"><i
                                class="fas fa-plus fa-sm text-white-50"></i> Tambah Data</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr class="text-primary">
                                            <th>No.</th>
                                            <th>ID</th>
                                            <th>Nama Karyawan</th>
                                            <th>Alamat</th>
                                            <th>No. Hp</th>
                                            <th>Gaji/bln</th>
                                            <th>Bergabung</th>
                                            <th>Berhenti</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr class="text-primary">
                                            <th>No.</th>
                                            <th>ID</th>
                                            <th>Nama Karyawan</th>
                                            <th>Alamat</th>
                                            <th>No. Hp</th>
                                            <th>Gaji/bln</th>
                                            <th>Bergabung</th>
                                            <th>Berhenti</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php
                                            $no = 1;
                                            $kode = '';
                                            $n_karyawan = count($data_karyawan);
                                            if ($n_karyawan == 0) {
                                                $kode = 'K001';
                                            } else {
                                                $kode = 'K00'.substr($data_karyawan[$n_karyawan-1]->karyawan_id, 3, 1);
                                            }
                                            foreach ($data_karyawan as $karyawan) {
                                        ?>
                                        <tr>
                                            <th><?php echo $no++ ?></th>
                                            <td><?php echo $karyawan->karyawan_id ?></td>
                                            <td><?php echo $karyawan->nama_karyawan.' ' ?><sup><?php echo substr($karyawan->jeniskelamin, 0, 1) ?></sup></td>
                                            <td><?php echo $karyawan->alamat ?></td>
                                            <td><?php echo $karyawan->no_hp ?></td>
                                            <td><?php echo $karyawan->gaji_perbulan ?></td>
                                            <td><?php echo $karyawan->tgl_bergabung ?></td>
                                            <td><?php if ($karyawan->tgl_berhenti == '0000-00-00') { echo '-'; } else { echo $karyawan->tgl_berhenti; } ?></td>
                                            <td class="action-icons">
                                                <a href="#" data-toggle="modal" data-target="#editKaryawan<?php echo $karyawan->karyawan_id ?>"> 
                                                    <i title="ubah" class="fas fa-edit text-lg text-warning"></i>
                                                </a> | 
                                                <a href="<?php echo base_url().'karyawan/delete/'.$karyawan->karyawan_id?>"> 
                                                    <i title="hapus" class="fas fa-trash-alt text-lg text-danger"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- End of Main Content -->

            <!-- Modal for adding new data -->
            <div class="modal fade" id="addKaryawan" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="formAddKaryawan" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title font-weight-bold text-primary mx-3 mt-3" id="formAddKaryawanLabel">Input Data Karyawan</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form name="form_add_mahasiswa" action="<?php echo base_url().'karyawan/add' ?>" method="post" class="user needs-validation mx-3 mb-4" novalidate>
                            <div class="modal-body"> 
                                <div class="form-group">
                                    <label class="control-label text-primary">ID</label>
                                    <input type="text" class="form-control" placeholder="ID Karyawan" autofocus name="karyawan_id" required readonly value="<?php echo $kode ?>">
                                </div>
                                <hr>

                                <div class="form-group">
                                    <label class="control-label text-primary">Nama Karyawan</label>
                                    <input type="text" class="form-control" title="Isikan Nama Karyawan dengan Huruf" placeholder='Nama Karyawan'  name="nama_karyawan" pattern="[A-Za-z ]{1,50}" required>
                                    <div class="invalid-feedback">
                                        Isikan nama karyawan dengan huruf! (maks. 50 huruf)
                                    </div>
                                </div>
                                <hr>

                                <div class="form-group">
                                    <label class="control-label text-primary">Jenis Kelamin</label>
                                    <select class="form-control" name="jeniskelamin" pattern="[A-Za-z]{1,10}" required>
                                        <option value=""></option>
                                        <option value="Laki-Laki">Laki-Laki</option>
                                        <option value="Perempuan">Perempuan</option>
                                    </select>
                                    <div class="invalid-feedback">
                                        Pilih jenis kelamin karyawan!
                                    </div>
                                </div>
                                <hr>

                                <div class="form-group">
                                    <label class="control-label text-primary">Alamat</label>
                                    <input type="text"  class="form-control" placeholder='Alamat Karyawan' name="alamat"  required>
                                    <div class="invalid-feedback">
                                        Isikan alamat karyawan!
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label text-primary">No. Hp</label>
                                    <input type="phone"  class="form-control" placeholder='No. Hp Karyawan' name="no_hp"  required>
                                    <div class="invalid-feedback">
                                        Isikan No. Hp karyawan!
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label text-primary">Gaji per bulan</label>
                                    <input type="number"  class="form-control" placeholder='Gaji per bulan Karyawan' name="gaji_perbulan"  required>
                                    <div class="invalid-feedback">
                                        Isikan gaji per bulan karyawan!
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label text-primary">Tgl Bergabung</label>
                                    <input type="date"  class="form-control" placeholder='Tgl Bergabung Karyawan' name="tgl_bergabung" required>
                                    <div class="invalid-feedback">
                                        Isikan tanggal bergabung karyawan!
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label text-primary">Tgl Berhenti</label>
                                    <input type="date"  class="form-control" placeholder='Tgl Berhenti Karyawan' name="tgl_berhenti">
                                </div>
                            </div>
                            <div class="modal-footer d-flex">
                                <button type="button" class="flex-fill btn btn-secondary btn-user" data-dismiss="modal">Batal</button>
                                <button type="submit" class="flex-fill btn btn-primary btn-user">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Modal for editing existing data -->
            <?php
                foreach ($data_karyawan as $karyawan) {
            ?>
            <div class="modal fade" id="editKaryawan<?php echo $karyawan->karyawan_id ?>" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="formEditKaryawan" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title font-weight-bold text-primary mx-3 mt-3" id="formEditKaryawanLabel">Ubah Data Karyawan</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form name="form_edit_mahasiswa" action="<?php echo base_url().'karyawan/edit' ?>" method="post" class="user needs-validation mx-3 mb-4" novalidate>
                            <div class="modal-body"> 
                                <div class="form-group">
                                    <label class="control-label text-primary">ID</label>
                                    <input type="text" class="form-control" placeholder="ID Karyawan" autofocus name="karyawan_id" value="<?php echo $karyawan->karyawan_id ?>" readonly>
                                </div>
                                <hr>

                                <div class="form-group">
                                    <label class="control-label text-primary">Nama Karyawan</label>
                                    <input type="text" class="form-control" title="Isikan Nama Karyawan dengan Huruf" placeholder='Nama Karyawan'  name="nama_karyawan" pattern="[A-Za-z ]{1,50}" value="<?php echo $karyawan->nama_karyawan ?>" required>
                                    <div class="invalid-feedback">
                                        Isikan nama karyawan dengan huruf! (maks. 50 huruf)
                                    </div>
                                </div>
                                <hr>

                                <div class="form-group">
                                    <label class="control-label text-primary">Jenis Kelamin</label>
                                    <select class="form-control" name="jeniskelamin" pattern="[A-Za-z]{1,10}" required>
                                        <option value=""></option>
                                        <option value="Laki-Laki" <?php if ($karyawan->jeniskelamin === 'Laki-Laki') { echo "selected"; } ?>>Laki-Laki</option>
                                        <option value="Perempuan" <?php if ($karyawan->jeniskelamin === 'Perempuan') { echo "selected"; } ?>>Perempuan</option>
                                    </select>
                                    <div class="invalid-feedback">
                                        Pilih jenis kelamin karyawan!
                                    </div>
                                </div>
                                <hr>

                                <div class="form-group">
                                    <label class="control-label text-primary">Alamat</label>
                                    <input type="text"  class="form-control" placeholder='Alamat Karyawan' name="alamat"  value="<?php echo $karyawan->alamat ?>" required>
                                    <div class="invalid-feedback">
                                        Isikan alamat karyawan!
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label text-primary">No. Hp</label>
                                    <input type="phone"  class="form-control" placeholder='No. Hp Karyawan' name="no_hp" value="<?php echo $karyawan->no_hp ?>" required>
                                    <div class="invalid-feedback">
                                        Isikan No. Hp karyawan!
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label text-primary">Gaji per bulan</label>
                                    <input type="number"  class="form-control" placeholder='Gaji per bulan Karyawan' name="gaji_perbulan" value="<?php echo $karyawan->gaji_perbulan ?>" required>
                                    <div class="invalid-feedback">
                                        Isikan gaji per bulan karyawan!
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label text-primary">Tgl Bergabung</label>
                                    <input type="date"  class="form-control" placeholder='Tgl Bergabung Karyawan' name="tgl_bergabung" value="<?php echo $karyawan->tgl_bergabung ?>" required>
                                    <div class="invalid-feedback">
                                        Isikan tanggal bergabung karyawan!
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label text-primary">Tgl Berhenti</label>
                                    <input type="date"  class="form-control" placeholder='Tgl Berhenti Karyawan' name="tgl_berhenti" value="<?php echo $karyawan->tgl_berhenti ?>">
                                </div>
                            </div>
                            <div class="modal-footer d-flex">
                                <button type="button" class="flex-fill btn btn-secondary btn-user" data-dismiss="modal">Batal</button>
                                <button type="submit" class="flex-fill btn btn-primary btn-user">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <?php
                }
            ?>

            <!-- Modal for print data -->
            <div class="modal fade" id="cetakKaryawan" data-keyboard="false" tabindex="-1" aria-labelledby="filterCetakKaryawan" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title font-weight-bold text-primary mx-3 mt-3" id="filterCetakKaryawanLabel">Print Data Karyawan</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form name="form_cetak_mahasiswa" action="<?php echo base_url().'mahasiswa/print' ?>" method="post" class="user needs-validation mx-3 mb-4" novalidate>
                            <div class="modal-body"> 
                                <div class="form-group">
                                    <label class="control-label text-primary">Angkatan</label>
                                    <select class="form-control" name="angkatan" required autofocus>
                                        <option value="all">Semua Angkatan</option>
                                        <?php
                                            foreach ($data_karyawan as $angkatan) {
                                        ?>
                                        <option value="<?php echo $angkatan->angkatan ?>">
                                            <?php echo $angkatan->angkatan ?>
                                        </option>
                                        <?php } ?>
                                    </select>
                                    <div class="invalid-feedback">
                                        Isikan Angkatan dengan 4 digit angka tahun masuk!
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer d-flex">
                                <button type="button" class="flex-fill btn btn-secondary btn-user" data-dismiss="modal">Batal</button>
                                <button type="submit" class="flex-fill btn btn-primary btn-user">Print</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Modal for export PDF -->
            <div class="modal fade" id="cetakPDFKaryawan" data-keyboard="false" tabindex="-1" aria-labelledby="filterCetakKaryawan" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title font-weight-bold text-primary mx-3 mt-3" id="filterCetakKaryawanLabel">Cetak PDF Data Karyawan</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form name="form_cetak_mahasiswa" action="<?php echo base_url().'mahasiswa/cetak_pdf' ?>" method="post" class="user needs-validation mx-3 mb-4" novalidate>
                            <div class="modal-body"> 
                                <div class="form-group">
                                    <label class="control-label text-primary">Angkatan</label>
                                    <select class="form-control" name="angkatan" required autofocus>
                                        <option value="all">Semua Angkatan</option>
                                        <?php
                                            foreach ($data_angkatan as $angkatan) {
                                        ?>
                                        <option value="<?php echo $angkatan->angkatan ?>">
                                            <?php echo $angkatan->angkatan ?>
                                        </option>
                                        <?php } ?>
                                    </select>
                                    <div class="invalid-feedback">
                                        Isikan Angkatan dengan 4 digit angka tahun masuk!
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer d-flex">
                                <button type="button" class="flex-fill btn btn-secondary btn-user" data-dismiss="modal">Batal</button>
                                <button type="submit" class="flex-fill btn btn-primary btn-user">Cetak</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            

            