<?php include_once "header.php"; ?>
<script src="assets/js/jquery.js"></script>
<script src="assets/js/bootstrap-alert.js"></script>

<!-- load googlemaps api dulu -->
<script src="http://maps.google.com/maps/api/js?sensor=false"></script>

<script type="text/javascript">
  var peta;
  var gambar_tanda;
  var icon = {
    url: 'assets/img/marker.png', // url
    scaledSize: new google.maps.Size(50, 50), // scaled size
  };
  gambar_tanda = icon;

  function peta_awal() {
    // posisi default peta saat diload
    var lokasibaru = new google.maps.LatLng(-6.8803547, 107.5732718);
    var petaoption = {
      zoom: 13,
      center: lokasibaru,
      mapTypeId: google.maps.MapTypeId.ROADMAP
    };

    peta = new google.maps.Map(document.getElementById("map_canvas"), petaoption);

    // ngasih fungsi marker buat generate koordinat latitude & longitude
    tanda = new google.maps.Marker({
      position: lokasibaru,
      map: peta,
      icon: gambar_tanda,
      draggable: true
    });

    // ketika markernya didrag, koordinatnya langsung di selipin di textfield
    google.maps.event.addListener(tanda, 'dragend', function(event) {
      document.getElementById('latitude').value = this.getPosition().lat();
      document.getElementById('longitude').value = this.getPosition().lng();
    });
  }

  function setpeta(x, y, id) {
    // mengambil koordinat dari database
    var lokasibaru = new google.maps.LatLng(x, y);
    var petaoption = {
      zoom: 14,
      center: lokasibaru,
      mapTypeId: google.maps.MapTypeId.ROADMAP
    };

    peta = new google.maps.Map(document.getElementById("map_canvas"), petaoption);

    // ngasih fungsi marker buat generate koordinat latitude & longitude
    tanda = new google.maps.Marker({
      position: lokasibaru,
      icon: gambar_tanda,
      draggable: true,
      map: peta
    });

    // ketika markernya didrag, koordinatnya langsung di selipin di textfield
    google.maps.event.addListener(tanda, 'dragend', function(event) {
      document.getElementById('latitude').value = this.getPosition().lat();
      document.getElementById('longitude').value = this.getPosition().lng();
    });
  }
</script>
</head>

<body onload="peta_awal()">
  <div class="container mx-auto">

    <?php

    $o = "";

    if (isset($_GET['success']) && ($_GET['success'] == "1")) {

      $o .= '<div class="alert alert-success">
			<a class="close" data-dismiss="alert" href="#">x</a>
			Proses tambah stadion berhasil
			</div>';
    } elseif (isset($_GET['success']) && ($_GET['success'] == "0")) {

      $o .= '<div class="alert alert-error">
			<a class="close" data-dismiss="alert" href="#">x</a>
			Proses tambah stadion gagal
		   </div>';
    } elseif (isset($_GET['remove']) && ($_GET['remove'] == "1")) {

      $o .= '<div class="alert alert-success">
			<a class="close" data-dismiss="alert" href="#">x</a>
			Proses hapus stadion berhasil
			</div>';
    } elseif (isset($_GET['remove']) && ($_GET['remove'] == "0")) {

      $o .= '<div class="alert alert-error">
			<a class="close" data-dismiss="alert" href="#">x</a>
			Proses hapus stadion gagal
		   </div>';
    }

    echo $o;

    ?>
    <!-- <div class="opacity-0"></div> -->
    <div class="w-full overflow-hidden rounded-lg">
      <div class="span8">
        <div class="control-group">
          <div id="map_canvas" style="width:100%; height:350px"></div>
        </div>
      </div>
      <div class="bg-white text-slate-900">
        <form action="?action=add" method="POST" class="flex justify-center">
          <div class="grid w-11/12 grid-cols-6 gap-1 mt-8">
            <div class="p-2">
              <label class="control-label" for="input01">Nama stadion</label>
              <div class="controls">
                <input type="text" class="w-full p-2 border-2 rounded-xl" id="nama_stadion" name="nama_stadion" rel="popover">
              </div>
            </div>
            <div class="p-2">
              <label class="control-label" for="input01">Kapasitas</label>
              <div class="controls">
                <input type="text" class="w-full p-2 border-2 rounded-xl" id="kapasitas" name="kapasitas" rel="popover">
              </div>
            </div>
            <div class="p-2">
              <label class="control-label" for="input01">Pemilik</label>
              <div class="controls">
                <input type="text" class="w-full p-2 border-2 rounded-xl" id="pemilik" name="pemilik" rel="popover">
              </div>
            </div>
            <div class="p-2">
              <label class="control-label" for="input01">Arsitek</label>
              <div class="controls">
                <input type="text" class="w-full p-2 border-2 rounded-xl" id="arsitek" name="arsitek" rel="popover">
              </div>
            </div>
            <div class="p-2">
              <label class="control-label" for="input01">Alamat</label>
              <div class="controls">
                <input type="text" class="w-full p-2 border-2 rounded-xl" id="alamat" name="alamat" rel="popover">
              </div>
            </div>
            <div class="p-2">
              <label class="control-label" for="input01">Gambar</label>
              <div class="controls">
                <input type="text" class="w-full p-2 border-2 rounded-xl" id="url_gambar" name="url_gambar" rel="popover">
              </div>
            </div>
            <div class="p-2">
              <label class="control-label" for="input01">Provinsi</label>
              <div class="controls">
                <input type="text" class="w-full p-2 border-2 rounded-xl" id="Provinsi" name="Provinsi" rel="popover">
              </div>
            </div>

            <div class="p-2">
              <label class="control-label" for="input01">Longitude</label>
              <div class="controls">
                <input type="text" class="w-full p-2 border-2 rounded-xl " id="longitude" name="longitude">
              </div>
            </div>

            <div class="p-2">
              <label class="control-label" for="input01">Latitude</label>
              <div class="controls">
                <input type="text" class="w-full p-2 border-2 rounded-xl" id="latitude" name="latitude">
              </div>
            </div>

            <div class="p-2 m-auto">
              <label class="control-label" for="input01"></label>
              <div class="controls">
                <button type="submit" class="p-2 bg-blue-500 rounded-md text-slate-50">Tambah stadion</button>

              </div>
            </div>
          </div>
        </form>
        <label class="flex pl-20 text-xl font-bold" for="input01">Daftar stadion</label>
        <div class="flex justify-center p-2 h-60">
          <div class="w-11/12 overflow-y-auto">
            <div class=" controls">
              <div id="daftar">
                <ul>
                  <?php
                  require('koneksi.php');

                  // mengambil data stadion dari database
                  $query = "SELECT * FROM `data_stadion` ORDER BY id_stadion DESC";
                  $lokasi = mysqli_query($koneksi, $query);

                  while ($l = mysqli_fetch_array($lokasi)) {
                    // membuat fungsi javascript untuk nantinya diolah dan ditampilkan dalam peta

                    echo "<li class='flex p-2 mb-2'><a class='flex items-center justify-center h-10 px-4 font-semibold text-white rounded-lg w-90 bg-slate-900 hover:bg-slate-700 focus:outline-none focus:ring-2 focus:ring-slate-400 focus:ring-offset-2 focus:ring-offset-slate-50 sm:w-auto dark:bg-sky-500 dark:highlight-white/20 dark:hover:bg-sky-400' href=\"javascript:setpeta(" . $l['latitude'] . "," . $l['longitude'] . "," . $l['id_stadion'] . ")\">" . $l['nama_stadion'] . "</a> <a class='flex items-center justify-center h-10 px-4 font-semibold text-white rounded-lg bg-slate-900 hover:bg-slate-700 focus:outline-none focus:ring-2 focus:ring-slate-400 focus:ring-offset-2 focus:ring-offset-slate-50 sm:w-auto dark:bg-red-500 dark:highlight-white/20 dark:hover:bg-red-400' href='?action=remove&id=" . $l['id_stadion'] . "'>Hapus</a></li>";
                  }
                  ?>
                </ul>
              </div>

            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
  <div class="flex justify-center">SIG Stadion Sepakbola by Akbar</div>
  </div>
