
public class AtoresVO {

    public int id;
    public String nome, personagem, imagem;
    
    public AtoresVO(){
        this.setId(0);
        this.setNome(null);
        this.setPersonagem(null);
        this.setImagem(null);        
    }
    
    public AtoresVO(int tmpId, String tmpNome, String tmpPersonagem, String tmpImagem){
        this.setId(tmpId);
        this.setNome(tmpNome);
        this.setPersonagem(tmpPersonagem);
        this.setImagem(tmpImagem);
    }

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

    public String getPersonagem() {
        return personagem;
    }

    public void setPersonagem(String personagem) {
        this.personagem = personagem;
    }

    public String getImagem() {
        return imagem;
    }

    public void setImagem(String imagem) {
        this.imagem = imagem;
    }
    
    
}
