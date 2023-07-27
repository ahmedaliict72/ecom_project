<?php include 'common/header.php'; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Add Sub-Category</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Add Sub-Category</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
  <?php
        if(isset($_POST['submit'])){
          $scat_name = $_POST['subcat_name'];
          $cat_id = $_POST['cat_id'];
          $scat_slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $scat_name)));
          
          $sql = "INSERT INTO `sub_cat` (`cat_id`,`sub_name`,`sub_slug`) VALUES ('$cat_id','$scat_name','$scat_slug')";

          $que = mysqli_query($con,$sql);
          if($que){
            $_SESSION['success_msg'] = "New Sub Category Added";
            echo "<script>window.open('all_subcategory.php','_self')</script>";
          }
          else{
            $_SESSION['error_msg'] = "Failed To Add New Sub Category";
            echo "<script>window.open('all_subcategory.php','_self')</script>";
          }

        }


      ?>

    

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        
        <div class="row">
          <!-- left column -->
          <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Add New Sub Category</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="" method="POST" enctype="multipart/form-data">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Sub-Category Name</label>
                    <input type="text" class="form-control" name="subcat_name" id="exampleInputEmail1" placeholder="Enter a category">
                  </div>
                  <div class="form-group">
                        <label>Parent Category</label>
                        <select class="form-control" name="cat_id">
                            <?php
                              $sql = "SELECT * FROM cat WHERE cat_status = 1";
                              $que = mysqli_query($con,$sql);
                              while($res = mysqli_fetch_assoc($que)){
                                ?>
                                  <option value="<?php echo $res['cat_id']; ?>"><?php echo $res['cat_name']; ?></option>
                                <?php
                              }

                           ?>
                          
                          
                        </select>
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" name="submit" class="btn btn-primary">Add Now</button>
                </div>
              </form>
            </div>
            <!-- /.card -->

            

          
            <!-- /.card -->
            

          </div>
          <!--/.col (left) -->
          
        </div>





      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

 <?php include 'common/footer.php'; ?>