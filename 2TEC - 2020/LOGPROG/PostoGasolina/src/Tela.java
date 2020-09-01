import javax.swing.*;
import javax.swing.table.*;
import java.awt.*;
import java.awt.event.*;
import java.util.*;
import java.io.*;

public class Tela extends JFrame implements ActionListener {

    public static Container ctnTela, ctnBotoes, ctnCombustivel, ctnFim, ctnDados;

    public static JButton btnDiesel, btnEtaComum,
            btnEtaAd, btnGasoComum, btnGasoAd, btnGNV, btnOleo, btnAgua, btnDucha, btnSuco,
            btnAlinhamento, btnRefrigerante, btnCalibragem, btnPao, btnOK, btnRemover;

    public static JLabel lblBanner, lblCombustivel, lblServicos, lblConveniencia, lblTotal;

    public static JTextField txtTotal;

    public static JScrollPane scrItens;
    public static JTable tblItens;
    public static DefaultTableModel mdlItens;

    public static java.util.List<Item> lista = new ArrayList<Item>();
    public static int idItem, idAtend = 1;

    public Tela() {
        super("Gerenciamento do posto");

        ctnTela = new Container();
        ctnTela.setLayout(new BorderLayout());
        this.add(ctnTela);

        ctnBotoes = new Container();
        ctnBotoes.setLayout(new GridLayout(5, 3, 20, 5));
        ctnTela.add(ctnBotoes, BorderLayout.SOUTH);

        ctnCombustivel = new Container();
        ctnCombustivel.setLayout(new GridLayout(7, 1, 5, 5));
        ctnTela.add(ctnCombustivel, BorderLayout.WEST);

        ctnFim = new Container();
        ctnFim.setLayout(new GridLayout(2, 1, 5, 5));
        ctnTela.add(ctnFim, BorderLayout.EAST);

        ctnDados = new Container();
        ctnDados.setLayout(null);
        ctnTela.add(ctnDados, BorderLayout.CENTER);

        lblTotal = new JLabel("Total a pagar: ");
        lblTotal.setFont(new Font("Arial", Font.PLAIN, 30));
        lblTotal.setBounds(20, 15, 300, 35);
        ctnDados.add(lblTotal);

        txtTotal = new JTextField("0.00");
        txtTotal.setFont(new Font("Tahoma", Font.PLAIN, 30));
        txtTotal.setBounds(20, 55, 350, 35);
        ctnDados.add(txtTotal);

        tblItens = new JTable(); //tabela
        scrItens = new JScrollPane(tblItens); //barra de rolagem
        mdlItens = (DefaultTableModel) tblItens.getModel(); //dados da tabela

        String topo[] = {"ID", "Nome", "Qtde", "Valor"};
        for (int i = 0; i < 4; i++) {
            mdlItens.addColumn(topo[i]);
        }

        scrItens.setBounds(20, 105, 350, 200);
        ctnDados.add(scrItens);

        lblBanner = new JLabel(new ImageIcon("banner.png"));
        ctnTela.add(lblBanner, BorderLayout.NORTH);

        btnOK = new JButton(new ImageIcon("confirmar.png"));
        btnOK.addActionListener(this);
        btnOK.setBackground(new Color(255, 255, 255));
        ctnFim.add(btnOK);

        btnRemover = new JButton(new ImageIcon("remover.png"));
        btnRemover.setBackground(new Color(255, 255, 255));
        ctnFim.add(btnRemover);

        lblCombustivel = new JLabel(new ImageIcon("combustivel.png"));
        lblCombustivel.setBackground(new Color(255, 236, 139));
        ctnCombustivel.add(lblCombustivel);

        btnDiesel = new JButton("Diesel");
        btnDiesel.addActionListener(this);
        btnDiesel.setBackground(new Color(220, 220, 220));
        ctnCombustivel.add(btnDiesel);

        btnEtaComum = new JButton("Etanol Comum");
        btnEtaComum.addActionListener(this);
        btnEtaComum.setBackground(new Color(220, 220, 220));
        ctnCombustivel.add(btnEtaComum);

        btnEtaAd = new JButton("Etanol Aditivado");
        btnEtaAd.addActionListener(this);
        btnEtaAd.setBackground(new Color(220, 220, 220));
        ctnCombustivel.add(btnEtaAd);

        btnGasoComum = new JButton("Gasolina Comum");
        btnGasoComum.addActionListener(this);
        btnGasoComum.setBackground(new Color(220, 220, 220));
        ctnCombustivel.add(btnGasoComum);

        btnGasoAd = new JButton("Gasolina Aditivada");
        btnGasoAd.addActionListener(this);
        btnGasoAd.setBackground(new Color(220, 220, 220));
        ctnCombustivel.add(btnGasoAd);

        btnGNV = new JButton("GNV");
        btnGNV.addActionListener(this);
        btnGNV.setBackground(new Color(220, 220, 220));
        ctnCombustivel.add(btnGNV);

        lblServicos = new JLabel(new ImageIcon("servicos.png"));
        lblServicos.setBackground(new Color(255, 236, 139));
        ctnBotoes.add(lblServicos);

        lblConveniencia = new JLabel(new ImageIcon("conveniencia.png"));
        lblConveniencia.setBackground(Color.red);
        ctnBotoes.add(lblConveniencia);

        btnOleo = new JButton("Troca de óleo");
        btnOleo.addActionListener(this);
        btnOleo.setBackground(new Color(220, 220, 220));
        ctnBotoes.add(btnOleo);

        btnAgua = new JButton("Água");
        btnAgua.addActionListener(this);
        btnAgua.setBackground(new Color(220, 220, 220));
        ctnBotoes.add(btnAgua);

        btnDucha = new JButton("Ducha Simples");
        btnDucha.addActionListener(this);
        btnDucha.setBackground(new Color(220, 220, 220));
        ctnBotoes.add(btnDucha);

        btnSuco = new JButton("Suco");
        btnSuco.addActionListener(this);
        btnSuco.setBackground(new Color(220, 220, 220));
        ctnBotoes.add(btnSuco);

        btnAlinhamento = new JButton("Alinhamento dos pneus");
        btnAlinhamento.addActionListener(this);
        btnAlinhamento.setBackground(new Color(220, 220, 220));
        ctnBotoes.add(btnAlinhamento);

        btnRefrigerante = new JButton("Refrigerante");
        btnRefrigerante.addActionListener(this);
        btnRefrigerante.setBackground(new Color(220, 220, 220));
        ctnBotoes.add(btnRefrigerante);

        btnCalibragem = new JButton("Calibragem dos pneus");
        btnCalibragem.addActionListener(this);
        btnCalibragem.setBackground(new Color(220, 220, 220));
        ctnBotoes.add(btnCalibragem);

        btnPao = new JButton("Pão de queijo");
        btnPao.addActionListener(this);
        btnPao.setBackground(new Color(220, 220, 220));
        ctnBotoes.add(btnPao);

        this.setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
        this.setLocationRelativeTo(null);
        this.setSize(700, 600);
        this.setResizable(false);
        this.setVisible(true);

    }//fechando construtor

