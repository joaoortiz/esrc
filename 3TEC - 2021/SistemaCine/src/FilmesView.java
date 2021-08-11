
import javax.swing.*;
import javax.swing.filechooser.*;
import java.io.*;
import java.nio.file.*;
import java.nio.channels.*;
import javax.swing.table.*;
import java.awt.*;
import java.awt.event.*;
import java.util.*;
import java.io.*;

public class FilmesView extends JInternalFrame implements ActionListener {

    public static Font fntLabels, fntTexto;

    public static Container ctnFilmes;

    public static JMenuBar mbrFilmes;
    public static JMenu mnuArquivo, mnuConsultas, mnuRelatorios, mnuAjuda;
    public static JMenuItem mniNovo, mniEditar, mniSalvar, mniFechar;
    public static JMenuItem mniCodigo, mniNome, mniAno;
    public static JMenuItem mniTop, mniVendas, mniCaixa;
    public static JMenuItem mniSobre;

    public static String[] strAtrib = {"Código de Identificação: ", "Título Original: ",
        "Título Traduzido: ", "Ano de Lançamento: ",
        "Classificação Etária: ", "Duração: ",
        "Gênero: ", "Sinopse: ", "Imagem: "};
    public static String[] strClass = {"0 - Livre", "10 - Anos", "14 - Anos", "16 - Anos", "18 - Anos"};
    public static String[] strGeneros = new String[8];

    public static JLabel lblAtrib[];
    public static JTextField txtId, txtTituloOrig, txtTituloTrad, txtAno, txtDuracao;
    public static JComboBox cmbClassificacao, cmbGenero;

    public static JScrollPane scrSinopse;
    public static JTextArea txaSinopse;

    public static FileChannel flcOrigem, flcDestino;
    public static FileInputStream flsEntrada;
    public static FileOutputStream flsSaida;

    public static ImageIcon icnImagem, icnAtor1, icnAtor2;
    public static JLabel lblImagem, lblElenco, lblAtor1, lblAtor2;
    public static JLabel lblNomeAtor1, lblNomeAtor2;

    public static String[] strColunas = {"ID", "Título", "Ano", "Classificação"};
    public static JScrollPane scrFilmes, scrSalasFilmes, scrHorarios;
    public static JTable tblFilmes, tblSalasFilmes, tblHorarios;
    public static DefaultTableModel mdlFilmes, mdlSalasFilmes, mdlHorarios;

    public static JLabel lblPesquisa;
    public static JTextField txtPesquisa;

    public static JButton btnEditar, btnNovo, btnSalvar, btnExcluir, btnGeneros;

    public static java.util.List<FilmesVO> lista = new ArrayList<FilmesVO>();
    public static String camOrig, nomeOrig, camDest;
    public static int statusFoto;
    public static boolean liberaImagem = false;

