public class FilmesVO {
    private int id, duracao, ano, classificacao, idGenero;
    private String tituloOrig, tituloTrad, diretor, sinopse, imagem;
    private boolean status;
    
    //método construtor
    public FilmesVO() {
        this.setId(0);
        this.setDuracao(0);
        this.setAno(0);
        this.setClassificacao(0);
        this.setIdGenero(0);
        this.setTituloOrig(null);
        this.setTituloTrad(null);
        this.setDiretor(null);
        this.setSinopse(null);
        this.setImagem(null);
        this.setStatus(false);
        
    }
    

    public FilmesVO(int id, int duracao, int ano, int classificacao, int idGenero, String tituloOrig, String tituloTrad, String diretor, String sinopse, String imagem, boolean status) {
        this.setId(id);
        this.setDuracao(duracao);
        this.setAno(ano);
        this.setClassificacao(classificacao);
        this.setIdGenero(idGenero);
        this.setTituloOrig(tituloOrig);
        this.setTituloTrad(tituloTrad);
        this.setDiretor(diretor);
        this.setSinopse(sinopse);
        this.setImagem(imagem);
        this.setStatus(status);
        
    }
    
  
    
    //métodos set e get

    public int getId() {
        return id;
    }

    public void setId(int id) {
        this.id = id;
    }

    public int getDuracao() {
        return duracao;
    }

    public void setDuracao(int duracao) {
        this.duracao = duracao;
    }

    public int getAno() {
        return ano;
    }

    public void setAno(int ano) {
        this.ano = ano;
    }

    public int getClassificacao() {
        return classificacao;
    }

    public void setClassificacao(int classificacao) {
        this.classificacao = classificacao;
    }

    public int getIdGenero() {
        return idGenero;
    }

    public void setIdGenero(int idGenero) {
        this.idGenero = idGenero;
    }

    public String getTituloOrig() {
        return tituloOrig;
    }

    public void setTituloOrig(String tituloOrig) {
        this.tituloOrig = tituloOrig;
    }

    public String getSinopse() {
        return sinopse;
    }

    public void setSinopse(String sinopse) {
        this.sinopse = sinopse;
    }

    public String getImagem() {
        return imagem;
    }

    public void setImagem(String imagem) {
        this.imagem = imagem;
    }

    public boolean isStatus() {
        return status;
    }

    public void setStatus(boolean status) {
        this.status = status;
    }

    public String getTituloTrad() {
        return tituloTrad;
    }

    public void setTituloTrad(String tituloTrad) {
        this.tituloTrad = tituloTrad;
    }

    public String getDiretor() {
        return diretor;
    }

    public void setDiretor(String diretor) {
        this.diretor = diretor;
    }

    
    
    
}
