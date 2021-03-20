<?php include("header.php") ?>


<div class="section-header">
    <h1>Medical Record Management</h1>
    <div class="section-header-breadcrumb">
      <div class="breadcrumb-item active"><a href="<?= base_url()?>">Main Page</a></div>
      <div class="breadcrumb-item active"><a href="<?= base_url()?>record/">Medical Record</a></div>
      <?php if(!empty($menu_pasien)){ ?>
      <div class="breadcrumb-item active"><a href="<?= base_url()?>record/<?= $params?>">Patient</a></div>
      <div class="breadcrumb-item">Detail</div>
      <?php } ?>
    </div>
</div>

<div class="section-body">
    <h2 class="section-title">Detail Medical Record</h2>
    <p class="section-lead">Page for add new record data</p>
    <div class="row">
        <div class="col-md-12">
            <div class="card card-outline-info">
                <div class="card-header">
                    <h4 class="m-b-0">Patient Detail</h4>
                </div>
                <div class="card-body">
                    <form method="post" class="form-material " enctype="multipart/form-data">
                        <div class="form-body row">
                            <div class="col-md-12 col-xl-6">
                                <div class="form-group" >
                                    <label for="record">Medical Record ID</label>
                                    <input type="text" class="form-control" id="record" name="record" required="required" value="<?= $data->no_rekam_medik?>" >
                                </div> 
                                <div class="form-group" >
                                    <label for="name">Patient Name</label>
                                    <input type="text" class="form-control" id="name" name="name" required="required" value="<?= $data->pasien->nama?>">
                                </div> 
                                
                            </div>
                            <div class="col-md-12 col-xl-6">
                                <div class="form-group">
                                    <label>Gender</label>
                                    <input type="text" class="form-control" id="id" name="id" required="required" value="<?= $data->pasien->jenis_kelamin?>" >
                                </div> 
                                <div class="form-group" >
                                    <label for="birthday">Birthday</label>
                                    <input type="text" class="form-control datepicker" id="birthday" name="birthday" required="required" value="<?= $data->pasien->tgl_lahir?>" >
                                </div> 
                            </div>
                        </div>
                    </form>
                </div>
            </div>    
        </div>
        <div class="col-md-12">
            <div class="card card-outline-info">
                <div class="card-header">
                    <h4 class="m-b-0">Medical Record Detail</h4>
                </div>
                <div class="card-body">
                    <form method="post" class="form-material " enctype="multipart/form-data">
                        <div class="form-body">
                            <div class="form-group row">
                                <div class="form-group col-md-12 col-xl-6">
                                    <label>Date Add</label>
                                    <input type="text" class="form-control" id="id" name="id" required="required" value="<?= $data->date_add ?>" >
                                </div>
                                <div class="form-group col-md-12 col-xl-6">
                                    <label>Docter</label>
                                    <input type="text" class="form-control" id="id" name="id" required="required" value="<?= $data->dokter->nama_dokter?>" >
                                </div>
                            </div> 

                            <div class="form-group row">
                                <div class="form-group col-md-12 col-xl-6">
                                    <label>Complaint</label>
                                    <textarea type="text" class="form-control" rows="4" id="complaint" name="complaint"  ><?= $data->keluhan?></textarea> 
                                </div>
                                <div class="form-group col-md-12 col-xl-6">
                                    <label>Checkup</label>
                                    <textarea type="text" class="form-control" rows="4" id="checkup" name="checkup"  ><?= $data->pemeriksaan?></textarea> 
                                </div>
                            </div> 
                            <div class="form-group row">
                                <div class="form-group col-md-12 col-xl-6">
                                    <label>Diagnosis</label>
                                    <textarea type="text" class="form-control" rows="4" id="diagnosis" name="diagnosis"  ><?= $data->diagnosis?></textarea> 
                                </div>
                                <div class="form-group col-md-12 col-xl-6">
                                    <label>Treatment</label>
                                    <textarea type="text" class="form-control" rows="4" id="treatment" name="treatment"  ><?= $data->pengobatan?></textarea> 
                                </div>
                            </div> 
                            <div class="form-group row">
                                <div class="form-group col-md-12 col-xl-6">
                                    <label>Prescription</label>
                                    <textarea type="text" class="form-control" rows="4" id="prescription" name="prescription"  ><?= $data->resep_obat?></textarea> 
                                </div>
                                <div class="form-group col-md-12 col-xl-6">
                                    <label>Note</label>
                                    <textarea type="text" class="form-control" rows="4" id="note" name="note"  ><?= $data->catatan?></textarea> 
                                </div>
                            </div> 
                        </div>
                        <div class="form-actions">
                            <a href="<?= base_url()?>record/<?= $params?>"><button type="button" class="btn btn-primary">Back</button></a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<?php include("footer.php") ?>
<script src="<?= base_url()?>assets/node_modules/bootstrap-daterangepicker/daterangepicker.js"></script>
