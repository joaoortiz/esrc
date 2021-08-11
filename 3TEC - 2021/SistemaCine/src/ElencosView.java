
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

public class ElencosView extends JInternalFrame implements ActionListener {

    public static Font fntLabels, fntTexto;

    public static Container ctnElencos;

    public static FileChannel flcOrigem, flcDestino;
    public static FileInputStream flsEntrada;
    public static FileOutputStream flsSaida;

    public static JLabel lblNome, lblImagem;
    public static JTextField txtNome;
    public static JButton btnImagem, btnCadastrar;
    public static ImageIcon imgAtor;

    public static String[] strColAtores = {"ID", "Nome"};
    public static String[] strColFilmes = {"ID", "Titulo", "Ano", "Classificação"};
    public static JScrollPane scrAtores, scrFilmes;
    public static JTable tblAtores, tblFilmes;
    public static DefaultTableModel mdlFilmes, mdlAtores;

    public static java.util.List<FilmesVO> listaF = new ArrayList<FilmesVO>();
    public static java.util.List<AtoresVO> listaA = new ArrayList<AtoresVO>();

    public static String camOrig, nomeOrig, camDest;
    public static int statusFoto;
    public static boolean liberaImagem = false;

    public ElencosView() {

        super("Gerenciamento dos Elencos");

        fntLabels = new Font("Arial", Font.PLAIN, 20);

        ctnElencos = new Container();
        ctnElencos.setLayout(null);
        this.add(ctnElencos);

        lblNome = new JLabel("Nome do ator/atriz:");
        lblNome.setBounds(10, 60, 210, 25);
        ctnElencos.add(lblNome);

        txtNome = new JTextField("");
        txtNome.setBounds(150, 60, 210, 25);
        ctnElencos.add(txtNome);

        lblImagem = new JLabel(new ImageIcon("img/icons/plus.png"));
        imgAtor = new ImageIcon("");
        lblImagem.setBounds(10, 95, 216, 320);
        ctnElencos.add(lblImagem);

        btnImagem = new JButton("Selecionar Imagem");
        btnImagem.addActionListener(this);
        btnImagem.setBounds(10, 400, 216, 30);
        ctnElencos.add(btnImagem);

        btnCadastrar = new JButton("Cadastrar Ator");
        btnCadastrar.addActionListener(this);
        btnCadastrar.setBounds(10, 440, 216, 30);
        ctnElencos.add(btnCadastrar);

        tblAtores = new JTable();
        scrAtores = new JScrollPane(tblAtores);
        mdlAtores = (DefaultTableModel) tblAtores.getModel();
        scrAtores.setBounds(530, 110, 300, 275);
        ctnElencos.add(scrAtores);

        for (int i = 0; i < strColAtores.length; i++) {
            mdlAtores.addColumn(strColAtores[i]);
        }

        tblFilmes = new JTable();
        scrFilmes = new JScrollPane(tblFilmes);
        mdlFilmes = (DefaultTableModel) tblFilmes.getModel();
        scrFilmes.setBounds(850, 110, 450, 275);
        ctnElencos.add(scrFilmes);

        for (int i = 0; i < strColFilmes.length; i++) {
            mdlFilmes.addColumn(strColFilmes[i]);
        }

        carregarListas();
        this.setSize(1620, MainView.dskJanelas.getHeight());
        this.setVisible(true);

    }

    public void actionPerformed(ActionEvent evt) {

        if (evt.getSource() == btnImagem) {
            JFileChooser flcImagem = new JFileChooser("D:\\PHP");
            FileNameExtensionFilter filtro = new FileNameExtensionFilter("Arquivos de imagem (*.png,*.jpg)", "png", "jpg", "jpeg");
            flcImagem.setFileFilter(filtro);

            statusFoto = flcImagem.showOpenDialog(this);

            camOrig = flcImagem.getSelectedFile().getPath();
            nomeOrig = flcImagem.getSelectedFile().getName();

            lblImagem.setIcon(new ImageIcon(camOrig));
        }

        if (evt.getSource() == btnCadastrar) {
            AtoresVO tmpAtor = preencherObjeto();

            try {
                AtoresDAO.cadastrarAtor(tmpAtor);

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

             
                    JOptionPane.showMessageDialog(null, "Ator Cadastrado");
                    //limparCampos();
                    //desbloquearCampos(false);

                    carregarListas();

             

            } catch (Exception erro) {
                JOptionPane.showMessageDialog(null, erro.getMessage());
            }

        }

    }

    public static void carregarListas() {

        while (mdlFilmes.getRowCount() > 0) {
            mdlFilmes.removeRow(0);
        }

        try {

            listaF = FilmesDAO.listarFilmes(0, null, 0);

            for (FilmesVO tmpFilme : listaF) {
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

        while (mdlAtores.getRowCount() > 0) {
            mdlAtores.removeRow(0);
        }

        try {

            listaA = AtoresDAO.listarAtores(0, null, 0);

            for (AtoresVO tmpAtor : listaA) {
                String dados[] = new String[4];
                dados[0] = "" + tmpAtor.getId();
                dados[1] = tmpAtor.getNome();

                mdlAtores.addRow(dados);

            }

        } catch (Exception erro) {
            JOptionPane.showMessageDialog(null, erro.getMessage());
        }

    }

    public static AtoresVO preencherObjeto() {
        AtoresVO tmpAtor = new AtoresVO();

        tmpAtor.setNome(txtNome.getText());
        tmpAtor.setImagem(nomeOrig);

        return tmpAtor;
    }

}
