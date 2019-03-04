<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
	
	#var $pemesanan = 'SELECT *, login.nama as user, paket_wisata.tujuan as tj, npemesanan_pariwisata.harga as hrg, npemesanan_pariwisata.status as stt, npemesanan_pariwisata.id as idp, npemesanan_pariwisata.idbus as idb FROM `npemesanan_pariwisata`, login,bus,paket_wisata where npemesanan_pariwisata.iduser = login.id and npemesanan_pariwisata.idbus = bus.id and npemesanan_pariwisata.tujuan = paket_wisata.id';
	var $pemesanan = 'select *, npemesanan_pariwisata.id as idpp, login.nama as nalog, jdw_pariwisata.tujuan as naju, npemesanan_pariwisata.status as stt from npemesanan_pariwisata, jdw_pariwisata, login, jenis_sheet where jdw_pariwisata.id = npemesanan_pariwisata.tujuan and login.id = npemesanan_pariwisata.iduser and jenis_sheet.id = npemesanan_pariwisata.jumkursi';
	function __construct(){
		parent::__construct();
		if($this->session->userdata('stat')!= "login")
		{
			redirect(base_url('login'),'refresh');
		}
		$this->session->userdata('nama');
		$this->load->model('m_login');
		$this->load->helper('form','url');
	}

	public function index()
	{
		$data = array(
			'nama' => $this->session->userdata('nama')
		);
		$this->load->view('Admin/header',$data);
		$this->load->view('Admin/content');
		$this->load->view('Admin/footer');
	}
	function esop($id){
		$data = array(
			'nama' => $this->session->userdata('nama'),
			'sopir' => $this->db->get('sopir',array('id' => $id))->row(),
		);
		#var_dump($data);
		
		$this->load->view('Admin/Header', $data, FALSE);
		$this->load->view('Admin/editsopir');
		$this->load->view('Admin/Footer');
	}
	function editjadwal(){
		$id = $this->input->post('id');
		$data = array(
			'nama' => $this->session->userdata('nama'),
			'jadwal' => $this->db->query('select *, jadwal.id as idj, bus.bus as nabus, ntujuan.nama as naju, hari.nama as _nHari, jamberangkat.jam as jamberangkat from jadwal,bus,ntujuan, hari, jamberangkat where jadwal.idbus = bus.id and jadwal.tujuan = ntujuan.id and jadwal.berangkat = jamberangkat.id and jadwal.hari = hari.id and jadwal.id = ?',array($id))->row(),
			'bus' => $this->db->query('select *, bus.bus as nabus from bus where status ="4" and id not in (select idbus from jadwal where id = ?)',array($id))->result(),
			'tujuan' => $this->db->query('select * from ntujuan where id not in(select tujuan from jadwal where id = ? )',array($id))->result(),
			'jamberangkat' => $this->db->query('select * from jamberangkat where jam not in (select berangkat from jadwal where id = ?)',array($id))->result(),
			'hari' => $this->db->query('select * from hari where nama not in (select hari from jadwal where id = ?)',array($id))->result(),
		);
		$this->load->view('Admin/Header', $data, FALSE);
		$this->load->view('Admin/Editjadwal');
		$this->load->view('Admin/Footer');
	}
	function ejad(){
		$id = $this->input->post('id');
		$data = array(
			'idbus' => $this->input->post('idbus'),
			'dari' => $this->input->post('dari'),
			'tujuan' => $this->input->post('tujuan'),
			'berangkat' => $this->input->post('berangkat'),
			'hari' => $this->input->post('hari'),
			'harga' => $this->input->post('harga'),
		);
		$query = $this->db->update('jadwal',$data,'id = "'.$id.'"');
		#var_dump($query);
		if($query == true){
			echo '<script>alert("Berhasil Update !")</script>';
			redirect('datamaster','refresh');
		}else{
			echo '<script>alert("GALAT !")</script>';
			redirect('admin/editjadwal/'.$id.'','refresh');
		}
	}
	function esopp(){
		$id = $this->input->post('id');
		$data = array(
			'no_ktp' => $this->input->post('no_ktp'),
			'nama' => $this->input->post('nama'),
			'alamat' => $this->input->post('alamat'),
			'no_telp' => $this->input->post('no_telp'),
			'jk' => $this->input->post('jk'),
			'tgl_lhr' => $this->input->post('tgl_lhr'),
		);
		$query = $this->db->update('sopir',$data,'id = "'.$id.'"');
		if($query == true){
			echo '<script>alert("Berhasil Update !")</script>';
			redirect('datamaster','refresh');
		}else{
			echo '<script>alert("GALAT !")</script>';
			redirect('admin/esop/'.$id.'','refresh');
		}
	}
	
	public function datamaster()
	{
		
		$data = array(
			'nama' => $this->session->userdata('nama'),
			'icon' => 'Data Master',
			#tab1 Data Bus 
			'sheet' => $this->db->get('jenis_sheet')->result(),
			'jenis_bus' => $this->db->get('status_bus')->result(),
			'sopir' => $this->db->query('select * from sopir where id not in ( select idsopir from bus )')->result(),
			'tabel1s' => $this->db->get('sopir')->result(),
			#'tabel1' => $this->db->query('sELECT *, bus.id as idbb,sopir.nama as napir, status_bus.nama as stabus FROM `bus`,status_bus,sopir,jenis_sheet where bus.status = status_bus.id and bus.idsopir = sopir.id group by bus.id')->result(),
			'tabel1' => $this->db->query('sELECT *, bus.id as idbb, status_bus.nama as stabus FROM `bus`,status_bus,jenis_sheet where bus.status = status_bus.id  group by bus.id')->result(),
			#'tabel1' => $this->db->query("SELECT *, bus.id as idbb,sopir.nama as napir, status_bus.nama as stabus FROM `bus`,status_bus,sheet,sopir,jenis_sheet where bus.status = status_bus.id and bus.idshet = sheet.id and bus.idsopir = sopir.id and sheet.idjsh = jenis_sheet.id group by bus.id")->result(),
#			'kodejadi' => $this->m_login->buatkodebus(),
			#tab2 Jadwal
			'bus' => $this->db->query('select *, sopir.nama as napir, bus.id as idb from bus ,sopir, status_bus   where bus.idsopir = sopir.id and bus.status = status_bus.id and bus.status ="4" ')->result(),
			#'tabel2' => $this->db->query('select *, sopir.nama as napir, dari.nama as nari, tujuan.nama as naju, status_bus.nama as stabus, jadwal.id as idj from jadwal, bus, sopir, dari, status_bus, tujuan where jadwal.dari =dari.id and jadwal.tujuan = tujuan.id and jadwal.idbus = bus.id and bus.idsopir = sopir.id and bus.status = status_bus.id')->result(),
			'tabel2' => $this->db->query('SELECT *, sopir.nama as napir, ntujuan.nama as naju, jadwal.id as idj, hari.nama as _nHari, jamberangkat.jam as jamberangkat FROM `jadwal`, ntujuan, bus, sopir, hari, jamberangkat where ntujuan.id = jadwal.tujuan and bus.id = jadwal.idbus and sopir.id = bus.idsopir and jadwal.hari = hari.id and jadwal.berangkat = jamberangkat.id')->result(),

			'tujuan' => $this->db->query('select * from ntujuan')->result(),
			#pariwisata
			'tabel3' => $this->db->query("select *, jdw_pariwisata.id as idjwd from jdw_pariwisata")->result(),
			'tabel31' => $this->db->query("select *, paket_wisata.id as idpaket from paket_wisata")->result()
		);

		$this->load->view('Admin/Header',$data);
		$this->load->view('Admin/Datamaster2');
		$this->load->view('Admin/Footer');
	}

	
	public function get_dari()
	{
		$idstat_bus = $this->input->post('idstat_bus');
		$arrstate = $this->db->query('select *, dari.nama as nari, dari.id as iddr from dari, status_bus, bus where bus.status = status_bus.id and dari.idstat_bus = status_bus.id and bus.id = "'.$idstat_bus.'"')->result();
		#var_dump($idstat_bus);
		echo '<select name="dari" class="form-control" id="dari">';
		foreach ($arrstate as $key => $value) {
			echo '<option value="'.$value->iddr.'">'.$value->nari.'</option>';
		}
		echo '</select>';
	}

	public function get_tujuan()
	{
		$tujuan = $this->input->post('idstat_bus');
		$arrstate = $this->db->query('select *, tujuan.nama as juna, tujuan.id as idtuju from tujuan, status_bus, bus where bus.status = status_bus.id and tujuan.idstat_bus = status_bus.id and bus.id = "'.$tujuan.'"')->result();
		#var_dump($tujuan);
		echo '<select name="tujuan" class="form-control" id="tujuan">';
		foreach ($arrstate as $key => $value) {

			echo '<option value="'.$value->idtuju.'">'.$value->juna.'</option>';
		}
		echo '</select>';
	}
	public function get_sopir()
	{
		$sopir = $this->input->post('idsopir');
		$arrstate = $this->db->query("select *, sopir.nama as napir from sopir,bus where bus.idsopir = sopir.id and bus.idsopir ='$sopir'")->row();
		echo '<input type="text" readonly="" value="'.@$arrstate->napir.'" class="form-control">';
		#var_dump($sopir);
		#var_dump($arrstate);
	}

	public function getnamabus()
	{
		$status = $this->input->post('idstatus');
		if($status == '1'){
			$arrstate = $this->m_login->buatkodebusbandara();
			echo '<input type="text" name="bus" class="form-control" value="'.$arrstate.'" readonly>
			<input type="hidden" name="stat" value="1">
			';
		}elseif ($status == '2') {
			$arrstate = $this->m_login->buatkodebuspariwisata();
			echo '<input type="text" name="bus" class="form-control" value="'.$arrstate.'" readonly>
			<input type="hidden" name="stat" value="2">';

		}elseif($status == '3'){
			$arrstate = $this->m_login->buatkodebusperintis();
			echo '<input type="text" name="bus" class="form-control" value="'.$arrstate.'" readonly>
			<input type="hidden" name="stat" value="2">';
		}else{
			$arrstate = $this->m_login->buatkodebusmudik();
			echo '<input type="text" name="bus" class="form-control" value="'.$arrstate.'" readonly>
			<input type="hidden" name="stat" value="2">';
		}

	}


	public function sopir()
	{
		$db = array(
			'id' => '',
			'no_ktp' => $this->input->post('no_ktp'),
			'nama' => $this->input->post('nama'),
			'alamat' => $this->input->post('alamat'),
			'no_telp' => $this->input->post('no_telp'),
			'jk' => $this->input->post('jk'),
			'tgl_lhr' => $this->input->post('tgl_lhr')
		);
		$cek = $this->db->insert('sopir',$db);
		if($cek == true){
			/*$data['alert'] = '<div class="alert bg-success" role="alert">
					<svg class="glyph stroked checkmark"><use xlink:href="#stroked-checkmark"></use></svg> Berhasil Menambahkan sopir <a href="#" class="pull-right"><span class="glyphicon glyphicon-remove"></span></a>
				</div>';*/
				echo '<script>alert("Sukses menambahkan data")</script>';
				redirect('datamaster','refresh');
		}else{
			$data['alert'] = '<div class="alert bg-danger" role="alert">
					<svg class="glyph stroked cancel"><use xlink:href="#stroked-cancel"></use></svg> Gagal Menambahkan <a href="#" class="pull-right"><span class="glyphicon glyphicon-remove"></span></a>
				</div>';
				redirect('datamaster','refresh');
		}
	}

	
	public function paket_wisata()
	{
		$db = array(
			'id' => '',
			'tujuan' => $this->input->post('tujuan'),
			'durasi'=> $this->input->post('durasi'),
			'harga' => $this->input->post('harga'),
			#'sheet' => $this->input->post('sheet'),
		);
		$cek = $this->db->insert('paket_wisata',$db);
		if($cek == true){
			/*$data['alert'] = '<div class="alert bg-success" role="alert">
					<svg class="glyph stroked checkmark"><use xlink:href="#stroked-checkmark"></use></svg> Berhasil Menambahkan sopir <a href="#" class="pull-right"><span class="glyphicon glyphicon-remove"></span></a>
				</div>';*/
				echo '<script>alert("Sukses menambahkan data")</script>';
				redirect('datamaster','refresh');
		}else{
			$data['alert'] = '<div class="alert bg-danger" role="alert">
					<svg class="glyph stroked cancel"><use xlink:href="#stroked-cancel"></use></svg> Gagal Menambahkan <a href="#" class="pull-right"><span class="glyphicon glyphicon-remove"></span></a>
				</div>';
				redirect('datamaster','refresh');
		}
	}
	public function jadwal()
	{
		$db = array(
			'idbus' => $this->input->post('idbus'),
			'dari' => $this->input->post('dari'),
			'tujuan' => $this->input->post('tujuan'),
			'berangkat' => $this->input->post('berangkat'),
			'hari' => $this->input->post('hari'),
			'harga' => $this->input->post('harga'),
		);
		
		$id = $this->input->post('idbus');
		$berangkat = $this->input->post('berangkat');
		$tujuan = $this->input->post('tujuan');
		$hari = $this->input->post('hari');
		$cek = $this->db->query('select * from jadwal where idbus="'.$id.'" and tujuan="'.$tujuan.'" and berangkat="'.$berangkat.'" and hari="'.$hari.'"')->num_rows();
/*
		var_dump($id);
		var_dump($berangkat);
		var_dump($sampai);
		var_dump($cek);*/
		if($cek > 0)
		{
			#var_dump($cek);
			echo '<script>alert("Jadwal sudah tersedia")</script>';
				redirect('datamaster','refresh');
		}else{
			
				$query = $this->db->insert('jadwal',$db);
				echo '<script>alert("Sukses menambahkan data")</script>';
				redirect('datamaster','refresh');
			
		}
	}

	function deletbus($id){

		$query = $this->m_login->deletebus($id);
		
		if($query == true){
			echo '<script>alert("Berhasil Menghapus Data")</script>';
			redirect('admin/datamaster','refresh');
		}else{
			echo '<script>alert("Galat")</script>';
			redirect('admin/datamaster','refresh');
		}

	}

	function editbus($id){
		#$data['cek'] = $this->db->query("SELECT *, bus.id as idbb,sopir.nama as napir, status_bus.nama as stabus FROM `bus`,status_bus,sheet,sopir,jenis_sheet where bus.status = status_bus.id and bus.idshet = sheet.id and bus.idsopir = sopir.id and sheet.idjsh = jenis_sheet.id and bus.id = ? group by bus.id",array($id))->row();
		$data = array(
			'cek' => $this->db->query("SELECT *, bus.id as idbb,sopir.nama as napir, status_bus.nama as stabus FROM `bus`,status_bus,sheet,sopir,jenis_sheet where bus.status = status_bus.id and bus.idshet = sheet.id and bus.idsopir = sopir.id and sheet.idjsh = jenis_sheet.id and bus.id = ? group by bus.id",array($id))->row(),
			'sopir' => $this->db->query('select * from sopir where id not in ( select idsopir from bus where id = ? )',array($id))->result(),
			'sheet' => $this->db->query('select * from jenis_sheet where id not in (select idshet from bus where id = ?)',array($id))->result(),
			'statbus' => $this->db->query('select * from status_bus where id not in (select status from bus where id = ?)',array($id))->result(),
			'nama' => $this->session->userdata('nama'),
		);
		#var_dump($cek);
		$this->load->view('Admin/Header', $data, FALSE);
		$this->load->view('Admin/Editbus');
		$this->load->view('Admin/Footer');
	}

	function ebb(){
		
		$id =  $this->input->post('id');
		$db = array(
			
			'bus' => $this->input->post('bus'),
			'status' => $this->input->post('status'),
			'idshet' => $this->input->post('idshet'),
			'idsopir' => $this->input->post('idsopir'),
			'nopol' => $this->input->post('nopol'),
			'jumlahtiket' => $this->input->post('jumlahtiket'),
			'gambar' => $_FILES['gambar']['name'],
		);
		$nopol = $this->input->post('nopol');

		$config['upload_path'] = './assets/img/bus/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg';
		$config['max_size']  = '100';
		$config['max_width']  = '1024';
		$config['max_height']  = '768';

		
		$this->load->library('upload', $config);
		
		if ( ! $this->upload->do_upload('gambar')){
			$error = array('error' => $this->upload->display_errors());
			echo '<script>alert("Format File harus jpg/jpeg !! Max Width 1024, max Weight 768");</script>';
					redirect('datamaster','refresh');
		}
		else{
			$data = array('upload_data' => $this->upload->data());
			$ceknopol = $this->db->query('select * from bus where nopol not in(select nopol from bus where id = "'.$id.'") and nopol = ?',array($nopol))->num_rows();
			if($ceknopol > 0){
				echo '<script>alert("Nopol Sudah Tersedia ! !")</script>';
						redirect('admin/editbus/'.$id,'refresh');
			}else{


				
				$cek = $this->db->update('bus',$db,'id = '.$id.'');
				if($cek == true){
					/*$data['alert'] = '<div class="alert bg-success" role="alert">
							<svg class="glyph stroked checkmark"><use xlink:href="#stroked-checkmark"></use></svg> Berhasil Menambahkan sopir <a href="#" class="pull-right"><span class="glyphicon glyphicon-remove"></span></a>
						</div>';*/
						echo '<script>alert("Sukses Edit data Bus")</script>';
						redirect('datamaster','refresh');
				}else{
					$data['alert'] = '<div class="alert bg-danger" role="alert">
							<svg class="glyph stroked cancel"><use xlink:href="#stroked-cancel"></use></svg> Gagal Menambahkan <a href="#" class="pull-right"><span class="glyphicon glyphicon-remove"></span></a>
						</div>';
						redirect('datamaster','refresh');
				}
			}
			
		
		}

		
		#var_dump($query);
		/*if($query == true){
			echo '<script>alert("data berhasil di ubah")</script>';
			redirect('datamaster','refresh');
		}else{
			echo '<script>alert("GALAT !")</script>';
			redirect('admin/editbus/'.$id.'','refresh');
		}*/
	}

	public function event()
	{
		$data = array(
			'nama' => $this->session->userdata('nama'),
			'icon' => 'Data Master',
			'event' => $this->db->get('event_tiket')->result(),
		);
		$this->load->view('admin/Header', $data, FALSE);
		$this->load->view('admin/event');
		$this->load->view('admin/Footer');
	}

	function ins_event(){
		$data = array(
			'event' => $this->input->post('event'),
			'mulai' => $this->input->post('mulai'),
			'akhir' => $this->input->post('akhir')
		);
		$now = date('Y-m-d');
		if($data['mulai'] < $now or $data['akhir'] < $now){
			echo '<script>alert("Silahkan Pilih Tanggal Dengan Benar !")</script>';
			redirect('admin/event','refresh');
		}else{
			$query = $this->db->insert('event_tiket',$data);
			if($query == true){
				echo '<script>alert("Berhasil Menambahkan Event")</script>';
				redirect('admin/event','refresh');
			}else{
				echo '<script>alert("GALAT !")</script>';
				redirect('admin/event','refresh');
			}
		}
		
	}

	function get_event(){
		$query = $this->db->get('event_tiket')->result();
		$no = 0;
		foreach ($query as $key => $value) {
			$json[$no]['id'] = $value->id;
			$json[$no]['event'] = $value->event;
			$json[$no]['mulai'] = $value->mulai;
			$json[$no]['akhir'] = $value->akhir;
			$no++;
		}
		#var_dump($json)
		#echo json_encode($json);

	}

	function jumlahshet(){
		$id = $this->input->post('ids');
		$data = $this->db->get_where('jenis_sheet',array('id' => $id))->row();
		echo '<input type="hidden" readonly="" class="form-control" name="jumlahtiket" value="'.$data->jumlah.'">';
	}

	function jumlahshetEdit(){

		$id = $this->input->post('ids');
		$data = $this->db->get_where('jenis_sheet',array('id' => $id))->row();
		echo '<input type="text" readonly="" class="form-control" name="jumlahtiket" value="'.$data->jumlah.'">';
		
	}

	function get_bus(){
		$id = $this->input->post('rowid');
		var_dump($id);
		echo 'abc';


	}
	public function bus()
	{
		$value = $this->input->post('stat');
		#var_dump($value);
		if($value == '2'){
			$db = array(
			'id' => '',
			'bus' => $this->input->post('bus'),
			'status' => $this->input->post('status'),
			'idshet' => $this->input->post('idshet'),
			'idsopir' => $this->input->post('idsopir'),
			'nopol' => $this->input->post('nopol'),
			'jumlahtiket' => $this->input->post('jumlahtiket'),
			'gambar' => $_FILES['gambar']['name'],
			'sttb' => '0',
		);
		$config['upload_path'] = './assets/img/bus/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg';
		$config['max_size']  = '100';
		$config['max_width']  = '1024';
		$config['max_height']  = '768';
		
		$this->load->library('upload', $config);
		
		if ( ! $this->upload->do_upload('gambar')){
			$error = array('error' => $this->upload->display_errors());
			echo '<script>alert("Format File harus jpg/jpeg !! Max Width 1024, max Weight 768");</script>';
					redirect('datamaster','refresh');
		}
		else{
				$data = array('upload_data' => $this->upload->data());
				$ceknopol = $this->m_login->ceknopol($db['nopol']);
				if($ceknopol > 0){
					echo '<script>alert("Nopol Sudah Tersedia ! !")</script>';
							redirect('datamaster','refresh');
				}else{
					
							$cek = $this->db->insert('bus',$db);
					if($cek == true){
						
							echo '<script>alert("Sukses menambahkan data")</script>';
							redirect('datamaster','refresh');
					}else{
						$data['alert'] = '<div class="alert bg-danger" role="alert">
								<svg class="glyph stroked cancel"><use xlink:href="#stroked-cancel"></use></svg> Gagal Menambahkan <a href="#" class="pull-right"><span class="glyphicon glyphicon-remove"></span></a>
							</div>';
							redirect('datamaster','refresh');
					}
				}
				
			
			}
		}else{
			$db = array(
			'id' => '',
			'bus' => $this->input->post('bus'),
			'status' => $this->input->post('status'),
			'idshet' => $this->input->post('idshet'),
			'idsopir' => $this->input->post('idsopir'),
			'nopol' => $this->input->post('nopol'),
			'jumlahtiket' => $this->input->post('jumlahtiket'),
			'gambar' => $_FILES['gambar']['name'],
			'sttb' => '0',
		);
		$config['upload_path'] = './assets/img/bus/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg';
		$config['max_size']  = '100';
		$config['max_width']  = '1024';
		$config['max_height']  = '768';
		
		$this->load->library('upload', $config);
		
		if ( ! $this->upload->do_upload('gambar')){
			$error = array('error' => $this->upload->display_errors());
			echo '<script>alert("Format File harus jpg/jpeg !! Max Width 1024, max Weight 768");</script>';
					redirect('datamaster','refresh');
		}
		else{
			$data = array('upload_data' => $this->upload->data());
			$ceknopol = $this->m_login->ceknopol($db['nopol']);
			if($ceknopol > 0){
				echo '<script>alert("Nopol Sudah Tersedia ! !")</script>';
						redirect('datamaster','refresh');
			}else{
				
						$cek = $this->db->insert('bus',$db);
				if($cek == true){
					
						echo '<script>alert("Sukses menambahkan data")</script>';
						redirect('datamaster','refresh');
				}else{
					$data['alert'] = '<div class="alert bg-danger" role="alert">
							<svg class="glyph stroked cancel"><use xlink:href="#stroked-cancel"></use></svg> Gagal Menambahkan <a href="#" class="pull-right"><span class="glyphicon glyphicon-remove"></span></a>
						</div>';
						redirect('datamaster','refresh');
				}
			}
			
		
		}
		}
		
	}
	
	public function jdw_pariwisata()
	{
		$db = array(
			'id' => '',
			'tujuan' => $this->input->post('tujuan'),
			'durasi'=> $this->input->post('durasi'),
			'harga' => $this->input->post('harga'),
			#'sheet' => $this->input->post('sheet'),
		);
		$cek = $this->db->insert('jdw_pariwisata',$db);
		if($cek == true){
			/*$data['alert'] = '<div class="alert bg-success" role="alert">
					<svg class="glyph stroked checkmark"><use xlink:href="#stroked-checkmark"></use></svg> Berhasil Menambahkan sopir <a href="#" class="pull-right"><span class="glyphicon glyphicon-remove"></span></a>
				</div>';*/
				echo '<script>alert("Sukses menambahkan data")</script>';
				redirect('datamaster','refresh');
		}else{
			$data['alert'] = '<div class="alert bg-danger" role="alert">
					<svg class="glyph stroked cancel"><use xlink:href="#stroked-cancel"></use></svg> Gagal Menambahkan <a href="#" class="pull-right"><span class="glyphicon glyphicon-remove"></span></a>
				</div>';
				redirect('datamaster','refresh');
		}
	}
	function editpariwisata(){
		$id = $this->input->post('id');
		$data = array(
			'nama' => $this->session->userdata('nama'),
			'pariwisata' => $this->db->query('select * from jdw_pariwisata where id = ?',array($id))->row(),
		);
		/*var_dump($id);
		var_dump($data);*/
		$this->load->view('Admin/Header', $data,FALSE);
		$this->load->view('Admin/Editpariwisata');
		$this->load->view('Admin/Footer');

	}
	function epar(){
		$id = $this->input->post('id');
		$data= array(
			'tujuan' => $this->input->post('tujuan'),
			'durasi' => $this->input->post('durasi'),
			'harga' => $this->input->post('harga'),
		);
		/*var_dump($id);
		var_dump($data);*/
		$query = $this->db->update('jdw_pariwisata',$data,'id = "'.$id.'"');
		if($query == true){
			echo '<script>alert("data berhasil di ubah")</script>';
			redirect('datamaster','refresh');
		}else{
			echo '<script>alert("GALAT !")</script>';
			redirect('admin/editpariwisata/'.$id.'','refresh');
		}
	}
	function delete(){
		$id = $this->input->post('id');
		$db = $this->input->post('db');
		$cek = $this->db->query('delete from '.$db.' where id ="'.$id.'"');
		#$cek = $this->db->delete($db,$id);
		if($cek == true){
			/*var_dump($id).'<br>';
			var_dump($db);
			var_dump($cek);*/
			echo '<script>alert("Sukses Delete Data")</script>';
			redirect('datamaster','refresh');
		}else{
			echo '<script>alert("Gagal Delete Data")</script>';
			redirect('datamaster','refresh');
		}
	}

	public function konfirmasi()
	{
		$data = array(
			'nama' => $this->session->userdata('nama'),
			'icon' => 'Data Konfirmasi',
			#new
			'query' => $this->db->query($this->pemesanan)->result(),
			'cektgl'=> $this->db->query('select *, npemesanan_pariwisata.id as idpp, login.nama as nalog from npemesanan_pariwisata, jdw_pariwisata, login, jenis_sheet where jdw_pariwisata.id = npemesanan_pariwisata.tujuan and login.id = npemesanan_pariwisata.iduser and jenis_sheet.id = npemesanan_pariwisata.jumkursi')->result(),
			#tab1
			#'tabel1' => $this->db->query($this->tab1)->result(),
			#tab2
			#'tabel2' => $this->db->query($this->tab2)->result(),
		);
		#var_dump($data['query']);
		$this->load->view('Admin/Header',$data);
		$this->load->view('Admin/Konfirmasi');
		$this->load->view('Admin/Footer');
	}

	public function setujui()
	{
		$id = $this->input->post('id');
		$idbus = $this->input->post('idbus');
		#var_dump($id);
		$cek = $this->db->query('update npemesanan_pariwisata set status="SETUJU" where id=?',array($id));
		$bus = $this->db->query('update bus set sttb ="2" where id = ?',array($idbus));
		if($cek == true){
			var_dump($cek);
			echo '<script>alert("Berhasil di setujui");</script>';
			redirect('a/konfirmasi','refresh');
		}else{
			echo '<script>alert("Something wrong")</script>';
			redirect('a/konfirmasi','refresh');
		}
	}

	public function tolak()
	{
		$id = $this->input->post('id');
		#var_dump($id);
		$cek = $this->db->query("update npemesanan_pariwisata set status='DI TOLAK' where id=?",array($id));
		var_dump($cek);
		if($cek == true){
			echo '<script>alert("Berhasil di Tolak");</script>';
			redirect('a/konfirmasi','refresh');
		}else{
			echo '<script>alert("Something wrong")</script>';
			redirect('a/konfirmasi','refresh');
		}
	}

}

/* End of file Admin.php */
/* Location: ./application/controllers/Admin.php */