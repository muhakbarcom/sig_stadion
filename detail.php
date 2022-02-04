<?php
$id = $_GET['id'];
include_once "ambildata_id.php";
$obj = json_decode($data);
$titles = "";
$ids = "";
$kapasitas = "";
$pemilik = "";
$arsitek = "";
$alamat = "";
$url_gambar = "";
$provinsi = "";
$latitude = "";
$longitude = "";
foreach ($obj->results as $item) {
  $titles .= $item->nama_stadion;
  $ids .= $item->id_stadion;
  $kapasitas .= $item->kapasitas;
  $pemilik .= $item->pemilik;
  $arsitek .= $item->arsitek;
  $alamat .= $item->alamat;
  $url_gambar .= $item->url_gambar;
  $provinsi .= $item->provinsi;
  $latitude .= $item->latitude;
  $longitude .= $item->longitude;
}

// $title = "Detail dan Lokasi : " . $titles;
include_once "header.php"; ?>

<script src="https://maps.googleapis.com/maps/api/js?libraries=places&key=AIzaSyAbXF62gVyhJOVkRiTHcVp_BkjPYDQfH5w"></script>

<script>
  function initialize() {
    var myLatlng = new google.maps.LatLng(<?php echo $latitude ?>, <?php echo $longitude ?>);
    var mapOptions = {
      zoom: 10,
      center: myLatlng
    };

    var map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);

    var contentString = '<div id="content">' +
      '<div id="siteNotice">' +
      '</div>' +
      '<h1 id="firstHeading" class="firstHeading"><?php echo $titles ?></h1>' +
      '<div id="bodyContent">' +
      '<p><?php echo $alamat ?></p>' +
      '</div>' +
      '</div>';

    var infowindow = new google.maps.InfoWindow({
      content: contentString
    });
    var icon = {
      url: 'assets/img/marker.png', // url
      scaledSize: new google.maps.Size(50, 50), // scaled size
    };
    var marker = new google.maps.Marker({
      position: myLatlng,
      map: map,
      title: 'Maps Info',
      icon: icon
    });
    google.maps.event.addListener(marker, 'click', function() {
      infowindow.open(map, marker);
    });
  }

  google.maps.event.addDomListener(window, 'load', initialize);
</script>
<div id="map-canvas" style="width:100%;height:380px;"></div>

<div class="flex justify-center w-full overflow-visible bg-white">
  <div class="w-full mx-auto mb-16 ">
    <h2 class="py-2 text-4xl font-bold text-center"><?= $item->nama_stadion; ?></h2>
    <img class="w-9/12 py-2 mx-auto h-96" src="<?= $item->url_gambar; ?>">
    <div class="w-9/12 mx-auto">
      <div class="py-2 text-2xl font-bold">
        Kapasitas : <?= number_format($item->kapasitas); ?>
      </div>
      <div class="py-2 text-2xl font-bold">
        Pemilik : <?= $item->pemilik; ?>
      </div>
      <div class="py-2 text-2xl font-bold">
        Arsitek : <?= $item->arsitek; ?>
      </div>
      <div class="py-2 text-2xl font-bold">
        Provinsi : <?= $item->provinsi; ?>
      </div>
      <div class="py-2 text-2xl font-bold">
        Alamat : <?= $item->alamat; ?>
      </div>
    </div>
  </div>
</div>