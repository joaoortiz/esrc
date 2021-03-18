<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
        <link rel="stylesheet" href="../../assets/css/estilo.css">
        <title>::TecJobs - Professional Networking ::</title>
    </head>
    <body>

        <?php
        require_once "../DAO/EmpresasDAO.php";

        include "TopoUI.php";
        ?>

        <div class="container">



            <?php
            $step = $_GET['step'];
            /*             * **************************************************** STEP 1 ***************************************************** */
            if ($step == 1) {
                ?>
                <div class=" animate__animated animate__zoomIn">
                    <div class="row justify-content-md-center" style="margin-top:150px;">
                        <div class="col-lg-12 text-center text-dark" style="height:150px;">
                            <h2>Seja bem vindo ao TECJOBS</h2>
                            <h3>Quero me cadastrar como:</h3>
                        </div>
                    </div>
                    <div class="row justify-content-md-center">
                        <div class="col-lg-6 text-center">
                            <a href="?step=2&type=3" class="text-dark">
                                <img src="../../img/misc/user.png" class="ImgUser">
                                <h4>Candidato</h4>
                            </a>
                        </div>
                        <div class="col-lg-6 text-center">
                            <a href="?step=2&type=2" class="text-dark">
                                <img src="../../img/misc/company.png" class="ImgUser">
                                <h4>Empresa</h4>
                            </a>
                        </div>

                    </div>
                </div>

                <?php
                /*                 * **************************************************** STEP 2 ***************************************************** */
            } else if ($step == 2) {
                $type = $_GET['type'];
                if ($type == 3) {
                    ?>
                    <form action="../Control/UsuariosControl.php" method="POST">
                        <div class="row justify-content-md-center" style="margin-top: 25px;margin-bottom:25px;">
                            <div class="col-lg-2">
                                <img src="../../img/misc/user.png" class="ImgUser">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-lg-12 text-center">
                                <center><h4 class="text-dark">Dados Pessoais</h4></center>
                                <hr>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="inputEmail4">Email</label>
                                <input type="email" class="form-control" id="inputEmail4" placeholder="Email">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputPassword4">Nome Completo</label>
                                <input type="password" class="form-control" id="inputPassword4" placeholder="Password">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="inputEmail4">Senha</label>
                                <input type="email" class="form-control" id="inputEmail4" placeholder="Email">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="inputPassword4">Confirmar Senha</label>
                                <input type="password" class="form-control" id="inputPassword4" placeholder="Password">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="inputEmail4">Data de Nascimento</label>
                                <input type="date" class="form-control" id="inputEmail4" placeholder="Email">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="inputPassword4">Sexo</label>
                                <select class="form-control">
                                    <option value="M">Masculino</option>
                                    <option value="F">Feminino</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-lg-12 text-center" style="margin-top: 15px;">
                                <center><h4 class="text-dark">Localização e Contato</h4></center>
                                <hr>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="inputEmail4">Cep</label>
                                <input type="email" class="form-control" id="inputEmail4" placeholder="Email">
                            </div>
                            <div class="form-group col-md-7">
                                <label for="inputPassword4">Endereço</label>
                                <input type="password" class="form-control" id="inputPassword4" placeholder="Password">
                            </div>
                            <div class="form-group col-md-2">
                                <label for="inputPassword4">Número</label>
                                <input type="password" class="form-control" id="inputPassword4" placeholder="Password">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputCity">Complemento</label>
                                <input type="text" class="form-control" id="inputCity">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="inputCity">Bairro</label>
                                <input type="text" class="form-control" id="inputCity">

                            </div>
                            <div class="form-group col-md-3">
                                <label for="inputZip">Cidade</label>
                                <input type="text" class="form-control" id="inputZip">
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputCity">Telefone</label>
                                <input type="text" class="form-control" id="inputCity">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputCity">Imagem</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="customFile">
                                    <label class="custom-file-label" for="customFile">Choose file</label>
                                </div>

                            </div>

                        </div>

                        <button type="submit" class="btn float-right text-white"  style="background-color:#7952B3;">Cadastrar Usuário</button>
                    </form>



                    <?php
                } else if ($type == 2) {
                    ?>    
                    <form action="../Control/UsuariosControl.php" method="POST">
                        <div class="row justify-content-md-center" style="margin-top: 25px;margin-bottom:25px;">
                            <div class="col-lg-2">
                                <img src="../../img/misc/company.png" class="ImgUser">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-lg-12 text-center">
                                <center><h4 class="text-dark">Dados Empresariais</h4></center>
                                <hr>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="inputEmail4">Email</label>
                                <input type="email" class="form-control" id="inputEmail4" placeholder="Email">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputPassword4">Nome Fantasia</label>
                                <input type="password" class="form-control" id="inputPassword4" placeholder="Password">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="inputEmail4">Senha</label>
                                <input type="email" class="form-control" id="inputEmail4" placeholder="Email">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="inputEmail4">Confirmar Senha</label>
                                <input type="email" class="form-control" id="inputEmail4" placeholder="Email">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputPassword4">Categoria</label>
                                <select class="form-control">
                                    <?php
                                    $objEmpresa = new EmpresasDAO();
                                    $cat = $objEmpresa->listarCategorias();
                                    for ($i = 0; $i < count($cat); $i++) {
                                        ?>
                                        <option value="<?= $cat[$i]->getId(); ?>"><?= $cat[$i]->getNome(); ?></option>
                                        <?php
                                    }
                                    ?>
                                </select>


                            </div>

                        </div>
                        <div class="form-row">
                            <div class="col-lg-12 text-center" style="margin-top: 15px;">
                                <center><h4 class="text-dark">Localização e Contato</h4></center>
                                <hr>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="inputEmail4">Cep</label>
                                <input type="email" class="form-control" id="inputEmail4" placeholder="Email">
                            </div>
                            <div class="form-group col-md-7">
                                <label for="inputPassword4">Endereço</label>
                                <input type="password" class="form-control" id="inputPassword4" placeholder="Password">
                            </div>
                            <div class="form-group col-md-2">
                                <label for="inputPassword4">Número</label>
                                <input type="password" class="form-control" id="inputPassword4" placeholder="Password">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputCity">Complemento</label>
                                <input type="text" class="form-control" id="inputCity">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="inputCity">Bairro</label>
                                <input type="text" class="form-control" id="inputCity">

                            </div>
                            <div class="form-group col-md-3">
                                <label for="inputZip">Cidade</label>
                                <input type="text" class="form-control" id="inputZip">
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputCity">Telefone</label>
                                <input type="text" class="form-control" id="inputCity">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputCity">Imagem</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="customFile">
                                    <label class="custom-file-label" for="customFile">Choose file</label>
                                </div>

                            </div>

                        </div>

                        <button type="submit" class="btn float-right text-white"  style="background-color:#7952B3;">Cadastrar Empresa</button>
                    </form>

                    <?php
                }
            }
            /*             * **************************************************** STEP 3 ***************************************************** */ else if ($Step == 3) {
                if ($type == 2) {
                    
                } else if ($type == 3) {
                    
                }
            }
            ?>
        </div>
    </body>
</html>