
import javax.swing.*;
import java.awt.*;
import java.awt.event.*;

public class Tela extends JFrame implements ActionListener {

    public static Container ctnPrinc, ctnTela;
    public static JLabel lblInfo;
    public static JButton btnTab[][]; //declaração

    public static int jogador = 1;
    public static boolean fim = false;

    public Tela() { //construtor

        super("Jogo da Velha - 2º TI");

        ctnPrinc = new Container();
        ctnPrinc.setLayout(new BorderLayout());
        this.add(ctnPrinc);

        lblInfo = new JLabel("Jogador: 1 " + "------" + " Jogadas: 0");
        ctnPrinc.add(lblInfo, BorderLayout.SOUTH);

        ctnTela = new Container();
        ctnTela.setLayout(new GridLayout(3, 3));
        ctnPrinc.add(ctnTela, BorderLayout.CENTER);

        btnTab = new JButton[3][3]; //construindo uma matriz 3x3 de botoes

        for (int lin = 0; lin < 3; lin++) {
            for (int col = 0; col < 3; col++) {
                btnTab[lin][col] = new JButton(lin + "x" + col);
                btnTab[lin][col].setBackground(Color.white);
                btnTab[lin][col].setIcon(new ImageIcon("img/fundo.jpg"));
                btnTab[lin][col].addActionListener(this);
                ctnTela.add(btnTab[lin][col]);
            }
        }

        //config. da tela
        this.setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
        this.setSize(400, 400);
        this.setResizable(false);
        this.setVisible(true);
    }

    public void actionPerformed(ActionEvent evt) {

        for (int lin = 0; lin < 3; lin++) {
            for (int col = 0; col < 3; col++) {

                if (evt.getSource() == btnTab[lin][col]) {

                    if (Control.controle.tab[lin][col] != 0) {
                        JOptionPane.showMessageDialog(null, "Jogada Inválida");
                    } else {

                        btnTab[lin][col].setIcon(new ImageIcon("img/" + jogador + ".png"));
                        int jogadas = Control.controle.efetuarJogada(lin, col);

                        if (fim == false) {
                            if (jogador == 1) {
                                jogador = 2;
                            } else if (jogador == 2) {
                                jogador = 1;
                            }

                            lblInfo.setText("Jogador: " + jogador + " ------" + " Jogadas: " + jogadas);
                        }
                        
                        if (Control.controle.vitoria == true) {
                            JOptionPane.showMessageDialog(null, "Vencedor: " + Control.controle.vencedor);
                            jogador = 1;
                            fim = true;
                            resetarTela();

                        }

                    }
                }

                if (Control.controle.jogadas == 9 && Control.controle.vitoria == false) {
                    JOptionPane.showMessageDialog(null, "Deu velha!");
                    jogador = 1;
                    fim = true;
                    resetarTela();
                }

            } //for col
        }//for lin

    }   //fechando actionPerformed 

    public void resetarTela() {
        jogador = 1;
        fim = false;
        lblInfo.setText("Jogador: 1 " + "------" + " Jogadas: 0");

        for (int lin = 0; lin < 3; lin++) { //limpando tabuleiro
            for (int col = 0; col < 3; col++) {
                btnTab[lin][col].setBackground(Color.white);
                btnTab[lin][col].setIcon(new ImageIcon("img/fundo.jpg"));
            }//for col
        }//for lin

        
        Control.controle.resetarDados();

    }

}//fechando class
