# Introduction
RESTful API ini dibuat menggunakan bahasa pemrograman JAVA

# Instalasi

    1. Sudah menginstall Apache tomcat
    2. Copy file film.xml ke direktori $APACHE_TOMCAT_DIRECTORY/conf/Catalina/localhost/ film.xml
    3. Sesuaikan atribut docBase pada file film.xml dengan Direktori projek tersebut disimpan
    4. Jalankan Apache Tomcat

# Penggunaan
berikut beberapa endpoint yang dapat digunakan
#### Mengambil data
Method `GET`

Endpoint `http://HOST:PORT/film/service/json/get`

Response
```json
{
    "data": [
        {
            "genre": "Petualangan",
            "id": 6,
            "jenis": "Fiksi",
            "judul": "Jumanji Nex Level",
            "penilaian": 7.8,
            "tahun": "2019"
        },
        {
            "genre": "Documenter",
            "id": 7,
            "jenis": "Documenter",
            "judul": "Geostrong",
            "penilaian": 7.8,
            "tahun": "2019"
        }
    ],
    "success": true,
    "message": "Data Film berhasil diambil."
}
```

#### Mengambil satu data
Method `GET`

Endpoint `http://HOST:PORT/film/service/json/get/{filmId}`

* filmId : ID Film yang akan diambil datanya

Response
```json
{
    "data": {
        "genre": "Petualangan",
        "id": 6,
        "jenis": "Fiksi",
        "judul": "Jumanji Nex Level",
        "penilaian": 7.8,
        "tahun": "2019"
    },
    "success": true,
    "message": "Data Film berhasil diambil."
}
```

#### Tambah Film
Method `POST`

Endpoint `http://HOST:PORT/film/service/json/create`

Body `Content-Type : application/x-www-form-urlencoded`

* judul
* jenis
* genre
* tahun
* penilaian

Response
```json
{
    "data": {
        "genre": "Documenter",
        "id": 7,
        "jenis": "Documenter",
        "judul": "Geostrong",
        "penilaian": 7.8,
        "tahun": "2019"
    },
    "success": true,
    "message": "Data film berhasil disimpan"
}
```

#### Tamba Film (JSON data)
Method `POST`

Endpoint `http://HOST:PORT/film/service/json/create/json`

Body `Content-Type : application/json`

```json
{
    "genre": "ini",
    "jenis": "hi",
    "judul": "ini insert menggunakan json",
    "penilaian": 2.0,
    "tahun": "api"
}
```
Response
```json
{
    "data": {
        "genre": "ini",
        "id": 4,
        "jenis": "hi",
        "judul": "ini insert menggunakan json",
        "penilaian": 2.0,
        "tahun": "api"
    },
    "success": true,
    "message": "Data film berhasil disimpan"
}
```

#### Update Film
Method `POST`

Endpoint `http://HOST:PORT/film/service/json/update/{filmId}`

* filmId = ID Film yang akan di perbaharui datanya

Body `Content-Type : application/x-www-form-urlencoded`

* judul
* jenis
* genre
* tahun
* penilaian

Response
```json
{
    "data": {
        "genre": "Documenter",
        "id": 7,
        "jenis": "Documenter",
        "judul": "Geostrong",
        "penilaian": 7.8,
        "tahun": "2019"
    },
    "success": true,
    "message": "Data film berhasil disimpan"
}
```

#### Update Film (Menggunakan JSON Data)
Method `POST`

Endpoint `http://HOST:PORT/film/service/json/update/{filmId}/json`

* filmId = ID Film yang akan di perbaharui datanya

Body `Content-Type : application/json`

```json
{
    "genre": "Petualangan",
    "jenis": "Fiksi",
    "judul": "Jumanji Nex Level (2019)",
    "penilaian": 2.0,
    "tahun": "2019"
}
```

Response
```json
{
    "data": {
        "genre": "Petualangan",
        "id": 6,
        "jenis": "Fiksi",
        "judul": "Jumanji Nex Level (2019)",
        "penilaian": 2.0,
        "tahun": "2019"
    },
    "success": true,
    "message": "Data film berhasil diperbaharui"
}
```

#### Delete Film
Method `DELETE`

Endpoint `http://HOST:PORT/film/service/json/delete/{filmId}`

* filmId : ID Film yang akan dihapus

Response
```json
{
    "success": true,
    "message": "Data Film berhasil dihapus."
}
```