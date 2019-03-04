<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_login extends CI_Model {

	function cek_login($table,$where)
	{
		return $this->db->get_where($table,$where);
	}

	function tab_data($table)
	{
		return $this->db->query("select * from $table")->result();
	}

	function datadiri($where,$table)
	{
		return $this->db->get_where($table,$where)->result();
	}

	function update($where,$db,$table)
	{
		$this->db->where($where);
		$this->db->update($table,$db);
	}
	function insert_pemesanan_pp($data)
	{
		$this->db->insert('pemesanan_pariwisata',$data);
		$return_id = $this->db->insert_id();
		return $return_id;
	}

	function del_badge($id){
		return $this->db->query('delete from npemesanan_pariwisata where tgl_expied = ?',$id);
	}
	function upsttb($id){
		return $this->db->query('update bus set sttb ="0" where id = ?',$id);
	}

	function deletebus($id){
		return $this->db->query('delete from bus where id = ?',array($id));
	}

	function buatkodebusbandara(){
		$this->db->select('RIGHT(bus.bus,4) as kode', FALSE);
		$this->db->order_by('bus','desc');
		$this->db->limit(1);
		$query = $this->db->get('bus');
		if($query->num_rows() <> 0){
			$data = $query->row();
			$kode = intval($data->kode) + 1;
		}else{
			$kode = 1;
		}

		  $kodemax = str_pad($kode, 4, "0", STR_PAD_LEFT); // angka 4 menunjukkan jumlah digit angka 0
		  $kodejadi = "DAMRI-B-".$kodemax;    // hasilnya ODJ-9921-0001 dst.
		  return $kodejadi; 
	}
	function buatkodebuspariwisata(){
		$this->db->select('RIGHT(bus.bus,4) as kode', FALSE);
		$this->db->order_by('bus','desc');
		$this->db->limit(1);
		$query = $this->db->get('bus');
		if($query->num_rows() <> 0){
			$data = $query->row();
			$kode = intval($data->kode) + 1;
		}else{
			$kode = 1;
		}

		  $kodemax = str_pad($kode, 4, "0", STR_PAD_LEFT); // angka 4 menunjukkan jumlah digit angka 0
		  $kodejadi = "DAMRI-P-".$kodemax;    // hasilnya ODJ-9921-0001 dst.
		  return $kodejadi; 
	}
	function buatkodebusperintis(){
		$this->db->select('RIGHT(bus.bus,4) as kode', FALSE);
		$this->db->order_by('bus','desc');
		$this->db->limit(1);
		$query = $this->db->get('bus');
		if($query->num_rows() <> 0){
			$data = $query->row();
			$kode = intval($data->kode) + 1;
		}else{
			$kode = 1;
		}

		  $kodemax = str_pad($kode, 4, "0", STR_PAD_LEFT); // angka 4 menunjukkan jumlah digit angka 0
		  $kodejadi = "DAMRI-Pr-".$kodemax;    // hasilnya ODJ-9921-0001 dst.
		  return $kodejadi; 
	}
	function buatkodebusmudik(){
		$this->db->select('RIGHT(bus.bus,4) as kode', FALSE);
		$this->db->order_by('bus','desc');
		$this->db->limit(1);
		$query = $this->db->get('bus');
		if($query->num_rows() <> 0){
			$data = $query->row();
			$kode = intval($data->kode) + 1;
		}else{
			$kode = 1;
		}

		  $kodemax = str_pad($kode, 4, "0", STR_PAD_LEFT); // angka 4 menunjukkan jumlah digit angka 0
		  $kodejadi = "DAMRI-M-".$kodemax;    // hasilnya ODJ-9921-0001 dst.
		  return $kodejadi; 
	}

	function ceknopol(){
		$nopol = $this->input->post('nopol');
		return $this->db->query('select * from bus where nopol = ?',array($nopol))->num_rows();
	}

	function getbus($id,$idj){
		return $this->db->query('SELECT *, jadwal.id as idj ,bus.id as idd, ntujuan.nama as naju, hari.nama as namahari, jamberangkat.jam as jamberangkat FROM `jadwal`, bus, ntujuan, jamberangkat,hari, jenis_sheet where jadwal.idbus = bus.id and jadwal.tujuan = ntujuan.id and jadwal.berangkat = jamberangkat.id and jadwal.hari = hari.id and jenis_sheet.id = bus.idshet and bus.id = ? and jadwal.id = ?',array($id, $idj))->row();
	}

	function getsheet($id){
		return $this->db->query('select * from bus, sheet where bus.idshet = sheet.idjsh and bus.id = ?',array($id))->result();
	}
	function ins_pemesanantiket($data){
		return $this->db->insert('pemesanan_tiket',$data);
	}
	function expiredtiket(){
		return $this->db->query('select now() + interval "3" HOUR as rentang')->row();
	}

	function konfirmasipemesanantiket($id){
		return $this->db->query('select *, jamberangkat.jam as jamberangkat, hari.nama as namahari, pemesanan_tiket.id as idtiket, pemesanan_tiket.jumlahtiket as juket, ntujuan.nama as naju, pemesanan_tiket.status as natus from pemesanan_tiket, login, jadwal, ntujuan, bus, hari, jamberangkat where pemesanan_tiket.iduser = login.id and pemesanan_tiket.idjadwal = jadwal.id and jadwal.tujuan = ntujuan.id and bus.id = jadwal.idbus and jamberangkat.id = jadwal.berangkat and hari.id = jadwal.hari and pemesanan_tiket.iduser = ? order by pemesanan_tiket.id desc',array($id))->row();
	}

	function showpemesanantiket($id){
		return $this->db->query('select *, pemesanan_tiket.id as idtiket, hari.nama as namahari, jamberangkat.jam as jamberangkat, pemesanan_tiket.jumlahtiket as juket, ntujuan.nama as naju, pemesanan_tiket.status as natus, pemesanan_tiket.id as idtiket from pemesanan_tiket, login, jadwal, ntujuan, bus, hari, jamberangkat where pemesanan_tiket.iduser = login.id and pemesanan_tiket.idjadwal = jadwal.id and jadwal.tujuan = ntujuan.id and bus.id = jadwal.idbus and hari.id = jadwal.hari and jamberangkat.id = jadwal.berangkat and login.id = ?',array($id))->result();
	}

	function showuppemesanantiket($iduser,$id){
		return $this->db->query('select *, pemesanan_tiket.jumlahtiket as juket, ntujuan.nama as naju, pemesanan_tiket.status as natus, pemesanan_tiket.id as idtiket, hari.nama as namahari, jamberangkat.jam as jamberangkat from pemesanan_tiket, login, jadwal, ntujuan, bus, hari, jamberangkat where pemesanan_tiket.iduser = login.id and pemesanan_tiket.idjadwal = jadwal.id and jadwal.tujuan = ntujuan.id and bus.id = jadwal.idbus and jadwal.hari = hari.id and jamberangkat.id = jadwal.berangkat and login.id = ? and pemesanan_tiket.id = ?',array($iduser,$id))->row();
	}

	function updatetiket($bukti,$status,$tanggal,$id){
		return $this->db->query('update pemesanan_tiket set bukti = ? , status = ?, tgl_up = ? where id = ?',array($bukti,$status,$tanggal,$id));
	}

	function pemesanantiket_print($idpemesanan,$iduser){
		return $this->db->query('select *, pemesanan_tiket.id as idtiket, hari.nama as namahari, jamberangkat.jam as jamberangkat, pemesanan_tiket.jumlahtiket as juket, ntujuan.nama as naju, pemesanan_tiket.status as natus, pemesanan_tiket.id as idtiket from pemesanan_tiket, login, jadwal, ntujuan, bus, hari, jamberangkat where pemesanan_tiket.iduser = login.id and pemesanan_tiket.idjadwal = jadwal.id and jadwal.tujuan = ntujuan.id and bus.id = jadwal.idbus and hari.id = jadwal.hari and jamberangkat.id = jadwal.berangkat and pemesanan_tiket.id = ? and login.id = ?',array($idpemesanan,$iduser))->row();
	}

}

/* End of file M_login.php */
/* Location: ./application/models/M_login.php */