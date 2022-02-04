<?php include_once "header.php"; ?>

<section class="my-3 lg:m-3">
  <div class="flex justify-center my-7">
    <div class="mx-auto mb-2 text-5xl font-bold">Sistem Informasi Geografis Stadion Sepakbola</div>
  </div>
  <div class="flex justify-center">
    <div class="overflow-hidden shadow-lg rounded-xl h-72 bg-slate-50">
      <img class="w-full " src="https://upload.wikimedia.org/wikipedia/commons/thumb/b/bb/King_Power_Stadium_wide_view.jpg/1280px-King_Power_Stadium_wide_view.jpg" alt="Sunset in the mountains">
    </div>
  </div>

  <div class="container flex justify-center px-4 mx-auto mt-12">
    <div class="grid w-9/12 grid-cols-4 gap-2">
      <?php
      $data = file_get_contents('http://localhost/sig/stadion/ambildata.php');

      $no = 1;
      if (json_decode($data, true)) {
        $obj = json_decode($data);
        foreach (array_reverse($obj->results)  as $item) {
      ?>
          <div class="m-1 overflow-hidden duration-75 rounded shadow-lg hover:scale-110 hover:bg-slate-100 hover:cursor-pointer bg-slate-50" data-link="http://localhost/sig/stadion/detail.php?id=<?php echo $item->id_stadion; ?>">
            <img class="" src="<?php echo $item->url_gambar; ?>" alt="Sunset in the mountains">
            <div class="px-6 py-4">
              <div class="mb-2 text-xl font-bold">
                <a href="http://localhost/sig/stadion/detail.php?id=<?php echo $item->id_stadion; ?>">
                  <?php echo $item->nama_stadion; ?>
                </a>
              </div>
              <p class="text-base text-gray-700">
                <?php echo $item->alamat; ?>
              </p>
            </div>
            <div class="px-6 pt-4 pb-2">
              <span class="inline-block px-3 py-1 mb-2 mr-2 text-sm font-semibold text-gray-700 bg-gray-200 rounded-full"><?php echo $item->pemilik; ?></span>
              <span class="inline-block px-3 py-1 mb-2 mr-2 text-sm font-semibold text-gray-700 bg-gray-200 rounded-full"><?php echo number_format($item->kapasitas); ?> Kursi</span>
              <span class="inline-block px-3 py-1 mb-2 mr-2 text-sm font-semibold text-gray-700 bg-gray-200 rounded-full"><?php echo $item->provinsi; ?></span>
            </div>
          </div>

      <?php $no++;
        }
      } else {
        echo "data tidak ada.";
      } ?>
    </div>
  </div>
  <!-- jquery cdn -->
  <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
  <script>
    // redirect to detail page
    $(document).ready(function() {
      $(".overflow-hidden").click(function() {
        var link = $(this).attr("data-link");
        window.location.href = link;
      });
    });
  </script>
  </body>

  </html>