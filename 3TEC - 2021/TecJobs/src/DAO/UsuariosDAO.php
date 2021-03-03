<?php

require_once 'ConexaoDAO.php';
require_once '../Model/Empresas.php';

class UsuariosDAO {
    
    function validarUsuario($login, $senha){
        $vConn = ConexaoDAO::abrirConexao();
        
        $sqlLogin = "Select * from Usuarios";
        $sqlLogin .= "where login_USUARIO like '$login' and ";
        $sqlLogin .= "senha_USUARIO like '" . md5($senha) . "'";
        
        $rsLogin .= $vConn->query($sqlLogin);
        
        if($rsLogin->rowCount() < 0){
            return NULL;
        } else {
            $tblLogin = $rsLogin->fetch(PDO::FETCH_BOTH);
            $loginUsuario = $tblLogin[0];
            $permissaoUsuario = $tblLogin[2];
            
            if($permissaoUsuario == 2){
                //SELECT NA EMPRESA
                $sqlEmpresa = "Select * from empresas where email_EMPRESA like '$loginUsuario'";
                $rsEmpresa = $vConn->query($sqlEmpresa);
                $tblEmpresa = $rsEmpresa->fetch(PDO::FETCH_BOTH);
                
                $objEmpresa = new Empresas();
                foreach($tblEmpresa as $row){
                    $objEmpresa->setId($row[0]);
                    $objEmpresa->setEmail($row[1]);
                    $objEmpresa->setNomeFantasia($row[2]);
                    $objEmpresa->setInfo($row[3]);
                    $objEmpresa->setCep($row[4]);
                    $objEmpresa->setEndereco($row[5]);
                    $objEmpresa->setNumero($row[6]);
                    $objEmpresa->setComplemento($row[7]);
                    $objEmpresa->setTelefone($row[8]);
                    $objEmpresa->setImagem($row[9]);
                    $objEmpresa->setIdCategoria($row[10]);
                }
                return $objEmpresa;
                
            } else if($permissaoUsuario == 3) {
                //SELECT DO CANDIDATO
                $sqlCandidato = "Select * from candidatos where email_CANDIDATO like '$loginUsuario'";
                $rsCandidato = $vConn->query($sqlCandidato);
                $tblCandidato = $rsCandidato->fetch(PDO::FETCH_BOTH);
                
                $objEmpresa = new Candidatos();
                foreach($tblCandidato as $row){
                    $objCandidato->setId($row[0]);
                    $objCandidato->setEmail($row[1]);
                    $objCandidato->setNomeCompleto($row[2]);
                    $objCandidato->setDataNascimento($row[3]);
                    $objCandidato->setSexo($row[4]);
                    $objCandidato->setBio($row[5]);
                    $objCandidato->setCep($row[6]);
                    $objCandidato->setEndereco($row[7]);
                    $objCandidato->setNumero($row[8]);
                    $objCandidato->setComplemento($row[9]);
                    $objCandidato->setTelefone($row[10]);
                    $objCandidato->setImagem($row[11]);
                }
                return $objCandidato;
            }
        }
        
    }
    
    function cadastrarUsuario($tipo){
        $vConn = ConexaoDAO::abrirConexao(); 
        
        //inserir dados na tabela usuario
        $sqlCadastraUsuario = "Insert into usuarios(login_USUARIO, senha_USUARIO, permissao_USUARIO) values(";
        $sqlCadastraUsuario .="'" . $objUsuario->getLogin() . "',";
        $sqlCadastraUsuario .="'" . md5($objUsuario->getSenha()) . "',";
        $sqlCadastraUsuario .= $objUsuario->getPermissao() . ")";
        
        if($tipo == 1){ //candidato
            $sqlCadastraDados = "Insert into candidatos(";
            $sqlCadastraDados .= "login_CANDIDATO, nomeCompleto_CANDIDATO, dataNascimento_CANDIDATO, sexo_CANDIDATO";
            $sqlCadastraDados .= "bio_CANDIDATO, cep_CANDIDATO, endereco_CANDIDATO";
            $sqlCadastraDados .= "numero_CANDIDATO, complemento_CANDIDATO, telefone_CANDIDATO, imagem_CANDIDATO)";
            $sqlCadastraDados .= "values(";
            $sqlCadastraDados .= "'" . $objDados->getEmail() . "',";
            $sqlCadastraDados .= "'" . $objDados->getNome() . "',";
            $sqlCadastraDados .= "'" . $objDados->getDataNascimento() . "',";
            $sqlCadastraDados .= "'" . $objDados->getSexo() . "',";
            $sqlCadastraDados .= "'" . $objDados->getBio() . "',";
            $sqlCadastraDados .= "'" . $objDados->getCep() . "',";
            $sqlCadastraDados .= "'" . $objDados->getEndereco() . "',";
            $sqlCadastraDados .= "'" . $objDados->getNumero() . "',";
            $sqlCadastraDados .= "'" . $objDados->getComplemento() . "',";
            $sqlCadastraDados .= "'" . $objDados->getTelefone() . "',";
            $sqlCadastraDados .= "'" . $objDados->getImagem() . "',";
            
            
        } else if($tipo == 2){ //empresa
            $sqlCadastraDados = "Insert into candidatos(";
            $sqlCadastraDados .= "email_EMPRESA, nomeFantasia_EMPRESA,";
            $sqlCadastraDados .= "info_EMPRESA, cep_EMPRESA, endereco_EMPRESA";
            $sqlCadastraDados .= "numero_EMPRESA, complemento_EMPRESA, telefone_EMPRESA, imagem_EMPRESA, idCategoria_EMPRESA)";
            $sqlCadastraDados .= "values(";
            $sqlCadastraDados .= "'" . $objDados->getEmail() . "',";
            $sqlCadastraDados .= "'" . $objDados->getNomeFantasia() . "',";
            $sqlCadastraDados .= "'" . $objDados->getInfo() . "',";
            $sqlCadastraDados .= "'" . $objDados->getCep() . "',";
            $sqlCadastraDados .= "'" . $objDados->getEndereco() . "',";
            $sqlCadastraDados .= "'" . $objDados->getNumero() . "',";
            $sqlCadastraDados .= "'" . $objDados->getComplemento() . "',";
            $sqlCadastraDados .= "'" . $objDados->getTelefone() . "',";
            $sqlCadastraDados .= "'" . $objDados->getImagem() . "',";
            $sqlCadastraDados .= $objDados->getIdCategoria() . ")";
        }
        
        $vConn->query($sqlCadastraUsuario);
        $vConn->query($sqlCadastroDados);
    }
}

?>