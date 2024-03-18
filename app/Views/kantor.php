<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Menu Clean</title>
<style>
  .container {
    width: 700px; /* Lebar diperbesar */
    height: 650px;
    padding: 30px; /* Padding diperbesar */
    margin: 10px auto; /* Mengatur margin atas dan bawah, dan auto pada sisi kiri dan kanan untuk posisi tengah */
    border: 1px solid #ccc;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    display: flex;
    flex-direction: column;
    /* align-items: center; Memusatkan konten secara horizontal */
  }

  .title {
    font-size: 20px;
    font-weight: bold;
    margin-bottom: 10px;
    text-align: center; /* Menengahkan judul */
  }

  .form-container {
    margin-bottom: 20px;
  }

  .button-container {
    display: flex;
    flex-wrap: wrap; /* Mengatur baris baru jika tombol melebihi lebar container */
    justify-content: center; /* Membuat tombol-tombol diatur secara merata */
    width: 100%; /* Mengisi seluruh lebar container */
    height: 75%;
  }

  .button {
  flex: 0 0 calc(50% - 10px); /* Lebar 50% dari container, dikurangi margin */
  padding: 12px 24px; /* Padding untuk tombol */
  background-color: #007bff;
  color: #fff;
  border: none;
  border-radius: 8px; /* Sudut bulat untuk tombol */
  cursor: pointer;
  margin: 5px; /* Jarak antara tombol */
   /* Tinggi 50% dari container, dikurangi margin */
}

  .button:hover {
    background-color: #0056b3;
  }

  .price {
    /* text-align: center; Menengahkan teks */
    margin-top: 5px; /* Jarak antara tombol dan harga */
  }
</style>
</head>
<body>

<h1 align="center">Menu Kantor</h1>

<div class="container">
  <form class="form-container">
    <!-- Isi formulir di sini jika perlu -->
  </form>

  <div class="button-container">
  <?php
$no = 1;
foreach ($kantor as $wkwk) {
    $time_components = explode(':', $wkwk->durasi); // Pisahkan jam, menit, dan detik
    $hours = intval($time_components[0]); // Ambil jumlah jam
    $minutes = intval($time_components[1]); // Ambil jumlah menit

    if ($minutes === 0) {
        $duration = $hours . ' Jam';
    } else {
        $decimal_hours = $hours + ($minutes / 60); // Hitung jumlah jam dengan pecahan menit
        $duration = number_format($decimal_hours, 1) . ' Jam';
    }
    // Format harga dengan number_format() dan tambahkan label "Rp"
    $formatted_price = 'Rp ' . number_format($wkwk->harga, 0, ',', '.');
    // Tampilkan tombol dengan durasi dalam format jam
    ?>
    <!-- <button class="button" onclick="location.href='<?=base_url('home/'.$no++)?>'"> -->
    <button class="button" data-price="<?= $wkwk->harga ?>" onclick="buttonClicked(this)">
        <?= $duration ?> 
        
        <?= $formatted_price ?>
    </button>
    <?php } ?>
  </div>
  <div>
  <h6 class="price">Total Harga</h6>
  <input type="text" class="form-control" id="total_harga" name="total_harga" readonly value="Rp 0">
  </div>
  <hr>
  <button class="btn btn-sm btn-success" id="btn-lanjut">Lanjut</button>
  <button class="btn btn-sm btn-danger" id="btn-cancel">Cancel</button>
</div>

<script>
  // Set nilai awal total harga menjadi Rp 0
  document.getElementById('total_harga').value = 'Rp 0';

  // Ambil semua elemen tombol
  var buttons = document.querySelectorAll('.button');

  // Tambahkan event listener untuk setiap tombol
  buttons.forEach(function(button) {
    button.addEventListener('click', function() {
      // Ambil harga dari atribut data-price
      var price = parseInt(button.getAttribute('data-price'));
      // Ambil nilai total harga saat ini
      var currentTotal = parseInt(document.getElementById('total_harga').value.replace('Rp ', '').replace('.', '').replace(',', '')) || 0;
      // Hitung total harga baru
      var newTotal = currentTotal + price;
      // Format total harga sebagai mata uang
      var formattedTotal = 'Rp ' + newTotal.toLocaleString();
      // Update nilai total harga pada input
      document.getElementById('total_harga').value = formattedTotal;
      // Nonaktifkan tombol yang ditekan
      disableButtons(buttons, button);
    });
  });

  // Fungsi untuk menonaktifkan tombol yang tidak ditekan
  function disableButtons(buttons, activeButton) {
    buttons.forEach(function(button) {
      if (button !== activeButton) {
        button.disabled = true;
      }
    });
  }

  // Ambil tombol "Cancel"
  var btnCancel = document.getElementById('btn-cancel');
  
  // Tambahkan event listener untuk tombol "Cancel"
  btnCancel.addEventListener('click', function() {
    // Setel nilai total harga kembali menjadi 0
    document.getElementById('total_harga').value = 'Rp 0';
    // Aktifkan kembali semua tombol
    buttons.forEach(function(button) {
      button.disabled = false;
    });
  });

  // Ambil tombol "Lanjut"
  var btnLanjut = document.getElementById('btn-lanjut');
  
  // Tambahkan event listener untuk tombol "Lanjut"
  btnLanjut.addEventListener('click', function() {
    // Lakukan tindakan ketika tombol "Lanjut" ditekan
  });

  // Fungsi untuk menangani klik tombol
  function buttonClicked(button) {
    // Nonaktifkan tombol yang ditekan
    button.disabled = true;
  }
</script>

</body>
</html>
