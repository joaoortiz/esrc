import javax.swing.*; //elementos graficos
import java.awt.*;  //container


public class LoadView extends JFrame {
    
    public static Container ctnLoad;
    public static JLabel lblLoad;
    public static ImageIcon imgLoad;
    
     public LoadView(){
        
         super("");
         
         ctnLoad = new Container();
         ctnLoad.setLayout(null);
         this.add (ctnLoad);
         
         imgLoad = new ImageIcon("img/load.png");
         lblLoad = new JLabel (imgLoad);
         lblLoad.setBounds(0,0,640,480);
         ctnLoad.add(lblLoad);
         
         this.setSize(640,480);
         this.setUndecorated(true);
         this.setLocationRelativeTo(null);
         
    try{
        this.setVisible(true);
        Thread.sleep(300);
        this.dispose();
        MainView appSistema = new MainView();
        
        
    } catch(Exception erro){
        
    }    
         
         
    }//fechando construtor
    
}//fechando classe
