<?php include("header.php") ?>


<div class="section-header">
    <h1> Password Setting</h1>
    <div class="section-header-breadcrumb">
      <div class="breadcrumb-item active"><a href="<?= base_url()?>">Main Page</a></div>
      <div class="breadcrumb-item">Password Setting</div>
    </div>
</div>

<div class="section-body">
    <h2 class="section-title">Password Setting</h2>
    <p class="section-lead">Page for change password account </p>
    <div class="col-md-8 col-lg-6">
        <div class="card card-outline-info">
            <div class="card-header">
                <h4 class="m-b-0 ">Password Setting Form </h4>
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
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="password">New Password </label>
                                    <input type="password" class="form-control" id="password" name="password" placeholder="Enter New Password" required="required"  pattern="(?=.*\d)(?=.*[a-z]).{6,}" title="Password must have contain 1 number or 1 alphabet and more than 6 characters">
                                </div>
                                <div class="form-group">
                                    <label for="passconf">Retype New Password</label>
                                    <input type="password" class="form-control" id="passconf" name="passconf" placeholder="Retype New Password" required="required" >
                                </div>
                                <hr/>
                                <div class="form-group">
                                    <label for="old_password">Old Password </label>
                                    <input type="password" class="form-control" id="old_password" name="old_password" placeholder="Enter Old Password" required="required">
                                </div>
                            </div>
                        </div> 
                    </div>
                    <div class="form-actions">
                        <button type="submit" class="btn btn-success" name="save" value="save"> <i class="fa fa-check"></i> Save</button>
                        <a href="<?= base_url()?>"><button type="button" class="btn btn-inverse">Cancel</button></a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<?php include("footer.php") ?>

            
