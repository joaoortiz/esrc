
//import javax.swing.UIManager;
import javax.swing.*;
//import javax.swing.UIManager.LookAndFeelInfo;
import java.awt.*;
import java.awt.event.*;

public class Tela extends JFrame implements ActionListener {

    //Declaração dos objetos
    public static Container ctnTela;
    public static JButton btnDigitos[], btnOper[], btnReset, btnPonto;
    public static JTextField txtVisor;

    //Declaração de variaveis auxiliares
    public int algarismos = 0, oper;
    public boolean ponto = false;
    public float v1, v2, resp;

    public Tela() { //contrutor

        super("Calculadora");

        //**********************************aplicar lookandfeel***********************************/
        try {
            // Set System L&F
            UIManager.setLookAndFeel("com.sun.java.swing.plaf.windows.WindowsLookAndFeel");
        } catch (UnsupportedLookAndFeelException e) {
            // handle exception
        } catch (ClassNotFoundException e) {
            // handle exception
        } catch (InstantiationException e) {
            // handle exception
        } catch (IllegalAccessException e) {
            // handle exception
        }
        /*****************************************************************************************/

        ctnTela = new Container();
        ctnTela.setLayout(null);
        this.add(ctnTela);

        txtVisor = new JTextField("0");
        txtVisor.setFont(new Font("Arial", Font.PLAIN, 24));
        txtVisor.setHorizontalAlignment(txtVisor.RIGHT);
        txtVisor.setBounds(5, 5, 210, 40);
        txtVisor.setEditable(false);
        ctnTela.add(txtVisor);

        int lin = 1, col = 0;
        btnDigitos = new JButton[10];
        for (int i = 0; i <= 9; i++) {
            btnDigitos[i] = new JButton("" + i);
            btnDigitos[i].addActionListener(this);

            if (i > 0) {
                btnDigitos[i].setBounds(5 + ((col - 1) * 54), 54 + (lin * 54), 49, 49);
                ctnTela.add(btnDigitos[i]);
            }

            if (i % 3 == 0 && i != 0) {
                lin++;
                col = 0;
            }

            col++;

            if (i == 0) {
                btnDigitos[i].setBounds(5, 270, 103, 49);
                ctnTela.add(btnDigitos[i]);
            }
        }

        btnReset = new JButton("C");
        btnReset.addActionListener(this);
        btnReset.setBounds(5, 54, 103, 49);
        ctnTela.add(btnReset);

        btnPonto = new JButton(".");
        btnPonto.addActionListener(this);
        btnPonto.setBounds(114, 270, 49, 49);
        ctnTela.add(btnPonto);

        //botoes das operações e botao igual
        btnOper = new JButton[6];
        String oper[] = {"RQ", "+", "-", "*", "/", "="};
        for (int i = 0; i < 6; i++) {
            btnOper[i] = new JButton(oper[i]);
            btnOper[i].addActionListener(this);
            ctnTela.add(btnOper[i]);
        }

        btnOper[0].setBounds(113, 54, 49, 49); //raiz
        btnOper[1].setBounds(167, 54, 49, 49); //soma
        btnOper[2].setBounds(167, 108, 49, 49); //sub
        btnOper[3].setBounds(167, 162, 49, 49); //mult
        btnOper[4].setBounds(167, 216, 49, 49); //div
        btnOper[5].setBounds(167, 270, 49, 49); //igual
        
        btnOper[5].setEnabled(false);//desabilitando sinal de igual

        this.setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
        this.setSize(228, 355);
        this.setResizable(false);
        this.setVisible(true);

    }//fechando construtor 

    public void actionPerformed(ActionEvent evt) {

        for (int i = 0; i < 10; i++) {
            if (evt.getSource() == btnDigitos[i]) {
                if (i == 0 && algarismos == 0) {
                    //se o zero for o primeiro algarismo, nada acontece
                } else {

                    if (algarismos == 0 && ponto == false) {
                        txtVisor.setText(btnDigitos[i].getText());
                        algarismos++;
                    } else if (algarismos > 0) {
                        txtVisor.setText(txtVisor.getText() + btnDigitos[i].getText());
                        algarismos++;
                    }
                }
            }
        }

        for (int i = 0; i < 6; i++) {
            if (evt.getSource() == btnOper[i]) {
                if (i == 0) {
                    //RAIZ
                    v1= Float.parseFloat(txtVisor.getText()); //jogando o conteudo do visor na variavel
                    oper = 0;
                    resp = Calculos.calculaOper(oper, v1, v2);
                    txtVisor.setText("" + resp);
                } else if (i == 5) {
                    //IGUAL (EXEC. DA OPER.)
                    v2 = Float.parseFloat(txtVisor.getText()); //jogando o conteudo do visor na variavel
                    resp = Calculos.calculaOper(oper, v1, v2);
                    txtVisor.setText("" + resp);
                    
                } else {
                    //DEMAIS OPER. BASICAS
                    v1 = Float.parseFloat(txtVisor.getText()); //jogando o conteudo do visor na variavel
                    txtVisor.setText("" + 0);
                    algarismos = 0;
                    ponto = false;
                    oper = i; //armazenando operação
                    btnOper[5].setEnabled(true);
                }
            }
        }

        if (evt.getSource() == btnPonto) {
            if (ponto == false) {
                txtVisor.setText(txtVisor.getText() + ".");
                algarismos++;
                ponto = true;
            }
        }

        if(evt.getSource() == btnReset){
            txtVisor.setText(""+0);
            v1 = 0;
            v2 = 0;
            ponto = false;
            algarismos = 0;
            btnOper[5].setEnabled(false);
            resp = 0;
        }
        
    }//fechando actionPerformed

}//fechando classe