</body>

</html>

<?php


if (isset($_GET['action']) && $_GET['action'] == "add") {

  require('koneksi.php');
  $nama_stadion  = htmlentities(mysqli_real_escape_string($koneksi, $_POST['nama_stadion']));
  $longitude    = htmlentities(mysqli_real_escape_string($koneksi, $_POST['longitude']));
  $latitude    = htmlentities(mysqli_real_escape_string($koneksi, $_POST['latitude']));
  $kapasitas    = htmlentities(mysqli_real_escape_string($koneksi, $_POST['kapasitas']));
  $pemilik    = htmlentities(mysqli_real_escape_string($koneksi, $_POST['pemilik']));
  $arsitek    = htmlentities(mysqli_real_escape_string($koneksi, $_POST['arsitek']));
  $alamat    = htmlentities(mysqli_real_escape_string($koneksi, $_POST['alamat']));
  $url_gambar    = htmlentities(mysqli_real_escape_string($koneksi, $_POST['url_gambar']));
  $provinsi    = htmlentities(mysqli_real_escape_string($koneksi, $_POST['Provinsi']));


  // input data ke database
  $input_stadion = mysqli_query($koneksi, "insert into `data_stadion` (`nama_stadion`,`latitude`,`longitude`,`kapasitas`,`pemilik`,`arsitek`,`alamat`,`url_gambar`,`provinsi`) values ('$nama_stadion','$latitude','$longitude','$kapasitas','$pemilik','$arsitek','$alamat','$url_gambar','$provinsi')");

  if ($input_stadion) {
?>
    <script language="javascript">
      document.location = "?success=1";
    </script>
  <?php
  } else {
  ?>
    <script language="javascript">
      document.location = "?success=0";
    </script>
  <?php
  }
} elseif (isset($_GET['action']) && $_GET['action'] == "remove") {
  $id_stadion = htmlentities(mysqli_real_escape_string($koneksi, $_GET['id']));
  // hapus data dari database
  $hapus_stadion = mysqli_query($koneksi, "DELETE FROM `data_stadion` WHERE `id_stadion` = '" . $id_stadion . "'");

  if ($hapus_stadion) {
  ?>
    <script language="javascript">
      document.location = "?remove=1";
    </script>
  <?php
  } else {
  ?>
    <script language="javascript">
      document.location = "?remove=0";
    </script>
<?php
  }
}
?>