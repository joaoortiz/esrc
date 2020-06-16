import java.text.DecimalFormat;


public class BancoControl {

    public static Conta objConta;//declaração publica da Conta
    public static MenuView appMenu;
    public static DecimalFormat fmtMoeda;
    
    public static void main(String[] args) {
      
        fmtMoeda = new DecimalFormat("0.00");
        objConta = new Conta("João Ortiz", "4404-1", "1234"); //criação da conta
        LoginView appLogin = new LoginView();
    }
    
}
