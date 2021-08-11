
import java.sql.*;
import java.util.*;

public class AtoresDAO {

    public static ResultSet rsAtores;
    public static Statement stAtores;

    public static List<AtoresVO> listarAtores(int tmpTipo, String tmpNome, int tmpGenero) throws Exception {

        List<AtoresVO> lista = new ArrayList<AtoresVO>();

        try {
            BancoDAO.abrirConexao();
        } catch (Exception erro) {
            throw new Exception(erro);
        }

        try {
            //Intruções de listagem

            String sqlFilmes = "";
            if (tmpTipo == 0) {
                sqlFilmes = "Select * from ATORES";
            } else if (tmpTipo == 1) {
                sqlFilmes = "Select * from ATORES where nome_ATOR like '" + tmpNome + "'";
            }
            stAtores = BancoDAO.vConn.createStatement();

            rsAtores = stAtores.executeQuery(sqlFilmes);

            while (rsAtores.next()) {
                AtoresVO tmpAtor = new AtoresVO();

                tmpAtor.setId(rsAtores.getInt("id_ATOR"));
                tmpAtor.setNome(rsAtores.getString("nome_ATOR"));

                lista.add(tmpAtor);
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

    public static void cadastrarAtor(AtoresVO tmpAtor) throws Exception {

        try {
            BancoDAO.abrirConexao();
        } catch (Exception erro) {
            throw new Exception(erro);
        }

        try {
            //Intruções de cadastro
            String sqlAtor = "Insert into atores(nome_ATOR, imagem_ATOR) values(";
            sqlAtor+= "'" + tmpAtor.getNome() + "',";
            sqlAtor+= "'" + tmpAtor.getImagem()+ "')";
            
            stAtores = BancoDAO.vConn.createStatement();
            stAtores.executeUpdate(sqlAtor);
            

        } catch (Exception erro) {
            String msgErro = "";
            msgErro += "Falha no cadastro de registro.\n";
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

}
