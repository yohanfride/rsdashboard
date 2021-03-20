<?php include("header.php") ?>


<div class="section-header">
    <h1>Medical Record Management</h1>
    <div class="section-header-breadcrumb">
      <div class="breadcrumb-item active"><a href="<?= base_url()?>">Main Page</a></div>
      <div class="breadcrumb-item active"><a href="<?= base_url()?>record">Medical Record</a></div>
      <div class="breadcrumb-item">Patient</div>
    </div>
</div>

<div class="section-body">
    <h2 class="section-title">Medical Record Management</h2>
    <p class="section-lead">Page for manage the patient data</p>
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
                                    <input type="text" class="form-control" id="record" name="record" required="required" value="<?= $pasien->no_rekam_medik?>" >
                                </div> 
                                <div class="form-group" >
                                    <label for="name">Patient Name</label>
                                    <input type="text" class="form-control" id="name" name="name" required="required" value="<?= $pasien->nama?>">
                                </div> 
                                
                            </div>
                            <div class="col-md-12 col-xl-6">
                                <div class="form-group">
                                    <label>Gender</label>
                                    <input type="text" class="form-control" id="id" name="id" required="required" value="<?= $pasien->jenis_kelamin?>" >
                                </div> 
                                <div class="form-group" >
                                    <label for="birthday">Birthday</label>
                                    <input type="text" class="form-control datepicker" id="birthday" name="birthday" required="required" value="<?= $pasien->tgl_lahir?>" >
                                </div> 
                            </div>
                        </div>
                    </form>
                </div>
            </div>    
        </div>
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-lg-flex align-items-center">
                        <h3 class="card-title">Medical Record Data</h3>
                        <!-- <a href="<?= base_url()?>patient/add/" class="ml-auto"><button class="btn btn-primary btn-round ml-auto">
                            <i class="fa fa-plus"></i>
                            Add New Medical Record
                        </button></a> -->
                    </div>
                    <div class="table-responsive mt-3">
                        <?php if($error){ ?>
                        <div class="alert alert-danger alert-dismissible show fade alert-has-icon">
                            <div class="alert-icon"><i class="fa fa-exclamation-triangle"></i></div>
                            <div class="alert-body">
                                <button class="close" data-dismiss="alert"> <span>&times;</span> </button>
                                <div class="alert-title"> Warning</div><?= $error?>
                            </div>
                        </div>
                        <?php } ?>
                        <?php if($success){ ?>
                        <div class="alert alert-success alert-dismissible show fade alert-has-icon">
                            <div class="alert-icon"><i class="fa fa-check"></i></div>
                            <div class="alert-body">
                                <button class="close" data-dismiss="alert"> <span>&times;</span> </button>
                                <div class="alert-title"> Success</div><?= $success?>
                            </div>
                        </div>
                        <?php } ?>
                        <table id="add-row" class="table table-striped table-borderless table-hover " >
                            <thead>
                                <tr class="text-center">
                                    <th>Medical Record ID</th>
                                    <th>Date</th>
                                    <th>Patient</th>
                                    <th>Doctor</th>
                                    <th>Complaint</th>
                                    <th>Diagnosis</th>
                                    <th>Treatment</th>
                                    <th style="width: 10%">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($data as $d) { ?>
                                <tr>
                                    <td><?= $d->no_rekam_medik ?></td>
                                    <td><?= date_format(date_create($d->tanggal_pemeriksaan), 'd/m/Y'); ?></td>
                                    <td><?= $d->pasien->nama ?></td>
                                    <td><?= $d->dokter->nama_dokter ?></td>
                                    <td><?= $d->keluhan ?></td>
                                    <td><?= $d->diagnosis ?></td>
                                    <td><?= $d->pengobatan ?></td>
                                    <td class="text-center">
                                        <div class="form-button-action" style="margin-left: -20px;">
                                            <div class="form-button-action">
                                                <a href="<?= base_url();?>record/detail/<?= $d->id_rekam_medik; ?>" data-toggle="tooltip" data-original-title="Detail"> 
                                                    <i class="fa fa-search text-info mr-2"></i>
                                                </a>
                                                <!-- <a href="<?= base_url();?>patient/edit/<?= $d->id_rekam_medik; ?>" data-toggle="tooltip" data-original-title="Update"> 
                                                    <i class="fa fa-pencil-alt text-inverse mr-2"></i>
                                                </a>
                                                <a href="<?= base_url();?>patient/delete/<?= $d->id_rekam_medik; ?>" data-toggle="tooltip" data-original-title="Delete" class="btn-delete">
                                                    <i class="fa fa-trash text-danger  mr-2"></i>
                                                </a> -->
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?php include("footer.php") ?>
<script src="<?= base_url()?>assets/node_modules/bootstrap-daterangepicker/daterangepicker.js"></script>

<script type="text/javascript">
    $(document).ready(function() {
        $('#add-row').DataTable();
    } );
</script>
