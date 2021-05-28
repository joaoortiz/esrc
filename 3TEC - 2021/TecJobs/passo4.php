<div class="form-row justify-content-md-center">
                            <div class="col-lg-12 text-center" style="margin-top: 15px;">
                                <hr>
                                <center><h4 class="text-dark">Diga-nos o que você procura</h4></center>                                           
                            </div> 
                        </div>
                        <div class="form-row justify-content-md-center">
                            <div class="col-lg-6" style="margin-top: 15px;">
                                <label>Insira o nome da tecnologia</label>
                                <input list="tecnologias" name="HTML_tecnologias" class="form-control">
                                <datalist id="tecnologias">
                                <?php
                                    $objBDTec = new TecnologiasDAO();
                                    $tecn = $objBDTec->listarTecnologias();
                                    ?>

                                    <?php
                                    for ($i = 0; $i < count($tecn); $i++) {
                                        ?>
                                        <option value="<?=$tecn[$i]->getIcone();?>"><?= $tecn[$i]->getNome();?></option>

                                    <?php } ?>

                                </datalist> 

                            </div>                             
                            <div class="col-lg-2 text-center" style="margin-top: 15px;padding-top:32px;">
                                <button type="button" id="btnAddTec" class="btn text-white" style="background-color:#7952B3;">Adicionar Tecnologia</button>

                            </div>                             
                        </div>

                        <div class="form-row justify-content-md-center" style="margin-top: 15px;">
                            <div class="col-lg-8" id="DivTecnologias">
                                
                                
                            </div>                            
                        </div>