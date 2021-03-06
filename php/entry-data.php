<?php
    $cek = new Perusahaan();
    $st = $cek->runQuery("SELECT * FROM tb_temporary_perusahaan WHERE kode_perusahaan = ''");
    $st->execute();

    $data  = $st->rowCount();
?>

<div class="x_panel">
    <div class="x_title">
        <h2>Data Perusahaan</h2>

        <div class="clearfix"></div>
    </div>
    <div class="x_content">

            <div class="col-md-12">
                

                <br/>

                <div class="" role="tabpanel" data-example-id="togglable-tabs">
                    <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                        <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Perusahaan Lama</a>
                        </li>
                        <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Perusahaan <small>Baru</small> <span class="label label-success"><?php echo $data; ?></span></a>
                        </li>
                    </ul>

                    <div id="myTabContent" class="tab-content">
                        <div role="tabpanel" class="tab-pane active fade in" id="tab_content1" aria-labelledby="home-tab">

                            <!-- start recent activity -->
                            <ul class="messages">
                                <div class="table-responsive">
                                    <table class="table table-striped jambo_table bulk_action">
                                        <thead>
                                            <tr class="headings">
                                                <th class="column-title">Nama Perusahaan </th>
                                                <th class="column-title">CP </th>
                                                <th class="column-title">Handphone </th>
                                                <th class="column-title">Email </th>
                                                <th class="column-title">Kebutuhan </th>
                                                <th class="column-title">Jenis Pekerjaan </th>
                                                <th class="column-title">Bergabung Sejak </th>
                                                <th class="column-title">Action </th>
                                            </tr>
                                        </thead>
                                    <?php
                                    $calon = new Karyawan();
                                    $stmt = $calon->runQuery("SELECT tb_temporary_perusahaan.no_pendaftaran, tb_temporary_perusahaan.kode_perusahaan, tb_temporary_perusahaan.nama_perusahaan, tb_temporary_perusahaan.cp, tb_temporary_perusahaan.phone, tb_temporary_perusahaan.email, tb_temporary_perusahaan.create_date, tb_temporary_perusahaan.status, tb_jenis_pekerjaan.nama_pekerjaan, tb_kategori_pekerjaan.nama_kategori 
                                        FROM tb_temporary_perusahaan
                                        LEFT JOIN tb_jenis_pekerjaan ON tb_jenis_pekerjaan.kd_pekerjaan=tb_temporary_perusahaan.kode_pekerjaan
                                        LEFT JOIN tb_kategori_pekerjaan ON tb_kategori_pekerjaan.kode_kategori=tb_temporary_perusahaan.kebutuhan
                                        WHERE tb_temporary_perusahaan.kode_perusahaan != '' AND tb_temporary_perusahaan.status = ''
                                        ORDER BY tb_temporary_perusahaan.create_date DESC");
                                    $stmt->execute(array());
                                    ?>
                                        <tbody>
                                        <?php
                                        if ($stmt->rowCount() == '') {
                                            # code...
                                            ?>
                                            <tr>
                                                <td colspan="8">Data Tidak Ada</td>
                                            </tr>
                                            <?php
                                        } else{
                                        while ($row = $stmt->fetch(PDO::FETCH_LAZY)) {
                                            # code...
                                            ?>
                                                <tr class="even pointer">

                                                    
                                                    <td class="col-md-2"><?php echo $row['nama_perusahaan']; ?></td>
                                                    <td class="col-md-2"><?php echo $row['cp']; ?></td>
                                                    <td class="col-md-2"><?php echo $row['phone']; ?></td>
                                                    <td class="col-md-2"><?php echo $row['email']; ?></td>
                                                    <td class="col-md-1"><?php echo $row['nama_kategori']; ?></td>
                                                    <td class="1"><?php echo $row['nama_pekerjaan']; ?></td>
                                                    <td class="col-md-2"><?php echo $row['create_date']; ?></td>
                                                    <td class="col-md-2">
                                                        <a href="?p=entrydata&name=<?php echo $row['kode_perusahaan']; ?>">
                                                        <button type="button" class="btn btn-success btn-xs"> <i class="fa fa-edit">
                                                          </i>  Detail Request </button>
                                                          </a>
                                                          

                                                    </td>

                                                </tr>
                                    <?php } }?>
                                        </tbody>
                                    </table>
                                </div>
                            </ul>
                            <!-- end recent activity -->

                        </div>
                        <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">

                            <!-- start user projects -->
                      
                            <ul class="messages">
                                <div class="table-responsive">
                                    <table class="table table-striped jambo_table bulk_action">
                                        <thead>
                                            <tr class="headings">
                                                <th class="column-title">Nama Perusahaan </th>
                                                <th class="column-title">CP </th>
                                                <th class="column-title">Handphone </th>
                                                <th class="column-title">Email </th>
                                                <th class="column-title">Kebutuhan </th>
                                                <th class="column-title">Jenis Pekerjaan </th>
                                                <th class="column-title">Bergabung Sejak </th>
                                                <th class="column-title">Action </th>
                                            </tr>
                                        </thead>
                                    <?php
                                    $calon = new Karyawan();
                                    $stmt = $calon->runQuery("SELECT tb_temporary_perusahaan.no_pendaftaran, tb_temporary_perusahaan.kode_perusahaan, tb_temporary_perusahaan.nama_perusahaan, tb_temporary_perusahaan.cp, tb_temporary_perusahaan.phone, tb_temporary_perusahaan.email, tb_temporary_perusahaan.create_date, tb_temporary_perusahaan.status, tb_jenis_pekerjaan.nama_pekerjaan, tb_kategori_pekerjaan.nama_kategori 
                                        FROM tb_temporary_perusahaan
                                        LEFT JOIN tb_jenis_pekerjaan ON tb_jenis_pekerjaan.kd_pekerjaan=tb_temporary_perusahaan.kode_pekerjaan
                                        LEFT JOIN tb_kategori_pekerjaan ON tb_kategori_pekerjaan.kode_kategori=tb_temporary_perusahaan.kebutuhan
                                        WHERE tb_temporary_perusahaan.kode_perusahaan = ''
                                        ORDER BY tb_temporary_perusahaan.create_date DESC");
                                    $stmt->execute(array());
                                    ?>
                                        <tbody>
                                        <?php
                                        if ($stmt->rowCount() == '') {
                                            # code...
                                            ?>
                                            <tr>
                                                <td colspan="7">Data Tidak Ada</td>
                                            </tr>
                                            <?php
                                        } else{
                                        while ($row = $stmt->fetch(PDO::FETCH_LAZY)) {
                                            # code...
                                            ?>
                                                <tr class="even pointer">

                                                    
                                                    <td class="col-md-2"><?php echo $row['nama_perusahaan']; ?></td>
                                                    <td class="col-md-2"><?php echo $row['cp']; ?></td>
                                                    <td class="col-md-2"><?php echo $row['phone']; ?></td>
                                                    <td class="col-md-2"><?php echo $row['email']; ?></td>
                                                    <td class="col-md-1"><?php echo $row['nama_kategori']; ?></td>
                                                    <td class="1"><?php echo $row['nama_pekerjaan']; ?></td>
                                                    <td class="col-md-2"><?php echo $row['create_date']; ?></td>
                                                    <td class="col-md-2">
                                                        <a href="?p=detail-entry&name=<?php echo $row['no_pendaftaran']; ?>">
                                                        <button type="button" class="btn btn-success btn-xs"> <i class="fa fa-edit">
                                                          </i>  Entry </button>
                                                          </a>
                                                          <a href="php/delete-request.php?id=<?php echo $row['no_pendaftaran']; ?>" onClick="return confirm('Yakin data akan dihapus?')" >
                                                          <button type="button" class="btn btn-danger btn-xs">
                                                          <i class="fa fa-remove">  </i>  Delete
                                                        </button>
                                                      </a>

                                                    </td>

                                                </tr>
                                    <?php } }?>
                                        </tbody>
                                    </table>
                                </div>
                            </ul>
                                

                            <!-- end user projects -->

                        </div>
                       

                    </div>
                </div>

            </div>
        </div>
    </div>

</div>



