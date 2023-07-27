<?php include 'common/header.php';

if(isset($_POST['submit'])){
  $product_name = $_POST['products_title'];
  $in_stock = $_POST['in_stock'];
  $cat_id = $_POST['cat_id'];
  $sub_cat_id = $_POST['sub_cat_id'];
  $product_short_details = $_POST['product_short_details'];
  $product_long_details = $_POST['product_long_details'];
  $price = $_POST['price'];
  $discount_price = $_POST['discount_price'];
  $shipping_day = $_POST['shipping_day'];
  $weight = $_POST['weight'];
  $color = $_POST['color'];
  $featured_status = $_POST['featured_status'];
  $top_reated = $_POST['top_reated'];
  $reviews_status = $_POST['reviews_status'];


  $product_slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $product_name)));
 
  $pro_img = $_FILES['product_thumbnail']['name'];
  $pro_tmp = $_FILES['product_thumbnail']['tmp_name'];
  move_uploaded_file($pro_tmp,'../images/products/'.$pro_img);

  $img1_img = $_FILES['img1']['name'];
  $img1_tmp = $_FILES['img1']['tmp_name'];
  move_uploaded_file($img1_tmp,'../images/products/'.$img1_img);

  $img2_img = $_FILES['img2']['name'];
  $img2_tmp = $_FILES['img2']['tmp_name'];
  move_uploaded_file($img2_tmp,'../images/products/'.$img2_img);
  $img3_img = $_FILES['img3']['name'];
  $img3_tmp = $_FILES['img3']['tmp_name'];
  move_uploaded_file($img3_tmp,'../images/products/'.$img3_img);

  $sql = "INSERT INTO `products` (`product_title`,`product_short_details`,`product_long_details`,`price`,`discount_price`,`shipping_day`,`weight`,`color`,`product_slug`,`product_thumbnail`,`img1`,`img2`,`img3`,`featured_status`,`top_reated`,`reviews_status`,`in_stock`,`cat_id`,`sub_cat_id`)
   VALUES ('$product_name','$product_short_details','$product_long_details','$price','$discount_price','$shipping_day','$weight','$color','$product_slug','$pro_img','$img1_img','$img2_img','$img3_img','$featured_status','$top_reated','$reviews_status','$in_stock','$cat_id','$sub_cat_id')";

  $que = mysqli_query($con,$sql);
  if($que){
    $_SESSION['success_msg'] = "New Category Added";
    echo "<script>window.open('all_product.php','_self')</script>";
  }
  else{
    $_SESSION['error_msg'] = "Failed To Add New Category";
    echo "<script>window.open('all_product.php','_self')</script>";
  }

}



?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Add Products</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Add Products</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    
    

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
                    <label for="exampleInputEmail1">Products Name</label>
                    <input type="text" class="form-control" name="products_title" id="exampleInputEmail1" placeholder="Enter a category">
                  </div>

                    <div class="form-group" data-select2-id="59">
                  <label>Category</label>
                  <select class="form-control select2 select2-hidden-accessible" name="cat_id" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true">
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



<div class="form-group" data-select2-id="59">
                  <label>Sub-Category</label>
                  <select class="form-control select2 select2-hidden-accessible" name="sub_cat_id"  style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true">
                  <?php
                              $sql = "SELECT * FROM sub_cat WHERE sub_status = 1";
                              $que = mysqli_query($con,$sql);
                              while($res = mysqli_fetch_assoc($que)){
                                ?>
                                  <option value="<?php echo $res['sub_cat_id']; ?>"><?php echo $res['sub_name']; ?></option>
                                <?php
                              }

                           ?>
                  </select>
                </div>
                <!-- Short Description -->

              <div class="form-group">
                <label>Short Description</label>
                <textarea id="summernote" name="product_short_details"></textarea>
              </div>
              <div class="form-group">
                <label>Long Description</label>
                <textarea id="summernote1" name="product_long_details"></textarea>
              </div>
              <!-- Price -->
              <div class="form-group">
                    <label for="exampleInputEmail1">Products Prices</label>
                    <input type="text" class="form-control" name="price" id="exampleInputEmail1" placeholder="Enter a category">
                  </div>
                  <!-- Discount Price -->
                  <div class="form-group">
                    <label for="exampleInputEmail1">Products Discount Prices</label>
                    <input type="text" class="form-control" name="discount_price" id="exampleInputEmail1" placeholder="Enter a category">
                  </div>
                  <!-- Shipping -->
                  <div class="form-group">
                    <label for="exampleInputEmail1">Shipping Day</label>
                    <input type="text" class="form-control" name="shipping_day" id="exampleInputEmail1" placeholder="Enter a category">
                  </div>
                  <!-- Weight -->
                  <div class="form-group">
                    <label for="exampleInputEmail1">Weight</label>
                    <input type="text" class="form-control" name="weight" id="exampleInputEmail1" placeholder="Enter a category">
                  </div>
                  <!-- Color -->
                  <div class="form-group">
                    <label for="exampleInputEmail1">Color</label>
                    <input type="text" class="form-control" name="color" id="exampleInputEmail1" placeholder="Enter a category">
                  </div>
                  <!-- Thumbnail -->
                  <div class="form-group">
                    <label for="exampleInputFile">Thumbnail</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="exampleInputFile" name="product_thumbnail">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputFile">IMG 1</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="exampleInputFile" name="img1">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputFile">IMG 2</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="exampleInputFile" name="img2">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputFile">IMG 3</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="exampleInputFile" name="img3">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Freature Status</label>
                    <input type="checkbox" class="form-control" name="featured_status" id="exampleInputEmail1" value="1"> Freature
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Top Reated</label>
                    <input type="text" class="form-control" name="top_reated" id="exampleInputEmail1" placeholder="Enter a category">
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Review Status</label>
                    <input type="text" class="form-control" name="reviews_status" id="exampleInputEmail1" placeholder="Enter a category">
                  </div>
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">In Stock</label>
                    <input type="text" class="form-control" name="in_stock" id="exampleInputEmail1" placeholder="Enter a category">
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