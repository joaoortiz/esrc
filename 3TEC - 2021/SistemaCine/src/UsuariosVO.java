
public class UsuariosVO {
    
    private  String email, senha;
    private int nivel;
    
    public UsuariosVO(){
        
    }
    
    public UsuariosVO(String tmpEmail, String tmpSenha, int tmpNivel){
        this.setEmail(null);
        this.setSenha(null);
        this.setNivel(0);
    }
    
    //Programar aqui
    public String getEmail() {
        return email;
    }

    public void setEmail(String tmpEmail) {
        email = tmpEmail;
    }

    public String getSenha() {
        return senha;
    }

    public void setSenha(String tmpSenha) {
        senha = tmpSenha;
    }

    public int getNivel() {
        return nivel;
    }

    public void setNivel(int tmpNivel) {
        nivel = tmpNivel;
    }
    
}
