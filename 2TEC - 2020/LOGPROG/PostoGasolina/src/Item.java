
public class Item {

    //atributos do ITEM
    private int id;
    private String nome;
    private float qtde, valor;
    
    //construtor
    public Item(){
        
    }//fechando construtor

    public int getId() {
        return id;
    }

    public void setId(int id) {
        this.id = id;
    }

    public String getNome() {
        return nome;
    }

    public void setNome(String nome) {
        this.nome = nome;
    }

    public float getQtde() {
        return qtde;
    }

    public void setQtde(float qtde) {
        this.qtde = qtde;
    }

    public float getValor() {
        return valor;
    }

    public void setValor(float valor) {
        this.valor = valor;
    }
        
}//fechando classe
