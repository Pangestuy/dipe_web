<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class BARANG extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_barang');
        $this->load->model('M_fasilitas');
        $this->load->model('M_fasilitas_barang');
        $this->load->library('form_validation');
        $this->load->library('upload');
        $this->load->library('datatables');
    }

    public function index()
    {
        $data['data'] = $this->M_barang->get_all();
        $this->load->view('template/header');
        $this->load->view('barang/tb_barang_list', $data);
        $this->load->view('template/footer');
    }

    public function json()
    {
        header('Content-Type: application/json');
        echo $this->M_barang->json();
    }

    public function read($id)
    {
        $row = $this->M_barang->get_by_id($id);

        if ($row) {
            $data = array(
                'ID_BARANG' => $row->ID_BARANG,
                'NAMA_BARANG' => $row->NAMA_BARANG,
                'MERK_BARANG' => $row->MERK_BARANG,
                'DESKRIPSI_BARANG' => $row->DESKRIPSI_BARANG,
                'TAHUN_BARANG' => $row->TAHUN_BARANG,
                'HARGA_BARANG' => $row->HARGA_BARANG,
                'WARNA_BARANG' => $row->WARNA_BARANG,
                'STATUS_SEWA' => $row->STATUS_SEWA,
                'STATUS_BARANG' => $row->STATUS_BARANG,
                'CREATED_BARANG' => $row->CREATED_BARANG,
                'IMAGE' => $row->IMAGE,
                'FASILITAS' => $this->M_fasilitas_barang->get_by_id($id),
            );
            $this->load->view('template/header');
            $this->load->view('barang/tb_barang_read', $data);
            $this->load->view('template/footer');
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('barang'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('barang/create_action'),
            'ID_BARANG' => set_value('ID_BARANG'),
            'NAMA_BARANG' => set_value('NAMA_BARANG'),
            'MERK_BARANG' => set_value('MERK_BARANG'),
            'DESKRIPSI_BARANG' => set_value('DESKRIPSI_BARANG'),
            'TAHUN_BARANG' => set_value('TAHUN_BARANG'),
            'HARGA_BARANG' => set_value('HARGA_BARANG'),
            'WARNA_BARANG' => set_value('WARNA_BARANG'),
            'STATUS_SEWA' => set_value('STATUS_SEWA'),
            'STATUS_BARANG' => set_value('STATUS_BARANG'),
            'CREATED_BARANG' => set_value('CREATED_BARANG'),
        );
        // $data['fasilitas']=$this->M_fasilitas->get_all();

        // foreach ($data['fasilitas'] as $var) {
        //     $data['fasilitas_barang'][$var->ID_FASILITAS]="";
        // }

        // $data['fasilitas_BARANG']=$this->M_fasilitas_BARANG->get_by_id(0);
        $this->load->view('template/header');
        $this->load->view('barang/tb_barang_form', $data);
        $this->load->view('template/footer');
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {

            $data["data"] = array(
                'NAMA_BARANG' => $this->input->post('NAMA_BARANG', TRUE),
                'MERK_BARANG' => $this->input->post('MERK_BARANG', TRUE),
                'DESKRIPSI_BARANG' => $this->input->post('DESKRIPSI_BARANG', TRUE),
                'TAHUN_BARANG' => $this->input->post('TAHUN_BARANG', TRUE),
                'HARGA_BARANG' => $this->input->post('HARGA_BARANG', TRUE),
                'WARNA_BARANG' => $this->input->post('WARNA_BARANG', TRUE),
                'STATUS_SEWA' => $this->input->post('STATUS_SEWA', TRUE),
                'STATUS_BARANG' => $this->input->post('STATUS_BARANG', TRUE),
                'CREATED_BARANG' => date('Y-m-d H:i:s'),
            );
            // $data["fasilitas"]=array();
            $data["photo"] = array();
            // $fasilitas=$this->input->post('FASILITAS',TRUE);

            // foreach ($fasilitas as $row) {
            //     $data["fasilitas"][]=array('ID_FASILITAS'=> $row);
            // }

            $nama_photo = date("YmdHis") . ".jpg";
            $config = $this->config_image($nama_photo, "./upload/barang");
            $this->upload->initialize($config);

            if ($this->upload->do_upload('PHOTO')) {
                $data["photo"] = array('IMAGE' => $nama_photo);
            }


            $this->M_barang->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('barang'));
        }
    }

    public function update($id)
    {
        $row = $this->M_barang->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('barang/update_action'),
                'ID_BARANG' => set_value('ID_BARANG', $row->ID_BARANG),
                'NAMA_BARANG' => set_value('NAMA_BARANG', $row->NAMA_BARANG),
                'MERK_BARANG' => set_value('MERK_BARANG', $row->MERK_BARANG),
                'DESKRIPSI_BARANG' => set_value('DESKRIPSI_BARANG', $row->DESKRIPSI_BARANG),
                'TAHUN_BARANG' => set_value('TAHUN_BARANG', $row->TAHUN_BARANG),
                'HARGA_BARANG' => set_value('HARGA_BARANG', $row->HARGA_BARANG),
                'WARNA_BARANG' => set_value('WARNA_BARANG', $row->WARNA_BARANG),
                'STATUS_SEWA' => set_value('STATUS_SEWA', $row->STATUS_SEWA),
                'STATUS_BARANG' => set_value('STATUS_BARANG', $row->STATUS_BARANG),
                'CREATED_BARANG' => set_value('CREATED_BARANG', $row->CREATED_BARANG),
            );

            // $data['fasilitas'] = $this->M_fasilitas->get_all();
            // $fasilitas_BARANG = $this->M_fasilitas_BARANG->get_by_id($id);
            // foreach ($data['fasilitas'] as $var) {
            //     $data['fasilitas_barang'][$var->ID_FASILITAS] = "";
            // }

            // foreach ($fasilitas_BARANG as $var) {
            //     $data['fasilitas_barang'][$var->ID_FASILITAS] = "checked";
            // }


            $this->load->view('template/header');
            $this->load->view('barang/tb_barang_form', $data);
            $this->load->view('template/footer');
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('barang'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('ID_BARANG', TRUE));
        } else {
            $data['data'] = array(
                'NAMA_BARANG' => $this->input->post('NAMA_BARANG', TRUE),
                'MERK_BARANG' => $this->input->post('MERK_BARANG', TRUE),
                'DESKRIPSI_BARANG' => $this->input->post('DESKRIPSI_BARANG', TRUE),
                'TAHUN_BARANG' => $this->input->post('TAHUN_BARANG', TRUE),
                'HARGA_BARANG' => $this->input->post('HARGA_BARANG', TRUE),
                'WARNA_BARANG' => $this->input->post('WARNA_BARANG', TRUE),
                'STATUS_SEWA' => $this->input->post('STATUS_SEWA', TRUE),
                'STATUS_BARANG' => $this->input->post('STATUS_BARANG', TRUE),
            );

            // $data["fasilitas"] = array();
            $data["photo"] = array();
            // $fasilitas = $this->input->post('FASILITAS', TRUE);

            // if ($fasilitas) {
            //     foreach ($fasilitas as $row) {
            //         $data["fasilitas"][] = array('ID_FASILITAS' => $row);
            //     }
            // }

            $nama_photo = date("YmdHis") . ".jpg";
            $config = $this->config_image($nama_photo, "./upload/barang");
            $this->upload->initialize($config);

            if ($this->upload->do_upload('PHOTO')) {
                $data["photo"] = array('IMAGE' => $nama_photo);
            }


            $this->M_barang->update($this->input->post('ID_BARANG', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('barang'));
        }
    }

    public function delete($id)
    {
        $row = $this->M_barang->get_by_id($id);

        if ($row) {
            $this->M_barang->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('barang'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('barang'));
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('NAMA_BARANG', 'nama BARANG', 'trim|required');
        $this->form_validation->set_rules('MERK_BARANG', 'merk BARANG', 'trim|required');
        $this->form_validation->set_rules('DESKRIPSI_BARANG', 'deskripsi BARANG', 'trim|required');
        $this->form_validation->set_rules('TAHUN_BARANG', 'tahun BARANG', 'trim|required');
        $this->form_validation->set_rules('HARGA_BARANG', 'harga BARANG', 'trim|required|numeric');
        $this->form_validation->set_rules('WARNA_BARANG', 'warna BARANG', 'trim|required');
        $this->form_validation->set_rules('STATUS_SEWA', 'status sewa', 'trim|required');
        $this->form_validation->set_rules('STATUS_BARANG', 'status BARANG', 'trim|required');
        // $this->form_validation->set_rules('CREATED_BARANG', 'created BARANG', 'trim|required');

        $this->form_validation->set_rules('ID_BARANG', 'ID_BARANG', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function config_image($file_name, $path)
    {
        $config['image_library'] = 'gd2';
        $config['file_name'] = $file_name;
        $config['upload_path'] = $path;
        $config['allowed_types'] = 'png|jpg|gif';
        $config['max_size'] = 50000;
        $config['max_height'] = 50000;
        $config['max_width'] = 50000;
        $config['overwrite'] = TRUE;
        return $config;
    }
}
