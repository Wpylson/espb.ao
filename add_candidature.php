<?php
include_once("common/restriction.php");
$candidature = new Candidatures();
if (isset($_POST['submit'])) {



    if (isset($_FILES['doc_id']['name'])) {
        $doc_id = $_FILES['doc_id']['name'];
        if ($doc_id != "") {
            $ext = end(explode('.', $doc_id));
            $doc_id = "doc_Bi-User" . $userData['idUsers'] . date('y') . rand(0000, 9999) . '.' . $ext;
            $fonte = $_FILES['doc_id']['tmp_name'];
            $destino = "admin/docs/" . $doc_id;

            $upload = move_uploaded_file($fonte, $destino);
            //    var_dump($upload); die();
        }
    }

    if (isset($_FILES['doc_certificate']['name'])) {
        $doc_certificate = $_FILES['doc_certificate']['name'];
        if ($doc_certificate != "") {
            $ext = end(explode('.', $doc_certificate));
            $doc_certificate = "doc_Cert-User" . $userData['idUsers'] . date('y') . rand(0000, 9999) . '.' . $ext;
            $fonte = $_FILES['doc_certificate']['tmp_name'];
            $destino = "admin/docs/" . $doc_certificate;

            $upload = move_uploaded_file($fonte, $destino);
            // var_dump($upload); die();

        }
    }

    $candidature->addCandidatures($_POST, $doc_id, $doc_certificate);
}
?>
<!DOCTYPE html>
<html lang="pt-pt">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>ESPB - Candidatura</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link href="css/alerta.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="dashboard.php">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Sr(a), <?php echo $userData['last_name']; ?></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="dashboard.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">
            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item active">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Candidatura</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="add_candidature.php">Fazer Candidatura</a>
                    </div>
                </div>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">
            <li class="nav-item">
                <a class="nav-link" href="#" data-toggle="modal" data-target="#logoutModal">
                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                    <span>Sair</span>
                </a>
            </li>
            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>




                </nav>
                <!-- End of Topbar -->

                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Fazer Candidatura</h1>
                    <?php

                    if (isset($_GET['msgc']) == "error") {
                    ?>
                        <div class="alert shadow border-bottom-danger ">
                            <span class="icon text-white-50" style="color: #e74a3b;">
                                <i class="fas fa-exclamation-triangle"></i>
                            </span>
                            <span class="btnFechar" onclick="this.parentElement.style.display='none';">&times;</span>
                            Ocorreu um erro ao fazer a sua candidatura. Por favor tente novamnete!
                        </div>
                    <?php
                    }

                    ?>
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="row">
                            <div class="col-lg-12">


                                <div class="p-5">
                                    <form class="user" method="POST" enctype="multipart/form-data">
                                        <div class="form-group row">
                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                                <span>Telefone</span>
                                                <input type="text" maxlength="14" class="form-control form-control-user" id="exampleFirstName" name="num_phone" placeholder="Digite o nº Telefone" required>
                                            </div>
                                            <div class="col-sm-6">
                                                <span>Nº B.I</span>
                                                <input type="text" class="form-control form-control-user" id="exampleLastName" name="num_id" placeholder="Digite o num do seu B.I" required>
                                            </div>
                                            <div class="col-sm-6">
                                                <span>Data de Nascimento</span>
                                                <input type="date"  class="form-control form-control-user" id="exampleLastName" name="birth_date" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <span>Cursos</span>
                                            <select class="form-control " id="exampleInputEmail" name="curse" style="color: #6e707e;border-radius: 10rem;padding: 5px 26px 5px 10px;font-size: .8rem;" required>
                                                <?php
                                                $curses = new Curses();
                                                $datas = $curses->getAllCurses();
                                                foreach ($datas as $data) {
                                                ?>
                                                    <option value="<?php echo $data['idCurses']; ?>"><?php echo $data['curse_title']; ?></option>

                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                                <span>B.I (pdf, jpeg, jpg - max. 2MB)</span>
                                                <input type="file" class="form-control " id="exampleInputPassword" name="doc_id" required>
                                            </div>
                                            <div class="col-sm-6">
                                                <span>Certificado (pdf, jpeg, jpg - max. 2MB)</span>
                                                <input type="file" class="form-control " id="exampleRepeatPassword" name="doc_certificate" placeholder="Repita a palavra-passe" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <span>Motivação</span>
                                            <textarea class="form-control " name="motivation" id="" cols="10" rows="5" placeholder="Em pouscas frases diz-nos qual é a tua motivação para fazeres parte da família ESPB."></textarea>
                                        </div>
                                        <input type="hidden" name="user" value="<?php echo $userData['idUsers']; ?>">
                                        <input type="submit" name="submit" value="Candidatar-me" class="btn btn-primary btn-user btn-block">
                                        

                                    </form>



                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; ESPB 2023</span>
                    </div>
                </div>
            </footer>
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
                    <h5 class="modal-title" id="exampleModalLabel">Terminar Sessão</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Clique em "Sair" se pretendes terminar a sessão.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="logout.php">Sair</a>
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

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>

</body>

</html>