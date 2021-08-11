import java.sql.*;

public class BancoDAO {

    public static Connection vConn;

    public static void abrirConexao() throws Exception {

        try {
            Class.forName("com.mysql.jdbc.Driver");
            vConn = DriverManager.getConnection("jdbc:mysql://localhost:3306/bdcinema", "root", "");

        } catch (Exception erro) {
            String msgErro = "";
            msgErro += "Falha na abertura da conexão com Banco de Dados.\n";
            msgErro += "Verifique a String de conexão e os parâmetros informados.\n\n";
            msgErro += "Erro Original: " + erro.getMessage();

            throw new Exception(msgErro);

        }

    }

    public static void fecharConexao() throws Exception {

        try {
            vConn.close();
        } catch (Exception erro) {
            String msgErro = "";
            msgErro += "Falha no fechamento da conexão com Banco de Dados.\n";
            msgErro += "Verifique a existência de uma conexão ativa.\n\n";
            msgErro += "Erro Original: " + erro.getMessage();

            throw new Exception(msgErro);

        }

    }

}