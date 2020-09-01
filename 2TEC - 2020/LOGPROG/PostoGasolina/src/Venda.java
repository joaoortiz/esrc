
public class Venda {
    
    public String nomeItens[] = {"Diesel","Etan. Comum","Etan. Aditiv.",
                                  "Gas. Comum","Gas. Aditiv.","GNV",
                                  "Óleo", "Ducha","Alinhamento","Calibragem",
                                  "Água","Suco","Refrigerante","Pão de queijo"};
    
    public float valorItens[] = {(float)2.98, (float)2.28, (float)2.69,
                                  (float)3.59, (float)3.99, (float)2.95,
                                  (float)135, (float)10, (float)60, (float)3,
                                  (float)4.5, (float)9.5, (float)6.5, (float)5};
    
    public float total;
    
    //construtor
    public Venda(){
        total = 0;
    }//fechando construtor
    
}//fechando classe
