package kelompok7.webservice.model;

import javax.ws.rs.FormParam;
import javax.ws.rs.PathParam;

public class Film {
    @PathParam("filmId")
    private int id;

    @FormParam("judul")
    private String judul;

    @FormParam("jenis")
    private String jenis;

    @FormParam("genre")
    private String genre;

    @FormParam("tahun")
    private String tahun;

    @FormParam("penilaian")
    private Float penilaian;

    public int getId() {
        return id;
    }

    public void setId(int id) {
        this.id = id;
    }

    public String getJudul() {
        return judul;
    }

    public void setJudul(String judul) {
        this.judul = judul;
    }

    public String getJenis() {
        return jenis;
    }

    public void setJenis(String jenis) {
        this.jenis = jenis;
    }

    public String getGenre() {
        return genre;
    }

    public void setGenre(String genre) {
        this.genre = genre;
    }

    public String getTahun() {
        return tahun;
    }

    public void setTahun(String tahun) {
        this.tahun = tahun;
    }

    public Float getPenilaian() {
        return penilaian;
    }

    public void setPenilaian(Float penilaian) {
        this.penilaian = penilaian;
    }
}