    public void actionPerformed(ActionEvent evt) {

        if (evt.getSource() == btnDiesel) { //se clicar no 'diesel'
            registrarCombustivel(0);
        }//fechando diesel
        else if (evt.getSource() == btnEtaComum) { //se clicar no 'Et. comum'
            registrarCombustivel(1);
        }//fechando Et. comum
        else if (evt.getSource() == btnEtaAd) { //se clicar no 'et. adiv'
            registrarCombustivel(2);
        }//fechando et. adiv
        else if (evt.getSource() == btnGasoComum) { //se clicar no 'gas. comum'
            registrarCombustivel(3);
        }//fechando gas. comum
        else if (evt.getSource() == btnGasoAd) { //se clicar no 'Gaso. adit.'
            registrarCombustivel(4);
        }//fechando Gaso. adit
        else if (evt.getSource() == btnGNV) {
            registrarCombustivel(5);
        } else if (evt.getSource() == btnOleo) {
            registrarItem(6);
        } else if (evt.getSource() == btnDucha) {
            registrarItem(7);
        } else if (evt.getSource() == btnAlinhamento) {
            registrarItem(8);
        } else if (evt.getSource() == btnCalibragem) {
            registrarItem(9);
        } else if (evt.getSource() == btnAgua) {
            registrarItem(10);
        } else if (evt.getSource() == btnSuco) {
            registrarItem(11);
        } else if (evt.getSource() == btnRefrigerante) {
            registrarItem(12);
        } else if (evt.getSource() == btnPao) {
            registrarItem(13);
        }else if(evt.getSource() == btnOK){
            String cpf = JOptionPane.showInputDialog("Entre com o CPF");            
            gravarNota(idAtend + "_" + cpf);            
        }
        
    }//fechando actionPerformed
    
