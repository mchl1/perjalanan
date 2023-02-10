<!DOCTYPE html>
<html lang="en">

<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title>Latihan Membuat Peta</title>
 
 <!-- leaflet css -->
 <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
 integrity="sha512-
xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4Ps
ZChSR7A=="
 crossorigin="" />
 
 <!-- bootstrap cdn -->
 <link rel="stylesheet"
href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
 integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2"
crossorigin="anonymous">
 <style>
 /* ukuran peta */
 #mapid {
 height: 100%;
 }
 .jumbotron{
 height: 100%;
 border-radius: 0;
 }
 body{
 background-color: #ebe7e1;
 }
 </style>
</head>

<body>
 <div class="row"> <!-- class row digunakan sebelum membuat column -->
 <div class="col-4"> <!-- ukuruan layar dengan bootstrap adalah 12 kolom, bagian kiri dibuat
sebesar 4 kolom-->
 <div class="jumbotron"> <!-- untuk membuat semacam container berwarna abu -->
 <h1>Add Location</h1>
 <hr>
 <form action="proses.php" method="post">
 <div class="form-group">
 <label for="exampleFormControlInput1">Latitude, Longitude</label>
 <input type="text" class="form-control" id="lat_long" name="lat_long">
 </div>
 <div class="form-group">
 <label for="exampleFormControlInput1">Nama Tempat</label>
 <input type="text" class="form-control" name="nama_tempat">
 </div>
 <div class="form-group">
 <label for="exampleFormControlInput1">Kategori Tempat</label>
 <select class="form-control" name="kategori" id="">
 <option value="">--Kategori Tempat--</option>
 <option value="rumah makan">Rumah Makan</option>
 <option value="pom bensin">Pom Bensin</option>
 <option value="Fasilitas Umum">Fasilitas Umum</option>
 <option value="Pasar/Mall">Pasar/Mall</option>
 <option value="rumah sakit">Rumah Sakit</option>
 <option value="Sekolah">Sekolah</option>
 </select>
 </div>
 <div class="form-group">
 <label for="exampleFormControlInput1">Keterangan</label>
 <textarea class="form-control" name="keterangan" cols="30" rows="5"></textarea>
 </div>
 <div class="form-group">
 <button type="submit" class="btn btn-info">Add</button>
 </div>
 </form>
 </div>
 </div>
 <div class="col-8"> <!-- ukuruan layar dengan bootstrap adalah 12 kolom, bagian kiri dibuat
sebesar 4 kolom-->
 <!-- peta akan ditampilkan dengan id = mapid -->
 <div id="mapid"></div>
 </div>
 </div>
 <!-- leaflet js -->
 <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
 integrity="sha512-
XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V
3ynxwA=="
 crossorigin=""></script>
 <script>
 // set lokasi latitude dan longitude, lokasinya kota BATU
 var mymap = L.map('mapid').setView([-7.8806559,112.5047945], 14);
 //setting maps menggunakan api mapbox bukan google maps, daftar dan dapatkan token
 L.tileLayer(

'https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibmFiaWxjaGVuIiwi
YSI6ImNrOWZzeXh5bzA1eTQzZGxpZTQ0cjIxZ2UifQ.1YMI-9pZhxALpQ_7x2MxHw', {
 attribution: 'Map data &copy; <a
href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a
href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a
href="https://www.mapbox.com/">Mapbox</a>',
 maxZoom: 20,
 id: 'mapbox/streets-v11', //menggunakan peta model streets-v11 kalian bisa melihat jenisjenis peta lainnnya di web resmi mapbox
 tileSize: 512,
 zoomOffset: -1,
 accessToken: 'your.mapbox.access.token'
 }).addTo(mymap);
 // buat variabel berisi fugnsi L.popup
 var popup = L.popup();
 // buat fungsi popup saat map diklik
 function onMapClick(e) {
 popup
 .setLatLng(e.latlng)
 .setContent("koordinatnya adalah " + e.latlng
 .toString()
 ) //set isi konten yang ingin ditampilkan, kali ini kita akan menampilkan latitude dan
longitude
 .openOn(mymap);
 document.getElementById('latlong').value = e.latlng //value pada form latitde, longitude akan
berganti secara otomatis
 }
 mymap.on('click', onMapClick); //jalankan fungsi

 <?php

 $mysqli = mysqli_connect('localhost', 'root', '', 'perjalanan'); //koneksi ke database
 $tampil = mysqli_query($mysqli, "select * from lokasi"); //ambil data dari tabel lokasi
 while($hasil = mysqli_fetch_array($tampil)){ ?> //melooping data menggunakan while
 //menggunakan fungsi L.marker(lat, long) untuk menampilkan latitude dan longitude
 //menggunakan fungsi str_replace() untuk menghilankan karakter yang tidak dibutuhkan
 L.marker([<?php echo str_replace(['[', ']', 'LatLng', '(', ')'], '', $hasil['lat_long']);
?>]).addTo(mymap)
 //data ditampilkan di dalam bindPopup( data ) dan dapat dikustomisasi dengan html
 .bindPopup(`<?php echo 'nama
tempat:'.$hasil['nama_tempat'].'|kategori:'.$hasil['kategori'].'|keteragan:'.$hasil['keterangan']; ?>`)
 <?php } ?>
 </script>
</body>
</html>