<a href= "http://localhost/1818044_Diki/kamera/create">Tambah Data</a>
<table border="1">
    <tr>
        <th>kode_barang</th>
        <th>Merek</th>
        <th>sewa_hari</th>
        <th>harga</th>
    </tr>
    <?php
    foreach($kamera as $kmr){
        $kode_barang= $kmr['kb'];
        $merek= $kmr['merek'];
        $sewa_hari= $kmr['sewa_hari'];
        $harga= $kmr['harga'];

    echo "<tr>
    <td>$kode_barang</td>
    <td>$merek</td>
    <td>$sewa_hari</td>
    <td>$harga</td>
    <td>
    ". anchor('kamera/edit/'.$kode_barang, 'Edit')."
    ". anchor('kamera/delete/'.$kode_barang, 'Delete')."
    </td>
    </tr>";  
          
    }
    ?>
</table>