    public static void gravarNota(String tmpNomeArquivo){
        
        String texto = "*******POSTO - 2TI*******\r\n\r\n";
        texto+= "Av. Bras Leme, 221 - Casa Verde\r\n";
        texto+= "São Paulo - SP\r\n\r\n";
        texto+= "------------------------------\r\n\r\n";
        texto+= "Detalhes da Compra\r\n\r\n";
        
        for (Item tmp : lista) {
            String dados[] = new String[4];
            dados[0] = "" + tmp.getId();
            dados[1] = "" + tmp.getNome();
            dados[2] = "" + tmp.getQtde();
            dados[3] = "" + tmp.getValor();

            texto+= dados[1] + "   " + dados[2] + "   " + dados[3] + "\r\n";
        }
        
        texto+= "\r\n";
        texto+= "Total a pagar: R$ " + Control.objVenda.total + "\r\n\r\n";
        texto+= "------------------------------\r\n\r\n";
        texto+= "Agradecemos a preferência.";
        
        //Criar o arquivo txt, com o conteudo e gravação em disco
        
        try{//tentar
         FileWriter arquivo = new FileWriter("docs\\" + "NF" + tmpNomeArquivo);
         PrintWriter dados = new PrintWriter(arquivo);
         
         dados.write(texto);//escrevendo no arquivo (conteudo)
         arquivo.close();//fechando o arquivo
         
         Runtime.getRuntime().exec("notepad docs\\" + "NF" + tmpNomeArquivo);
            
        }catch(Exception erro){ //'se nao der'
            JOptionPane.showMessageDialog(null, "Falha na gravação do arquivo.\n Erro Original: " + erro.getMessage());            
        }
        
    }

    public static void atualizarTabela() {

        //limpando tabela
        while (mdlItens.getRowCount() > 0) {
            mdlItens.removeRow(0);
        }

        //add novos itens
        float total = 0;
        for (Item tmp : lista) {
            String dados[] = new String[4];
            dados[0] = "" + tmp.getId();
            dados[1] = "" + tmp.getNome();
            dados[2] = "" + tmp.getQtde();
            dados[3] = "" + tmp.getValor();

            mdlItens.addRow(dados);            
            total += tmp.getValor();
        }
        
        Control.objVenda.total = total;
        txtTotal.setText("R$" + Control.objVenda.total);

    }//fechando atualizar tabela

    public static void registrarCombustivel(int idItem) {

        float abast = Float.parseFloat(JOptionPane.showInputDialog("Entre com o valor do abastecimento:"));
        float litros = abast / Control.objVenda.valorItens[idItem];

        Item tmpItem = new Item();
        tmpItem.setId(idItem);
        tmpItem.setNome(Control.objVenda.nomeItens[idItem]);
        tmpItem.setQtde(litros);
        tmpItem.setValor(abast);

        lista.add(tmpItem); //jogando elemento na lista de compras

        //inserir na tabela (visual)
        atualizarTabela();
    }

    public static void registrarItem(int idItem) {

        boolean achou = false;

        for (Item itemAtual : lista) {
            if (idItem == itemAtual.getId()) {
                achou = true;
                itemAtual.setQtde(itemAtual.getQtde() + 1);
                itemAtual.setValor(Control.objVenda.valorItens[idItem] * itemAtual.getQtde());
                break;
            }
        }

        if (achou == false) {
            Item tmpItem = new Item();
            tmpItem.setId(idItem);
            tmpItem.setNome(Control.objVenda.nomeItens[idItem]);
            tmpItem.setQtde(1);
            tmpItem.setValor(Control.objVenda.valorItens[idItem]);
            lista.add(tmpItem); //jogando elemento na lista de compras
        }

        atualizarTabela();
    }

}//fechando classe