    public FilmesView() {

        super("Módulo de Gerenciamento de Filmes");

        fntLabels = new Font("Arial", Font.PLAIN, 20);

        ctnFilmes = new Container();
        ctnFilmes.setLayout(null);
        this.add(ctnFilmes);

        mbrFilmes = new JMenuBar();
        this.setJMenuBar(mbrFilmes);

        mnuArquivo = new JMenu("Arquivo");
        mnuArquivo.setMnemonic('a');
        mbrFilmes.add(mnuArquivo);

        mnuConsultas = new JMenu("Consultas");
        mnuConsultas.setMnemonic('c');
        mbrFilmes.add(mnuConsultas);

        mnuRelatorios = new JMenu("Relatórios");
        mnuRelatorios.setMnemonic('r');
        mbrFilmes.add(mnuRelatorios);

        mnuAjuda = new JMenu("Ajuda");
        mnuAjuda.setMnemonic('j');
        mbrFilmes.add(mnuAjuda);

        mniNovo = new JMenuItem("Novo Filme");
        mniNovo.addActionListener(this);
        mnuArquivo.add(mniNovo);

        mniEditar = new JMenuItem("Editar dados do Filme");
        mniEditar.addActionListener(this);
        mnuArquivo.add(mniEditar);

        mniSalvar = new JMenuItem("Salvar Registro");
        mniSalvar.addActionListener(this);
        mnuArquivo.add(mniSalvar);

        mnuArquivo.add(new JSeparator());

        mniFechar = new JMenuItem("Fechar janela");
        mniFechar.addActionListener(this);
        mnuArquivo.add(mniFechar);

        mniCodigo = new JMenuItem("por Código");
        mniCodigo.addActionListener(this);
        mnuConsultas.add(mniCodigo);

        mniNome = new JMenuItem("por Título");
        mniNome.addActionListener(this);
        mnuConsultas.add(mniNome);

        mniAno = new JMenuItem("por Ano de Lançamento");
        mniAno.addActionListener(this);
        mnuConsultas.add(mniAno);

        mniTop = new JMenuItem("Filmes mais vistos");
        mniTop.addActionListener(this);
        mnuRelatorios.add(mniTop);

        mniVendas = new JMenuItem("Visualizar vendas");
        mniVendas.addActionListener(this);
        mnuRelatorios.add(mniVendas);

        mnuRelatorios.add(new JSeparator());

        mniCaixa = new JMenuItem("Caixa");
        mniCaixa.addActionListener(this);
        mnuRelatorios.add(mniCaixa);

        mniSobre = new JMenuItem("Sobre Sistema Cine 1.0");
        mniSobre.addActionListener(this);
        mnuAjuda.add(mniSobre);

        lblAtrib = new JLabel[9];
        for (int i = 0; i < lblAtrib.length - 1; i++) {
            lblAtrib[i] = new JLabel(strAtrib[i]);
            lblAtrib[i].setFont(fntLabels);
            lblAtrib[i].setBounds(10, 60 + (i * 50), 250, 25);
            ctnFilmes.add(lblAtrib[i]);
        }

        txtId = new JTextField("");
        txtId.setBounds(240, 60, 210, 25);
        ctnFilmes.add(txtId);

        txtTituloOrig = new JTextField("");
        txtTituloOrig.setBounds(150, 110, 300, 25);
        ctnFilmes.add(txtTituloOrig);

        txtTituloTrad = new JTextField("");
        txtTituloTrad.setBounds(170, 160, 280, 25);
        ctnFilmes.add(txtTituloTrad);

        txtAno = new JTextField("");
        txtAno.setBounds(210, 210, 240, 25);
        ctnFilmes.add(txtAno);

        txtDuracao = new JTextField("");
        txtDuracao.setBounds(110, 310, 340, 25);
        ctnFilmes.add(txtDuracao);

        txaSinopse = new JTextArea();
        txaSinopse.setLineWrap(true);
        txaSinopse.setWrapStyleWord(true);
        scrSinopse = new JScrollPane(txaSinopse);
        scrSinopse.setBounds(10, 450, 690, 240);
        ctnFilmes.add(scrSinopse);

        cmbClassificacao = new JComboBox(strClass);
        cmbClassificacao.setBounds(210, 260, 240, 25);
        ctnFilmes.add(cmbClassificacao);

        //PROGRAMAR AQUI
        try {
            java.util.List<GenerosVO> listaG = new ArrayList<GenerosVO>();
            listaG = FilmesDAO.listarGeneros();

            int cont = 0;
            for (GenerosVO tmpGenero : listaG) {
                strGeneros[cont] = tmpGenero.getNome();
                cont++;
            }

        } catch (Exception erro) {
            JOptionPane.showMessageDialog(null, erro.getMessage());
        }

        cmbGenero = new JComboBox(strGeneros);
        cmbGenero.setBounds(110, 360, 340, 25);
        ctnFilmes.add(cmbGenero);

        icnImagem = new ImageIcon("");
        lblImagem = new JLabel(icnImagem);
        lblImagem.setBounds(480, 60, 216, 320);
        ctnFilmes.add(lblImagem);

        //Rotina da inserção da foto
        lblImagem.addMouseListener(new MouseAdapter() {
            public void mouseClicked(MouseEvent evt) {
                if (liberaImagem) {
                    selecionarImagem();
                }

            }
        }
        );

        lblElenco = new JLabel("-- Elenco -- ");
        lblElenco.setBounds(890, 410, 160, 25);
        lblElenco.setFont(fntLabels);
        ctnFilmes.add(lblElenco);

        icnAtor1 = new ImageIcon("");
        lblAtor1 = new JLabel(icnAtor1);
        lblAtor1.setBounds(730, 450, 190, 240);
        ctnFilmes.add(lblAtor1);

        lblNomeAtor1 = new JLabel("");
        lblNomeAtor1.setBounds(730, 680, 190, 50);
        ctnFilmes.add(lblNomeAtor1);

        icnAtor2 = new ImageIcon("");
        lblAtor2 = new JLabel(icnAtor2);
        lblAtor2.setBounds(950, 450, 190, 240);
        ctnFilmes.add(lblAtor2);

        lblNomeAtor2 = new JLabel("");
        lblNomeAtor2.setBounds(960, 680, 190, 50);
        ctnFilmes.add(lblNomeAtor2);

        tblFilmes = new JTable();
        scrFilmes = new JScrollPane(tblFilmes);
        mdlFilmes = (DefaultTableModel) tblFilmes.getModel();
        scrFilmes.setBounds(730, 110, 650, 275);
        ctnFilmes.add(scrFilmes);

        tblFilmes.addMouseListener(new MouseAdapter() {
            public void mouseClicked(MouseEvent evt) {
                int idFilme = Integer.parseInt(tblFilmes.getValueAt(tblFilmes.getSelectedRow(), 0).toString());
                System.out.println(idFilme);

                try {
                    FilmesVO tmpFilme = FilmesDAO.consultarFilme(idFilme);
                    java.util.List<AtoresVO> tmpAtores = FilmesDAO.listarElenco(idFilme);
                    carregarCampos(tmpFilme, tmpAtores);
                    carregarListaSalas(idFilme);

                } catch (Exception erro) {
                    JOptionPane.showMessageDialog(null, erro.getMessage());
                }
            }
        }
        );

        for (int i = 0; i < strColunas.length; i++) {
            mdlFilmes.addColumn(strColunas[i]);
        }

        carregarLista();

        lblPesquisa = new JLabel("Busca rápida: ");
        lblPesquisa.setFont(fntLabels);
        lblPesquisa.setBounds(730, 60, 200, 25);
        ctnFilmes.add(lblPesquisa);

        txtPesquisa = new JTextField();
        txtPesquisa.setBounds(860, 60, 520, 25);
        ctnFilmes.add(txtPesquisa);

        txtPesquisa.addKeyListener(new KeyAdapter() {
            public void keyPressed(KeyEvent evt) {

                try {
                    
                    while(mdlFilmes.getRowCount() > 0){
                        mdlFilmes.removeRow(0);
                    }

                    lista = FilmesDAO.listarFilmes(1, txtPesquisa.getText(), 0);

                    for (FilmesVO tmpFilme : lista) {
                        String dados[] = new String[4];
                        dados[0] = "" + tmpFilme.getId();
                        dados[1] = tmpFilme.getTituloTrad();
                        dados[2] = "" + tmpFilme.getAno();
                        dados[3] = "" + tmpFilme.getClassificacao();

                        mdlFilmes.addRow(dados);
                    }
                } catch (Exception erro) {
                    JOptionPane.showMessageDialog(null, erro.getMessage());
                }

            }
        }
        );

        btnGeneros = new JButton("Gênero");

        btnGeneros.setBounds(1400, 60, 150, 25);
        ctnFilmes.add(btnGeneros);

        String strSalas[] = {"Sala", "Poltronas"};

        tblSalasFilmes = new JTable();
        scrSalasFilmes = new JScrollPane(tblSalasFilmes);
        mdlSalasFilmes = (DefaultTableModel) tblSalasFilmes.getModel();

        scrSalasFilmes.setBounds(
                1400, 110, 150, 275);
        ctnFilmes.add(scrSalasFilmes);

        for (int i = 0;
                i < strSalas.length;
                i++) {
            mdlSalasFilmes.addColumn(strSalas[i]);
        }

        String strHorarios[] = {"Data", "Hora", "Número da sala"};
        tblHorarios = new JTable();
        scrHorarios = new JScrollPane(tblHorarios);
        mdlHorarios = (DefaultTableModel) tblHorarios.getModel();

        scrHorarios.setBounds(
                1200, 410, 350, 150);
        ctnFilmes.add(scrHorarios);

        for (int i = 0;
                i < strHorarios.length;
                i++) {
            mdlHorarios.addColumn(strHorarios[i]);
        }

        btnNovo = new JButton("Novo Filme");

        btnNovo.addActionListener(
                this);
        btnNovo.setBounds(
                1345, 580, 200, 35);
        ctnFilmes.add(btnNovo);

        btnEditar = new JButton("Editar Dados");

        btnEditar.addActionListener(
                this);
        btnEditar.setBounds(
                1345, 630, 200, 35);
        ctnFilmes.add(btnEditar);

        btnSalvar = new JButton("Salvar");

        btnSalvar.addActionListener(
                this);
        btnSalvar.setBounds(
                1345, 680, 200, 35);
        ctnFilmes.add(btnSalvar);

        desbloquearCampos(
                false);

        this.setSize(
                1620, MainView.dskJanelas.getHeight());

        this.setVisible(
                true);

    }//fechando construtor

