<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Laporan Anggota</title>
    <base href="<?php echo base_url();?>"/>
  </head>
  <body onload="window.print()">
    <center>
      <h2>Laporan Pemesanan</h2>
    </center>

    <table width="100%" border='1'>
      <tr>
        <th width="30px;">No.</th>
        <th>Bukti Pembayaran</th>
        <th>Nama Anggota</th>
        <th>Jumlah dipesan</th>
        <th>Total Harga</th>
        <th>Tgl Pemesanan</th>
      </tr>
      <?php
      $no = 1;
      foreach ($v_pemesanan->result() as $baris) {
        $data = $this->db->query("SELECT * FROM tbl_anggota WHERE username='$baris->username'")->row();
      ?>
        <tr>
          <td><?php echo $no.'.'; ?></td>
          <td>
            <a href="<?php echo $baris->foto; ?>" target="_blank">
              <img src="<?php echo $baris->foto; ?>" alt="" width="100">
            </a>
          </td>
          <td><?php echo $data->nama_anggota; ?></td>
          <td><?php echo $baris->jumlah_dipesan; ?></td>
          <td>Rp. <?php echo number_format($baris->total,0,",","."); ?></td>
          <td><?php echo $baris->tgl_pemesanan; ?></td>
        </tr>
      <?php
      $no++;
      } ?>
    </table>

  </body>
</html>
