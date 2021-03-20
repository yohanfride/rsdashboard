<?php include("header.php") ?>


<div class="section-header">
    <h1>Patient Management</h1>
    <div class="section-header-breadcrumb">
      <div class="breadcrumb-item active"><a href="<?= base_url()?>">Main Page</a></div>
      <div class="breadcrumb-item active"><a href="<?= base_url()?>patient">Patient</a></div>
      <div class="breadcrumb-item">Update</div>
    </div>
</div>

<div class="section-body">
    <h2 class="section-title">Update Patient</h2>
    <p class="section-lead">Page for add new patient data</p>
    <div class="row">
        <div class="col-md-8">
            <div class="card card-outline-info">
                <div class="card-header">
                    <h4 class="m-b-0">Update Patient Form</h4>
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
                            <div class="form-group" >
                                <label for="name">Name</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Enter Patient Name" required="required" value="<?= $data->nama?>">
                            </div>  
                            <div class="form-group" >
                                <label for="record">Medical Record ID</label>
                                <input type="text" class="form-control" id="record" name="record" required="required" value="<?= $data->no_rekam_medik?>" readonly="true">
                            </div>       
                            <div class="form-group" >
                                <label for="id">Registration ID (KTP)</label>
                                <input type="text" class="form-control" id="id" name="id" placeholder="Enter Patient Registration ID" required="required" value="<?= $data->ktp?>">
                            </div> 
                            <div class="form-group" >
                                <label for="birthday">Birthday</label>
                                <input type="text" class="form-control datepicker" id="birthday" name="birthday" placeholder="Enter Patient Birthday" required="required" value="<?= $data->tgl_lahir?>">
                            </div>   
                            <div class="form-group" >
                                <label for="birthplace">Birth Place</label>
                                <input type="text" class="form-control" id="birthplace" name="birthplace" placeholder="Enter Patient Birth Place" required="required" value="<?= $data->tempat_lahir?>">
                            </div>
                            <div class="form-group">
                                <label>Gender</label>
                                <select class="form-control select2" id="gender" name="gender" required>
                                    <option <?= ($data->jenis_kelamin == 'male')?'selected':''; ?> value="male">Male</option>
                                    <option <?= ($data->jenis_kelamin == 'female')?'selected':''; ?> value="female">Female</option>
                                </select>
                            </div>                  
                            <div class="form-group" >
                                <label for="address">Address</label>
                                <textarea type="text" class="form-control" rows="4" id="address" name="address" placeholder="Enter Patient Address" required="required" ><?= $data->alamat?></textarea> 
                            </div> 
                            <div class="form-group" >
                                <label for="city">City</label>
                                <input type="text" class="form-control" id="city" name="city" placeholder="Enter Patient City Address" required="required" value="<?= $data->kota?>">
                            </div> 
                            <div class="form-group" >
                                <label for="phone">Phone</label>
                                <input type="text" class="form-control" id="phone" name="phone" placeholder="Enter Patient Phone Number" required="required" value="<?= $data->no_telp?>">
                            </div> 
                            <div class="form-group" >
                                <label for="job">Job/Profession</label>
                                <input type="text" class="form-control" id="job" name="job" placeholder="Enter Patient Job/Profession" value="<?= $data->pekerjaan ?>">
                            </div> 
                        </div>
                        <div class="form-actions">
                            <button type="submit" class="btn btn-success" name="save" value="save"> <i class="fa fa-check"></i> Save</button>
                            <a href="<?= base_url()?>patient"><button type="button" class="btn btn-inverse">Cancel</button></a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<?php include("footer.php") ?>
<script src="<?= base_url()?>assets/node_modules/bootstrap-daterangepicker/daterangepicker.js"></script>