    public void actionPerformed(ActionEvent evt) {
        if (evt.getSource() == btnNovo) {
            limparCampos();
            desbloquearCampos(true);
            txtId.setEditable(false);
            liberaImagem = true;
            try {
                txtId.setText("" + FilmesDAO.gerarId());
            } catch (Exception erro) {
                JOptionPane.showMessageDialog(null, erro.getMessage());
            }
        } else if (evt.getSource() == btnSalvar) {
            FilmesVO tmpFilme = preencherObjeto();

            try {
                boolean status = FilmesDAO.cadastrarFilme(tmpFilme);

                //salvar a foto
                int ultimoPonto = nomeOrig.lastIndexOf(".");//pegando a posição do ultimo ponto
                String extensao = nomeOrig.substring(ultimoPonto + 1, nomeOrig.length());
                camDest = "img\\" + nomeOrig;

                flsEntrada = new FileInputStream(camOrig);
                flsSaida = new FileOutputStream(camDest);

                flcOrigem = flsEntrada.getChannel();
                flcDestino = flsSaida.getChannel();

                //cópia total do arquivo
                flcOrigem.transferTo(0, flcOrigem.size(), flcDestino);

                flcOrigem.close();
                flcDestino.close();

                if (status) {
                    JOptionPane.showMessageDialog(null, "Filme Cadastrado");
                    //limparCampos();
                    desbloquearCampos(false);
                    
                    carregarLista();
                    
                    
                }
                
                

            } catch (Exception erro) {
                JOptionPane.showMessageDialog(null, erro.getMessage());
            }

        }
    }

