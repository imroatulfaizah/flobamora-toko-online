<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Laporan Barang</title>
  </head>
  <body onload="window.print()">
    <center>
      <h2>Laporan Barang</h2>
    </center>

    <table width="100%" border='1'>
      <tr>
        <th width="30px;">No.</th>
        <th>Nama Barang</th>
        <th>Nama Kategori</th>
        <th>Harga Barang</th>
        <th>Jumlah Barang</th>
        <th>Deskripsi</th>
        <th>Dilihat</th>
      </tr>
      <?php
      $no = 1;
      foreach ($v_barang->result() as $baris) {
      ?>
        <tr>
          <td><?php echo $no.'.'; ?></td>
          <td><?php echo $baris->nama_barang; ?></td>
          <td><?php echo $baris->nama_kategori; ?></td>
          <td>Rp. <?php echo number_format($baris->harga_barang, 0,",","."); ?></td>
          <td><?php echo number_format($baris->jumlah_barang, 0,",","."); ?></td>
          <td><?php echo $baris->deskripsi; ?></td>
          <td><?php echo $baris->dilihat; ?></td>
        </tr>
      <?php
      $no++;
      } ?>
    </table>

  </body>
</html>
