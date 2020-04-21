package kelompok7.webservice;
import kelompok7.webservice.model.Film;
import kelompok7.webservice.model.FilmModel;

import javax.ws.rs.*;
import javax.ws.rs.core.MediaType;
import java.util.ArrayList;
import java.util.HashMap;
import java.util.Map;


@Path("json")
public class FilmAction {
    private FilmModel model = new FilmModel();
    @GET
    @Path("/get")
    @Produces(MediaType.APPLICATION_JSON)
    public Map<String,Object> getBuku(){
        String hello = "";
        ArrayList<Film> film = model.getFilm();
        Map<String,Object> mapData = new HashMap<>();
        mapData.put("data", film);
        mapData.put("success",true);
        mapData.put("message","Data Film berhasil diambil.");
        return  mapData;
    }

    @GET
    @Path("/get/{filmId}")
    @Produces(MediaType.APPLICATION_JSON)
    public Map<String,Object> getBukuSingle(@PathParam("filmId") String filmId){
        String hello = "";
        Film film = model.getFilmSingle(filmId);
        Map<String,Object> mapData = new HashMap<>();
        mapData.put("data", film);
        if(film.getId() == 0){
            mapData.put("success",false);
            mapData.put("message","Data Film tidak ditemukan.");
        }else{
            mapData.put("success",true);
            mapData.put("message","Data Film berhasil diambil.");
        }
        return  mapData;
    }

    @POST
    @Path("/update/{filmId}/json")
    @Produces(MediaType.APPLICATION_JSON + ";charset=utf-8")
    @Consumes({MediaType.APPLICATION_JSON})
    public Map<String,Object> updateFilm(final Map<String, Object> param,@PathParam("filmId") int filmId){
        Film film = new Film();
        Map<String,Object> mapData = new HashMap<>();
        film.setId(filmId);
        if(param.containsKey("judul")) film.setJudul(param.get("judul").toString());
        if(param.containsKey("jenis")) film.setJenis(param.get("jenis").toString());
        if(param.containsKey("genre")) film.setGenre(param.get("genre").toString());
        if(param.containsKey("tahun")) film.setTahun(param.get("tahun").toString());
        if(param.containsKey("penilaian")) film.setPenilaian(Float.parseFloat(param.get("penilaian").toString()));
        int result = model.updateFilm(film);
        if (result > 0){
            mapData.put("success",true);
            mapData.put("message","Data film berhasil diperbaharui");
            mapData.put("data",film);
        }else{
            mapData.put("success",false);
            mapData.put("message","Terjadi kesalahan dalam memperbaharui data film");
        }
        return  mapData;
    }

    @POST
    @Path("/update/{filmId}")
    @Produces(MediaType.APPLICATION_JSON + ";charset=utf-8")
    @Consumes("application/x-www-form-urlencoded")
    public Map<String,Object> updateFilmForm(@BeanParam Film film){
//        Film filmInput = new Film();
        Map<String,Object> mapData = new HashMap<>();

        int result = model.updateFilm(film);
        if (result > 0){
            mapData.put("success",true);
            mapData.put("message","Data film berhasil diperbaharui");
            mapData.put("data",film);
        }else{
            mapData.put("success",false);
            mapData.put("message","Terjadi kesalahan dalam memperbaharui data film");
        }
        return mapData;
    }

    @POST
    @Path("/create/json")
    @Produces(MediaType.APPLICATION_JSON + ";charset=utf-8")
    @Consumes({MediaType.APPLICATION_JSON})
    public Map<String,Object> saveFilm(final Map<String, Object> param){
        Film film = new Film();
        Map<String,Object> mapData = new HashMap<>();
        if(param.containsKey("judul")) film.setJudul(param.get("judul").toString());
        if(param.containsKey("jenis")) film.setJenis(param.get("jenis").toString());
        if(param.containsKey("genre")) film.setGenre(param.get("genre").toString());
        if(param.containsKey("tahun")) film.setTahun(param.get("tahun").toString());
        if(param.containsKey("penilaian")) film.setPenilaian(Float.parseFloat(param.get("penilaian").toString()));
        Film result = model.insertFilm(film);
        if (result.getId() > 0){
            mapData.put("success",true);
            mapData.put("message","Data film berhasil disimpan");
            mapData.put("data",result);
        }else{
            mapData.put("success",false);
            mapData.put("message","Terjadi kesalahan dalam menyimpan data film");
        }
        return  mapData;
    }

    @POST
    @Path("/create/")
    @Produces(MediaType.APPLICATION_JSON + ";charset=utf-8")
    @Consumes("application/x-www-form-urlencoded")
    public Map<String,Object> saveFilmForm(@BeanParam Film film){
//        Film filmInput = new Film();
        Map<String,Object> mapData = new HashMap<>();
        Film result = model.insertFilm(film);
        if (result.getId() > 0){
            mapData.put("success",true);
            mapData.put("message","Data film berhasil disimpan");
            mapData.put("data",result);
        }else{
            mapData.put("success",false);
            mapData.put("message","Terjadi kesalahan dalam menyimpan data film");
        }
        return mapData;
    }

    @DELETE
    @Path("/delete/{filmId}")
    @Produces(MediaType.APPLICATION_JSON)
    public Map<String,Object> deleteFilm(@PathParam("filmId") int filmId){
        int result = model.deleteFilm(filmId);
        Map<String,Object> mapData = new HashMap<>();
        if(result == 0){
            mapData.put("success",false);
            mapData.put("message","Terjadi kesalahan dalam menggapus film.");
        }else{
            mapData.put("success",true);
            mapData.put("message","Data Film berhasil dihapus.");
        }
        return  mapData;
    }
}
