<div class="modal fade" id="MdlCadastraVaga" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-xl border" role="document">
        <div class="modal-content" >
            <div class="modal-body">

                <form class="form" action="../Control/EmpresasControl.php" method="POST">
                    <center>
                        <div class="row justify-content-md-center">
                            <div class="col-lg-10">
                                <img src="../../img/misc/BannerVaga.jpg" class="img-thumbnail" width="80%">
                            </div>

                        </div>
                        <hr>
                        <h5>Informe abaixo os dados para o cadastro da vaga</h5>
                    </center>

                    <div class="row">
                        <div class="col">
                            <div class="form-group">    
                                <label>Cargo Disponível:</label>
                                <input type="text" class="form-control" name="HTML_cargo">                                    
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label>Categoria:</label>
                                <select class="form-control" name="HTML_tipovaga">
                                    <?php
                                    $lista = $objCat->listarTiposVagas();
                                    
                                    for($i=0; $i<count($lista); $i++){?>
                                    
                                    <option value="<?=$lista[$i]->getId();?>"><?=$lista[$i]->getNome();?></option>
                                    
                                    <?php
                                        }
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label>Salário</label>
                                <input type="text" class="form-control" name="HTML_SALARIO">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label>Tipo de Contrato</label>
                                <select class="form-control" name="HTML_contrato">
                                    <option value="CLT">CLT</option>
                                    <option value="PJ">PJ</option>
                                    <option value="EST">Estágio</option>
                                </select>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label>Carga Horária Diária</label>
                                <input type="number" class="form-control" min="4" value="4" name="HTML_periodo">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label>Sistema de Trabalho</label>
                                <select class="form-control" name="HTML_sistema">
                                    <option value="Presencial">Presencial</option>
                                    <option value="Remoto">Remoto</option>
                                    <option value="Híbrido">Híbrido</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">    
                                <label>Benefícios:</label>
                                <input type="text" class="form-control" name="HTML_beneficios">                                    
                            </div>
                        </div>                                    
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label>Descrição da Vaga</label>
                                <textarea class="form-control" name="HTML_descricao"></textarea>
                            </div>
                        </div>
                    </div>

            </div>


            <div class="row" style="margin-top:5px;margin-bottom:15px;margin-right:5px;">
                <div class="col">
                    <input type="hidden" value="3" name="exec">
                    <button type="submit" class="btn BotaoLogin float-right" style="padding-top: 5px;">
                        <i class="fa fa-lg fa-plus"></i>
                        Adicionar Vaga
                    </button>
                </div>
            </div>

            </form>

        </div>
    </div>
</div>
</div>