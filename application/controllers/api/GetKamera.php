<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH. "libraries/Format.php";
require APPPATH. "libraries/RestController.php";
use chriskacerguis\RestServer\RestController;

class GetKamera extends RestController{
    public function __construct(){
        parent::__construct();
        $this->load->model('ModelKamera');
    }

    public function index_get(){
        $kmr = new ModelKamera;
        $resultkmr= $kmr->get_kamera();
        $this->response($resultkmr,200);
    }

    public function KameraById_get($kode_barang){ 
        $kmr = new ModelKamera;
        $resultkmr= $kmr->get_Kamera_byid($kode_barang);
        $this->response($resultkmr,200);
    }

    public function AddKamera_post(){
        $kmr = new ModelKamera;
        $data=[
            'kode_barang '=> $this->input->post('kode_barang'),
            'merek' => $this->input->post('merek'),
            'sewa_hari' => $this->input->post('sewa_hari'),
            'harga'=> $this->input->post('harga'),
        ];
        $addkmr= $kmr->post_kamera($data);
        if($addkmr > 0){
            $this->response(
                [
                    'status' => true,
                    'pesan' => 'insert berhasil',
                ], RestController::HTTP_OK
            );
        }
        else{
            $this->response(
                [
                    'status' => false,
                    'pesan' => 'insert gagal'
                ], RestController::HTTP_BAD_REQUEST
            );

        }
    }

    public function UpdateKamera_put($kode_barang){
        $kmr= new ModelKamera;
        $data=[
            'merek' => $this->put('merek'),
            'sewa_hari' => $this->put('sewa_hari'),
            'harga' => $this->put('harga'),
        ];
        $putkmr= $kmr->put_kamera($kode_barang, $data);
        if($putkmr > 0){
            $this->response(
                [
                    'status' => true,
                    'pesan' => 'update berhasil',
                ], RestController::HTTP_OK
            );
        }
        else{
            $this->response(
                [
                    'status' => false,
                    'pesan' => 'update gagal'
                ], RestController::HTTP_BAD_REQUEST
            );

        }
    }

    public function DeleteKamera_delete($kode_barang){
        $kmr= new ModelKamera;
        $delkmr= $kmr->del_kamera($kode_barang);
        if($delkmr > 0){
            $this->response(
                [
                    'status' => true,
                    'pesan' => 'delete berhasil',
                ], RestController::HTTP_OK
            );
        }
        else{
            $this->response(
                [
                    'status' => false,
                    'pesan' => 'delete gagal'
                ], RestController::HTTP_BAD_REQUEST
            );

        }
    }
}

?>