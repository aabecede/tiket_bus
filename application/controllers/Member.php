<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Member extends CI_Controller {
	var $rentang = 'SELECT now() + INTERVAL "12" HOUR as rentang';

	var $bus = 'SELECT *, bus.id as idbus FROM bus, status_bus where status_bus.id = bus.status and status_bus.id = 2 and bus.idshet = 2';
	
	function __construct(){
		parent::__construct();
		if($this->session->userdata('stat')!= "login")
		{
			echo '<script>alert("Silahkan Login dahulu");</script>';
			redirect(base_url('login'),'refresh');
		}
		$id = $this->session->userdata('id');
		$this->load->model('m_login');
		#$qq = $this->db->query($this->badges,array($id))->row();
		#var_dump($qq);
		$now = date('Y-m-d H:m:s');
		if(@$now >= @$qq->tgl_expied)
		{
			#echo 'delete'.$qq->tgl_expied;
			@$exp = $qq->tgl_expied;
			@$idbus = $qq->id_bus;
			$this->m_login->del_badge($exp);
			$this->m_login->upsttb($idbus);
		}else{
			#var_dump($now);
		}
		$this->load->helper('form','url');
	}

	public function index()
	{
		$id = $this->session->userdata('id');
		$data = array(
			'log' => $this->db->get_where('login',array('id'=> $id))->row(),
			'stat' => $this->session->userdata('stat'),
			'bandara' => $this->db->query('select *, count(bus.id)as Eb from bus, jenis_sheet where bus.idshet = jenis_sheet.id and bus.status="1"')->row(),
#			'badgen' => $this->db->query($this->badgen)->row(),
#			'badgep' => $this->db->query($this->badgep)->row(),
#			'badge' => $this->db->query($this->badge,array($id))->row(),
#			'caccbadge' => $this->db->query($this->caccbadge,array($id))->row(),
		);
		#echo $data['badge']->badge;
		$this->load->vars($data);
		$this->load->view('Header');
		$this->load->view('Member/index');
		$this->load->view('Footer');
	}
	function hargabus(){
		$idtujuan = $this->input->post('idtujuan');
		$query = $this->db->get_where("jdw_pariwisata",array('id' => $idtujuan))->row();
		
		echo 'Rp. '.number_format($query->harga);
		echo '<input type="hidden" name="tarif" id="tarif" value="'.$query->harga.'">';
		
	}
	function bustersedia(){
		$idsheet = $this->input->post('idsheet');
		$query =  $this->db->query('SELECT * FROM `bus`, status_bus, jenis_sheet where bus.status = status_bus.id and bus.status = "2" and jenis_sheet.id = bus.idshet and bus.sttb = "0" and bus.idshet = ?',array($idsheet))->num_rows();
		echo '<div class="col-md-6"><input type="text" class="form-control" id="sedia" value="'.$query.'" readonly></div>';
		?>
		<div class="col-md-6"></div>
		<div class="row">
			<div class="col-md-6">
				<h6>Jumlah Bus dipesan</h6>
				<input type="text" name="jumbus" value="" id="ebus" class="form-control" onkeyup="dpp(),selectbus()">

			</div>
		</div>
		<!-- <script type="text/javascript">
			/*function banyakbus() {
				var tarif = getElementById('end').value();
				var sigmabus = getElementById('ebus').value();
				var total = parseInt(tarif)*parseInt(sigmabus);
				document.getElementById('end').value = total;
			}*/
		</script> -->
		<?php
	}
	function selbus(){
		$limit =  $this->input->post('limit');
		$bus = $this->db->query('SELECT bus.id as idbus FROM `bus`, jenis_sheet where bus.idshet = jenis_sheet.id and bus.status ="2" and bus.sttb ="0" limit 0,'.$limit.'')->result();
		/* $no = 0; foreach($bus as $key){
		  $bus[] = $key->idbus.',';
		  echo $bus[$no];
$no++;
			}
*/
		?>
		<input type="hidden" name="idbus" value="<?php foreach ($bus as $key => $value) { echo $value->idbus.','; } echo '">';
			

	}
	public function pariwisata()
	{
		$id = $this->session->userdata('id');
		$data = array(
			#'tabel1' => $this->db->query("select *, paket_wisata.id as idpaket from paket_wisata")->result(),
			'tabel3' => $this->db->query("select *, jdw_pariwisata.id as idjwd from jdw_pariwisata")->result(),
			'log' => $this->db->query("select * from login where id = ?",array($id))->row(),
			'sheet' => $this->db->get('jenis_sheet')->result(),
			'sheet1' => $this->db->get_where('jenis_sheet',array('id' => 2))->row(),
			'stat' => $this->session->userdata('stat'),
			'bus' => $this->db->query($this->bus)->result(),
			'rentang' => $this->db->query($this->rentang)->row(),
			'cektgl'=> $this->db->query('select *, npemesanan_pariwisata.id as idpp, login.nama as nalog from npemesanan_pariwisata, jdw_pariwisata, login, jenis_sheet where jdw_pariwisata.id = npemesanan_pariwisata.tujuan and login.id = npemesanan_pariwisata.iduser and jenis_sheet.id = npemesanan_pariwisata.jumkursi and npemesanan_pariwisata.buskem ="0"')->result(),
			/*'badgen' => $this->db->query($this->badgen)->row(),
			'badgep' => $this->db->query($this->badgep)->row(),
			
			'badge' => $this->db->query($this->badge,array($id))->row(),
			
			'caccbadge' => $this->db->query($this->caccbadge,array($id))->row(),*/
		);
		#$this->pre($data['cektgl']);
		$this->load->vars($data);
		$this->load->view('Header');
		$this->load->view('Member/pariwisata2');
		$this->load->view('Footer');
	}

	

	function uppariwisata($id){
		#var_dump($id);
			$idbus = $this->input->post('id');
			$iduser = $this->session->userdata('id');
			$data = array(
				'stat' => $this->session->userdata('stat'),
				'log' => $this->db->query("select * from login where id = ?",array($iduser))->row(),
				'pemesanan' =>$this->db->query('select *, jdw_pariwisata.tujuan as naju, jenis_sheet.jenis as najis, jenis_sheet.jumlah as nalah, npemesanan_pariwisata.status as natus, npemesanan_pariwisata.id as idpp from npemesanan_pariwisata,jenis_sheet,login,jdw_pariwisata where npemesanan_pariwisata.jumkursi = jenis_sheet.id and npemesanan_pariwisata.iduser = login.id and npemesanan_pariwisata.tujuan = jdw_pariwisata.id and npemesanan_pariwisata.id = ?',array($id))->row(),
				'tujuan' => $this->db->query('select * from jdw_pariwisata where id not in (select tujuan from npemesanan_pariwisata where iduser = ?)',array($iduser))->result(),
				#'jenis_sheet' => $this->db->query('select * from jenis_sheet where id = ?',$data['pemesanan']->jumkursi)->row(),
			);

			$this->load->view('Header',$data);
			$this->load->view('member/UpNkonfirmasi');
			$this->load->view('Footer');

	}
	public function p_pesan()
	{
		$id = $this->session->userdata('id');
		
		$jumbus = $this->input->post('jumbus');
		$jumkursi = $this->input->post('jumkursi');
		$tersedia = $this->input->post('tersedia');
		$bus = $this->db->query('SELECT bus.id as idbus FROM `bus`, jenis_sheet where bus.idshet = jenis_sheet.id and bus.status ="2" and bus.sttb ="0" and bus.idshet = ? limit 0,'.$jumbus.'',array($jumkursi))->result();
		$no = 0;
				
		
		#$idbus = array_push($array,$idbus);
		#print_r($idbus);
		#echo $idbus[1];
		$db = array(
			'id' => '',
			'iduser' => $this->session->userdata('id'),
			'idbus' => $this->input->post('idbus'),
			'tujuan' => $this->input->post('tujuan'),
			'tarif' => $this->input->post('tarif'),
			'tgl_b'=> $this->input->post('tgl_b'),
			'tgl_p' => $this->input->post('tgl_p'),
			'jumkursi' => $this->input->post('jumkursi'),
			'jumbus' => $this->input->post('jumbus'),
			'total' => $this->input->post('total'),
			'norek' => $this->input->post('norek'),
			'an'=> $this->input->post('an'),
			'berangkatdari' => $this->input->post('berangkatdari'),
			'tgl_expied' => $this->input->post('tgl_expied'),
		);
		#var_dump($db);
		#echo substr($db['idbus'],'1');
		$now = date('Y-m-d');
		if($db['tgl_b'] >= $now and $db['tgl_p'] >= $now)
		{
			if($db['jumbus'] <= $tersedia)
			{
				/*$this->pre($db);
				die;*/
				$query = $this->db->insert('npemesanan_pariwisata',$db);
				if($query == true){
					echo '<script>alert("Silahkan melakukan transaksi");</script>';
					$single_idbus = explode(",",$db['idbus']);
					$no = 0;
					foreach ($single_idbus as $key => $value) {
						#echo $single_idbus[$no];
						$idbus = $single_idbus[$no];
						$ubahstatusbus = $this->db->query('update bus set sttb ="1" where id = ?',array($idbus));
						$no++;
					}
				
					#var_dump($pemesanan);
					redirect('member/pemesanan','refresh');
				}else{
					echo '<script>alert("GALAT!!")</script>';
					redirect('member/pariwisata','refresh');
				}
			}else{
				echo '<script>alert("Pesan Jumlah Bus sesuai dengan yang tersedia !!")</script>';
					redirect('member/pariwisata','refresh');
			}
			

		}else{
			echo '<script>alert("GALAT! Pilih Tanggal dengan benar !")</script>';
				redirect('member/pariwisata','refresh');
		}

		
		#var_dump($query);
		#$this->load->vars($data);

		/*$this->load->view('Header');
		$this->load->view('Member/pesan');
		$this->load->view('Footer');*/
	}

	

	function get_bus_pesan(){
		$id = $this->input->post('rowid');
		#var_dump($id);
		$query = $this->db->query('select * from npemesanan_pariwisata where id = ?',array($id))->row();
		#var_dump($query);
		$bus = explode(",", $query->idbus);
		$no = 0;
		foreach ($bus as $key => $value) {
			$query = $this->db->query('select * from bus, status_bus, jenis_sheet, sopir where jenis_sheet.id = bus.idshet and sopir.id = bus.idsopir and status_bus.id = bus.status and bus.id = ?',array($bus[$no]))->row();
			$no++;
			#var_dump($query);
			if($query != null){
				?>
				<table class="table table-responsive">
				<tr>
					<td>Bus <?php echo $no;?></td>
					<td><?php echo @$query->bus;?></td>
				</tr>
				<tr>
					<td>Nopol</td>
					<td><?php echo @$query->nopol;?></td>
				</tr>
				<tr>
					<td>Jumlah Sheet</td>
					<td><?php echo @$query->jumlah;?></td>
				</tr>
				<tr>
					<Td>Jenis Sheet</Td>
					<td><?php echo @$query->jenis;?></td>
				</tr>
				<tr>
					<td>Sopir</td>
					<td><?php echo $query->nama;?></td>
				</tr>
				<tr>
					<td>Alamat Sopir</td>
					<td><?php echo $query->alamat;?></td>
				</tr>
			</table>
				<?php
			}
			
			
			
			
		}
	}

	public function n_pesan()
	{
		$idp = $this->input->post('id');

		$data = array(
			'nama' => $this->session->userdata('nama'),
			'stat' => $this->session->userdata('stat'),
			'rentang' => $this->db->query($this->rentang)->row(),
			'query' => $this->db->query('select *, jdw_pariwisata.id as idjwd from jdw_pariwisata where  jdw_pariwisata.id =? ',array($idp))->row(),
			'max' => $this->db->query($this->maxn)->row(),
			/*'badgen' => $this->db->query($this->badgen)->row(),
			'badgep' => $this->db->query($this->badgep)->row(),
			'caccbadge' => $this->db->query($this->caccbadge,array($id))->row(),*/

		);
		$this->load->vars($data);
		$this->load->view('Header');
		$this->load->view('Member/NPesan');
		$this->load->view('Footer');
	}
	public function insertpemesanan_p()
	{
		$db = array(
			'id' => '',
			'iduser' => $this->session->userdata('id'),
			'idpaket' => $this->input->post('idp'),
			'jumlahbus' => $this->input->post('jumlahbus'),
			'jenis' => $this->input->post('jenis'),
			'norek' => '192371235, BRI',
			'an' => 'ABUDURU JABUBARU',
			'tgl_b' => $this->input->post('from'),
			'tgl_p' => $this->input->post('to'),
			'dari' => $this->input->post('berangkat'),
			'bukti_transfer' => '',
			'tgl_expied' => $this->input->post('rentang'),
			'tgl_up' => '',
			'status' => '0',

		);
		$cek = $this->db->insert('pemesanan_pariwisata',$db);
		redirect('m/konfirmasi','refresh');
	}
	public function insertpemesanan_pp()
	{
		$db = array(
			'id' => '',
			'iduser' => $this->session->userdata('id'),
			'idpaket' => $this->input->post('idp'),
			'jumlahbus' => $this->input->post('jumlahbus'),
			'jenis' => $this->input->post('jenis'),
			'norek' => '192371235, BRI',
			'an' => 'ABUDURU JABUBARU',
			'tgl_b' => $this->input->post('from'),
			'tgl_p' => $this->input->post('to'),
			'dari' => $this->input->post('berangkat'),
			'bukti_transfer' => '',
			'tgl_expied' => $this->input->post('rentang'),
			'tgl_up' => '',
			'status' => '0',
		);
		// var_dump($db);
		$id = $this->m_login->insert_pemesanan_pp($db);
		// echo $id;
		// $id_bis = $this->input->post('id_bis');
		// echo $this->input->post('tes');
		// echo "wkwkwk";
		$db2 = array(
			'id' => '',
			'id_bus' => $this->input->post('batas'),
			'id_pesan' => $id,
		);
		$this->db->insert('bus_pariwisata',$db2);
		// if () {
		// 	echo "sukses";
		// }else{
		// 	echo "gagal";
		// }
		// redirect('m/konfirmasip','refresh');
	}



	
	public function jadwal()
	{
		$iduser	= $this->session->userdata('id');
		$data = array(
			'log' => $this->db->get_where('login',array('id' => $iduser))->row(),
			'stat' => $this->session->userdata('stat'),
			'bus' => $this->db->query('SELECT *, bus.id as idd, sopir.nama as napir, ntujuan.nama as naju, jadwal.id as idj, hari.nama as _nHari, jamberangkat.jam as jamberangkat FROM `jadwal`, ntujuan, bus, sopir, hari, jamberangkat where ntujuan.id = jadwal.tujuan and bus.id = jadwal.idbus and sopir.id = bus.idsopir and jadwal.hari = hari.id and jadwal.berangkat = jamberangkat.id')->result(),
			//'get' => $this->db->get('event_tiket')->row(),
			'query'=>$this->db->query('select * from jadwal')->result()
		);
		$this->load->view('header',$data);
		$this->load->view('jadwal');
		$this->load->view('footer');
	}

	public function konfpesan()
	{
		$iduser = $this->session->userdata('id');
		
		$cekquery = $this->db->query("select * from pemesanan_pariwisata where jenis='N'")->row();
		@$id = $cekquery->id;
		if(@$cekquery->tgl_expied < date('Y-m-d H:m:s')){
			$this->db->query('delete from pemesanan_pariwisata where id = ?',$id);
			echo '<script>alert("Tidak ada Pembayaran ! !");</script>';
			redirect('m/index','refresh');
		}else{
			//ceking apakah ada pemesanan ?
			if(count($cekquery->id) > 0){
				#jika ada jalankan query ini
				#if($cekquery->jenis == 'N'){
				$cc1 = $this->db->query("select *, pemesanan_pariwisata.id as idpp from pemesanan_pariwisata,jdw_pariwisata,login where pemesanan_pariwisata.idpaket = jdw_pariwisata.id and login.id = pemesanan_pariwisata.iduser and pemesanan_pariwisata.iduser = ? and pemesanan_pariwisata.status ='0' and pemesanan_pariwisata.jenis ='N'", $iduser)->result();
				/*}else{
					$cc1 = $this->db->query("select *, pemesanan_pariwisata.id as idpp from pemesanan_pariwisata,paket_wisata,login,jenis_sheet where pemesanan_pariwisata.idpaket = jdw_pariwisata.id and login.id = pemesanan_pariwisata.iduser and paket_wisata.sheet = jenis_sheet.id and pemesanan_pariwisata.iduser = ? and pemesanan_pariwisata.status ='0'", $iduser)->result();
				}*/
				$this->load->view('Header',$data = array(
					'query' => $cc1,
					'nama' => $this->session->userdata('nama'),
					'stat' => $this->session->userdata('stat'),
					/*'badgen' => $this->db->query($this->badgen)->row(),
					'badgep' => $this->db->query($this->badgep)->row(),
					'badge' => $this->db->query($this->badge,array($iduser))->row(),*/
				));
				$this->load->view('Member/Konfirmasi');
				$this->load->view('Footer');
			}else{
				redirect('m/index','refresh');
			}
		}
			
	}
		public function konfpesanp()
		{
			$iduser = $this->session->userdata('id');
			
			$cekquery = $this->db->query("select * from pemesanan_pariwisata where jenis='P'")->row();
			@$id = $cekquery->id;
			if(@$cekquery->tgl_expied < date('Y-m-d H:m:s')){
				$this->db->query('delete from pemesanan_pariwisata where id = ?',$id);
				echo '<script>alert("Tidak ada Pembayaran ! !");</script>';
				redirect('m/index','refresh');
			}else{
				//ceking apakah ada pemesanan ?
				if(count($cekquery->id) > 0){
					#jika ada jalankan query ini
					#if($cekquery->jenis == 'N'){
					#$cc1 = $this->db->query("select *, pemesanan_pariwisata.id as idpp from pemesanan_pariwisata,jdw_pariwisata,login,jenis_sheet where pemesanan_pariwisata.idpaket = jdw_pariwisata.id and login.id = pemesanan_pariwisata.iduser and jdw_pariwisata.sheet = jenis_sheet.id and pemesanan_pariwisata.iduser = ? and pemesanan_pariwisata.status ='0'", $iduser)->result();
					#}else{
						$cc1 = $this->db->query("select *, pemesanan_pariwisata.id as idpp from pemesanan_pariwisata,paket_wisata,login where pemesanan_pariwisata.idpaket = paket_wisata.id and login.id = pemesanan_pariwisata.iduser and pemesanan_pariwisata.iduser = ? and pemesanan_pariwisata.status ='0' and pemesanan_pariwisata.jenis ='p'", $iduser)->result();
					#}*/
					$this->load->view('Header',$data = array(
						'query' => $cc1,
						'nama' => $this->session->userdata('nama'),
						'stat' => $this->session->userdata('stat'),
						/*'badgen' => $this->db->query($this->badgen)->row(),
						'badgep' => $this->db->query($this->badgep)->row(),
						'badge' => $this->db->query($this->badge,array($iduser))->row(),
						'caccbadge' => $this->db->query($this->caccbadge,array($iduser))->row(),*/
					));
					$this->load->view('Member/Konfirmasi');
					$this->load->view('Footer');
				}else{
					redirect('m/index','refresh');
				}
			
		}
	}

		#limit
		public function getlimit()
		{
			$limit = $this->input->post('limit');
			$arrstate = $this->db->query('select *, bus.id as idbus from bus, jenis_sheet, status_bus, sopir where bus.idshet = jenis_sheet.id and status_bus.id = bus.status and sopir.id = bus.idsopir and bus.status="2" limit 0,'.$limit.'')->result();
			#var_dump($limit);
			$no = 0;
			/*echo '<select name="limit" class="form-control" id="limit">';
			foreach ($arrstate as $key => $value) {

				echo '<option value="'.$value->idbus.'">'.$value->idbus.'</option>';
			}
			echo '</select>';*/
			// echo '<input type="text" name="batas" id="batas" class="form-control" value="';
			foreach ($arrstate as $key => $value) {
				$arr[] = $value->idbus.',';
				echo $arr[$no];
				$no++;
			}
			// echo '">';
			// return $arr;

			
			

			#var_dump($arr);
			/*echo '<input type="text"  name="bus" class="form-control" value="'.$value->idbus.'">';*/
		}

		public function get_bus(){
			$id = $this->input->post('rowid');
			/*$quer = $this->db->query('SELECT *, bus.id as idbus FROM bus, status_bus, sopir where status_bus.id = bus.status and status_bus.id = 2 and sopir.id = bus.idsopir and bus.id = ?',array($id))->row();*/
			$quer = $this->db->query('SELECT *, bus.id as idbus FROM bus, status_bus, sopir,jenis_sheet where status_bus.id = bus.status and status_bus.id = 2 and sopir.id = bus.idsopir and bus.idshet = jenis_sheet.id and bus.id = ?',array($id))->row();
			#var_dump($quer);
			?>
			<div class="table">
					<table class="table table-responsive">
						<tr>
							<td>Nama Bus</td>
							<td><?php echo $quer->bus;?></td>
						</tr>
						<tr>
							<td>Nama Sopir</td>
							<td><?php echo $quer->nama;?></td>
						</tr>
						<tr>
							<td>Alamat Supir</td>
							<td><?php echo $quer->alamat;?></td>
						</tr>
						<tr>
							<td>Nopol</td>
							<td><?php echo $quer->nopol;?></td>
						</tr>
						<tr>
							<td>Sheet<Br>Jumlah Sheet</td>
							<td><?php echo $quer->jenis.'<br>'.$quer->jumlah;?></td>
						</tr>
						<tr>
							<td>Fasilitas</td>
							<td>Wifi, Toilet, Charger</td>
						</tr>
					</table>
				</div>
			<?php

		}
		#pemesanan bus baru
		function pemesanan_pariwisata(){
			$id = $this->session->userdata('id');
			$data = array(
				'stat' => $this->session->userdata('stat'),
				'log' => $this->db->query("select * from login where id = ?",array($id))->row(),
				'tabel1'=> $this->db->query('select *, npemesanan_pariwisata.id as idpp, login.nama as nalog from npemesanan_pariwisata, jdw_pariwisata, login, jenis_sheet where jdw_pariwisata.id = npemesanan_pariwisata.tujuan and login.id = npemesanan_pariwisata.iduser and jenis_sheet.id = npemesanan_pariwisata.jumkursi and npemesanan_pariwisata.iduser = ?',array($id))->result(),
			);
			#var_dump($data);
			$this->load->view('Header', $data);
			$this->load->view('member/pemesanan_pariwisata');
			$this->load->view('Footer');
		}
		function print_pariwisata($id){
			#$query 
			$data = array(
				'query'=> $this->db->query('SELECT *, jdw_pariwisata.tujuan as naju, login.nama as nalog FROM `npemesanan_pariwisata`,jdw_pariwisata, login where jdw_pariwisata.id = npemesanan_pariwisata.tujuan and login.id = npemesanan_pariwisata.iduser and npemesanan_pariwisata.id = ?',array($id))->row(),
			);

			#var_dump($id);
			$this->load->view('member/Print_pariwisata',$data);
		}

		public function pemesanan(){
			
			$idbus = $this->input->post('id');
				$id = $this->session->userdata('id');
			$data = array(
				'stat' => $this->session->userdata('stat'),
				'log' => $this->db->query("select * from login where id = ?",array($id))->row(),
				'pemesanan' =>$this->db->query('select *, jdw_pariwisata.tujuan as naju, jenis_sheet.jenis as najis, jenis_sheet.jumlah as nalah, npemesanan_pariwisata.status as natus, npemesanan_pariwisata.id as idpp from npemesanan_pariwisata,jenis_sheet,login,jdw_pariwisata where npemesanan_pariwisata.jumkursi = jenis_sheet.id and npemesanan_pariwisata.iduser = login.id and npemesanan_pariwisata.tujuan = jdw_pariwisata.id and login.id = ? order by npemesanan_pariwisata.id desc',array($id))->row(),
				'tujuan' => $this->db->query('select * from jdw_pariwisata where id not in (select tujuan from npemesanan_pariwisata where iduser = ?)',array($id))->result(),
				#'jenis_sheet' => $this->db->query('select * from jenis_sheet where id = ?',$data['pemesanan']->jumkursi)->row(),
			);
			 
			$this->load->view('Header',$data);
			$this->load->view('member/Nkonfirmasi');
			$this->load->view('Footer');
			#var_dump($data['bus']);
		

		}

		public function up_pesan()
		{
			#doupload
			$config['upload_path'] = './assets/img/bukti/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$config['max_size']  = '100';
			$config['max_width']  = '1024';
			$config['max_height']  = '768';
			
			$this->load->library('upload', $config);
			
			if ( ! $this->upload->do_upload('bukti_tf')){
				$error = array('error' => $this->upload->display_errors());
				echo '<script>alert("Format File harus jpg/jpeg !! Max Width 1024, max Weight 768");</script>';
				redirect('member/pemesanan','refresh');
				#redirect('m/reservasi','refresh');
			}
			else{
				$bukti = $_FILES['bukti_tf']['name'];
				$data = array('upload_data' => $this->upload->data());
				$id = $this->input->post('id');
				$dp = $this->input->post('DP');
				$tgl = date('Y-m-d H:m:s');
				#$query = $this->db->query('update pemesanan_pariwisata set bukti_transfer = ?, tgl_up = ? where id = ?',array($bukti,$tgl,$id));
				$query = $this->db->query('update npemesanan_pariwisata set bukti_tf = ?, tgl_up = ?, DP = ?, status = "Tunggu Konfirmasi" where id = ?',array($bukti,$tgl,$dp,$id));
				if($query == true){
					echo '<script>alert("Silahkan Tunggu konfirmasi dari Admin");</script>';
					redirect('m/index','refresh');
				}else{
					echo '<script>alert("Terjadi Kesalahan unggah file");</script>';
					redirect('m/konfirmasi','refresh');
				}
			}
			
		}

		public function get_harga(){
			$id = $this->input->post('tujuan');
			$arrstate = $this->db->query('select * from paket_wisata where id = ?',array($id))->row();
			$hargabayar = $arrstate->harga * (25/100);
			echo 'Harga Keseluruhan : Rp.'.number_format($arrstate->harga),',',''.'<br>Harga yang harus dibayar 25% : Rp.'.number_format($hargabayar),',','';
			
		}
		#cek
		public function get_harga2(){
			$id = $this->input->post('tujuan');
			$arrstate = $this->db->query('select * from paket_wisata where id = ?',array($id))->row();
			$hargabayar = $arrstate->harga * (25/100);
			?>
			<input type="hidden" name="a" value="<?php echo $hargabayar;?>">
			<?php
			
		}

		public function ins_pemesanan()
		{
			$data = array(
				'id' => '',
				'idbus' => $this->input->post('idbus'),
				'iduser' => $this->session->userdata('id'),
				'tgl_b' => $this->input->post('tgl_b'),
				'tgl_p' => $this->input->post('tgl_p'),
				'tgl_expied' => $this->input->post('rentang'),
				'titik' => $this->input->post('titik'),
				'noHP' => $this->input->post('noHP'),
				'noRek' => $this->input->post('noRek'),
				'harga' => $this->input->post('a'),
				'tujuan' => $this->input->post('tujuan'),
				'bukti_transfer' => '0',
				'status' => '0',
			);
			$idbus = $this->input->post('idbus');
			$query = $this->db->insert('npemesanan_pariwisata',$data);
			$update = $this->db->query('update bus set sttb = "1" where id = ?',array($idbus));
			if($query == true and $update == true){
				echo '<script>alert("Sukses memesan, silahkan masukkan bukti Pembayaran");</script>';
				redirect('m/reservasi','refresh');
			}else{
				echo '<script>alert("Salah ! !");</script>';
			}
			#echo $value;
		}
		
		

	//pemesanan tiket
		public function pemesanantiket($id)
		{
			$iduser = $this->session->userdata('id');
			/*$this->pre($iduser);
			die;*/
			$data = array(
				'nama' => $this->session->userdata('nama'),
				'log' => $this->db->query("select * from login where id = ?",array($iduser))->row(),
				'stat' => $this->session->userdata('stat'),
				'bus' => $this->m_login->getbus($id),
				'sheet' => $this->m_login->getsheet($id),
				'tiket_pesanan' => $this->db->query('SELECT * FROM `pemesanan_tiket`, bus, jadwal where bus.id = pemesanan_tiket.id and jadwal.id = pemesanan_tiket.idjadwal and jadwal.idbus = ?',array($id))->result(),
				'get_shet' => $this->db->query('select * from jenis_sheet, bus where bus.idshet = jenis_sheet.id and bus.id = ?',array($id))->row(),
			);



			foreach ($data['tiket_pesanan'] as $key => $value) {
				
				$shet[] = $value->kursitiket;

			}
			
			$arr_imp[] = implode(',', $shet);

			foreach ($arr_imp as $key => $value) {
				
				$data['arr_exp'] = explode(',', $arr_imp[$key]);
			}

			foreach ($data['sheet'] as $key => $value) {
				
				foreach ($data['arr_exp'] as $keys => $values) {
					
					if(@$data['arr_exp'][$keys] == $value->sheet1){

					$data['true1'][$value->sheet1] = 'True';

					}

					if(@$data['arr_exp'][$keys] == $value->sheet2){

						$data['true2'][$value->sheet2] = 'True';

					}

					if(@$data['arr_exp'][$keys] == $value->sheet3){

						$data['true3'][$value->sheet3] = 'True';

					}

					if(@$data['arr_exp'][$keys] == $value->sheet4){

						$data['true4'][$value->sheet4] = 'True';

					}

					if(@$data['arr_exp'][$keys] == $value->sheet5){

						$data['true5'][$value->sheet5] = 'True';

					}

					

				}

			}

			$this->pre($data['sheet']);

				$this->load->view('Header', $data);
				$this->load->view('Member/Pemesanantiket');
				$this->load->view('Footer');
		}

		function ins_tiket(){
			$sheet = $this->input->post('sheet');
			$no = 0;
			$rentang = $this->m_login->expiredtiket();
			#var_dump($rentang);
			#echo $rentang->rentang;
			#echo count($sheet);
			foreach ($sheet as $key => $value) {
			echo	$sheet[$no].',';
			$jumsheet[] = $sheet[$no];
			$no++;
			}
			$jumsheet = implode(',', $jumsheet);
			@$total = count($sheet) * $this->input->post('harga');
			$db = array(
				'iduser' => $this->session->userdata('id'),
				'idbus' => $this->input->post('idbus'),
				'idjadwal' => $this->input->post('idjadwal'),
				'jumlahtiket' => count($sheet),
				'kursitiket' => $jumsheet,
				'harga' => $this->input->post('harga'),
				'total' => $total,
				'tgl_expired' => $rentang->rentang,
				'status' => '0',
			);
			#print_r($db);
			$query = $this->m_login->ins_pemesanantiket($db);
			if($query == true){
				echo '<script>alert("Berhasil Melakukan Pemesanan")</script>';
				echo '<script>alert("Silahkan Melakukan Upload Bukti Pembayaran")</script>';
				redirect('member/konfirmasitiket','refresh');
			}else{
				echo '<script>alert("GALAT !!")</script>';
				redirect('member/jadwal','refresh');
			}

		}

		function konfirmasitiket(){
			$iduser = $this->session->userdata('id');
			
			$data = array(
				'nama' => $this->session->userdata('nama'),
				'stat' => $this->session->userdata('stat'),
				'log' => $this->db->query("select * from login where id = ?",array($iduser))->row(),
				'tiket' => $this->m_login->konfirmasipemesanantiket($iduser),
			);
			#var_dump($data);
			$this->load->view('Header',$data , FALSE);
			$this->load->view('member/konfirmasipemesanantiket');
			$this->load->view('Footer');
		}

		function pemesanan_tiket(){
			$iduser = $this->session->userdata('id');
			$data = array(
				'nama' => $this->session->userdata('nama'),
				'stat' => $this->session->userdata('stat'),
				'log' => $this->db->query("select * from login where id = ?",array($iduser))->row(),
				'tabel1' => $this->m_login->showpemesanantiket($iduser),
			);
			$this->load->view('Header', $data, FALSE);
			$this->load->view('member/pemesanan_tiket');
			$this->load->view('Footer');
		}
		
		function updatepemesanantiket($id){
			$iduser = $this->session->userdata('id');
			$data = array(
				'nama' => $this->session->userdata('nama'),
				'stat' => $this->session->userdata('stat'),
				'log' => $this->db->query("select * from login where id = ?",array($iduser))->row(),
				'tiket' => $this->m_login->showuppemesanantiket($iduser,$id),

			);
			$this->load->view('Header',$data,FALSE);
			$this->load->view('member/Upkonfirmasitiket');
			$this->load->view('Footer');
		}

		function up_tiket($id){
			#doupload
			$config['upload_path'] = './assets/img/bukti/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$config['max_size']  = '100';
			$config['max_width']  = '1024';
			$config['max_height']  = '768';
			
			$this->load->library('upload', $config);
			
			if ( ! $this->upload->do_upload('bukti')){
				$error = array('error' => $this->upload->display_errors());
				echo '<script>alert("Format File harus jpg/jpeg !! Max Width 1024, max Weight 768");</script>';
				redirect('member/updatepemesanantiket/'.$id,'refresh');
				#redirect('m/reservasi','refresh');
			}
			else{
				$bukti = $_FILES['bukti']['name'];
				$data = array('upload_data' => $this->upload->data());
				$status = 'Tunggu Konfirmasi';
				$id = $this->input->post('id');
				#$dp = $this->input->post('DP');
				$tgl = date('Y-m-d H:m:s');
				#$query = $this->db->query('update pemesanan_pariwisata set bukti_transfer = ?, tgl_up = ? where id = ?',array($bukti,$tgl,$id));
				$query = $this->m_login->updatetiket($bukti,$status,$tgl,$id);
				if($query == true){
					echo '<script>alert("Silahkan Tunggu konfirmasi dari Admin");</script>';
					redirect('m/index','refresh');
				}else{
					echo '<script>alert("Terjadi Kesalahan unggah file");</script>';
					redirect('member/updatepemesanantiket/'.$id,'refresh');
				}
				#var_dump($id);
			}
		}

		function coba(){
			$this->load->view('header');
			$this->load->view('coba');
			$this->load->view('footer');
		}

		function pre($var){
			echo '<pre>';
			print_r($var);
			echo '</pre>';
		}
		/*if($cek == true){
			
				echo '<script>alert("Sukses menambahkan data")</script>';
				redirect('datamaster','refresh');
		}else{
			$data['alert'] = '<div class="alert bg-danger" role="alert">
					<svg class="glyph stroked cancel"><use xlink:href="#stroked-cancel"></use></svg> Gagal Menambahkan <a href="#" class="pull-right"><span class="glyphicon glyphicon-remove"></span></a>
				</div>';
				redirect('datamaster','refresh');
		}*/
	}
	/*public function confirmasi_pemesanan()
	{
		$db = array(
			'id' => '',
			'iduser' => $this->session->userdata('id'),
			'idpaket' => $this->input->post('idp'),
			'norek' => '196123875234',
			'tgl_b' =>
		);
	}*/



/* End of file Member.php */
/* Location: ./application/controllers/Member.php */


