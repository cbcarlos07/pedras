<!DOCTYPE html>
<html>

<?php include "includes/head.php" ?>

<!-- Page-Level CSS -->
<link href="assets/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
<link href="css/alert.css" rel="stylesheet" />

<body>

<div class="modal fade modal-alert" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"></h4>
            </div>
            <div class="modal-body">
                <p class="msg-body"></p>
            </div>
            <div class="modal-footer">

                <button type="button" class="btn btn-primary" data-dismiss="modal">OK</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

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
                        <div class="col-lg-2">

                        </div>
                        <div class="panel-heading">

                            Cadastrar Usu&aacute;rio




                        </div>
                        <div class="panel-body">
                            <div class="col-lg-12">

                                <input type="hidden" id="ativo" value="S" />
                                <input type="hidden" id="codigo" value="0" />
                                <div class="form-group col-lg-3">
                                    <label for="login">Login</label>
                                    <input id="login" class="form-control" />
                                    <span class="avisologin" style="color: red"></span>
                                </div>
                                <div class="row"></div>
                                <div class="form-group col-lg-8">
                                    <label for="nome">Nome</label>
                                    <input id="nome" class="form-control" />
                                </div>
                                <div class="row"></div>
                                <div class="form-group col-lg-4">
                                    <label for="senha">Senha</label>
                                    <input type="password" id="senha" class="form-control" />
                                    <span class="aviso" style="color: red"></span>
                                </div>
                                <div class="form-group col-lg-4">
                                    <label for="resenha">Repita a senha</label>
                                    <input type="password" id="resenha" class="form-control" />
                                    <span class="aviso1" style="color: red"></span>
                                </div>
                                <div class="row"></div>
                                <div class="checkbox-inline col-lg-5">
                                    <label for="ativo" class="col-lg-5"">
                                       <input type="checkbox" id="ativo" checked />Ativo
                                    </label>
                                </div>
                                <div class="row"></div>
                                <div class="col-lg-4 form-group">
                                    <label for="nivel">N&iacute;vel</label>
                                    <select id="nivel" class="form-control" ></select>
                                </div>
                                <div class="col-lg-1" style="margin-top: 30px;"><a href="#refresh" class="btn-refresh" title="Clique para atualizar"><i class="fa fa-refresh"></i></a> </div>
                                <div class="row"></div>
                                <div class="btn-group">
                                    <button class="btn btn-danger btn-salvar"><i class="fa fa-floppy-o"></i></button>
                                </div>


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
