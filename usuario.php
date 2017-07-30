<!DOCTYPE html>
<html>

<?php include "includes/head.php" ?>

<!-- Page-Level CSS -->
<link href="assets/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet" />

<body>
    <!--  wrapper -->
    <div id="wrapper">
        <!-- navbar top -->
        <?php include "includes/barra_superior.php"; ?>
        <!-- end navbar top -->

        <!-- navbar side -->
        <?php include "includes/barra_menu.php"; ?>
        <!-- end navbar side -->
        <!--  page-wrapper -->
        <div id="page-wrapper">

            
            <div class="row">
                 <!--  page header -->
                <div class="col-lg-12">
                    <h1 class="page-header">Usu&aacute;rios</h1>
                </div>
                 <!-- end  page header -->
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                             Usu&aacute;rios
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Login</th>
                                            <th>Nome</th>
                                            <th>N&iacute;vel</th>
                                            <th>Ativo</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody class="tbody">

                                    </tbody>
                                </table>
                            </div>
                            
                        </div>
                    </div>
                    <!--End Advanced Tables -->
                </div>
            </div>



        </div>
        <!-- end page-wrapper -->

    </div>
    <!-- end wrapper -->

    <!-- Core Scripts - Include with every page -->
    <?php include "includes/scripts.php" ?>
    <!-- Page-Level Plugin Scripts-->
    <script src="assets/plugins/dataTables/jquery.dataTables.js"></script>
    <script src="assets/plugins/dataTables/dataTables.bootstrap.js"></script>

    <script>
        $(document).ready(function () {
            $('#dataTables-example').dataTable({
                "bAutoWidth": false, // Disable the auto width calculation
                "aoColumns": [
                    { "sWidth": "20%" }, // 1st column width
                    { "sWidth": "40%" }, // 2nd column width
                    { "sWidth": "20%" } // 3rd column width and so on
                ]
            });
        });
    </script>
    <script src="js/selecao.js"></script>
    <script src="js/usuario.js"></script>

</body>

</html>
