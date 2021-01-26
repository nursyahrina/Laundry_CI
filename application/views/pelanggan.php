                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3 d-flex justify-content-between">
                            <h4 class="my-auto font-weight-bold text-primary">Data Pelanggan</h4>
                            <div class="d-flex">
                                <a href="#" class="btn btn-warning shadow-sm" data-toggle="modal" data-target="#cetakPelanggan"><i
                                class="fas fa-print fa-sm text-white-50"></i> Print</a>
                                <a href="#" class="btn btn-danger shadow-sm mx-2" data-toggle="modal" data-target="#cetakPDFPelanggan"><i
                                class="fas fa-file fa-sm text-white-50" ></i> Cetak PDF</a>
                                <a href="#" class="btn btn-primary shadow-sm mx-2" data-toggle="modal" data-target="#addPelanggan"><i
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
                                            <th>Nama Pelanggan</th>
                                            <th>Alamat</th>
                                            <th>No. Hp</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr class="text-primary">
                                            <th>No.</th>
                                            <th>ID</th>
                                            <th>Nama Pelanggan</th>
                                            <th>Alamat</th>
                                            <th>No. Hp</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php
                                            $no = 1;
                                            foreach ($data_pelanggan as $pelanggan) {
                                        ?>
                                        <tr>
                                            <th><?php echo $no++ ?></th>
                                            <td><?php echo $pelanggan->pelanggan_id ?></td>
                                            <td><?php echo $pelanggan->nama_pelanggan.' ' ?><sup><?php echo substr($pelanggan->jeniskelamin, 0, 1) ?></sup></td>
                                            <td><?php echo $pelanggan->alamat ?></td>
                                            <td><?php echo $pelanggan->no_hp ?></td>
                                            <td class="action-icons">
                                                <a href="#" data-toggle="modal" data-target="#editPelanggan<?php echo $pelanggan->pelanggan_id ?>"> 
                                                    <i title="ubah" class="fas fa-edit text-lg text-warning"></i>
                                                </a> | 
                                                <a href="<?php echo base_url().'pelanggan/delete/'.$pelanggan->pelanggan_id?>"> 
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
            <div class="modal fade" id="addPelanggan" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="formAddPelanggan" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title font-weight-bold text-primary mx-3 mt-3" id="formAddPelangganLabel">Input Data Pelanggan</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form name="form_add_mahasiswa" action="<?php echo base_url().'pelanggan/add' ?>" method="post" class="user needs-validation mx-3 mb-4" novalidate>
                            <div class="modal-body"> 
                                <div class="form-group">
                                    <label class="control-label text-primary">ID</label>
                                    <input type="text" class="form-control" placeholder="ID Pelanggan" autofocus name="pelanggan_id" required>
                                </div>
                                <hr>

                                <div class="form-group">
                                    <label class="control-label text-primary">Nama Pelanggan</label>
                                    <input type="text" class="form-control" title="Isikan Nama Pelanggan dengan Huruf" placeholder='Nama Pelanggan'  name="nama_pelanggan" pattern="[A-Za-z ]{1,50}" required>
                                    <div class="invalid-feedback">
                                        Isikan nama pelanggan dengan huruf! (maks. 50 huruf)
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
                                        Pilih jenis kelamin pelanggan!
                                    </div>
                                </div>
                                <hr>

                                <div class="form-group">
                                    <label class="control-label text-primary">Alamat</label>
                                    <input type="text"  class="form-control" placeholder='Alamat Pelanggan' name="alamat"  required>
                                    <div class="invalid-feedback">
                                        Isikan alamat pelanggan!
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label text-primary">No. Hp</label>
                                    <input type="phone"  class="form-control" placeholder='No. Hp Pelanggan' name="no_hp"  required>
                                    <div class="invalid-feedback">
                                        Isikan No. Hp pelanggan!
                                    </div>
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
                foreach ($data_pelanggan as $pelanggan) {
            ?>
            <div class="modal fade" id="editPelanggan<?php echo $pelanggan->pelanggan_id ?>" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="formEditPelanggan" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title font-weight-bold text-primary mx-3 mt-3" id="formEditPelangganLabel">Ubah Data Pelanggan</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form name="form_edit_mahasiswa" action="<?php echo base_url().'pelanggan/edit' ?>" method="post" class="user needs-validation mx-3 mb-4" novalidate>
                            <div class="modal-body"> 
                                <div class="form-group">
                                    <label class="control-label text-primary">ID</label>
                                    <input type="text" class="form-control" placeholder="ID Pelanggan" autofocus name="pelanggan_id" value="<?php echo $pelanggan->pelanggan_id ?>" readonly>
                                </div>
                                <hr>

                                <div class="form-group">
                                    <label class="control-label text-primary">Nama Pelanggan</label>
                                    <input type="text" class="form-control" title="Isikan Nama Pelanggan dengan Huruf" placeholder='Nama Pelanggan'  name="nama_pelanggan" pattern="[A-Za-z ]{1,50}" value="<?php echo $pelanggan->nama_pelanggan ?>" required>
                                    <div class="invalid-feedback">
                                        Isikan nama pelanggan dengan huruf! (maks. 50 huruf)
                                    </div>
                                </div>
                                <hr>

                                <div class="form-group">
                                    <label class="control-label text-primary">Jenis Kelamin</label>
                                    <select class="form-control" name="jeniskelamin" pattern="[A-Za-z]{1,10}" required>
                                        <option value=""></option>
                                        <option value="Laki-Laki" <?php if ($pelanggan->jeniskelamin === 'Laki-Laki') { echo "selected"; } ?>>Laki-Laki</option>
                                        <option value="Perempuan" <?php if ($pelanggan->jeniskelamin === 'Perempuan') { echo "selected"; } ?>>Perempuan</option>
                                    </select>
                                    <div class="invalid-feedback">
                                        Pilih jenis kelamin pelanggan!
                                    </div>
                                </div>
                                <hr>

                                <div class="form-group">
                                    <label class="control-label text-primary">Alamat</label>
                                    <input type="text"  class="form-control" placeholder='Alamat Pelanggan' name="alamat"  value="<?php echo $pelanggan->alamat ?>" required>
                                    <div class="invalid-feedback">
                                        Isikan alamat pelanggan!
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label text-primary">No. Hp</label>
                                    <input type="phone"  class="form-control" placeholder='No. Hp Pelanggan' name="no_hp" value="<?php echo $pelanggan->no_hp ?>" required>
                                    <div class="invalid-feedback">
                                        Isikan No. Hp pelanggan!
                                    </div>
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
            <div class="modal fade" id="cetakPelanggan" data-keyboard="false" tabindex="-1" aria-labelledby="filterCetakPelanggan" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title font-weight-bold text-primary mx-3 mt-3" id="filterCetakPelangganLabel">Print Data Pelanggan</h5>
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
                                            foreach ($data_pelanggan as $angkatan) {
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
            <div class="modal fade" id="cetakPDFPelanggan" data-keyboard="false" tabindex="-1" aria-labelledby="filterCetakPelanggan" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title font-weight-bold text-primary mx-3 mt-3" id="filterCetakPelangganLabel">Cetak PDF Data Pelanggan</h5>
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

            

            