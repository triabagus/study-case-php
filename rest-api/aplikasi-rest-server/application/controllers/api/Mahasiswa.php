<?php
use Restserver\Libraries\REST_Controller;
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class Mahasiswa extends CI_Controller
{

    use REST_Controller {
        REST_Controller::__construct as private __resTraitConstruct;
    }

    public function __construct(){
        parent::__construct();
        $this->__resTraitConstruct();

        $this->load->model('Mahasiswa_model', 'mhs');
        $this->methods['index_get']['limit'] = 20;
    }
    /**
     * GET REST (all ,id)
     */
    public function index_get(){

        $id = $this->get('id');
        if($id === null){
            $mahasiswa = $this->mhs->getMahasiswa();
        }else{
            $mahasiswa = $this->mhs->getMahasiswa($id);
        }
        
        if($mahasiswa){
            $this->response([
                'status' => true,
                'data' => $mahasiswa
            ], 200); // HTTP_OK (200) being the HTTP response code
        }else{
            $this->response([
                'status' => false,
                'message' => 'Data is not found'           
            ],404); // HTTP_NOT_FOUND (404) being the HTTP response code
        }
    }

    /**
     * Delete Function Rest
     */
    public function index_delete(){

        $id=$this->delete('id');
        if($id === null){
            // Provide is an
            $this->response([
                'status' => false,
                'message' => 'Provide is an !'           
            ],400); // HTTP_BAD_REQUEST (400) being the HTTP response code
        }else{
            if($this->mhs->deleteMahasiswa($id) > 0){
                // OK
                $this->response([
                    'status' => true,
                    'id' => $id,
                    'message' => 'Data is deleted'           
                ],204); // HTTP_NO_CONTENT (204) being the HTTP response code
            }else{
                // Id not found
                $this->response([
                    'status' => false,
                    'message' => 'Data id is not found'           
                ],400); // HTTP_BAD_REQUEST (400) being the HTTP response code
            }
        }
    }

    /**
     * INSERT REST / POST
     */
    public function index_post(){
        $data = [
            'nrp' => $this->post('nrp'),
            'nama' => $this->post('nama'),
            'email' => $this->post('email'),
            'jurusan' => $this->post('jurusan')
        ];

        if($this->mhs->createMahasiswa($data) > 0){
            // CREATED
            $this->response([
                'status' => true,
                'message' => 'Data is created'           
            ],201); // HTTP_CREATED (201) being the HTTP response code            
        }else{
            // BAD
            $this->response([
                'status' => false,
                'message' => 'Failed created data'           
            ],400); // HTTP_BAD_REQUEST (400) being the HTTP response code            
        }
    }

    /**
     * PUT REST
     */
    public function index_put(){
        $id = $this->put('id');
        $data = [
            'nrp' => $this->put('nrp'),
            'nama' => $this->put('nama'),
            'email' => $this->put('email'),
            'jurusan' => $this->put('jurusan')
        ];

        if($this->mhs->updateMahasiswa($data, $id) > 0){
            // CREATED
            $this->response([
                'status' => true,
                'message' => 'Data mahasiswa is updated'           
            ],204); // HTTP_NO_CONTENT (204) being the HTTP response code            
        }else{
            // BAD
            $this->response([
                'status' => false,
                'message' => 'Failed update data'           
            ],400); // HTTP_BAD_REQUEST (400) being the HTTP response code            
        }
    }
}