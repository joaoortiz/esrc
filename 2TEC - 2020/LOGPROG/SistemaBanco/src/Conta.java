
public class Conta {

    //declaração dos atributos

    private String titular, numeroConta, senha, extrato;
    private float saldoCC, saldoPP, limite, limiteSaque;

    //método construtor
    public Conta(String tmpTitular, String tmpNumeroConta, String tmpSenha) {
        this.titular = tmpTitular;
        this.numeroConta = tmpNumeroConta; //(4404)
        this.senha = tmpSenha; //(1234)
        this.saldoCC = 0;
        this.saldoPP = 0;
        this.limite = -1000;
        this.limiteSaque = 400;
        this.extrato = "";
    }

    //métodos funcionais
    public boolean validarCliente(String tmpConta, String tmpSenha) { //LOGIN
        //Parametros que estão dentro dos parenteses, são as variaveis
        //vindas dos campos de texto, digitados pelo usuario. 

        if ((this.numeroConta.compareTo(tmpConta) == 0) && (this.senha.compareTo(tmpSenha) == 0)) {
            return true; //Acertou
        } else {
            return false; //Errou
        }

    }

    public float consultarSaldo(int tmpTipo) { //1-cc  2-pp
        if (tmpTipo == 1) {
            return this.saldoCC;
        } else {
            return this.saldoPP;
        }
    }

    public void depositar(float tmpValor) {
        this.saldoCC += tmpValor;
        this.extrato += "Depósito -------- R$ " + BancoControl.fmtMoeda.format(tmpValor) + "\n";
    }

    public int sacar(float tmpValor) {

        if (tmpValor > this.limiteSaque) {
            this.extrato += "Tentativa de saque inválida. \n";
            return 3;  //nao pode sacar +400          
        } else {
            if (this.saldoCC - tmpValor > this.limite) {
                this.saldoCC -= tmpValor;
                this.extrato += "Saque -------- R$ " + BancoControl.fmtMoeda.format(tmpValor) + "\n";
                return 1; //saque ok
            } else {
                return 2;// não tem dinheiro
            }
        }
    }

    public boolean resgatar(float tmpValor) { //poupança -> corrente
        if (this.saldoPP - tmpValor >= 0) {
            this.saldoPP -= tmpValor; //tira da PP
            this.saldoCC += tmpValor; //joga na CC
            this.extrato += "Transf. Poup. p/ Corrente -------- R$ " + BancoControl.fmtMoeda.format(tmpValor) + "\n";
            return true;
        } else {
            return false;
        }

    }

    public boolean aplicar(float tmpValor) { //corrente -> poupança
        if (this.saldoCC - tmpValor >= 0) {
            this.saldoCC -= tmpValor;
            this.saldoPP += tmpValor;
            this.extrato += "Transf. Corrente. p/ Poup. -------- R$ " + BancoControl.fmtMoeda.format(tmpValor) + "\n";
            return true;
        } else {
            return false;
        }
    }

    public String imprimirExtrato() {
        return this.extrato;
    }

    public String identificarCliente(){
        return this.titular;
    }
    
    
}//FECHANDO CLASSE  

