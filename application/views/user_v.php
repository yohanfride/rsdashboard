<?php include("header.php") ?>


<div class="section-header">
    <h1>User Management</h1>
    <div class="section-header-breadcrumb">
      <div class="breadcrumb-item active"><a href="<?= base_url()?>">Beranda</a></div>
      <div class="breadcrumb-item">User Management</div>
    </div>
</div>

<div class="section-body">
    <h2 class="section-title">User Management</h2>
    <p class="section-lead">Page for managemen user data</p>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-lg-flex align-items-center">
                        <h3 class="card-title">User Management</h3>
                        <a href="<?= base_url()?>user/add/" class="ml-auto"><button class="btn btn-primary btn-round ml-auto">
                            <i class="fa fa-plus"></i>
                            Add New User
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
                                <tr>
                                    <th>Name</th>
                                    <th>Username</th>
                                    <th>Role</th>
                                    <th>ID(NIP)</th>
                                    <th>Status</th>
                                    <th style="width: 10%">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($data as $d) { 
                                    $id=$d->id; 
                                    ?>
                                <tr>
                                    <td><?= $d->name ?></td>
                                    <td><?= $d->username ?></td>
                                    <td>
                                        <?php if($d->role == 'dokter'){ ?>
                                        <span class="badge badge-primary">Doctor</span>
                                        <?php } else { ?>
                                        <span class="badge badge-primary">Adminsitrator</span> 
                                        <?php } ?>
                                    </td>
                                    <td><?= $d->nip ?></td>
                                    <td>
                                        <?php if($d->status == 1){ ?>
                                        <span class="badge badge-success pl-3">Active</span>
                                        <?php } else { ?>
                                        <span class="badge badge-danger pl-3">Suspend</span> 
                                        <?php } ?>
                                    </td>
                                    <td>
                                    <div class="form-button-action" style="margin-left: -20px;">
                                        <?php if($d->id != $user_now->id){ ?>
                                        <div class="form-button-action">
                                            <?php if($d->status == 0){ ?>
                                            <a href="<?= base_url();?>user/active/<?= $id; ?>" data-toggle="tooltip" data-original-title="Activated Account">
                                                <i class="fa fa-check text-success  mr-2"></i>
                                            </a>
                                            <?php } else if($d->status == 1){ ?>
                                            <a href="<?= base_url();?>user/nonactive/<?= $id; ?>" data-toggle="tooltip" data-original-title="Suspend Account" >
                                                <i class="fa fa-ban text-warning  mr-2"></i>
                                            </a>
                                            <?php } else { ?>
                                            <a href="<?= base_url();?>user/active/<?= $id; ?>" data-toggle="tooltip" data-original-title="Activated Account">
                                                <i class="fa fa-check text-success  mr-2"></i>
                                            </a> 
                                            <?php } ?>

                                            <a href="<?= base_url();?>user/update/<?= $id; ?>" data-toggle="tooltip" data-original-title="Update"> 
                                                <i class="fa fa-pencil-alt text-inverse mr-2"></i>
                                            </a>
                                            <a href="<?= base_url();?>user/delete/<?= $id; ?>" data-toggle="tooltip" data-original-title="Delete" class="btn-delete">
                                                <i class="fa fa-trash text-danger  mr-2"></i>
                                            </a>
                                             <a href="<?= base_url();?>user/reset_pass/<?= $id; ?>" data-toggle="tooltip" data-original-title="Reset Password"> 
                                                <i class="fa fa-lock text-primary  mr-2"></i>
                                            </a>
                                        </div>
                                        <?php } ?>
                                    </div>
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
