<!DOCTYPE html>
<html lang="en" class="scroll-smooth hover:scroll-auto">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <!-- bootstrap icon -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" />
  <link href="https://cdn-icons-png.flaticon.com/512/821/821357.png" rel="icon" type="image/x-icon" />

  <link rel="stylesheet" href="styles.css" />

  <title>Sistem Informasi Geografis - Stadion Sepakbola</title>
  <style>
    body {
      overflow: scroll;
      /* Show scrollbars */
    }

    body::-webkit-scrollbar {
      width: 8px;
      background-color: #F5F5F5;
    }

    body::-webkit-scrollbar-track {
      -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.3);
      /* border-radius: 10px; */
      background-color: rgb(15, 23, 42);
    }

    body::-webkit-scrollbar-thumb {
      border-radius: 10px;
      -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, .3);
      background-color: #555;
    }
  </style>
</head>

<body class="antialiased bg-white text-slate-500 dark:text-slate-400 dark:bg-slate-900">
  <!-- navbar -->
  <div class="sticky top-0 z-40 w-full backdrop-blur transition-colors duration-500 items-center justify-between px-12 lg:z-50 lg:border-b lg:border-slate-900/10 dark:border-slate-50/[0.06] supports-backdrop-blur:bg-white/95 dark:bg-slate-900/75">
    <div class="mx-auto max-w-8xl">
      <div class="py-4 mx-4 border-b border-slate-900/10 lg:px-8 lg:border-0 dark:border-slate-300/10 lg:mx-0">
        <div class="relative flex items-center">
          <a class="mr-3 flex-none w-[2.0625rem] overflow-hidden md:w-auto" href="index.php"><img class="w-[2.0625rem] rounded-full" src="https://cdn-icons-png.flaticon.com/512/821/821357.png" alt="muhakbarcom logo" />
          </a>

          <div class="relative right-0 items-center hidden ml-auto lg:flex">
            <nav class="text-sm font-semibold leading-6 text-slate-700 dark:text-slate-200">
              <ul class="flex space-x-8">
                <li>
                  <a class="hover:text-sky-500 dark:hover:text-sky-400" href="index.php">Home</a>
                </li>
                <li>
                  <a href="data-stadion.php" class="hover:text-sky-500 dark:hover:text-sky-400">Data Stadion Sepakbola</a>
                </li>
                <li>
                  <a class="hover:text-sky-500 dark:hover:text-sky-400" href="peta-sebaran.php">Peta Sebaran</a>
                </li>

                <li class="px-3 py-1 ml-5 font-semibold text-gray-800 bg-gray-100 rounded">
                  <a href="tambah.php">Kelola data</a>
                </li>
              </ul>
            </nav>
          </div>
        </div>
      </div>
    </div>
  </div>