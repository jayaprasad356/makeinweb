<?php
include_once('includes/functions.php');
date_default_timezone_set('Asia/Kolkata');
$function = new functions;
include_once('includes/custom-functions.php');
$fn = new custom_functions;



if (isset($_POST['btnUpdate'])){
    $error = array();
    
    $level_1 = $db->escapeString($fn->xss_clean($_POST['level_1']));
    $level_2 = $db->escapeString($fn->xss_clean($_POST['level_2']));
    $level_3 = $db->escapeString($fn->xss_clean($_POST['level_3']));
    

    if (empty($level_1)) {
        $error['level_1'] = " <span class='label label-danger'>Required!</span>";
    }
    if (empty($level_2)) {
        $error['level_2'] = " <span class='label label-danger'>Required!</span>";
    }
    if (empty($level_3)) {
        $error['level_3'] = " <span class='label label-danger'>Required!</span>";
    }
    

    if ( !empty($level_1) && !empty($level_2) && !empty($level_3))
    {
        $sql = "UPDATE refer_commission SET level_1='$level_1',level_2='$level_2',level_3='$level_3' WHERE title='refer_commission'";
        $db->sql($sql);
        $refercommission_result = $db->getResult();
        if (!empty($refercommission_result)) {
            $refercommission_result = 0;
        } else {
            $refercommission_result = 1;
        }
        if ($refercommission_result == 1) {
            $error['add_menu'] = "<section class='content-header'>
                                            <span class='label label-success'>Refer commission details Updated Successfully</span>
                                            <h4><small><a  href='refercommissions.php'><i class='fa fa-angle-double-left'></i>&nbsp;&nbsp;&nbsp;Back to refercommissions</a></small></h4>
                                             </section>";
        } else {
            $error['add_menu'] = " <span class='label label-danger'>Failed</span>";
        }

    }
}
$data = array();
$sql = "SELECT * FROM refer_commission WHERE title= 'refer_commission'";
$db->sql($sql);
$res = $db->getResult();
foreach ($res as $row)
    $data = $row;
?>
<section class="content-header">
    <h1>Edit Refer Commision</h1>
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
                    <h3 class="box-title">Edit Refer Commission</h3>
                </div>
                <div class="box-header">
                    <?php echo isset($error['cancelable']) ? '<span class="label label-danger">Till status is required.</span>' : ''; ?>
                </div>

                <!-- /.box-header -->
                <!-- form start -->
                <form id='edit_student_form' method="post" enctype="multipart/form-data">
                    <div class="box-body">
                        <div class="row">
                            <div class="form-group">
                                
                                <div class='col-md-4'>
                                    <label for="exampleInputEmail1">Level 1</label> <i class="text-danger asterik">*</i><?php echo isset($error['level_1']) ? $error['level_1'] : ''; ?>
                                    <input type="text" class="form-control" name="level_1" value="<?php echo $data['level_1']?>" required>
                                </div>
                                
                            </div>

                        </div>
                        <hr>
                        <div class="row">
                            <div class="form-group">
                                 <div class='col-md-4'>
                                    <label for="exampleInputEmail1">Level 2</label> <i class="text-danger asterik">*</i><?php echo isset($error['level_2']) ? $error['level_2'] : ''; ?>
                                    <input type="text" class="form-control" name="level_2" value="<?php echo $data['level_2']?>" required>
                                </div>
                                <div class='col-md-4'>
                                    <label for="exampleInputEmail1">Level 3</label> <i class="text-danger asterik">*</i><?php echo isset($error['level_3']) ? $error['level_3'] : ''; ?>
                                    <input type="text" class="form-control" name="level_3" value="<?php echo $data['level_3']?>" required>
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
    $('#refercommissions_form').validate({

        ignore: [],
        debug: false,
        rules: {

            level_1: "required",
            level_2: "required",
            level_3: "required",

        }
    });
    $('#btnClear').on('click', function() {
        for (instance in CKEDITOR.instances) {
            CKEDITOR.instances[instance].setData('');
        }
    });
</script>