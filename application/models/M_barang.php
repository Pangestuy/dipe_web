<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class M_BARANG extends CI_Model
{

    public $table = 'tb_barang';
    public $table_gallery = 'tb_gallery_barang';
    public $table_fasilitas = 'tb_fasilitas_barang';
    public $id = 'ID_BARANG';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // datatables
    function json() {
        $this->datatables->select('ID_BARANG,NAMA_BARANG,MERK_BARANG,DESKRIPSI_BARANG,TAHUN_BARANG,HARGA_BARANG,WARNA_BARANG,STATUS_SEWA,STATUS_BARANG,CREATED_BARANG');
        $this->datatables->from('tb_BARANG');
        //add this line for join
        //$this->datatables->join('table2', 'tb_BARANG.field = table2.field');
        $this->datatables->add_column('action', anchor(site_url('BARANG/read/$1'),'Read')." | ".anchor(site_url('BARANG/update/$1'),'Update')." | ".anchor(site_url('BARANG/delete/$1'),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'), 'ID_BARANG');
        return $this->datatables->generate();
    }

    // get all
    function get_all()
    {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->table.".".$this->id, $id);
        $this->db->select('*')->from($this->table);
        $this->db->join($this->table_gallery,$this->table_gallery.".ID_BARANG=".$this->table.".ID_BARANG");
        return $this->db->get()->row();
    }
    
    // get total rows
    function total_rows($q = NULL) {
    $this->db->like('ID_BARANG', $q);
	$this->db->or_like('NAMA_BARANG', $q);
	$this->db->or_like('MERK_BARANG', $q);
	$this->db->or_like('DESKRIPSI_BARANG', $q);
	$this->db->or_like('TAHUN_BARANG', $q);
	$this->db->or_like('HARGA_BARANG', $q);
	$this->db->or_like('WARNA_BARANG', $q);
	$this->db->or_like('STATUS_SEWA', $q);
	$this->db->or_like('STATUS_BARANG', $q);
	$this->db->or_like('CREATED_BARANG', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('ID_BARANG', $q);
    	$this->db->or_like('NAMA_BARANG', $q);
    	$this->db->or_like('MERK_BARANG', $q);
    	$this->db->or_like('DESKRIPSI_BARANG', $q);
    	$this->db->or_like('TAHUN_BARANG', $q);
    	$this->db->or_like('HARGA_BARANG', $q);
    	$this->db->or_like('WARNA_BARANG', $q);
    	$this->db->or_like('STATUS_SEWA', $q);
    	$this->db->or_like('STATUS_BARANG', $q);
    	$this->db->or_like('CREATED_BARANG', $q);
    	$this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    // insert data
    function insert($data)
    {
        $this->db->insert($this->table, $data['data']);
        $id=$this->db->insert_id();

        // foreach ($data["fasilitas"] as $key => $value) {
        //     $data["fasilitas"][$key]["ID_BARANG"]=$id;
        // }
        
        $data["photo"]["ID_BARANG"]=$id;
        
        // $this->db->insert_batch($this->table_fasilitas, $data["fasilitas"]);
        $this->db->insert($this->table_gallery, $data['photo']);
    }

    // update data
    function update($id, $data)
    {

        $this->db->where($this->id, $id)->update($this->table, $data['data']);

        $this->db->where($this->id, $id)->delete($this->table_fasilitas);
        foreach ($data["fasilitas"] as $key => $value) {
            $data["fasilitas"][$key]["ID_BARANG"]=$id;
        }
        
        if ($data["fasilitas"]) {
            $this->db->insert_batch($this->table_fasilitas, $data["fasilitas"]);
        }

        if ($data["photo"]) {
            $this->db->where($this->id, $id)->delete($this->table_gallery);
            // $this->db->delete($this->table_gallery);
            $data["photo"]["ID_BARANG"]=$id;
            $this->db->insert($this->table_gallery, $data['photo']);
        }
        
    


    }

    // delete data
    function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table_fasilitas);
        $this->db->where($this->id, $id);
        $this->db->delete($this->table_gallery);
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }

}
