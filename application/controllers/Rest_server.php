<?php

require APPPATH . '/libraries/REST_Controller.php';

class Rest_server extends REST_Controller {

    function __construct($config = 'rest') {
        parent::__construct($config);
    }

    // show data mahasiswa
    function index_get() {
        $nim = $this->get('poi_dou');
        if ($nim == '') {
            $mahasiswa = $this->db->get('poi_dou')->result();
        } else {
            $this->db->where('area', $nim);
            $mahasiswa = $this->db->get('poi_dou')->result();
        }
        $this->response($mahasiswa, 200);
    }

    // insert new data to mahasiswa
    function index_post() {
        $data = array(
                    'nim'           => $this->post('nim'),
                    'nama'          => $this->post('nama'),
                    'id_jurusan'    => $this->post('id_jurusan'),
                    'alamat'        => $this->post('alamat'));
        $insert = $this->db->insert('mahasiswa', $data);
        if ($insert) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }

    // update data mahasiswa
    function index_put() {
        $nim = $this->put('nim');
        $data = array(
                    'nim'       => $this->put('nim'),
                    'nama'      => $this->put('nama'),
                    'id_jurusan'=> $this->put('id_jurusan'),
                    'alamat'    => $this->put('alamat'));
        $this->db->where('nim', $nim);
        $update = $this->db->update('mahasiswa', $data);
        if ($update) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }

    // delete mahasiswa
    function index_delete() {
        $nim = $this->delete('nim');
        $this->db->where('nim', $nim);
        $delete = $this->db->delete('mahasiswa');
        if ($delete) {
            $this->response(array('status' => 'success'), 201);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }

}