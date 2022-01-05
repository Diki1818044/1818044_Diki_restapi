<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kamera extends CI_Controller 
{
    function __construct(){
        parent::__construct();
        $this->api="http://localhost/1818044_Diki/api/kamera/";
        $this->load->library('Curl.php');
        $this->load->helper('url');
        $this->load->helper('form');
    }

    function index(){
        $data['kamera']=json_decode($this->curl->simple_get($this->api),true);
        $this->load->view('listkamera',$data);
    }

    function create(){
        if(isset($_POST['submit'])){
            $data=array(
                'kode_barang' =>$this->input->post('kode_barang'),
                'merek' =>$this->input->post('merek'),
                'sewa_hari' =>$this->input->post('sewa_hari'),
                'harga' =>$this->input->post('harga')
            );
            $insert=$this->curl->simple_post($this->api. '/add',$data,array(CURLOPT_BUFFERSIZE=>10));
            redirect('kamera');
        }
        else{
            $this->load->view('createKamera'); 

        }
    }

    function edit(){
        if(isset($_POST['submit'])){
            $kmr=$this->input->post('kode_barang');
            $data=array(
                'merek' =>$this->input->post('merek'),
                'sewa_hari' =>$this->input->post('sewa_hari'),
                'harga' =>$this->input->post('harga')
            );
            $update=$this->curl->simple_put($this->api.'/update/'.$kode_barng,$data,array(CURLOPT_BUFFERSIZE=>10));
            redirect('kamera');
        }
        else{
            $kode_barang=$this->uri->segment(3);
            $data['kamera']=json_decode($this->curl->simple_get($this->api.'/kode_barang/'.$kode_barang),true);
            $this->load->view('editkamera',$data);
        }
    }
   
    function delete($kode_barang){
        if(empty($kode_barang)){
            redirect('kamera');
        }
        else{
            $kode_barang=$this->uri->segment(3);
            $data['kamera']=json_decode($this->curl->simple_delete($this->api.'/delete/'.$kode_barang),true);
            redirect('kamera');
        }
    }
    
}
