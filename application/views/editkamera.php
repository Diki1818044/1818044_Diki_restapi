<?php
echo form_open('kamera/edit/');
?>

<table border='1'>
    <tr>
        <td>kode_barang</td>
        <td><?php echo form_input('kode_barang',$kamera['kode_barang'],"readonly"); ?></td>
    </tr>
    <tr>
        <td>merek</td>
        <td><?php echo form_input('merek',$kamera['merek']); ?> </td>
    </tr>
    <tr>
        <td>sewa_hari</td>
        <td><?php echo form_input('sewa_hari',$kamera['sewa_hari']); ?> </td>
    </tr>
    <tr>
        <td>harga</td>
        <td><?php echo form_input('harga',$kamera['harga']); ?> </td>
    </tr>
    <tr>
        <td colspan="2"><?php echo form_submit('submit', 'Update'); ?>
            <?php echo anchor('kamera', 'Kembali'); ?>
        </td>
    </tr>
</table>
<?php echo form_close(); 
?>