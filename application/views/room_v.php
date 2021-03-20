<?php include("header.php") ?>


<div class="section-header">
    <h1>Patient Room Management</h1>
    <div class="section-header-breadcrumb">
      <div class="breadcrumb-item active"><a href="<?= base_url()?>">Main Page</a></div>
      <div class="breadcrumb-item">Patient Room</div>
    </div>
</div>

<div class="section-body">
    <h2 class="section-title">Patient Room Management</h2>
    <p class="section-lead">Page for manage the docto data</p>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-lg-flex align-items-center">
                        <h3 class="card-title">Patient Room Data</h3>
                        <a href="<?= base_url()?>room/add/" class="ml-auto"><button class="btn btn-primary btn-round ml-auto">
                            <i class="fa fa-plus"></i>
                            Add New Patient Room
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
                                    <th>Room Number</th>
                                    <th>Tyoe</th>
                                    <th>Price / Day (IDR)</th>
                                    <th>Additional Information</th>
                                    <th style="width: 10%">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($data as $d) { ?>
                                <tr>
                                    <td><?= $d->nomor_ruangan ?></td>
                                    <td class="text-center"><?= $d->jenis_ruangan ?></td>
                                    <td class="text-right"><?= number_format($d->harga,0,',','.'); ?></td>
                                    <td><?= $d->keterangan ?></td>
                                    <td class="text-center">
                                        <div class="form-button-action" style="margin-left: -20px;">
                                            <div class="form-button-action">
                                                <a href="<?= base_url();?>room/edit/<?= $d->id_ruangan; ?>" data-toggle="tooltip" data-original-title="Update"> 
                                                    <i class="fa fa-pencil-alt text-inverse mr-2"></i>
                                                </a>
                                                <a href="<?= base_url();?>room/delete/<?= $d->id_ruangan; ?>" data-toggle="tooltip" data-original-title="Delete" class="btn-delete">
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
