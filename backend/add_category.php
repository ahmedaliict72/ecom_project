<?php include 'common/header.php'; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Add Category</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Add Category</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <?php
      if(isset($_POST['submit'])){
        $cat_name = $_POST['cat_name'];
        $cat_slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $cat_name)));
        $cat_img = $_FILES['cat_image']['name'];
        $cat_tmp = $_FILES['cat_image']['tmp_name'];
        move_uploaded_file($cat_tmp,'../images/categories/'.$cat_img);

        $sql = "INSERT INTO `cat` (`cat_name`,`cat_slug`,`thumbnail`) VALUES ('$cat_name','$cat_slug','$cat_img')";

        $que = mysqli_query($con,$sql);
        if($que){
          $_SESSION['success_msg'] = "New Category Added";
          echo "<script>window.open('all_category.php','_self')</script>";
        }
        else{
          $_SESSION['error_msg'] = "Failed To Add New Category";
          echo "<script>window.open('all_category.php','_self')</script>";
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
                <h3 class="card-title">Add New Category</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="" method="POST" enctype="multipart/form-data">
                <div class="card-body">
                  

                  

                  <div class="form-group">
                    <label for="exampleInputEmail1">Category Name</label>
                    <input type="text" class="form-control" name="cat_name" id="exampleInputEmail1" placeholder="Enter a category">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputFile">File input</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="exampleInputFile" name="cat_image">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text">Upload</span>
                      </div>
                    </div>
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