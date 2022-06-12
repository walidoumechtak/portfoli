<?php 
  session_start();
  ob_start();
    include "../includes/connexion.php";

      $id_blog = $_GET['editeB'];
      $queryInfoBlog = mysqli_query($con,"select * from blogs where 	
      id_blog = $id_blog");
      $rowInfoBlog = mysqli_fetch_array($queryInfoBlog);

?>

<?php  if(isset($_SESSION['login'])){ ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Edite Blog</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <style>

          .ql-container{
                  height: 400px !important;
                  width: 100% !important;
            }


  </style>
</head>

<body>

 <!-- ======= Header ======= -->
 <?php include "includes/nav.inc.php"; ?>
<!-- End Header -->


  <!-- ======= Sidebar ======= -->

  <?php include "includes/aside.inc.php"; ?>

    <!-- End Sidebar-->

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Blog Information</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item">Forms</li>
          <li class="breadcrumb-item active">blog</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    <section class="section">
      <div class="row">
        <div class="col-lg-10">

         


        <div class="col-lg-10">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Update</h5>

              <!-- Vertical Form -->
              <form method="POST" class="row g-3">
                <div class="col-12">
                  <label for="inputNanme4" class="form-label">Title</label>
                  <input type="text" class="form-control" id="inputNanme4" name="title" value="<?php echo  $rowInfoBlog['titre'] ?>">
                </div>

                <!--  -->

                <div class="col-12">
                  <label for="inputEmail4" class="col-sm-2 col-form-label">Content</label>
                  <div class="col-sm-10">
                    <textarea name="desc" id="inputEmail4"  class="form-control" style="height: 500px; width:100%;"><?php echo  $rowInfoBlog['contenu'] ?></textarea>
                  </div>
                </div>


                <!--  -->

              
                <div class="text-center">
                  <button type="submit" name="go" class="btn btn-primary">Submit</button>
                  <button type="reset" class="btn btn-secondary">Reset</button>
                </div>
              </form><!-- Vertical Form -->

            </div>
          </div>


          <?php 

                      if(isset($_POST['go'])){

                            $title = $_POST['title'];
                            $desc = $_POST['desc'];
                            
                          $sqlUpdate =  mysqli_query($con, " UPDATE blogs SET titre = '$title', `contenu` = \"$desc\"
                           WHERE id_blog = $id_blog ");

                        if($sqlUpdate){
                              header("Location: blog-data.php");
                        }

        ?>
                          <!-- <script>
                        setTimeout(function () {
                              window.location.href='users-data.php'; // mossiba m3ak nta
                        },0.001);
                        </script> -->
          <?php

                      }

            ?>

         

         

        </div>
      </div>
    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <?php include "includes/footer.inc.php"; ?><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="../themes/js/jquery-3.6.0.min.js"></script>
  <script src="../themes/js/bootstrap.min.js"></script>
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.min.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>

<?php }else{
   header("Location: ../index.php");
   exit();
 } ?>