import javax.swing.*;
import java.awt.*;
import java.awt.event.*;


public class MainView extends JFrame implements ActionListener{
    
    //Declaração dos objetos
    public static Container ctnPrincipal, ctnTopo, ctnMenu;
    
    public static JDesktopPane dskJanelas;//área que permite a abertura de janelas internas
    
    public static JLabel lblBanner;
    
    public static JButton btnMenu[];
    public static String itensMenu[] = {"CLIENTES", "SALAS", "FILMES", "ELENCOS","SESSÕES", "INGRESSOS", "PRODUTOS", "PROMOÇÕES","USÚARIOS", "FECHAR"};
    
    public MainView(){
        
        super("Sistema de Gerenciamento");
        
        //Construção e Configuração dos objetos
        ctnPrincipal = new Container();
        ctnPrincipal.setLayout(new BorderLayout());
        this.add(ctnPrincipal);//add ctnPrincipal na janela
        
        ctnTopo = new Container();
        ctnTopo.setLayout(new GridLayout(2,1));
        ctnPrincipal.add(ctnTopo, BorderLayout.NORTH);
        
        ctnMenu = new Container ();
        ctnMenu.setLayout(new GridLayout(2,5));
        
        lblBanner = new JLabel(new ImageIcon(""));
        ctnTopo.add(lblBanner);//add banner na 1 linha
        ctnTopo.add(ctnMenu);//add menu na 2 linha
        
        
        btnMenu = new JButton [itensMenu.length];
        for(int i=0; i<itensMenu.length; i++){
         btnMenu[i] = new JButton (new ImageIcon("img/icons/" + i + ".png"));
         btnMenu[i].setBackground(Color.white);
         btnMenu[i].setToolTipText((itensMenu[i]));
         btnMenu[i].addActionListener(this);
         ctnMenu.add(btnMenu[i]);//add botoes no menu
         
    }
        
        dskJanelas = new JDesktopPane();
        ctnPrincipal.add(dskJanelas, BorderLayout.CENTER);//add dskJanelas no centro do principal
        
        this.setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
        this.setSize(getResolucao().width, getResolucao().height - 35);
        this.setVisible(true);
        
        
    }//fechando construtor
    
    public void actionPerformed(ActionEvent evt){
        if(evt.getSource() == btnMenu[2]){
            dskJanelas.add(new FilmesView());
        }
        if(evt.getSource() == btnMenu[3]){
            dskJanelas.add(new ElencosView());
        }
    }//fechando ActionPerformed
    

    public static Dimension getResolucao(){
        Toolkit info = Toolkit.getDefaultToolkit();
        Dimension res = info.getScreenSize();
       
        return res;
    }
    
}//fechando classe
