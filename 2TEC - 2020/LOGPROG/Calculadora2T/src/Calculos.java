
public class Calculos {
    
    private static float n1, n2, result;
    
    public static float calculaOper(int oper, float n1, float n2){
        if(oper == 0){
            //raiz
            result = (float) Math.sqrt(n1);
        }else if(oper == 1){
            //soma
            result = n1 + n2;
        }else if(oper == 2){
            //sub
            result = n1 - n2;
        }else if(oper == 3){
            //mult
            result = n1 * n2;
        }else if(oper==4){
            //div
            result = n1 / n2;
        }
        
        return result;
    }
    
    
    
}
