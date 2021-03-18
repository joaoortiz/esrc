<?php

require_once 'ConexaoDAO.php';
require_once '../Model/Empresas.php';
require_once '../Model/Candidatos.php';

class UsuariosDAO {
    
    public $objBD;
    
    function validarUsuario($login, $senha){
        $objBD = new ConexaoDAO();
        $vConn = $objBD->abrirConexao();
        
        $sqlLogin = "Select * from Usuarios ";
        $sqlLogin .= "where login_USUARIO like '$login' and ";
        $sqlLogin .= "senha_USUARIO like '" . md5($senha) . "'";
        
        $rsLogin = $vConn->query($sqlLogin);
        
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
                $tblEmpresa = $rsEmpresa->fetch();
                
                $objEmpresa = new Empresas();
                
                    $objEmpresa->setId($tblEmpresa['id_EMPRESA']);
                    $objEmpresa->setEmail($tblEmpresa['email_EMPRESA']);
                    $objEmpresa->setNomeFantasia($tblEmpresa['nomeFantasia_EMPRESA']);
                    $objEmpresa->setInfo($tblEmpresa['info_EMPRESA']);
                    $objEmpresa->setCep($tblEmpresa['cep_EMPRESA']);
                    $objEmpresa->setEndereco($tblEmpresa['endereco_EMPRESA']);
                    $objEmpresa->setNumero($tblEmpresa['numero_EMPRESA']);
                    $objEmpresa->setComplemento($tblEmpresa['complemento_EMPRESA']);
                    $objEmpresa->setBairro($tblEmpresa['bairro_EMPRESA']);
                    $objEmpresa->setCidade($tblEmpresa['cidade_EMPRESA']);
                    $objEmpresa->setTelefone($tblEmpresa['telefone_EMPRESA']);
                    $objEmpresa->setImagem($tblEmpresa['imagem_EMPRESA']);
                    $objEmpresa->setIdCategoria($tblEmpresa['idCategoria_EMPRESA']);
                    $objEmpresa->setPermissao(2);
                
                return $objEmpresa;
                
            } else if($permissaoUsuario == 3) {
                //SELECT DO CANDIDATO
                $sqlCandidato = "Select * from candidatos where email_CANDIDATO like '$loginUsuario'";
                $rsCandidato = $vConn->query($sqlCandidato);
                $tblCandidato = $rsCandidato->fetch();
                
                $objCandidato = new Candidatos();
                
                    $objCandidato->setId($tblCandidato['id_CANDIDATO']);
                    $objCandidato->setEmail($tblCandidato['email_CANDIDATO']);
                    $objCandidato->setNomeCompleto($tblCandidato['nomeCompleto_CANDIDATO']);
                    $objCandidato->setDataNascimento($tblCandidato['dataNascimento_CANDIDATO']);
                    $objCandidato->setSexo($tblCandidato['sexo_CANDIDATO']);
                    $objCandidato->setBio($tblCandidato['bio_CANDIDATO']);
                    $objCandidato->setCep($tblCandidato['cep_CANDIDATO']);
                    $objCandidato->setEndereco($tblCandidato['endereco_CANDIDATO']);
                    $objCandidato->setNumero($tblCandidato['numero_CANDIDATO']);
                    $objCandidato->setBairro($tblCandidato['bairro_CANDIDATO']);
                    $objCandidato->setCidade($tblCandidato['cidade_CANDIDATO']);
                    $objCandidato->setComplemento($tblCandidato['complemento_CANDIDATO']);
                    $objCandidato->setTelefone($tblCandidato['telefone_CANDIDATO']);
                    $objCandidato->setImagem($tblCandidato['imagem_CANDIDATO']);
                    $objCandidato->setPermissao(3);
                
                return $objCandidato;
            }
        }
        
    }
    
    function cadastrarUsuario($tipo,$objUsuario,$objDados){
        $objBD = new ConexaoDAO();
        $vConn = $objBD->abrirConexao();
        
        //inserir dados na tabela usuario
        $sqlCadastraUsuario = "Insert into usuarios(login_USUARIO, senha_USUARIO, permissao_USUARIO) values(";
        $sqlCadastraUsuario .="'" . $objUsuario->getLogin() . "',";
        $sqlCadastraUsuario .="'" . md5($objUsuario->getSenha()) . "',";
        $sqlCadastraUsuario .= $objUsuario->getPermissao() . ")";
        
        if($tipo == 1){ //candidato
            $sqlCadastraDados = "Insert into candidatos(";
            $sqlCadastraDados .= "email_CANDIDATO, nomeCompleto_CANDIDATO, dataNascimento_CANDIDATO, sexo_CANDIDATO";
            $sqlCadastraDados .= "bio_CANDIDATO, cep_CANDIDATO, endereco_CANDIDATO";
            $sqlCadastraDados .= "numero_CANDIDATO, complemento_CANDIDATO, bairro_CANDIDATO, cidade_CANDIDATO, telefone_CANDIDATO, imagem_CANDIDATO)";
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
            $sqlCadastraDados .= "'" . $objDados->getBairro() . "',";
            $sqlCadastraDados .= "'" . $objDados->getCidade() . "',";
            $sqlCadastraDados .= "'" . $objDados->getTelefone() . "',";
            $sqlCadastraDados .= "'" . $objDados->getImagem() . "',";
            
            
        } else if($tipo == 2){ //empresa
            $sqlCadastraDados = "Insert into candidatos(";
            $sqlCadastraDados .= "email_EMPRESA, nomeFantasia_EMPRESA,";
            $sqlCadastraDados .= "info_EMPRESA, cep_EMPRESA, endereco_EMPRESA";
            $sqlCadastraDados .= "numero_EMPRESA, complemento_EMPRESA, bairro_EMPRESA, cidade_EMPRESA, telefone_EMPRESA, imagem_EMPRESA, idCategoria_EMPRESA)";
            $sqlCadastraDados .= "values(";
            $sqlCadastraDados .= "'" . $objDados->getEmail() . "',";
            $sqlCadastraDados .= "'" . $objDados->getNomeFantasia() . "',";
            $sqlCadastraDados .= "'" . $objDados->getInfo() . "',";
            $sqlCadastraDados .= "'" . $objDados->getCep() . "',";
            $sqlCadastraDados .= "'" . $objDados->getEndereco() . "',";
            $sqlCadastraDados .= "'" . $objDados->getNumero() . "',";
            $sqlCadastraDados .= "'" . $objDados->getComplemento() . "',";
            $sqlCadastraDados .= "'" . $objDados->getBairro() . "',";
            $sqlCadastraDados .= "'" . $objDados->getCidade() . "',";
            $sqlCadastraDados .= "'" . $objDados->getTelefone() . "',";
            $sqlCadastraDados .= "'" . $objDados->getImagem() . "',";
            $sqlCadastraDados .= $objDados->getIdCategoria() . ")";
        }
        
        $vConn->query($sqlCadastraUsuario);
        $vConn->query($sqlCadastroDados);
    }
}

?>