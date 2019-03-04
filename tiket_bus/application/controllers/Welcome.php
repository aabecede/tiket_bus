<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	var $bus = 'SELECT *, bus.id as idbus FROM bus, status_bus, sopir where status_bus.id = bus.status and status_bus.id = 2 and sopir.id = bus.idsopir';
	function __construct(){
		parent::__construct();


	}
	public function index()
	{
		$data = array(
			'bandara' => $this->db->query('select *, count(bus.id)as Eb from bus, jenis_sheet where bus.idshet = jenis_sheet.id and bus.status="1"')->row()
		);
		$this->load->view('Full',$data);
		
	}

	public function proses()
	{
		$email = $this->input->post('id');
		$pw = $this->input->post('pw');

		$query = $this->db->query("select * from login where email='".$email."' and password=md5('".$pw."')")->row();
		if(count($query)>0)
		{
			$session = array(
				'id' =>$query->id,
				'email' => $query->email,
				'nama' => $query->nama,
				'alamat' => $query->alamat,
				'status' => 'Online'
			);
		
			$this->session->set_userdata($session);
			redirect('Welcome/Masuk','refresh');
		}else{
			#redirect('welcome/index','refresh');
			var_dump($query);
		}
	}

	public function masuk()
	{
		$id = $this->session->userdata('id');
		$user = $this->db->get('login',$id)->row();
		$nomorkursi = $this->db->query('select * from nomor_kursi where id not in(select no_kursi from pemesanan)')->result();
		$tujuan = $this->db->query("select * from tujuan")->result();
		$pesan = $this->db->query("select *, login.nama as user, tujuan.nama as tuju from pemesanan,login,nomor_kursi,tujuan where pemesanan.id_login = login.id and pemesanan.no_kursi = nomor_kursi.id and tujuan.id = pemesanan.tujuan")->result();

		
		
		echo 'masuk '.$user->nama.'<br>
		
	';
	?>
	<script src="<?php echo base_url('calender/');?>jquery.min.js"></script>
	<form action="<?php echo base_url('welcome/input');?>" method="POST" name="forminputtanggal" enctype="multipart/form-data">
	<table width="600" border="0" align="center" cellpadding="0" cellspacing="0">
		<tr height="46">
			<td><font color="orange" size="2"><b>FORM INPUT TANGGAL</b></font></td>
		</tr>
	</table>
	<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
		<tr height="36">
			
			<td>Tanggal</td>
			<td><input name="tanggal" value="" size="24">&nbsp;<a href="javascript:void(0)" onClick="if(self.gfPop)gfPop.fPopCalendar(document.forminputtanggal.tanggal);return false;" ><img name="popcal" align="absmiddle" src="<?php echo base_url();?>calender/calbtn.gif" width="34" height="22" border="0" alt=""></a></td>
		</tr>
		<tr>
			<td>Jam</td>
			<td><select name="jam" required="">
					        		<?php
					        		for($i=8;$i<=24;$i++)
					        		{
					        			if($i<10)
					        			{
					        				echo '<option value="0'.$i.':00:00">0'.$i.':00</option>';
					        			}else{
					        				echo '<option value="'.$i.':00:00">'.$i.':00</option>';
					        			}
					        		}
					        		?>
					        	</select>
				</tr>
		<tr>
			<td>Tujuan</td>
			<td><select name="tujuan">
				<?php
				foreach ($tujuan as $key) {
					echo '<option value="'.$key->id.'">'.$key->nama.'</option>';
				}
				?>
			</select>
			</td>
		</tr>
		<tr>
			<td>Jumlah Tiket</td>
			<td><input type="text" id="tiket" min="0" name="jumlah" name="jumlah" onkeyup="jumlahtiket()"></td>
			
		</tr>
		<tr>
			<td>No Kursi</td>
			<td><ol id="tes"></ol></td>
		</tr>
		<tr height="36">
			
			<td>&nbsp;</td>
			<td><input type="submit" name="Submit" value="Submit">&nbsp;&nbsp;&nbsp;
				<input type="reset" name="reset" value="Reset"></td>
		
	</table>
</form>
<table>
	<tr>
		<th>No</th>
		<th>Nama Pemesan</th>
		<th>Tujuan</th>
		<th>Tanggal</th>
		<th>Jam</th>
		<th>No Kursi</th>
		<th>Jumlah Tiket</th>
	</tr>
	<?php
	$no = 0;
	foreach ($pesan as $key => $value) {
		$no++;
		echo '<tr>
		<td>'.$no.'</td>
		 <td>'.$value->user.'</td>
		 <td>'.$value->tuju.'</td>
		 <td>'.$value->tanggal.'</td>
		 <td>'.$value->jam.'</td>
		 <td>'.$value->no_kursi.'</td>
		 <td>'.$value->jumlah.'</td>
		</tr>';
	}
	?>
</table>
	<!--</div> -->
	<iframe width=174 height=189 name="gToday:normal:agenda.js" id="gToday:normal:agenda.js" src="<?php echo base_url();?>calender/ipopeng.htm" scrolling="no" frameborder="0" style="visibility:visible; z-index:999; position:absolute; top:-500px; left:-500px;">
	</iframe></center>
	<script type="text/javascript">
		
		function jumlahtiket()
		{
			var x = document.getElementById('tiket').value;
			//document.getElementById("test").innerHTML =  x;
			if(x == 1)
			{
				$('ol').append(`<?php foreach($nomorkursi as $key){echo'<input type="checkbox" name="no_kursi" value="'.$key->id.'">'.$key->no;} ;?>`);
			}else{
				for(i=1;i<=x;i++)
				{
					$('ol').append(`<?php foreach($nomorkursi as $key){echo'<input type="checkbox" name="no_kursi" value="'.$key->id.'">'.$key->no;} ;?><br>`);
				}
			
			}
			
				
				
			

			
		}
	</script>

	<?php		
		echo '<br>
		<a href="'.base_url('welcome/logout').'">Logout</a>';
	}

	public function input()
	{
		$object = array(
			'id' => '',
			'id_login' => $this->session->userdata('id'),
			'no_kursi' => $this->input->post('no_kursi'),
			'tanggal' => $this->input->post('tanggal'),
			'jam' => $this->input->post('jam'),
			'tujuan' => $this->input->post('tujuan'),
			'jumlah'=> $this->input->post('jumlah')
		);
		$data = $this->db->insert('pemesanan', $object);
		redirect('welcome/masuk','refresh');
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('Welcome','refresh');
	}

	public function jadwal()
	{
		$data = array(
			'query'=>$this->db->query('select * from jadwal')->result(),
			'bus' => $this->db->query('SELECT *, sopir.nama as napir, ntujuan.nama as naju, jadwal.id as idj FROM `jadwal`, ntujuan, bus, sopir where ntujuan.id = jadwal.tujuan and bus.id = jadwal.idbus and sopir.id = bus.idsopir')->result(),
			'get' => $this->db->get('event_tiket')->row(),
		);
		$this->load->view('header',$data);
		$this->load->view('jadwal');
		$this->load->view('footer');
	}
	public function tiket(){

		$this->load->view('header');
		$this->load->view('caritiket');
		$this->load->view('footer');
	}
	public function pemesanantiket()
	{
		$data =array(
			'from' => $this->input->post('berangkat'),
			'to' => $this->input->post('tujuan'),
			'jam' => $this->input->post('jam'),
			'jum' => $this->input->post('tiket'),
			'harga' => $this->input->post('harga'),
			'query' => $this->db->get('sheet')->result()
		);
		#var_dump($data['query']);
		$this->load->view('header', $data);
		$this->load->view('pemesanan');
		$this->load->view('footer');
	}
	public function res_pemesanantiket()
	{
		$data = array(
			'kursi' => $this->input->post('kursi'),
			'from' => $this->input->post('from'),
			'to' =>$this->input->post('to'),
			'jam' =>$this->input->post('jam'),
			'harga' => $this->input->post('harga')
		);
		#var_dump($data);
		if(count($data['kursi']) > 0){
			$this->load->view('header', $data);
		$this->load->view('pemesanantiket');
		$this->load->view('footer');	
		}else{
			redirect('pesantiket');
		}
		

	}
	/*public function denahkursi()
	{

		$data = array(
			'id' => $this->input->post('idt'),
			'nama' => $this->input->post('nama'),
			'juket'=> $this->input->post('juket'),
			'jum' => $this->input->post('jum')
		);

		if($data['juket'] > $data['jum']){
			echo '<script>alert("Sisa Tiket '.$data['jum'].'");location.href="caritiket"</script>';
#redirect('pesantiket');
		}else{


		$this->load->view('header', $data);
		$this->load->view('transaksi/denah');
		$this->load->view('footer');
		}
	}*/

	public function konfirmasipesan()
	{
		$data = array(
			'kursi' => $this->input->post('kursi'),
			'from' => $this->input->post('from'),
			'to' =>$this->input->post('to'),
			'jam' =>$this->input->post('jam'),
		);
		#var_dump($data);
		if(count($data['kursi']) > 0){
			$this->load->view('header', $data);
		$this->load->view('pemesanantiket');
		$this->load->view('footer');	
		}else{
			redirect('pesantiket');
		}
	}

	public function buspariwisata()
	{
		$data = array(
			#'tabel1' => $this->db->query("select *, paket_wisata.id as idpaket from paket_wisata, jenis_sheet where jenis_sheet.id = paket_wisata.sheet")->result(),
			#'tabel3' => $this->db->query("select *, jdw_pariwisata.id as idjwd from jdw_pariwisata, jenis_sheet where jenis_sheet.id = jdw_pariwisata.sheet")->result(),
			'bus' => $this->db->query($this->bus)->result(),
		);
		$this->load->vars($data);
		$this->load->view('Header');
		$this->load->view('Pariwisata');
		$this->load->view('Footer');
	}
	public function get_bus(){
			$id = $this->input->post('rowid');
			$quer = $this->db->query('SELECT *, bus.id as idbus FROM bus, status_bus, sopir,jenis_sheet where status_bus.id = bus.status and status_bus.id = 2 and sopir.id = bus.idsopir and bus.idshet = jenis_sheet.id and bus.id = ?',array($id))->row();
			#var_dump($quer);
			#$this->load->view('Get_bus', $quer, FALSE);
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
					</table>
				</div>
			
			<?php

		}
	public function pariwisata()
	{
		$data = array(
			'bus' => $this->db->query($this->bus)->result(),
		);
		$this->load->vars($data);
		$this->load->view('Header');
		$this->load->view('Pariwisata');
		$this->load->view('Footer');
	}

	function coba(){
		$this->load->view('header');
			$this->load->view('coba');
			$this->load->view('footer');
	}
}
