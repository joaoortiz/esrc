
import java.sql.*;
import java.util.*;

public class FilmesDAO {

    public static Statement stFilmes;
    public static ResultSet rsFilmes;

    public static void cadastrarFilme(FilmesVO tmpFilme) throws Exception {

        try {
            BancoDAO.abrirConexao();
        } catch (Exception erro) {
            throw new Exception(erro);
        }

        try {
            //Intruções de cadastro
            String sqlCadFilme = "";
            sqlCadFilme += "Insert into FILMES(tituloOriginal_FILME, tituloTraduzido_FILME,";
            sqlCadFilme += "diretor_FILME, ano_FILME, duracao_FILME, classificacao_FILME, sinopse_FILME,";
            sqlCadFilme += "imagem_FILME, status_FILMES, idGenero_FILME) values(";
            sqlCadFilme += "'" + tmpFilme.getTituloOrig() + "',";
            sqlCadFilme += "'" + tmpFilme.getTituloTrad() + "',";
            sqlCadFilme += "'" + tmpFilme.getDiretor() + "',";
            sqlCadFilme += tmpFilme.getAno() + ",";
            sqlCadFilme += tmpFilme.getDuracao() + ",";
            sqlCadFilme += tmpFilme.getClassificacao() + ",";
            sqlCadFilme += "'" + tmpFilme.getSinopse() + "',";
            sqlCadFilme += "'" + tmpFilme.getImagem() + "',1,";
            sqlCadFilme += tmpFilme.getIdGenero() + ")";

            stFilmes = BancoDAO.vConn.createStatement();
            stFilmes.executeUpdate(sqlCadFilme);

        } catch (Exception erro) {
            String msgErro = "";
            msgErro += "Falha na inserção de registro em Banco de Dados.\n";
            msgErro += "Verifique a sintaxe do comando INSERT bem como nome de tabelas e campos.\n\n";
            msgErro += "Erro Original: " + erro.getMessage();

            throw new Exception(msgErro);
        }

        try {
            BancoDAO.fecharConexao();
        } catch (Exception erro) {
            throw new Exception(erro);
        }

    }

    public static FilmesVO consultarFilme(int tmpId) throws Exception {

        FilmesVO tmpFilme = new FilmesVO();

        try {
            BancoDAO.abrirConexao();
        } catch (Exception erro) {
            throw new Exception(erro);
        }

        try {
            //Intruções de Consulta
            String sqlFilmes = "Select * from Filmes";
            stFilmes = BancoDAO.vConn.createStatement();
            rsFilmes = stFilmes.executeQuery(sqlFilmes);

            if (rsFilmes.next()) {
                tmpFilme.setId(rsFilmes.getInt("id_FILME"));
                tmpFilme.setDuracao(rsFilmes.getInt("duracao_FILME"));
                tmpFilme.setAno(rsFilmes.getInt("ano_FILME"));
                tmpFilme.setClassificacao(rsFilmes.getInt("classificacao_FILME"));
                tmpFilme.setIdGenero(rsFilmes.getInt("idGenero_FILME"));
                tmpFilme.setTituloOrig(rsFilmes.getString("tituloOriginal_FILME"));
                tmpFilme.setTituloTrad(rsFilmes.getString("tituloTraduzido_FILME"));
                tmpFilme.setDiretor(rsFilmes.getString("diretor_FILME"));
                tmpFilme.setSinopse(rsFilmes.getString("sinopse_FILME"));
                tmpFilme.setImagem(rsFilmes.getString("imagem_FILME"));
                tmpFilme.setStatus(rsFilmes.getBoolean("status_FILME"));

            } else {
                tmpFilme = null;
            }

        } catch (Exception erro) {
            String msgErro = "";
            msgErro += "Falha na consulta em Banco de Dados.\n";
            msgErro += "Verifique a sintaxe do comando SELECT bem como nome de tabelas e campos.\n\n";
            msgErro += "Erro Original: " + erro.getMessage();

            throw new Exception(msgErro);
        }

        try {
            BancoDAO.fecharConexao();
        } catch (Exception erro) {
            throw new Exception(erro);
        }

        return tmpFilme;
    }

