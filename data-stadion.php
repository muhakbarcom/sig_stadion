<?php include_once "header.php"; ?>

<section class="my-3 lg:m-3">
  <div class="opacity-0">asdas</div>
  <div class="container flex justify-center mx-auto">
    <div class="flex flex-col">
      <div class="w-full">
        <div class="border-b border-gray-200 shadow">
          <table>
            <thead class="bg-gray-50">
              <tr>
                <th class="px-6 py-2 text-xs text-gray-500">
                  Gambar
                </th>
                <th class="px-6 py-2 text-xs text-gray-500">
                  Nama Stadion
                </th>
                <th class="px-6 py-2 text-xs text-gray-500">
                  Lokasi
                </th>
                <th class="px-6 py-2 text-xs text-gray-500">
                  Pemilik
                </th>
                <th class="px-6 py-2 text-xs text-gray-500">
                  Kapasitas
                </th>
                <th class="px-6 py-2 text-xs text-gray-500">
                  Alamat
                </th>
              </tr>
            </thead>
            <tbody class="bg-white">
              <?php
              $data = file_get_contents('http://localhost/sig/stadion/ambildata.php');
              // var_dump($data);
              // exit;
              $no = 1;
              if (json_decode($data, true)) {
                $obj = json_decode($data);
                foreach (array_reverse($obj->results) as $item) {
              ?>
                  <tr class="whitespace-nowrap hover:bg-slate-50 hover:cursor-pointer" data-link="http://localhost/sig/stadion/detail.php?id=<?php echo $item->id_stadion; ?>">
                    <td class="px-6 py-4 text-sm text-gray-500">
                      <!-- <div class="w-20 overflow-hidden rounded-2xl"> -->
                      <img class="overflow-hidden rounded-2xl" src="<?php echo $item->url_gambar; ?>" alt="Sunset in the mountains">
                      <!-- </div> -->
                    </td>
                    <td class="px-6 py-4 text-sm text-gray-500">
                      <?php echo $item->nama_stadion; ?>
                    </td>
                    <td class="px-6 py-4 text-sm text-gray-500">
                      <?php echo $item->provinsi; ?>
                    </td>
                    <td class="px-6 py-4 text-sm text-gray-500">
                      <?php echo $item->pemilik; ?>
                    </td>
                    <td class="px-6 py-4 text-sm text-gray-500">
                      <?php echo number_format($item->kapasitas); ?> Kursi
                    </td>
                    <td class="px-6 py-4 text-sm text-gray-500">
                      <?php echo $item->alamat; ?>
                    </td>
                  </tr>
              <?php $no++;
                }
              } else {
                echo "data tidak ada.";
              } ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- jquery cdn -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script>
  $(document).ready(function() {
    $(".whitespace-nowrap").click(function() {
      var link = $(this).attr("data-link");
      window.location = link;
    });
  });
</script>
</body>

</html>