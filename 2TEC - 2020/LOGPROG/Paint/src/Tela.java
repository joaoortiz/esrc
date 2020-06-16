
import javax.swing.*; //pacote de elementos gráficos
import java.awt.*; //Pacote do Container
import java.awt.event.*; //Pacote da classe ActionListener

//JFrame - Janela
public class Tela extends JFrame implements ActionListener {

    //1 - Declaração dos objetos
    public static Container ctnTela, ctnBotoes;
    public static JLabel lblBanner;
    public static JButton btnWhite, btnBlack, btnBlue, btnGreen, btnRed,
            btnOrange, btnYellow, btnPurple, btnPink, btnBrown,
            btnClear, btnClose;
    public static AreaDesenho area;

    //método construtor
    public Tela() {

        super("Paint - 2º Téc."); //texto da barra de titulo (1º comando)

        //2 - Construção e configuração dos objetos
        ctnTela = this.getContentPane();
        ctnTela.setLayout(new BorderLayout()); //definindo ctnTela como BorderLayout

        area = new AreaDesenho();
        ctnTela.add(area, BorderLayout.CENTER); //add area no centro do Container ctnTela

        ctnBotoes = new Container();
        ctnBotoes.setLayout(new GridLayout(6, 2, 2, 2)); //10 botoes cores + limpar + fechar 
        ctnTela.add(ctnBotoes, BorderLayout.EAST); //add ctnBotoes no LESTE do ctnTela

        lblBanner = new JLabel(new ImageIcon("banner.png"));
        ctnTela.add(lblBanner, BorderLayout.NORTH); //add lbl no norte do ctnTela

        btnWhite = new JButton();
        btnWhite.addActionListener(this); //tornar o botao 'funcional'
        btnWhite.setBackground(new Color(255, 250, 250)); //cor de fundo
        ctnBotoes.add(btnWhite);

        btnBlack = new JButton();
        btnBlack.addActionListener(this);
        btnBlack.setBackground(new Color(0, 0, 0)); //cor de fundo
        ctnBotoes.add(btnBlack);

        btnGreen = new JButton();
        btnGreen.addActionListener(this);
        btnGreen.setBackground(new Color(60, 179, 113)); //cor de fundo
        ctnBotoes.add(btnGreen);

        btnBlue = new JButton();
        btnBlue.addActionListener(this);
        btnBlue.setBackground(new Color(30, 144, 255)); //cor de fundo
        ctnBotoes.add(btnBlue);

        btnRed = new JButton();
        btnRed.addActionListener(this);
        btnRed.setBackground(new Color(205, 92, 92)); //cor de fundo
        ctnBotoes.add(btnRed);

        btnOrange = new JButton();
        btnOrange.addActionListener(this);
        btnOrange.setBackground(new Color(255, 140, 0)); //cor de fundo
        ctnBotoes.add(btnOrange);

        btnYellow = new JButton();
        btnYellow.addActionListener(this);
        btnYellow.setBackground(new Color(255, 215, 0)); //cor de fundo
        ctnBotoes.add(btnYellow);

        btnPurple = new JButton();
        btnPurple.addActionListener(this);
        btnPurple.setBackground(new Color(160, 32, 240)); //cor de fundo
        ctnBotoes.add(btnPurple);

        btnPink = new JButton();
        btnPink.addActionListener(this);
        btnPink.setBackground(new Color(255, 20, 147)); //cor de fundo
        ctnBotoes.add(btnPink);

        btnBrown = new JButton();
        btnBrown.addActionListener(this);
        btnBrown.setBackground(new Color(160, 82, 45)); //cor de fundo
        ctnBotoes.add(btnBrown);

        btnClear = new JButton("Limpar");
        btnClear.addActionListener(this);
        ctnBotoes.add(btnClear);

        btnClose = new JButton("X");
        btnClose.addActionListener(this);
        ctnBotoes.add(btnClose);

        //3 - configurações da janela
        this.setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);//encerra o processo java ao fechar a janela
        this.setSize(820, 480); //dimensoes da janela
        this.setResizable(false); //(des)habilitando redimensionamento
        this.setVisible(true); //tornando tela (in)visivel

    } //fechando construtor

    public void actionPerformed(ActionEvent evt) { //programação dos botoes
        if (evt.getSource() == btnWhite) {
            area.branco(); //tinta preta

        } else if (evt.getSource() == btnBlack) {
            area.preto(); //tinta vermelha

        } else if (evt.getSource() == btnBlue) {
            area.azul();

        } else if (evt.getSource() == btnGreen) {
            area.verde();

        } else if (evt.getSource() == btnRed) {
            area.vermelho();

        } else if (evt.getSource() == btnOrange) {
            area.laranja();

        } else if (evt.getSource() == btnYellow) {
            area.amarelo();

        } else if (evt.getSource() == btnPurple) {
            area.roxo();

        } else if (evt.getSource() == btnPink) {
            area.rosa();

        } else if (evt.getSource() == btnBrown) {
            area.marrom();

        } else if (evt.getSource() == btnClear) {
            area.clear();

        } else if (evt.getSource() == btnClose) {
            this.dispose(); //fecha a janela
        }

    }//fechando actionPerformed

}//fechando classe
