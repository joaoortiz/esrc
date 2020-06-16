import java.awt.Color;
import java.awt.Graphics;
import java.awt.Graphics2D;
import java.awt.Image;
import java.awt.RenderingHints;
import java.awt.event.MouseAdapter;
import java.awt.event.MouseEvent;
import java.awt.event.MouseMotionAdapter;
 
import javax.swing.JComponent;
 
public class AreaDesenho extends JComponent {
 
  private Image image;

  private Graphics2D g2;

  private int currentX, currentY, oldX, oldY;
 
  public AreaDesenho() {
    setDoubleBuffered(false);
    addMouseListener(new MouseAdapter() {
      public void mousePressed(MouseEvent e) {

        oldX = e.getX();
        oldY = e.getY();
      }
    });
 
    addMouseMotionListener(new MouseMotionAdapter() {
      public void mouseDragged(MouseEvent e) {

        currentX = e.getX();
        currentY = e.getY();
 
        if (g2 != null) {

          g2.drawLine(oldX, oldY, currentX, currentY);

          repaint();

          oldX = currentX;
          oldY = currentY;
        }
      }
    });
  }
 
  protected void paintComponent(Graphics g) {
    if (image == null) {
      
      image = createImage(getSize().width, getSize().height);
      g2 = (Graphics2D) image.getGraphics();
      
      g2.setRenderingHint(RenderingHints.KEY_ANTIALIASING, RenderingHints.VALUE_ANTIALIAS_ON);
      
      clear();
    }
 
    g.drawImage(image, 0, 0, null);
  }
 
  
  public void clear() {
    g2.setPaint(Color.white);  
    g2.fillRect(0, 0, getSize().width, getSize().height);
    g2.setPaint(Color.black);
    repaint();
  }
 
  public void vermelho() {  
    g2.setPaint(new Color(205,92,92));
  }
 
    public void preto() {
    g2.setPaint(new Color(0,0,0));
  }
 
  public void rosa() {
    g2.setPaint(new Color(255,20,147));
  }
 
  public void verde() {
    g2.setPaint(new Color(60,179,113));
  }
 
  public void azul() {
    g2.setPaint(new Color(30,144,255));
  }
  
  public void laranja(){
      g2.setPaint(new Color(255,140,0));
  }
 
  public void amarelo(){
      g2.setPaint(new Color(255,215,0));
  }
  
  public void roxo(){
      g2.setPaint(new Color(160,32,240));
  }
  
  public void marrom(){
      g2.setPaint(new Color(160,82,45));
  }
  
  public void branco(){
      g2.setPaint(new Color(255,250,250));
  }
  
}