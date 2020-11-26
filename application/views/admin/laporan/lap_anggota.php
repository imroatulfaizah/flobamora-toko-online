<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Laporan Anggota</title>
  </head>
  <body onload="window.print()">
    <center>
      <h2>Laporan Anggota</h2>
    </center>

    <table width="100%" border='1'>
      <tr>
        <th width="30px;">No.</th>
        <th>Username</th>
        <th>Nama Anggota</th>
        <th>Email</th>
        <th>Telp</th>
        <th>Alamat</th>
        <th>Tgl Daftar</th>
      </tr>
      <?php
      $no = 1;
      foreach ($v_anggota->result() as $baris) {
      ?>
        <tr>
          <td><?php echo $no.'.'; ?></td>
          <td><?php echo $baris->username; ?></td>
          <td><?php echo $baris->nama_anggota; ?></td>
          <td><?php echo $baris->email; ?></td>
          <td><?php echo $baris->telp; ?></td>
          <td><?php echo $baris->alamat; ?></td>
          <td><?php echo $baris->tgl_daftar; ?></td>
        </tr>
      <?php
      $no++;
      } ?>
    </table>

  </body>
</html>
