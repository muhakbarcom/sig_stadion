<?php
include_once "header.php";
?>


<div class="panel-body">
  <div id="map" class="w-full" style="height: 800px;"></div>
  <div class="flex justify-center mt-6">SIG Stadion Sepakbola by Akbar</div>


  <script src="https://maps.googleapis.com/maps/api/js?libraries=places&key=AIzaSyBNlCaU1doOgPPIUrm4lSiMUOS-bUVIE3c"></script>

  <script type="text/javascript">
    function initialize() {

      var mapOptions = {
        zoom: 8,
        center: new google.maps.LatLng(-7.9812985, 112.6319264),
        disableDefaultUI: true
      };

      var mapElement = document.getElementById('map');

      var map = new google.maps.Map(mapElement, mapOptions);

      setMarkers(map, officeLocations);

    }

    var officeLocations = [
      <?php
      $data = file_get_contents('http://localhost/sig/stadion/ambildata.php');
      $no = 1;
      if (json_decode($data, true)) {
        $obj = json_decode($data);
        foreach ($obj->results as $item) {
      ?>[<?php echo $item->id_stadion ?>, '<?php echo $item->nama_stadion ?>', '<?php echo $item->alamat ?>', <?php echo $item->longitude ?>, <?php echo $item->latitude ?>],
      <?php
        }
      }
      ?>
    ];

    function setMarkers(map, locations) {
      var globalPin = 'assets/img/marker.png';

      for (var i = 0; i < locations.length; i++) {

        var office = locations[i];
        var myLatLng = new google.maps.LatLng(office[4], office[3]);
        var infowindow = new google.maps.InfoWindow({
          content: contentString
        });

        var contentString =
          '<div id="content">' +
          '<div id="siteNotice">' +
          '</div>' +
          '<h5 id="firstHeading" class="firstHeading">' + office[1] + '</h5>' +
          '<div id="bodyContent">' +
          '<a href=detail.php?id=' + office[0] + '>Info Detail</a>' +
          '</div>' +
          '</div>';

        var icon = {
          url: 'assets/img/marker.png', // url
          scaledSize: new google.maps.Size(50, 50), // scaled size
        };

        var marker = new google.maps.Marker({
          position: myLatLng,
          map: map,
          title: office[1],
          icon: icon
        });

        google.maps.event.addListener(marker, 'click', getInfoCallback(map, contentString));
      }
    }

    function getInfoCallback(map, content) {
      var infowindow = new google.maps.InfoWindow({
        content: content
      });
      return function() {
        infowindow.setContent(content);
        infowindow.open(map, this);
      };
    }

    initialize();
  </script>
</div>