    public static FilmesVO preencherObjeto() {
        FilmesVO tmpFilme = new FilmesVO();

        tmpFilme.setId(Integer.parseInt(txtId.getText()));
        tmpFilme.setTituloOrig(txtTituloOrig.getText());
        tmpFilme.setTituloTrad(txtTituloTrad.getText());
        tmpFilme.setAno(Integer.parseInt(txtAno.getText()));
        tmpFilme.setDuracao(Integer.parseInt(txtDuracao.getText()));
        tmpFilme.setSinopse(txaSinopse.getText());
        
        tmpFilme.setIdGenero(cmbGenero.getSelectedIndex()+1);

        String idade = cmbClassificacao.getSelectedItem().toString();
        String auxIdade[] = idade.split("-");
        int classEtaria = Integer.parseInt(auxIdade[0].trim());
        tmpFilme.setClassificacao(classEtaria);
        tmpFilme.setImagem(nomeOrig);

        return tmpFilme;
    }

    public static void carregarLista() {

        while (mdlFilmes.getRowCount() > 0) {
            mdlFilmes.removeRow(0);
        }

        try {

            lista = FilmesDAO.listarFilmes(0, null, 0);

            for (FilmesVO tmpFilme : lista) {
                String dados[] = new String[4];
                dados[0] = "" + tmpFilme.getId();
                dados[1] = tmpFilme.getTituloTrad();
                dados[2] = "" + tmpFilme.getAno();
                dados[3] = "" + tmpFilme.getClassificacao();

                mdlFilmes.addRow(dados);
        

            }

        } catch (Exception erro) {
            JOptionPane.showMessageDialog(null, erro.getMessage());
        }
        
        
        
    }

