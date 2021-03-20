<?php include("header.php") ?>


<div class="section-header">
    <h1>Patient Management</h1>
    <div class="section-header-breadcrumb">
      <div class="breadcrumb-item active"><a href="<?= base_url()?>">Main Page</a></div>
      <div class="breadcrumb-item">Patient</div>
    </div>
</div>

<div class="section-body">
    <h2 class="section-title">Patient Management</h2>
    <p class="section-lead">Page for manage the patient data</p>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-lg-flex align-items-center">
                        <h3 class="card-title">Patient Data</h3>
                        <a href="<?= base_url()?>patient/add/" class="ml-auto"><button class="btn btn-primary btn-round ml-auto">
                            <i class="fa fa-plus"></i>
                            Add New Patient
                        </button></a>
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
                                    <th>Name</th>
                                    <th>Medical Record ID</th>
                                    <th>Birtday</th>
                                    <th>Gender</th>
                                    <th style="width: 30%">Address</th>
                                    <th>Phone</th>
                                    <th style="width: 10%">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($data as $d) { ?>
                                <tr>
                                    <td><?= $d->nama ?></td>
                                    <td><?= $d->no_rekam_medik ?></td>
                                    <td><?= date_format(date_create($d->tgl_lahir), 'd/m/Y'); ?></td>
                                    <td><?= $d->jenis_kelamin ?></td>
                                    <td><?= $d->alamat ?></td>
                                    <td><?= $d->no_telp ?></td>
                                    <td class="text-center">
                                        <div class="form-button-action" style="margin-left: -20px;">
                                            <div class="form-button-action">
                                                <a href="<?= base_url();?>record/patient/<?= $d->no_rekam_medik; ?>" data-toggle="tooltip" data-original-title="Medical Record"> 
                                                    <i class="fa fa-notes-medical text-info mr-2"></i>
                                                </a>
                                                <a href="<?= base_url();?>patient/edit/<?= $d->id_pasien; ?>" data-toggle="tooltip" data-original-title="Update"> 
                                                    <i class="fa fa-pencil-alt text-inverse mr-2"></i>
                                                </a>
                                                <a href="<?= base_url();?>patient/delete/<?= $d->id_pasien; ?>" data-toggle="tooltip" data-original-title="Delete" class="btn-delete">
                                                    <i class="fa fa-trash text-danger  mr-2"></i>
                                                </a>
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

<script type="text/javascript">
    $(document).ready(function() {
        $('#add-row').DataTable();
    } );
</script>
