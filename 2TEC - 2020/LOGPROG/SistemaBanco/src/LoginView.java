
import javax.swing.*; //pacote de elementos graficos

public class LoginView {

    public LoginView() {

        String tmpConta, tmpSenha;
        boolean statusLogin;
        int erros = 0;

        do {

            tmpConta = JOptionPane.showInputDialog("Entre com o número da conta: ");

            tmpSenha = JOptionPane.showInputDialog("Entre com a senha: ");

            statusLogin = BancoControl.objConta.validarCliente(tmpConta, tmpSenha);

            if (!statusLogin) { // if(statusLogin == false)            
                JOptionPane.showMessageDialog(null, "Dados inválidos. Tentativas Restantes: " + (2 - erros), "Falha no Login", JOptionPane.WARNING_MESSAGE);
                erros++;
            } else {
                JOptionPane.showMessageDialog(null, "Acesso concedido ao sistema. CLIENTE: " + BancoControl.objConta.identificarCliente());
                break;
            }
        } while (erros < 3);

        if (erros == 3) {
            JOptionPane.showMessageDialog(null, "Sistema Bloqueado. Contate o gerente.", "Bloqueio de Conta", JOptionPane.ERROR_MESSAGE);
        }else{
            BancoControl.appMenu = new MenuView();
        }

    }//fechando construtor

}//fechando classe