    public static List<FilmesVO> listarFilmes(int tmpTipo, String tmpTitulo, int tmpGenero) throws Exception {

        List<FilmesVO> lista = new ArrayList<FilmesVO>();

        try {
            BancoDAO.abrirConexao();
        } catch (Exception erro) {
            throw new Exception(erro);
        }

        try {
            //Intruções de listagem

            String sqlFilmes = "Select * from FILMES";
            stFilmes = BancoDAO.vConn.createStatement();

            rsFilmes = stFilmes.executeQuery(sqlFilmes);

            while (rsFilmes.next()) {
                FilmesVO tmpFilme = new FilmesVO();

                tmpFilme.setId(rsFilmes.getInt("id_FILME"));
                tmpFilme.setDuracao(rsFilmes.getInt("duracao_FILME"));
                tmpFilme.setAno(rsFilmes.getInt("ano_FILME"));
                tmpFilme.setClassificacao(rsFilmes.getInt("classificacao_FILME"));
                tmpFilme.setIdGenero(rsFilmes.getInt("idGenero_FILME"));
                tmpFilme.setTituloOrig(rsFilmes.getString("tituloOriginal_FILME"));
                tmpFilme.setTituloTrad(rsFilmes.getString("tituloTraduzido_FILME"));
                tmpFilme.setDiretor(rsFilmes.getString("diretor_FILME"));
                tmpFilme.setSinopse(rsFilmes.getString("sinopse_FILME"));
                tmpFilme.setImagem(rsFilmes.getString("imagem_FILME"));
                tmpFilme.setStatus(rsFilmes.getBoolean("status_FILME"));

                lista.add(tmpFilme);
            }

        } catch (Exception erro) {
            String msgErro = "";
            msgErro += "Falha na listagem de registros do Banco de Dados.\n";
            msgErro += "Verifique a sintaxe do comando SELECT bem como nome de tabelas e campos.\n\n";
            msgErro += "Erro Original: " + erro.getMessage();

            throw new Exception(msgErro);
        }

        try {
            BancoDAO.fecharConexao();
        } catch (Exception erro) {
            throw new Exception(erro);
        }

        return lista;
    }

    public static void alterarFilme(FilmesVO tmpFilme) throws Exception {
        try {
            BancoDAO.abrirConexao();
        } catch (Exception erro) {
            throw new Exception(erro);
        }

        try {
            //Intruções de cadastro
        } catch (Exception erro) {
            String msgErro = "";
            msgErro += "Falha na alteração de registros em Banco de Dados.\n";
            msgErro += "Verifique a sintaxe do comando UPDATE bem como nome de tabelas e campos.\n\n";
            msgErro += "Erro Original: " + erro.getMessage();

            throw new Exception(msgErro);
        }

        try {
            BancoDAO.fecharConexao();
        } catch (Exception erro) {
            throw new Exception(erro);
        }
    }

    public static void alterarStatusFilme(int tmpId, boolean tmpStatus) throws Exception {
        try {
            BancoDAO.abrirConexao();
        } catch (Exception erro) {
            throw new Exception(erro);
        }

        try {
            //Intruções de cadastro
        } catch (Exception erro) {
            String msgErro = "";
            msgErro += "Falha na ativação/desativação em Banco de Dados.\n";
            msgErro += "Verifique a sintaxe do comando UPDATE bem como nome de tabelas e campos.\n\n";
            msgErro += "Erro Original: " + erro.getMessage();

            throw new Exception(msgErro);
        }

        try {
            BancoDAO.fecharConexao();
        } catch (Exception erro) {
            throw new Exception(erro);
        }

    }

    public static int gerarId() throws Exception {

        int novoId = 0;

        try {
            BancoDAO.abrirConexao();
        } catch (Exception erro) {
            throw new Exception(erro);
        }

        try {
            //instruções
            String sqlFilmes = "Select id_FILME from Filmes order by id_FILME desc limit 1";
            stFilmes = BancoDAO.vConn.createStatement();
            rsFilmes = stFilmes.executeQuery(sqlFilmes);

            if (rsFilmes.next()) {
                novoId = rsFilmes.getInt("id_FILME") + 1;
            }

        } catch (Exception erro) {
            String msgErro = "";
            msgErro += "Falha na geração de um novo ID.\n";
            msgErro += "Verifique a sintaxe do comando Select bem como nome de tabelas e campos.\n\n";
            msgErro += "Erro Original: " + erro.getMessage();

            throw new Exception(msgErro);
        }

        try {
            BancoDAO.fecharConexao();
        } catch (Exception erro) {
            throw new Exception(erro);
        }
        return novoId;
    }

    public static List<SalasVO> listarSalas(int tmpIdFilme) throws Exception {
        
        List<SalasVO> lista = new ArrayList<SalasVO>();
        
        try {
            BancoDAO.abrirConexao();
        } catch (Exception erro) {
            throw new Exception(erro);
        }

        try {
            
            String sqlSalas = "Select S.* from SALAS S, SESSOES SS where SS.idFilme_SESSAO = " + tmpIdFilme + " and SS.idSala_SESSAO = S.id_SALA";
            stFilmes = BancoDAO.vConn.createStatement();
            rsFilmes = stFilmes.executeQuery(sqlSalas);
            
            while(rsFilmes.next()){
                
                SalasVO tmpSala = new SalasVO();
                
                tmpSala.setId(rsFilmes.getInt("id_SALA"));
                tmpSala.setQtdePoltronas(rsFilmes.getInt("quantidadePoltronas_SALA"));
                
                lista.add(tmpSala);
            }                      
            
        } catch (Exception erro) {
            String msgErro = "";
            msgErro += "Falha na listagem das salas para este filme.\n";
            msgErro += "Verifique a sintaxe do comando Select bem como nome de tabelas e campos.\n\n";
            msgErro += "Erro Original: " + erro.getMessage();

            throw new Exception(msgErro);
        }
        
        try {
            BancoDAO.fecharConexao();
        } catch (Exception erro) {
            throw new Exception(erro);
        }
        
        return lista;
    }

}//fechando classe
