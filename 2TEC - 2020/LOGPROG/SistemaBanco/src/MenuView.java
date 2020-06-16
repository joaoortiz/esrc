
import javax.swing.*;

public class MenuView {

    public MenuView() {

        String msgMenu = "";
        int opcao = 0; //armazena a opção do usuário

        do {

            try {

                msgMenu = "";
                msgMenu += "*** MENU PRINCIPAL ***\n\n";
                msgMenu += "1 - Consultar Saldo\n";
                msgMenu += "2 - Depósito\n";
                msgMenu += "3 - Saque\n";
                msgMenu += "4 - Resgatar (Poupança -> CC)\n";
                msgMenu += "5 - Aplicar (CC -> Poupança)\n";
                msgMenu += "6 - Visualizar Extrato\n";
                msgMenu += "7 - Encerrar Aplicação\n\n";
                msgMenu += "Entre com a opção desejada: ";

                opcao = Integer.parseInt(JOptionPane.showInputDialog(msgMenu));

                if (opcao == 1) {

                    int tipoConta = Integer.parseInt(
                            JOptionPane.showInputDialog(
                                    "Informe o tipo da conta:\n\n"
                                    + "1 - Conta Corrente\n"
                                    + "2 - Poupança"));

                    float saldo = BancoControl.objConta.consultarSaldo(tipoConta);

                    JOptionPane.showMessageDialog(null, "Saldo Atual: R$ " + BancoControl.fmtMoeda.format(saldo), "Saldo em Conta",
                            JOptionPane.INFORMATION_MESSAGE);

                } else if (opcao == 2) {

                    float valor = Float.parseFloat(
                            JOptionPane.showInputDialog(
                                    "Entre com o valor do depósito: "));

                    BancoControl.objConta.depositar(valor);

                    JOptionPane.showMessageDialog(null,
                            "Depósito realizado no valor de R$ " + BancoControl.fmtMoeda.format(valor),
                            "Depósito", JOptionPane.WARNING_MESSAGE);

                } else if (opcao == 3) {

                    int statusSaque;
                    float valor = Float.parseFloat(
                            JOptionPane.showInputDialog(
                                    "Entre com o valor do saque: "));

                    statusSaque = BancoControl.objConta.sacar(valor);

                    if (statusSaque == 1) {
                        JOptionPane.showMessageDialog(null,
                                "Saque realizado no valor de R$ " + BancoControl.fmtMoeda.format(valor),
                                "Saque", JOptionPane.WARNING_MESSAGE);
                    } else if (statusSaque == 2) {
                        JOptionPane.showMessageDialog(null,
                                "Limite de saldo excedido. Contrate um empréstimo.",
                                "Saque", JOptionPane.ERROR_MESSAGE);
                    } else if (statusSaque == 3) {
                        JOptionPane.showMessageDialog(null,
                                "Limite de saque excedido. Efetue saques parcelados.",
                                "Saque", JOptionPane.ERROR_MESSAGE);
                    }

                } else if (opcao == 4) {

                    boolean statusResg;
                    float valor = Float.parseFloat(
                            JOptionPane.showInputDialog(
                                    "Entre com o valor que deseja"
                                    + "resgatar: "));
                    statusResg = BancoControl.objConta.resgatar(valor);

                    if (statusResg) {
                        JOptionPane.showMessageDialog(null,
                                "Resgate feito no valor de: R$" + BancoControl.fmtMoeda.format(valor)
                                + "\nSaldo atual (CC): R$ " + BancoControl.fmtMoeda.format(BancoControl.objConta.consultarSaldo(1)),
                                "Resgate", JOptionPane.WARNING_MESSAGE);
                    } else {
                        JOptionPane.showMessageDialog(null,
                                "Não há valor investido suficiente para o resgate.",
                                "Resgate", JOptionPane.ERROR_MESSAGE);
                    }

                } else if (opcao == 5) {

                    boolean statusAplic;
                    float valor = Float.parseFloat(
                            JOptionPane.showInputDialog(
                                    "Entre com o valor que deseja"
                                    + "aplicar: "));
                    statusAplic = BancoControl.objConta.aplicar(valor);

                    if (statusAplic) {
                        JOptionPane.showMessageDialog(null,
                                "Aplicação feita no valor de: R$" + BancoControl.fmtMoeda.format(valor)
                                + "\nSaldo atual (Poup): R$ " + BancoControl.fmtMoeda.format(BancoControl.objConta.consultarSaldo(2)),
                                "Aplicação", JOptionPane.WARNING_MESSAGE);
                    } else {
                        JOptionPane.showMessageDialog(null,
                                "Não há valor em conta para efetuar a aplicação.",
                                "Aplicação", JOptionPane.ERROR_MESSAGE);
                    }

                } else if (opcao == 6) {

                    String textoExtrato = BancoControl.objConta.imprimirExtrato();
                    JOptionPane.showMessageDialog(null, textoExtrato + "\n---------------------------------------------\n"
                            + "Saldo Final(CC): R$ " + BancoControl.fmtMoeda.format(BancoControl.objConta.consultarSaldo(1)),
                            "Extrato Bancário", JOptionPane.INFORMATION_MESSAGE);

                } else if (opcao == 7) {
                    JOptionPane.showMessageDialog(null, "Obrigado por usar nossos serviços");
                    System.exit(0); //encerra a aplicação
                } else {
                    JOptionPane.showMessageDialog(null, "Opção Inválida",
                            "Banco CIC", JOptionPane.WARNING_MESSAGE);
                }

            } catch (Exception erro) {
                JOptionPane.showMessageDialog(null, "O valor informado não é aceito pelo sistema.\n",
                        "Erro", JOptionPane.ERROR_MESSAGE);
            }

        } while (opcao != 7);

    }

}
