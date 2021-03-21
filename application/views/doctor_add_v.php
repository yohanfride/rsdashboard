<?php include("header.php") ?>


<div class="section-header">
    <h1>Doctor Management</h1>
    <div class="section-header-breadcrumb">
      <div class="breadcrumb-item active"><a href="<?= base_url()?>">Main Page</a></div>
      <div class="breadcrumb-item active"><a href="<?= base_url()?>doctor">Doctor</a></div>
      <div class="breadcrumb-item">Add</div>
    </div>
</div>

<div class="section-body">
    <h2 class="section-title">Add New Doctor</h2>
    <p class="section-lead">Page for add new docter data</p>
    <div class="row">
        <div class="col-md-8">
            <div class="card card-outline-info">
                <div class="card-header">
                    <h4 class="m-b-0">Add New Doctor Form</h4>
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
                                <input type="text" class="form-control" id="name" name="name" placeholder="Enter Doctor Name" required="required" >
                            </div>                                
                            <div class="form-group" >
                                <label for="address">Address</label>
                                <textarea type="text" class="form-control" rows="4" id="address" name="address" placeholder="Enter Doctor Address" required="required" ></textarea> 
                            </div> 
                            <div class="form-group" >
                                <label for="phone">Phone</label>
                                <input type="text" class="form-control" id="phone" name="phone" placeholder="Enter Doctor Phone Number" required="required" >
                            </div> 
                            <div class="form-group" >
                                <label for="name">Specialist</label>
                                <input type="text" class="form-control" id="specialist" name="specialist" placeholder="Enter Doctor Specialist" required="required" >
                            </div>
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" class="form-control" id="username" name="username" placeholder="Enter Username" required="required" >
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" id="password" name="password" placeholder="Enter Password " required="required"  pattern="(?=.*\d)(?=.*[a-z]).{6,}" title="Harus berisi setidaknya satu angka dan satu huruf besar dan kecil, dan setidaknya 6 karakter atau lebih">
                            </div> 
                            <div class="form-group">
                                <label for="nip">Doctor Registration ID (NIPD)</label>
                                <input type="text" class="form-control" id="nip" name="nip" placeholder="Enter ID(NIP)" required="required" >
                            </div>  
                        </div>
                        <div class="form-actions">
                            <button type="submit" class="btn btn-success" name="save" value="save"> <i class="fa fa-check"></i> Save</button>
                            <a href="<?= base_url()?>doctor"><button type="button" class="btn btn-inverse">Cancel</button></a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<?php include("footer.php") ?>
