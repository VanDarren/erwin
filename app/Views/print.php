<?php


$imagePath = FCPATH. 'img/kop.jpeg';

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        p{
            font-family: 'Times New Roman', Times, serif;
            font-size: 15px;
        }
        table {
            font-family: 'Times New Roman', Times, serif;
            width: 100%;
        
        }
        table, th, td {
           
            padding: 5px 5px;
            text-align: center;
           
        }
        .center {
            display: block;
            margin-left: auto;
            margin-right: auto;
            width: 65%;
        }
        img {
            display: block;
            margin-left: auto;
            margin-right: auto;
        }
        hr{
            height: 1px;
            background-color: black;
        }
        .atas {
            margin-top: 5px;
        }
        .kanan {
            margin-left: 1400px;
            margin-top: -75px;
        }
   </style>
</head>
<body>
<table style="font-size: 15px;">
<tr>
    <td style="text-align: left;">
      <p>Nomor : 79/442.211.7/S.Hum/SMK-PH/IX/2023</p>
      <p>Lamp : -</p>
      <p>Perihal : PEMBAYARAN</p>
      <p></p>
      <p></p>
      <p></p>
    </td>
    
    <td style="text-align: right;">
      <p style="margin-bottom: 10px;">Batam, <?php echo date("D-d-M-Y"); ?></p>
      <p></p>
      <p></p>
      <p></p>
      <p></p>
      <p></p>
    </td>
  </tr>
</table>

<table style="font-size: 15px;"> 
    <tr>
        <td style="text-align: left;"><p>ERWIN LIE</p></td>
    </tr>
    <tr>
        <td style="text-align: left;"><p>BERSIH - BERSIH</p></td>
    </tr>
    <tr>
        <td style="text-align: left;"><p>Di Tempat</p></td>
    </tr>
</table>
       

<p>NOTA ERWIN BERSIHIN RUMAH</p> <br>
  <table class="table-container" style="font-size: 10px;" border="1px">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">DURASI</th>
                <th scope="col">JAM MULAI</th>
                <th scope="col">JAM SIAP</th>
                <th scope="col">LOKASI</th>              
                <th scope="col">TANGGAL ERWIN BERSIHIN RUMAH</th> 
                <th scope="col">TOTAL HARGA</th> 
            </tr>
        </thead>
        <tbody>
            <?php
            
            $no = 1;
           {
            ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= $wkwk->durasi?></td>
                <td><?= $wkwk->start ?></td>
                <td><?= $wkwk->end ?></td>
                <td><?= $wkwk->lokasi ?></td>	
                <td><?= $wkwk->tgl ?></td>		
                <td><?= $wkwk->total_harga ?></td>		
            </tr>
            <?php }  ?>
        </tbody>
    </table>
    </div>

   
 
         <table style="width: 100%; margin-top:30;">
  <tr>
    <td style="text-align: left;">
      <p>Tanda Terimo</p>
      <p></p>
      <p></p>
      <p></p>
    </td>
    
    <td style="text-align: right;">
      <p>ERWIN BERSIH - BERSIH</p>
      <p></p>
      <p></p>
      <p></p>
    </td>
  </tr>
</table>
</body>
</html>