<?php
    date_default_timezone_set('Asia/Jakarta');
    $kd = $_GET['name'];
    $cek = new Admin();
    $sql = "SELECT tb_temporary_perusahaan.no_pendaftaran, tb_temporary_perusahaan.kode_perusahaan, tb_temporary_perusahaan.nama_perusahaan, tb_temporary_perusahaan.kebutuhan, tb_temporary_perusahaan.create_date, tb_temporary_perusahaan.kode_pekerjaan, tb_jenis_pekerjaan.nama_pekerjaan FROM tb_temporary_perusahaan LEFT JOIN tb_jenis_pekerjaan ON tb_jenis_pekerjaan.kd_pekerjaan=tb_temporary_perusahaan.kode_pekerjaan WHERE tb_temporary_perusahaan.kode_perusahaan = :id";
    $stmt = $cek->runQuery($sql);
    $stmt->execute(array(
        ':id'   =>$kd));

    $row = $stmt->fetch(PDO::FETCH_LAZY);

    $status = $row['nama_perusahaan'];


    $id = "nomor_kontrak";
    $kode = "SPK-";
    $tbName = "tb_kerjasama_perusahan";

    $nomor = $cek->Generate($id, $kode, $tbName);

    

    if (isset($_POST['addData'])) {
        # code...
        $no_kontrak = $_POST['txt_kontrak'];
        $kd_perusahaan = $_POST['txt_kode'];
        $deskripsi = $_POST['txt_deskripsi'];
        $tugas = $_POST['txt_tugas'];
        $tanggung = $_POST['txt_tanggung'];
        $penempatan = $_POST['txt_penempatan'];
        $total = $_POST['txt_nilai'];
        
        $admin = $_POST['txt_admin'];
        $start = $_POST['txt_start'];
        $ends = $_POST['txt_ends'];

        $query = "INSERT INTO tb_kerjasama_perusahan (nomor_kontrak, kode_perusahaan, deskripsi, tugas, tanggung_jwb, penempatan, kontrak_start, kontrak_end, nilai_kontrak, kode_admin) VALUES (:kontrak, :kode, :deskripsi, :tgs, :tgjwb, :tmpt, :start, :ends, :nilai, :admin)";

        $stmt = $cek->runQuery($query);
        $stmt->execute(array(
          ':kontrak'  =>$no_kontrak,
          ':kode'     =>$kd_perusahaan,
          ':deskripsi'=>$deskripsi,
          ':tgs'      =>$tugas,
          ':tgjwb'    =>$tanggung,
          ':tmpt'     =>$penempatan,
          ':start'    =>$start,
          ':ends'     =>$ends,
          ':nilai'    =>$total,
          ':admin'    =>$admin));
        if (!$stmt) {
          # code...
          echo "data tidak masuk";
        } else{

          $sql = "UPDATE tb_temporary_perusahaan SET status = '1'";
          $stmt = $cek->runQuery($sql);
          $stmt->execute();

          print "<script>window.location='index.php?p=select-karyawan&id=".$no_kontrak."';</script>";
          
          
        }


        // $tgs = explode('#', $tugas);
        // print_r($tgs);

    }
   

?>

<div class="row">
    <div class="col-md-8">
        

    <div class="x_panel">
      <div class="x_title">
        <h2>Detail Request <small>different form</small></h2>
        
        <div class="clearfix"></div>
      </div>
      <div class="x_content">
        <br>
        <form class="form-horizontal form-label-left" method="post" action="">

          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Total Karyawan <span class="required">*</span>
            </label>
            <div class="col-md-9 col-sm-9 col-xs-12">
              <input type="number" name="txt_total" class="form-control" placeholder="total karyawan" required>
              <input type="hidden" name="txt_kode" class="form-control" value="<?php echo $row['kode_perusahaan']; ?>">
              <input type="hidden" name="txt_kontrak" class="form-control" value="<?php echo $nomor; ?>">
              <input type="hidden" name="txt_admin" class="form-control" value="<?php echo $admin_id; ?>">
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Deskripsi Pekerjaan <span class="required">*</span>
            </label>
            <div class="col-md-9 col-sm-9 col-xs-12">
              <textarea  name="txt_deskripsi" class="form-control" rows="3" placeholder="tambahkan &quot;#&quot; untuk setiap deskripsi baru" required></textarea>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Tugas<span class="required">*</span>
            </label>
            <div class="col-md-9 col-sm-9 col-xs-12">
              <textarea class="form-control" name="txt_tugas" rows="3" placeholder="tambahkan &quot;#&quot; untuk setiap tugas baru" required></textarea>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Tanggung Jawab<span class="required">*</span>
            </label>
            <div class="col-md-9 col-sm-9 col-xs-12">
              <textarea class="form-control" name="txt_tanggung" rows="3" placeholder="tambahkan &quot;#&quot; untuk setiap tanggung jawab baru" required></textarea>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Penempatan Kerja</label>
            <div class="col-md-9 col-sm-9 col-xs-12">
              <input type="text" name="txt_penempatan" class="form-control" placeholder="nama kota penempatan" required>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Nilai Pekerjaan</label>
            <div class="col-md-9 col-sm-9 col-xs-12">
              <input type="text" name="txt_nilai" class="form-control" placeholder="" required>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Kontrak Start</label>
            <div class="col-md-3 col-sm-3 col-xs-12">
              <input type="text" name="txt_start" class="form-control has-feedback-left" name="tanggal" id="datepsikotes"  aria-describedby="inputSuccess2Status4">
                    <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
            </div>
            <label class="control-label col-md-2 col-sm-2 col-xs-12">Kontrak Ends</label>
            <div class="col-md-4 col-sm-3 col-xs-12">
                

                                <input class="form-control has-feedback-left" id="single_cal1" placeholder="First Name" name="txt_ends" aria-describedby="inputSuccess2Status" type="text">
                                <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                                <span id="inputSuccess2Status" class="sr-only">(success)</span>
                              

            </div>
          </div>
          

          <div class="ln_solid"></div>
          <div class="form-group">
            <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
              <button type="button" class="btn btn-primary">Cancel</button>
              <button type="reset" class="btn btn-primary">Reset</button>
              <button type="submit" name="addData" class="btn btn-success">Submit</button>
            </div>
          </div>

        </form>
      </div>
    </div>
    </div>
    <div class="col-md-4">
        <div class="x_panel">
            <div class="x_title">
                <h2>Perusahaan </h2>
                <div class="clearfix"></div>
              </div>
            <div class="form form-horizontal">
                <div class="form-group">
                    <label class="control-label col-md-4 col-sm-3 col-xs-12">Kode</label>
                    <div class="col-md-8 col-sm-9 col-xs-12">
                      <strong class="form-control"> <?php echo $row['kode_perusahaan']; ?></strong>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-md-4 col-sm-3 col-xs-12">Nama</label>
                    <div class="col-md-8 col-sm-9 col-xs-12">
                      <input type="text" class="form-control" disabled="disabled" value="<?php echo $row['nama_perusahaan'];?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-md-4 col-sm-3 col-xs-12">Kebutuhan</label>
                    <div class="col-md-8 col-sm-9 col-xs-12">
                      <input type="text" class="form-control" disabled="disabled" value="<?php echo $row['nama_pekerjaan'];?>">
                    </div>
                  </div>
            </div>
        </div>
    </div>
</div>

