<?php include("header.php") ?>


<div class="section-header">
    <h1>User Management</h1>
    <div class="section-header-breadcrumb">
      <div class="breadcrumb-item active"><a href="<?= base_url()?>">Main Page</a></div>
      <div class="breadcrumb-item active"><a href="<?= base_url()?>user">User Management</a></div>
      <div class="breadcrumb-item">Reset Password</div>
    </div>
</div>

<div class="section-body">
    <h2 class="section-title">Reset Password Pengguna</h2>
    <p class="section-lead">Page for reset user account password</p>
    <div class="row">
        <div class="col-md-8">
            <div class="card card-outline-info">
                <div class="card-header">
                    <h4 class="m-b-0">Reset Password Form</h4>
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
                                <input type="text" class="form-control" id="username" name="username" value="<?= $data->username; ?>" readonly="true">
                            </div>
                            <div class="form-group">
                                <label for="nama">Name</label>
                                <input type="text" class="form-control" id="nama" name="nama" readonly="true" value="<?= $data->name?>" >
                            </div>  
                            <div class="form-group">
                                <label for="role">Role</label>
                                <input type="text" class="form-control" id="role" readonly="true" value="<?php 
                                    if($data->role == 'dokter'){ 
                                        echo 'Doctor'; 
                                    } else {
                                        echo 'Administrator'; 
                                    } ?>" readonly="true">
                            </div>
                            <div class="form-group">
                                <label for="password" style="width: 100%;">New Password</label>

                                <div class="input-group ">
                                    <input type="text" class="form-control col-6 col-md-8" id="password" name="password" placeholder="Enter New Baru" required="required"  pattern="(?=.*\d)(?=.*[a-z]).{6,}" title="Password must have contain 1 number or 1 alphabet and more than 6 characters">
                                    <div class="input-group-append">
                                      <button type="button" onclick="reset_pass();" class="btn btn-primary" name="save" value="save"> <i class="fa fa-sync"></i> Change Password</button>
                                    </div>
                                </div>
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
<script type="text/javascript">
    function makeid(length) {
       var result           = '';
       var characters       = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
       var charactersLength = characters.length;
       for ( var i = 0; i < length; i++ ) {
          result += characters.charAt(Math.floor(Math.random() * charactersLength));
       }
       return result;
    }
    function reset_pass(){
        $("#password").val(makeid(6));
    }
    reset_pass();
</script>