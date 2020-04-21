package kelompok7.webservice.model;

import java.sql.ResultSet;
import java.util.ArrayList;

public class FilmModel {

    public ArrayList<Film> filmArrayList;

    public FilmModel(){
        filmArrayList = new ArrayList<>();
    }

    public ArrayList<Film> getFilm(){
        try{
            ResultSet result = Connection.ExecuteQuery("select * from film");
            filmArrayList.clear();
            while (result.next()){
                Film film = new Film();
                film.setId(result.getInt("id"));
                film.setJudul(result.getString("judul"));
                film.setJenis(result.getString("jenis"));
                film.setGenre(result.getString("genre"));
                film.setTahun(result.getString("tahun"));
                film.setPenilaian(result.getFloat("penilaian"));
                filmArrayList.add(film);
            }
            return filmArrayList;
        }catch (Exception e){
            System.out.println(e);
        }
        return filmArrayList;
    }

    public Film getFilmSingle(String filmId){
        Film film = new Film();
        try{
            ResultSet result = Connection.ExecuteQuery("select * from film where id = '"+filmId+"'");
            if(result.next()){
                film.setId(result.getInt("id"));
                film.setJudul(result.getString("judul"));
                film.setJenis(result.getString("jenis"));
                film.setGenre(result.getString("genre"));
                film.setTahun(result.getString("tahun"));
                film.setPenilaian(result.getFloat("penilaian"));
            }
        }catch (Exception e){
            System.out.println(e);
        }
        return film;
    }

    public int updateFilm(Film film){
        String query = "update film set ";
        String[] param = new String[6];
        int index = 0;
        if(!film.getJudul().isEmpty()){ query += "judul = ? "; param[index] = film.getJudul(); index++;}
        if(!film.getJudul().isEmpty()){ query += ",jenis = ? "; param[index] = film.getJenis(); index++;}
        if(!film.getJudul().isEmpty()){ query += ",genre = ? "; param[index] = film.getGenre(); index++;}
        if(!film.getJudul().isEmpty()){ query += ",tahun = ? "; param[index] = film.getTahun(); index++;}
        if(!film.getJudul().isEmpty()){ query += ",penilaian = ? "; param[index] = film.getPenilaian().toString(); index++;}
        if(!film.getJudul().isEmpty()){ query += "where id = ? "; param[index] = String.valueOf(film.getId()); index++;}

        int result = Connection.Execute(query,param,false);
        return result;
    }

    public Film insertFilm(Film film){
            String query = "insert into film set ";
            String[] param = new String[5];
            int index = 0;
            if(!film.getJudul().isEmpty()){ query += "judul = ? "; param[index] = film.getJudul(); index++;}
            if(!film.getJudul().isEmpty()){ query += ",jenis = ? "; param[index] = film.getJenis(); index++;}
            if(!film.getJudul().isEmpty()){ query += ",genre = ? "; param[index] = film.getGenre(); index++;}
            if(!film.getJudul().isEmpty()){ query += ",tahun = ? "; param[index] = film.getTahun(); index++;}
            if(!film.getJudul().isEmpty()){ query += ",penilaian = ? "; param[index] = film.getPenilaian().toString(); index++;}
            int result = Connection.Execute(query,param,true);
            film.setId(result);
            return film;
    }

    public int deleteFilm(int filmId){
        int i = 0;
        String query = "delete from film where id = ?";
        String[] param = {String.valueOf(filmId)};
        i = Connection.Execute(query,param,false);
        return i;
    }


}
