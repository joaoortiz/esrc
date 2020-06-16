
public class Jogo {

    public int tab[][] = new int[3][3]; //matriz tabuleiro - 1->X  2->O   0->vazio
    int jogador, jogadas, vencedor;
    boolean vitoria;

    //contrutor
    public Jogo() {
        //inicializando variaveis
        jogador = 1;
        jogadas = 0; //contar numero de jogadas efetuadas
        vencedor = 0;
        vitoria = false;

        for (int i = 0; i < 3; i++) { //percorrendo linhas da matriz
            for (int j = 0; j < 3; j++) { //percorrendo colunas da matriz
                tab[i][j] = 0; //tabuleiro começando vazio               
            } //j
        }//i        

    }//contrutor

    public int efetuarJogada(int lin, int col) {

        if (tab[lin][col] == 0) {//só pode jogar em posições vazias
            tab[lin][col] = jogador; //inserindo o numero do jogador no tabuleiro

            //alternando jogadores
            if (jogador == 1) {
                jogador = 2;
            } else if (jogador == 2) {
                jogador = 1;
            }

            jogadas = jogadas + 1; //contando jogadas
            
            if(jogadas >= 5){
                //PROGRAMAR AQUI
                vencedor = verificarVitoria();
            }
            
            
        }//fechando if principal

        return jogadas;
        
    }//fechando efetuarJogada

    public int verificarVitoria(){
        
        //vitoria pelas linhas
        for(int lin=0;lin<3;lin++){
            if((tab[lin][0] == tab[lin][1]) && (tab[lin][0] == tab[lin][2]) && (tab[lin][0]!=0)){
                vitoria = true;
                return tab[lin][0];
            }            
        }//fechando linhas
        
        //vitoria pelas colunas
        for(int col=0;col<3;col++){
            if((tab[0][col] == tab[1][col]) && (tab[0][col] == tab[2][col]) && (tab[0][col]!=0)){
                vitoria = true;
                return tab[0][col];
            }
        }//fechando colunas
        
        //vitoria pelas diagonais
        if((tab[0][0] == tab[1][1]) && (tab[0][0] == tab[2][2]) && tab[0][0] != 0){ //Diag. Princ
            vitoria = true;
            return tab[0][0];
        }
        if((tab[2][0] == tab[1][1]) && (tab[2][0] == tab[0][2]) && tab[2][0] != 0){ //Diag. Sec
            vitoria = true;
            return tab[2][0];
        }
                        
       return 0; 
    }//fechando verificarVitoria
    
    public void resetarDados(){
        jogador = 1;
        jogadas = 0; //contar numero de jogadas efetuadas
        vencedor = 0;
        vitoria = false;

        for (int i = 0; i < 3; i++) { //percorrendo linhas da matriz
            for (int j = 0; j < 3; j++) { //percorrendo colunas da matriz
                tab[i][j] = 0; //tabuleiro começando vazio               
            } //j
        }//i        
    }
    
    
}//class
