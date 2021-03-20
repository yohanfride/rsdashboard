<?php include("header.php") ?>


<div class="section-header">
    <h1>Update User </h1>
    <div class="section-header-breadcrumb">
      <div class="breadcrumb-item active"><a href="<?= base_url()?>">Beranda</a></div>
      <div class="breadcrumb-item active"><a href="<?= base_url()?>user">User Management</a></div>
      <div class="breadcrumb-item">Update</div>
    </div>
</div>

<div class="section-body">
    <h2 class="section-title">Update Users</h2>
    <p class="section-lead">Page for update new user data</p>
    <div class="row">
        <div class="col-md-8">
            <div class="card card-outline-info">
                <div class="card-header">
                    <h4 class="m-b-0">Update Users Form</h4>
                </div>
                <div class="card-body">
                    <form method="post" class="form-material" enctype="multipart/form-data">
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
                        <div class="form-body">
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" class="form-control" id="username" name="username" placeholder="Enter Username" required="required" value="<?= $data->username?>" >
                            </div>
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name" required="required" value="<?= $data->name?>" >
                            </div>
                            <div class="form-group">
                                <label for="name">ID (NIP)</label>
                                <input type="text" class="form-control" id="nip" name="nip" placeholder="Enter ID(NIP)" required="required" value="<?= $data->nip?>" >
                            </div>    
                            <div class="form-group">
                                <label for="role">Level Akun</label>
                                <select class="form-control" id="role" name="role" required>
                                    <option value="adminisitrator" <?= ($data->role == 'administrator')?'selected':''; ?>>Administrator Master</option>
                                    <option value="dokter" <?= ($data->role == 'dokter')?'selected':''; ?> >Doctor</option>
                                </select>
                            </div>                                
                        </div>
                        <div class="form-actions">
                            <button type="submit" class="btn btn-success" name="save" value="save"> <i class="fa fa-check"></i> Save</button>
                            <a href="<?= base_url()?>user"><button type="button" class="btn btn-inverse">Cancel</button></a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<?php include("footer.php") ?>

