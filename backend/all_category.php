<?php include 'common/header.php'; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">All Category</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">All Category</li>
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
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">DataTable with default features</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <?php if(isset($_SESSION['success_msg'])){ ?>
                  <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h5><i class="icon fas fa-check"></i> Success!</h5>
                    <?php echo $_SESSION['success_msg']; ?>
                  </div>
                  <?php
                   } 
                   unset($_SESSION['success_msg'] );
                   ?>
                    <?php if(isset($_SESSION['error_msg'])){ ?>
                    
                    <div class="alert alert-danger alert-dismissible">
                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                      <h5><i class="icon fas fa-ban"></i> Error!</h5>
                      <?php echo $_SESSION['error_msg']; ?>
                    </div>
                    <?php
                     } 
                     unset($_SESSION['error_msg'] );
                     ?>
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Serial Number</th>
                    <th>Categories Name</th>
                    <th>Categories Thumbnail</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php
                    $sql = "SELECT * FROM cat ORDER BY cat_id DESC";
                    $que=mysqli_query($con,$sql);
                    $sl=1;
                    while($results = mysqli_fetch_assoc($que)){
                    ?>
                    <tr>
					<td><?php echo $sl; ?></td>
					<td><?php echo $results['cat_name'];?></td>
          <td><?php echo $results['cat_slug'];?></td>
          <td>
          <?php if($results['cat_status'] == 1){ ?>
						<span class="badge badge-success">Active</span>
						<?php 
							}
							else{
								?>
						<span class="badge badge-danger">Deactive</span>
								<?php
						} ?>	
        </td>
        <td>
						<?php if($results['cat_status'] == 1){ ?>
							<form action="" method="POST">
								<input type="hidden" name="cat_id" value="<?php echo $results['cat_id']; ?>">
								<button type="submit" name="dactive" class="btn btn-primary btn-sm">Deactive</button>
							</form>
						<?php 
							}
							else{
								?>
						<form action="" method="POST">
								<input type="hidden" name="cat_id" value="<?php echo $results['cat_id']; ?>">
								<button type="submit" name="active" class="btn btn-primary btn-sm">Active</button>
							</form>
								<?php
						} ?>
						
					</td>
				</tr>
                    <?php
                    $sl++;
                    }
                    ?>
                    
                  </tfoot>
                </table>
                <?php 
			if(isset($_POST['dactive'])){
				$id = $_POST['cat_id'];
				$sql = "UPDATE cat SET cat_status = '0' WHERE cat_id = '$id'";
				$que = mysqli_query($con,$sql);
				if($que){
					$_SESSION['success_msg'] = "Category Deactivated";
					echo "<script>window.open('all_category.php','_self')</script>";
				}
				else{
					$_SESSION['error_msg'] = "Failed To Deactive";
					echo "<script>window.open('all_category.php','_self')</script>";
				}
			}

			if(isset($_POST['active'])){
				$id = $_POST['cat_id'];
				$sql = "UPDATE cat SET cat_status = '1' WHERE cat_id = '$id'";
				$que = mysqli_query($con,$sql);
				if($que){
					$_SESSION['success_msg'] = "Category Activated";
					echo "<script>window.open('all_category.php','_self')</script>";
				}
				else{
					$_SESSION['error_msg'] = "Failed To Active";
					echo "<script>window.open('all_category.php','_self')</script>";
				}
			}

		?>
              </div>
              <!-- /.card-body -->
            </div>
          </div>
          <!-- /.col -->
        </div>




      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

 <?php include 'common/footer.php'; ?>