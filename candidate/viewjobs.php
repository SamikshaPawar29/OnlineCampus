<?php
session_start();
$PRN = $_SESSION['id_user'];
if (empty($_SESSION['id_user'])) {
    header("Location: ../campus/index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>View Jobs</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">
    <?php require_once("db.php"); ?>
    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php include("navbar.php"); ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php include("topbar.php"); ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <?php if (isset($_SESSION['jobApplySuccess'])) { ?>
                        <div>
                            <p id="successMessage" style="text-align: center; color: red; font-size: 28px;">You have applied successfully!</p>
                        </div>
                    <?php unset($_SESSION['jobApplySuccess']);
                    } ?>

                    <!-- Page Heading -->
                    <div style="background-color: #0F0E0E; height: 80px;">
                        <p style="font-size: 34px; color: white; text-align: center; line-height: 75px;">Latest Job</p>
                    </div>
                    <div class="row">
                        <div class="col m-auto">
                            <div class="card mt-5">
                                <table class="table table-bordered table-hover">
                                    <thead>

                                        <tr class="table-primary">
                                            <th scope="col"> Job Name</th>
                                            <th scope="col"> Company Name</th>
                                            <th scope="col"> Minimum Salary</th>
                                            <th scope="col"> Maximum Salary </th>
                                            <th scope="col"> Vacancy</th>
                                            <th scope="col"> Qualification</th>
                                            <th scope="col"> Action </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $sql = "SELECT *
                                        FROM job_post
                                        JOIN company ON job_post.id_company = company.id_company";
                                        $result = $conn->query($sql);
                                        if ($result->num_rows > 0) {
                                            while ($row = $result->fetch_assoc()) {
                                                $sql1 = "SELECT * FROM apply_job_post WHERE PRN='{$PRN}' AND id_jobpost='{$row['id_jobpost']}'";

                                                $result1 = $conn->query($sql1);

                                        ?>
                                                <tr>
                                                    <td><?php echo $row['jobtitle']; ?></td>
                                                    <td><?php echo $row['companyname']; ?></td>
                                                    <td>Rs.<?php echo $row['minimumsalary']; ?></td>
                                                    <td>Rs.<?php echo $row['maximumsalary']; ?></td>
                                                    <td><?php echo $row['vacancy']; ?></td>
                                                    <td><?php echo $row['qualification']; ?></td>
                                                    <?php
                                                    if ($result1->num_rows > 0) {
                                                    ?>
                                                        <td class="text-bg-danger" ><strong>Applied!</strong></td>
                                                    <?php
                                                    } else {
                                                    ?>
                                                        <td ><a href="apply-job-post.php?id=<?php echo $row['id_jobpost']; ?>" class="btn btn-primary">view</a></td>
                                                    <?php } ?>
                                                </tr>
                                                <tr>
                                                    <td colspan="1"></td>
                                                </tr>
                                        <?php
                                            }
                                        }
                                        $conn->close();
                                        ?>
                                    </tbody>
                                </table>

                            </div>
                            <!-- /.container-fluid -->

                        </div>
                        <!-- End of Main Content -->

                        <!-- Footer -->
                        <!-- <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Future Force.</span>
                    </div>
                </div>
            </footer> -->
                        <!-- End of Footer -->

                    </div>
                    <!-- End of Content Wrapper -->

                </div>
                <!-- End of Page Wrapper -->

                <!-- Scroll to Top Button-->
                <a class="scroll-to-top rounded" href="#page-top">
                    <i class="fas fa-angle-up"></i>
                </a>

                <!-- Logout Modal-->
                <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                            <div class="modal-footer">
                                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                <a class="btn btn-primary" href="logout.php">Logout</a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Bootstrap core JavaScript-->
                <script src="vendor/jquery/jquery.min.js"></script>
                <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

                <!-- Core plugin JavaScript-->
                <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

                <!-- Custom scripts for all pages-->
                <script src="js/sb-admin-2.min.js"></script>

</body>

</html>