    public static void carregarListaSalas(int tmpIdFilme) {

        while (mdlSalasFilmes.getRowCount() > 0) {
            mdlSalasFilmes.removeRow(0);
        }
        while (mdlHorarios.getRowCount() > 0) {
            mdlHorarios.removeRow(0);
        }
        try {

            java.util.List<SalasVO> lista = FilmesDAO.listarSalas(tmpIdFilme);
            java.util.List<SessoesVO> listaSS = FilmesDAO.listarSessoes(tmpIdFilme);

            for (SalasVO tmpSala : lista) {
                String dados[] = new String[2];

                dados[0] = "" + tmpSala.getId();
                dados[1] = "" + tmpSala.getQtdePoltronas();

                mdlSalasFilmes.addRow(dados);
            }

            for (SessoesVO tmpSessoes : listaSS) {
                String dadosSS[] = new String[3];

                dadosSS[0] = "" + corrigirData(tmpSessoes.getData());
                dadosSS[1] = "" + tmpSessoes.getHora();
                dadosSS[2] = "" + tmpSessoes.getIdSala();

                mdlHorarios.addRow(dadosSS);
            }

        } catch (Exception erro) {
            JOptionPane.showMessageDialog(null, erro.getMessage());
        }
    }

    public static void carregarCampos(FilmesVO tmpFilme, java.util.List<AtoresVO> tmpAtores) {
        txtId.setText("" + tmpFilme.getId());
        txtTituloOrig.setText(tmpFilme.getTituloOrig());
        txtTituloTrad.setText(tmpFilme.getTituloTrad());
        txtAno.setText("" + tmpFilme.getAno());
        txtDuracao.setText(tmpFilme.getDuracao() + " min.");
        txaSinopse.setText(tmpFilme.getSinopse());
        cmbGenero.setSelectedIndex(tmpFilme.getIdGenero() - 1);
        cmbClassificacao.setSelectedItem(tmpFilme.getClassificacao());
        lblImagem.setIcon(new ImageIcon("img/" + tmpFilme.getImagem()));

        int contAtor = 1;
        
        if(tmpAtores.isEmpty()){
                   lblAtor1.setIcon(new ImageIcon("img/actor.png"));
                   lblAtor2.setIcon(new ImageIcon("img/actor.png"));
        }else{
        
        for (AtoresVO atual : tmpAtores) {
            if (contAtor == 1) {
                lblAtor1.setIcon(new ImageIcon("img/" + atual.getImagem()));
            } else if (contAtor == 2) {
                lblAtor2.setIcon(new ImageIcon("img/" + atual.getImagem()));
            }
            contAtor++;
        }
        }

    }

    public static void limparCampos() {

        txtId.setText("");
        txtTituloOrig.setText("");
        txtTituloTrad.setText("");
        txtAno.setText("");
        txtDuracao.setText("");
        cmbClassificacao.setSelectedIndex(0);
        cmbGenero.setSelectedIndex(0);
        txaSinopse.setText("");

        lblImagem.setIcon(new ImageIcon("img/icons/plus.png"));
        lblAtor1.setIcon(new ImageIcon(""));
        lblAtor2.setIcon(new ImageIcon(""));

        lblNomeAtor1.setText("");
        lblNomeAtor2.setText("");

    }

    public static void desbloquearCampos(boolean tmpStatus) {
        txtId.setEditable(tmpStatus);
        txtTituloOrig.setEditable(tmpStatus);
        txtTituloTrad.setEditable(tmpStatus);
        txtAno.setEditable(tmpStatus);
        txtDuracao.setEditable(tmpStatus);
        cmbClassificacao.setEnabled(tmpStatus);
        cmbGenero.setEnabled(tmpStatus);
        txaSinopse.setEditable(tmpStatus);
    }

    public void selecionarImagem() {
        JFileChooser flcImagem = new JFileChooser("D:\\PHP");
        FileNameExtensionFilter filtro = new FileNameExtensionFilter("Arquivos de imagem (*.png,*.jpg)", "png", "jpg", "jpeg");
        flcImagem.setFileFilter(filtro);

        statusFoto = flcImagem.showOpenDialog(this);

        camOrig = flcImagem.getSelectedFile().getPath();
        nomeOrig = flcImagem.getSelectedFile().getName();

        lblImagem.setIcon(new ImageIcon(camOrig));

        //System.out.println(camOrig + "\\" + nomeOrig);
    }

    public static String corrigirData(String tmpData) {

        String aux[] = tmpData.split("-");

        String novaData = aux[2] + "/" + aux[1] + "/" + aux[0];
        return novaData;

    }

}//fechando classe
