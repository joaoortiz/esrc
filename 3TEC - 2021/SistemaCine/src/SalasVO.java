public class SalasVO {

    public int id, qtdePoltronas, idTipo, idCinema;

    public SalasVO(int tmpId, int tmpQtdePoltronas, int tmpIdTipo, int tmpIdCinema) {
        this.setId(tmpId);
        this.setQtdePoltronas(tmpQtdePoltronas);
        this.setIdTipo(tmpIdTipo);
        this.setIdCinema(tmpIdCinema);
    }

    public SalasVO() {
        this.setId(0);
        this.setQtdePoltronas(0);
        this.setIdTipo(0);
        this.setIdCinema(0);
    }

    public int getId() {
        return id;
    }

    public void setId(int id) {
        this.id = id;
    }

    public int getQtdePoltronas() {
        return qtdePoltronas;
    }

    public void setQtdePoltronas(int qtdePoltronas) {
        this.qtdePoltronas = qtdePoltronas;
    }

    public int getIdTipo() {
        return idTipo;
    }

    public void setIdTipo(int idTipo) {
        this.idTipo = idTipo;
    }

    public int getIdCinema() {
        return idCinema;
    }

    public void setIdCinema(int idCinema) {
        this.idCinema = idCinema;
    }

}