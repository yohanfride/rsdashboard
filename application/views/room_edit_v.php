<?php include("header.php") ?>


<div class="section-header">
    <h1>Patient Room Management</h1>
    <div class="section-header-breadcrumb">
      <div class="breadcrumb-item active"><a href="<?= base_url()?>">Main Page</a></div>
      <div class="breadcrumb-item active"><a href="<?= base_url()?>room">Patient Room</a></div>
      <div class="breadcrumb-item">Update</div>
    </div>
</div>

<div class="section-body">
    <h2 class="section-title">Update Patient Room</h2>
    <p class="section-lead">Page for update docter data</p>
    <div class="row">
        <div class="col-md-8">
            <div class="card card-outline-info">
                <div class="card-header">
                    <h4 class="m-b-0">Update Patient Room Form</h4>
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
                                <label for="room_number">Room Number</label>
                                <input type="text" class="form-control" id="room_number" name="room_number" placeholder="Enter Patient Room Number" value="<?= $data->nomor_ruangan?>" required="required" >
                            </div> 
                            <div class="form-group" >
                                <label for="type">Type</label>
                                <input type="text" class="form-control" id="type" name="type" placeholder="Enter Patient Room Type" required="required" value="<?= $data->jenis_ruangan?>">
                            </div> 
                            <div class="form-group" >
                                <label for="price">Price/Day (IDR)</label>
                                <input type="text" class="form-control uang" id="price" name="price" placeholder="Enter Patient Room Price/Day (IDR)" required="required" value="<?= $data->harga?>">
                            </div>                                
                            <div class="form-group" >
                                <label for="detail">Addtional Information</label>
                                <textarea type="text" class="form-control" rows="4" id="detail" name="detail" placeholder="Enter Addtional Information of Patient Room" ><?= $data->keterangan?></textarea> 
                            </div> 
                        </div>
                        <div class="form-actions">
                            <button type="submit" class="btn btn-success" name="save" value="save"> <i class="fa fa-check"></i> Save</button>
                            <a href="<?= base_url()?>room"><button type="button" class="btn btn-inverse">Cancel</button></a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include("footer.php") ?>
<script src="<?= base_url()?>assets/js/jquery.mask.min.js"></script>

<script type="text/javascript">
    $(document).ready(function(){
        $( '.uang' ).mask('000.000.000.000.000', {reverse: true});
    })
</script>
