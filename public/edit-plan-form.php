<?php
include_once('includes/functions.php');
date_default_timezone_set('Asia/Kolkata');
$function = new functions;
include_once('includes/custom-functions.php');
$fn = new custom_functions;

if (isset($_GET['id'])) {
    $ID = $db->escapeString($fn->xss_clean($_GET['id']));
} else {
    // $ID = "";
    return false;
    exit(0);
}

if (isset($_POST['btnUpdate'])){
    $error = array();
    $daily_income = $db->escapeString($fn->xss_clean($_POST['daily_income']));
    $price = $db->escapeString($fn->xss_clean($_POST['price']));
    $valid = $db->escapeString($fn->xss_clean($_POST['valid']));
    $name = $db->escapeString($fn->xss_clean($_POST['name']));
    
  
    if (empty($name)) {
        $error['name'] = " <span class='label label-danger'>Required!</span>";
    }
    if (empty($daily_income)) {
        $error['daily_income'] = " <span class='label label-danger'>Required!</span>";
    }
    if (empty($price)) {
        $error['roll_no'] = " <span class='label label-danger'>Required!</span>";
    }
    if (empty($valid)) {
        $error['email'] = " <span class='label label-danger'>Required!</span>";
    }
   

    if (!empty($name)&& !empty($daily_income)&& !empty($price) && !empty($valid))
    {
        if ($_FILES['image']['size'] != 0 && $_FILES['image']['error'] == 0 && !empty($_FILES['image'])) {
            //image isn't empty and update the image
            $old_image = $db->escapeString($_POST['old_image']);
            $extension = pathinfo($_FILES["image"]["name"])['extension'];
    
            // if (!$result) {
            //     echo " <span class='label label-danger'>Logo image type must jpg, jpeg, gif, or png!</span>";
            //     return false;
            //     exit();
            // }
            $target_path = 'upload/images/';
            
            $filename = microtime(true) . '.' . strtolower($extension);
            $full_path = $target_path . "" . $filename;
            if (!move_uploaded_file($_FILES["image"]["tmp_name"], $full_path)) {
                echo '<p class="alert alert-danger">Can not upload image.</p>';
                return false;
                exit();
            }
            if (!empty($old_image)) {
                unlink('upload/images/' . $old_image);
            }
            $upload_image = 'upload/images/' . $filename;
            $sql = "UPDATE plans SET `image`='" . $upload_image . "' WHERE `id`=" . $ID;
            $db->sql($sql);
        }
        $sql = "UPDATE plans SET daily_income='$daily_income',price='$price',valid='$valid',name='$name' WHERE id=$ID";
        $db->sql($sql);
        $plan_result = $db->getResult();

        if (!empty($plan_result)) {
            $plan_result = 0;
        } else {
            $plan_result = 1;
        }
        if ($plan_result == 1) {
            $error['add_menu'] = "<section class='content-header'>
                                            <span class='label label-success'>Plan details Updated Successfully</span>
                                            <h4><small><a  href='plans.php'><i class='fa fa-angle-double-left'></i>&nbsp;&nbsp;&nbsp;Back to Plans</a></small></h4>
                                             </section>";
        } else {
            $error['add_menu'] = " <span class='label label-danger'>Failed</span>";
        }

    }
}
$data = array();
$sql = "SELECT * FROM plans WHERE id = '$ID'";
$db->sql($sql);
$res = $db->getResult();
foreach ($res as $row)
    $data = $row;
?>
<section class="content-header">
    <h1>Edit Plan</h1>
    <?php echo isset($error['add_menu']) ? $error['add_menu'] : ''; ?>
    <ol class="breadcrumb">
        <li><a href="home.php"><i class="fa fa-home"></i> Home</a></li>
    </ol>

</section>
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Edit Plan</h3>
                </div>
                <div class="box-header">
                    <?php echo isset($error['cancelable']) ? '<span class="label label-danger">Till status is required.</span>' : ''; ?>
                </div>

                <!-- /.box-header -->
                <!-- form start -->
                <form id='edit_plan_form' method="post" enctype="multipart/form-data">
                    <input type="hidden" id="old_image" name="old_image"  value="<?= $data['image']; ?>">
                            
                    <div class="box-body">
                        <div class="row">
                            <div class="form-group">
                                <div class='col-md-4'>
                                    <label for="exampleInputEmail1">Plan Name</label> <i class="text-danger asterik">*</i><?php echo isset($error['name']) ? $error['name'] : ''; ?>
                                    <input type="text" class="form-control" name="name" value="<?php echo $data['name']?>" required>
                                </div>
                                <div class='col-md-4'>
                                    <label for="exampleInputEmail1">Daily Income</label> <i class="text-danger asterik">*</i><?php echo isset($error['daily_income']) ? $error['daily_income'] : ''; ?>
                                    <input type="text" class="form-control" name="daily_income" value="<?php echo $data['daily_income']?>" required>
                                </div>
                                <div class='col-md-4'>
                                    <label for="exampleInputEmail1">Price</label> <i class="text-danger asterik">*</i><?php echo isset($error['price']) ? $error['price'] : ''; ?>
                                    <input type="text" class="form-control" name="price" value="<?php echo $data['price']?>" required>
                                </div>
                            </div>

                        </div>
                        <hr>
                        <div class="row">
                            <div class="form-group col-md-3">
                                <div class="form-group">
                                    <label for="exampleInputFile">Image</label>
                                    <input type="file" accept="image/png,  image/jpeg"  name="image" id="image">
                                    <p class="help-block"><img src="<?php echo DOMAIN_URL . $data['image']; ?>" style="max-width:100%" /></p>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="form-group">
                                <div class='col-md-4'>
                                    <label for="exampleInputEmail1">Valid</label> <i class="text-danger asterik">*</i><?php echo isset($error['valid']) ? $error['valid'] : ''; ?>
                                    <input type="text" class="form-control" name="valid" value="<?php echo $data['valid']?>" required>
                                </div>
                                
                            </div>

                        </div>
                        <hr>
                        


                       
                        
                        
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <input type="submit" class="btn-primary btn" value="Update" name="btnUpdate" />&nbsp;
                        
                        <!--<div  id="res"></div>-->
                    </div>
                </form>
            </div>
            <!-- /.box -->
        </div>
    </div>
</section>
<div class="separator"> </div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.min.js"></script>
<script>
    $('#edit_plan_form').validate({

        ignore: [],
        debug: false,
        rules: {
            daily_income: "required",
            price: "required",
            valid: "required",

        }
    });
    $('#btnClear').on('click', function() {
        for (instance in CKEDITOR.instances) {
            CKEDITOR.instances[instance].setData('');
        }
    });
</script>