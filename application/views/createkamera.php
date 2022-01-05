<?php
echo form_open_multipart('kamera/create');
?>

<table border='1'>
    <tr>
        <td>kode_barang</td>
        <td><?php echo form_input('kode_barang'); ?> </td>
    </tr>
    <tr>
        <td>merek</td>
        <td><?php echo form_input('merek'); ?> </td>
    </tr>
    <tr>
        <td>sewa_hari</td>
        <td><?php echo form_input('sewa_hari'); ?> </td>
    </tr>
    <tr>
        <td>harga</td>
        <td><?php echo form_input('harga'); ?> </td>
    </tr>
    <tr>
        <td colspan="2"><?php echo form_submit('submit', 'Simpan'); ?>
            <?php echo anchor('kamera', 'Kembali'); ?>
        </td>
    </tr>
</table>
<?php echo form_close(); ?>