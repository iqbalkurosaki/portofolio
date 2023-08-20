<?php
	require_once "call_class_kuisD.php";
	//require_once "modal_laporan.php";
?>
 



  		<div class="table-responsive">
				<table  class="table table-striped">
				<tr class="success">
					<td><h4>D</h4></td>
					<td><h4>PEKERJAAN</h4></td>
				</tr>
				<tr></tr>
				<tr>
					<td><b>D1</td>
					<td><b>Apakah anda bekerja saat ini (termasuk kerja sambilan dan wirausaha)?</td>
				</tr>
				<tr>
					<td></td>
					<td>Ya : <?php echo $krj_saat_ini_y["jumlah"];?></td>
				</tr>
				<tr>
					<td></td>
					<td>Tidak : <?php echo $krj_saat_ini_t["jumlah"];?></td>
				</tr>
				<tbody id="D2">
					<tr>
						<td><b>D2</td>
						<td><b>Bagaimana anda menggambarkan situasi anda saat ini? </b><i><font size="2">Jawaban bisa lebih dari satu</td>
					</tr>
					<tr>
						<td></td>
						<td>Saya masih belajar/melanjutkan kuliah profesi atau pascasarjana : <?php echo $sa_lnjt_kul["jumlah"];?></td>
					</tr>
					<tr>
						<td></td>
						<td>Saya menikah : <?php echo $sa_nikah["jumlah"];?></td>
					</tr>
					<tr>
						<td></td>
						<td>Saya sibuk dengan keluarga dan anak-anak : <?php echo $sa_sbk_klg_ank["jumlah"];?></td>
					</tr>
					<tr>
						<td></td>
						<td>Saya sekarang sedang mencari pekerjaan : <?php echo $sa_cr_krj["jumlah"];?></td>
					</tr>
					<tr>
						<td></td>
						<td>Lainnya : 
							<button type="button" class="btn btn-primary btn-small" data-toggle="modal" data-target="#myModald2">
			  klik disini
			</button>
						</td>
					</tr>
				</tbody>
				<tr>
					<td><b>D3</td>
					<td><b>Apakah anda aktif mencari pekerjaan dalam 4 minggu terakhir? </b><i><font size="2">Pilih satu jawaban</td>
				</tr>
				<tr>
					<td></td>
					<td>Tidak : <?php echo $aktf_cr_krj_4_mgg_trkhr_t["jumlah"];?></td>
				</tr>
				<tr>
					<td></td>
					<td>Tidak, tapi saya sedang menunggu hasil lamaran kerja : <?php echo $aktf_cr_krj_4_mgg_trkhr_t_tggu["jumlah"];?></td>
				</tr>
				<tr>
					<td></td>
					<td>Ya, saya akan mulai bekerja dalam 2 minggu ke depan : <?php echo $aktf_cr_krj_4_mgg_trkhr_y_2mgg["jumlah"];?></td>
				</tr>
				<tr>
					<td></td>
					<td>Ya, tapi saya belum pasti akan bekerja dalam 2 minggu ke depan  : <?php echo $aktf_cr_krj_4_mgg_trkhr_y_b2mgg["jumlah"];?></td>
				</tr>
				<tr>
					<td></td>
					<td>Lainnya : 
						<button type="button" class="btn btn-primary btn-small" data-toggle="modal" data-target="#myModald3">
			  klik disini
			</button>					
					</td>
				</tr>
				<tr>
					<td><b>D4</td>
					<td><b>Berapa perusahaan/instansi/institusi yang telah anda masuki untuk bekerja (termasuk perusahaan sendiri) sejak anda lulus dari sekolah?</td>
				</tr>
				<tr>
					<td></td>
					<td>
						Jumlah alumni yang memasuki perusahaan : <?php echo $jml_alumni["jumlah"];?>	<br/>
						Jumlah perusahaan dimasuki seluruh alumni : <?php echo $jml_inst["jumlah"];?><br/>
						Rata-rata perusahaan yang dimasukki : <?php echo $rt_inst["jumlah"];?><br/>
						Paling banyak :	<?php echo $max_inst["jumlah"];?><br/>
						Paling sedikit : <?php echo $min_inst["jumlah"];?>
					</td>
				</tr>
				<tr>
					<td><b>D5</td>
					<td><b>Apa jenis perusahaan/instansi/institusi tempat anda bekerja sekarang?</td>
				</tr>
				<tr>
					<td></td>
					<td>Instansi pemerintah (termasuk BUMN) : <?php echo $inst_pmrnth["jumlah"];?></td>
				</tr>
				<tr>
					<td></td>
					<td>Organisasi non-profit/Lembaga Swadaya Masyarakat : <?php echo $lsm["jumlah"];?></td>
				</tr>
				<tr>
					<td></td>
					<td>Perusahaan swasta : <?php echo $perus_swasta["jumlah"];?></td>
				</tr>
				<tr>
					<td></td>
					<td>Wiraswasta/perusahaan sendiri : <?php echo $wiraswasta["jumlah"];?></td>
				</tr>
				<tr>
					<td></td>
					<td>Lainnya : 
						<button type="button" class="btn btn-primary btn-small" data-toggle="modal" data-target="#myModald5">
			  klik disini
			</button>
					</td>
					</tr>
				<tr>
					<td><b>D6</td>
					<td><b>Tempat anda bekerja saat ini bergerak di bidang apa? (Klasifikasi Baku Lapangan Usaha Indonesia,Kemnakertrans, 2009)</b></td>
				</tr>
					<tr>
						<td><b></td>
						<td><b>Kategori A: Pertanian, kehutanan, dan perikanan</td>
					</tr>
					<tr>
						<td><font size="1">1</td>
						<td>Pertanian tanaman, peternakan, perburuan dan kegiatan yang berhubungan dengan itu : <?php echo $pertanian["jumlah"];?></td>
					</tr>
					<tr>
						<td><font size="1">2</td>
						<td>Kehutanan dan penebangan kayu : <?php echo $kehutanan["jumlah"];?></td>
					</tr>
					<tr>
						<td><font size="1">3</td>
						<td>Perikanan : <?php echo $perikanan["jumlah"];?></td>
					</tr>
					<tr>
						<td><b></td>
						<td><b>Kategori B: Pertambangan dan penggalian</td>
					</tr>
					<tr>
					<td><font size="1">4</td>
					<td>Pertambangan batu bara dan lignit : <?php echo $pertambangan_batu_bara["jumlah"];?></td>
					</tr>
					<tr>
						<td><font size="1">5</td>
						<td>Pertambangan minyak bumi dan gas alam dan panas bumi : <?php echo $pertambangan_minyak["jumlah"];?></td>
					</tr>
					<tr>
						<td><font size="1">6</td>
						<td>Pertambangan bijih logam : <?php echo $pertambangan_minyak["jumlah"];?></td>
					</tr>
					<tr>
						<td><font size="1">7</td>
						<td>Pertambangan dan penggalian lainnya : <?php echo $pertambangan_lain["jumlah"];?></td>
					</tr>
					<tr>
						<td><font size="1">8</td>
						<td>Jasa Pertambangan : <?php echo $jasa_pertambangan["jumlah"];?></td>
					</tr>
					<tr>
						<td><b></td>
						<td><b>Kategori C: Industri Pengolahan</td>
					</tr>
					<tr>
						<td><font size="1">9</td><td>industri makanan : <?php echo $ind_makanan["jumlah"];?></td>
					</tr>
					<tr><td><font size="1">10</td><td>Industri minuman : <?php echo $ind_minuman["jumlah"];?></tr>
					<tr>
						<td><font size="1">11</td>
						<td>Industri pengolahan tembakau : <?php echo $ind_minuman["jumlah"];?></tr>
					<tr>
						<td><font size="1">12</td><td>Industri tekstil : <?php echo $ind_tekstil["jumlah"];?></td></tr>
					<tr>
						<td><font size="1">13</td><td>Industri pakaian jadi : <?php echo $ind_pakaian_jd["jumlah"];?></td></tr>
					<tr>
						<td><font size="1">14</td><td>Industri kulit, barang dari kulit dan alas kaki : <?php echo $ind_kulit["jumlah"];?></td></tr>
					<tr>
						<td><font size="1">15</td>
						<td>Industri kayu, barang dari kayu dan gabus (tidak termasuk furnitur) dan barang anyaman dari bambu, rotan dan sejenisnya : <?php echo $ind_kayu["jumlah"];?></td></tr>
					<tr>
						<td><font size="1">16</td><td>Industri kertas dan barang dari kertas : <?php echo $ind_kertas["jumlah"];?></td></tr>
					<tr>
						<td><font size="1">17</td>
						<td>Industri pencetakan dan reproduksi media rekaman : <?php echo $ind_pencetakan["jumlah"];?></td></tr>
					<tr>
						<td><font size="1">18</td>
						<td>Industri produk dari batu bara dan pengilangan minyak bumi : <?php echo $ind_batu_bara["jumlah"];?></td></tr>
					<tr>
						<td><font size="1">19</td><td>Industri bahan kimia dan barang dari bahan kimia : <?php echo $ind_kimia["jumlah"];?></td></tr>
					<tr>
						<td><font size="1">20</td><td>Industri farmasi, produk obat kimia dan obat tradisional : <?php echo $ind_farmasi["jumlah"];?></td></tr>
					<tr>
						<td><font size="1">21</td><td>Industri karet, barang dari karet dan plastik : <?php echo $ind_karet["jumlah"];?></td></tr>
					<tr>
						<td><font size="1">22</td><td>Industri barang galian bukan logam : <?php echo $ind_gali_non_logm["jumlah"];?></td></tr>
					<tr>
						<td><font size="1">23</td><td>Industri logam dasar : <?php echo $ind_logm_dsr["jumlah"];?></td></tr>
					<tr>
						<td><font size="1">24</font></td><td>Industri barang logam, bukan mesin dan peralatannya : <?php echo $ind_logm_brg["jumlah"];?></td></tr>
					<tr>
						<td><font size="1">25</font></td><td>Industri komputer, barang elektronik dan optik : <?php echo $ind_komp["jumlah"];?></td></tr>
					<tr>
						<td><font size="1">26</font></td><td>Industri peralatan listrik : <?php echo $ind_lstrk["jumlah"];?></td></tr>
					<tr>
						<td><font size="1">27</font></td><td>Industri mesin dan perlengkapan ytdl : <?php echo $ind_mesin["jumlah"];?></td></tr>
					<tr>
						<td><font size="1">28</font></td><td>Industri kendaraan bermotor, trailer dan semi trailer : <?php echo $ind_motor["jumlah"];?></td></tr>
					<tr><td><font size="1">29</font></td><td>Industri alat angkutan lainnya : <?php echo $ind_angkut["jumlah"];?></td></tr>
					<tr><td><font size="1">30</font></td><td>Industri furnitur : <?php echo $ind_frntr["jumlah"];?></td></tr>
					<tr><td><font size="1">31</font></td><td>Industri pengolahan lainnya : <?php echo $ind_olah_lain["jumlah"];?></td></tr>
					<tr><td><font size="1">32</font></td><td>Jasa reparasi dan pemasangan mesin dan peralatan : <?php echo $ind_olah_lain["jumlah"];?></td></tr>
					<tr>
						<td><b></td>
						<td><b>Kategori D: Pengadaan listrik, gas, uap/air panas dan udara dingin</td>
					</tr>
					<tr><td><font size="1">33</font></td><td>Pengadaan listrik, gas, uap/air panas dan udara dingin : <?php echo $ada_lstrk["jumlah"];?></td></tr>
					<tr>
						<td><b></td>
						<td><b>Kategori E: Pengadaan air, pengelolaan sampah dan daur ulang, pembuangan dan pembersihan limbah dan sampah</td>
					</tr>
					<tr><td><font size="1">34</font></td><td>Pengadaan air : <?php echo $ada_air["jumlah"];?></td></tr>
					<tr><td><font size="1">35</font></td><td>Pengolahan limbah : <?php echo $olah_limbah["jumlah"];?></td></tr>
					<tr><td><font size="1">36</font></td><td>Pengolahan sampah dan daur ulang : <?php echo $olah_sampah["jumlah"];?></td></tr>
					<tr><td><font size="1">37</font></td><td>Jasa pembersihan dan pengelolaan sampah lainnya : <?php echo $kelola_smph["jumlah"];?></td></tr>
					<tr>
						<td><b></td>
						<td><b>Kategori F: Konstruksi</td>
					</tr>
					<tr><td><font size="1">38</font></td><td>Konstruksi gedung : <?php echo $kons_gdg["jumlah"];?></td></tr>	
					<tr><td><font size="1">39</font></td><td>Konstruksi bangunan sipil : <?php echo $kons_sipil["jumlah"];?></td></tr>
					<tr><td><font size="1">40</font></td><td>Konstruksi khusus : <?php echo $kons_khusus["jumlah"];?></td></tr>
					<tr>
						<td><b></td>
						<td><b>Kategori G: Perdagangan besar dan eceran; reparasi dan perawatan mobil dan sepeda motor</td>
					</tr>
					<tr><td><font size="1">41</font></td><td>Perdagangan, reparasi dan perawatan mobil dan sepeda motor : <?php echo $pdgg["jumlah"];?></td></tr>
					<tr><td><font size="1">42</font></td><td>Perdagangan besar, bukan mobil dan sepeda motor : <?php echo $pdgg_bsr["jumlah"];?></td></tr>
					<tr><td><font size="1">43</font></td><td>Perdagangan eceran, bukan mobil dan motor : <?php echo $pdgg_ecr["jumlah"];?></td></tr>
					<tr>
						<td><b></td>
						<td><b>Kategori H: Transportasi dan pergudangan</td>
					</tr>
					<tr><td><font size="1">44</font></td><td>Angkutan darat dan angkutan melalui saluran pipa : <?php echo $angk_drt["jumlah"];?></tr>
					<tr><td><font size="1">45</font></td><td>Angkutan air : <?php echo $angk_air["jumlah"];?></td></tr>
					<tr><td><font size="1">46</font></td><td>Angkutan udara : <?php echo $angk_udr["jumlah"];?></td></tr>
					<tr><td><font size="1">47</font></td><td>Pergudangan dan jasa penunjang angkutan : <?php echo $gdg["jumlah"];?></td></tr>
					<tr><td><font size="1">48</font></td><td>Pos dan kurir : <?php echo $pos["jumlah"];?></td></tr>
					<tr>
						<td><b></td>
						<td><b>Kategori I: Penyediaan akomodasi dan penyediaan makan minum</td>
					</tr>
					<tr><td><font size="1">49</font></td><td>Penyediaan akomodasi : <?php echo $peny_akom["jumlah"];?></td></tr>
					<tr><td><font size="1">50</font></td><td>Penyediaan makanan dan minuman : <?php echo $peny_makmin["jumlah"];?></td></tr>
					<tr>
						<td><b></td>
						<td><b>Kategori J: Informasi dan komunikasi</td>
					</tr>
					<tr><td><font size="1">51</font></td><td>Penerbitan : <?php echo $penerbitan["jumlah"];?></td></tr>
					<tr><td><font size="1">52</font></td><td>Produksi gambar bergerak, video dan program televisi, perekaman suara dan penerbitan musik : <?php echo $gmbr_grk["jumlah"];?></td></tr>
					<tr><td><font size="1">53</font></td><td>Penyiaran dan pemrograman : <?php echo $siar["jumlah"];?></td></tr>
					<tr><td><font size="1">54</font></td><td>Telekomunikasi : <?php echo $telkom["jumlah"];?></td></tr>
					<tr><td><font size="1">55</font></td><td>Kegiatan pemrograman, konsultasi komputer dan kegiatan yang berhubungan dengan itu : <?php echo $programmer["jumlah"];?></td></tr>
					<tr><td><font size="1">56</font></td><td>Kegiatan jasa informasi : <?php echo $jasa_info["jumlah"];?></td></tr>
					<tr>
						<td><b></td>
						<td><b>Kategori K:  Jasa keuangan dan asuransi</td>
					</tr>
					<tr><td><font size="1">57</font></td><td>Jasa keuangan, bukan asuransi dan dana pensiun : <?php echo $jasa_uang["jumlah"];?></td></tr>
					<tr><td><font size="1">58</font></td><td>Asuransi, reasuransi dan dana pensiun, bukan jaminan sosial wajib : <?php echo $asuransi["jumlah"];?></td></tr>
					<tr><td><font size="1">59</font></td><td>Jasa penunjang jasa keuangan, asuransi dan dana pensiun : <?php echo $jasa_tunjg["jumlah"];?></td></tr>
					<tr>
						<td><b></td>
						<td><b>Kategori L: Real estat</td>
					</tr>
					<tr><td><font size="1">60</font></td><td>Real estat : <?php echo $real_estat["jumlah"];?></td></tr>
					<tr>
						<td><b></td>
						<td><b>Kategori M: Jasa profesional, ilmiah dan teknis</td>
					</tr>
					<tr><td><font size="1">61</font></td><td>Jasa hukum dan akuntansi : <?php echo $jasa_hkm["jumlah"];?></td></tr>
					<tr><td><font size="1">62</font></td><td>Kegiatan kantor pusat dan konsultasi manajemen : <?php echo $konsul_mnj["jumlah"];?></td></tr>
					<tr><td><font size="1">63</font></td><td>Jasa arsitektur dan teknik sipil; analisis dan uji teknis : <?php echo $jasa_arstktr["jumlah"];?></td></tr>
					<tr><td><font size="1">64</font></td><td>Penelitian dan pengembangan ilmu pengetahuan : <?php echo $pen_ilmu["jumlah"];?></td></tr>
					<tr><td><font size="1">65</font></td><td>Periklanan dan penelitian pasar : <?php echo $perikln["jumlah"];?></td></tr>
					<tr><td><font size="1">66</font></td><td>Jasa profesional, ilmiah dan teknis lainnya : <?php echo $jasa_prof["jumlah"];?></td></tr>
					<tr><td><font size="1">67</font></td><td>Jasa kesehatan hewan : <?php echo $jasa_kes_hwn["jumlah"];?></td></tr>
					<tr>
						<td><b></td>
						<td><b>Kategori N: Jasa persewaan dan sewa guna usaha tanpa hak opsi, ketenagakerjaan, agen perjalanan dan penunjang usaha lainnya</td>
					</tr>
					<tr><td><font size="1">68</font></td><td>Jasa persewaan dan sewa guna usaha tanpa hak opsi : <?php echo $jasa_sewa["jumlah"];?></td></tr>
					<tr><td><font size="1">69</font></td><td>Jasa ketenagakerjaan : <?php echo $jasa_ktnkrjn["jumlah"];?></td></tr>
					<tr><td><font size="1">70</font></td><td>Jasa agen perjalanan, penyelenggara tur dan jasa reservasi lainnya : <?php echo $jasa_tour["jumlah"];?></td></tr>
					<tr><td><font size="1">71</font></td><td>Jasa keamanan dan penyelidikan : <?php echo $jasa_aman["jumlah"];?></td></tr>
					<tr><td><font size="1">72</font></td><td>Jasa untuk gedung dan pertamanan : <?php echo $jasa_aman["jumlah"];?></td></tr>
					<tr><td><font size="1">73</font></td><td>Jasa administrasi kantor, jasa penunjang kantor dan jasa penunjang usaha lainnya : <?php echo $jasa_adm["jumlah"];?></td></tr>
					<tr>
						<td><b></td>
						<td><b>Kategori O: Administrasi pemerintahan, pertahanan dan jaminan sosial wajib</td>
					</tr>
					<tr><td><font size="1">74</font></td><td>Administrasi pemerintahan, pertahanan dan jaminan sosial wajib : <?php echo $adm_pmrnth["jumlah"];?></td></tr>
					<tr>
						<td><b></td>
						<td><b>Kategori P: Jasa pendidikan</td>
					</tr>
					<tr><td><font size="1">75</font></td><td>Jasa pendidikan : <?php echo $jasa_pend["jumlah"];?></td></tr>
					<tr>
						<td><b></td>
						<td><b>Kategori Q: Jasa kesehatan dan kegiatan sosial</td>
					</tr>
					<tr><td><font size="1">76</font></td><td>Jasa kesehatan manusia : <?php echo $jasa_kes_mnsa["jumlah"];?></td></tr>
					<tr><td><font size="1">77</font></td><td>Jasa kegiatan sosial di dalam panti : <?php echo $jasa_sos_pnt["jumlah"];?></td></tr>
					<tr><td><font size="1">78</font></td><td>Jasa kegiatan sosial di luar panti : <?php echo $jasa_sos_lu_pnt["jumlah"];?></td></tr>
					<tr>
						<td><b></td>
						<td><b>Kategori R: Kesenian, hiburan dan rekreasi</td>
					</tr>
					<tr><td><font size="1">79</font></td><td>Kegiatan hiburan, kesenian dan kreativitas : <?php echo $kgtn_hib["jumlah"];?></td></tr>
					<tr><td><font size="1">80</font></td><td>Perpustakaan, arsip, museum dan kegiatan kebudayaan lainnya : <?php echo $perpus["jumlah"];?></td></tr>
					<tr><td><font size="1">81</font></td><td>Kegiatan perjudian dan pertaruhan : <?php echo $judi["jumlah"];?></td></tr>
					<tr><td><font size="1">82</font></td><td>Kegiatan olahraga dan rekreasi lainnya : <?php echo $olga["jumlah"];?></td></tr>
					<tr></tr>
					<tr>
						<td><b></td>
						<td><b>Kategori S: Kegiatan jasa lainnya</td>
					</tr>
					<tr><td><font size="1">83</font></td><td>Kegiatan keanggotaan organisasi : <?php echo $org["jumlah"];?></td></tr>
					<tr><td><font size="1">84</font></td><td>Jasa reparasi komputer dan barang keperluan pribadi dan perlengkapan rumah tangga : <?php echo $rpr_komp["jumlah"];?></td></td></tr>
					<tr><td><font size="1">85</font></td><td>Jasa perorangan lainnya : <?php echo $jasa_orang["jumlah"];?></td></tr>
					<tr>
						<td><b></td>
						<td><b>Kategori T: Jasa perorangan yang melayani rumah tangga; kegiatan yang menghasilkan barang dan jasa oleh rumah tangga yang digunakan sendiri untuk memenuhi kebutuhan</td>
					</tr>
					<tr><td><font size="1">86</font></td><td>Jasa perorangan yang melayani rumah tangga : <?php echo $jasa_orang_rt["jumlah"];?></td></tr>
					<tr><td><font size="1">87</font></td><td>Kegiatan yang menghasilkan barang dan jasa oleh rumah tangga yang digunakan sendiri untuk memenuhi kebutuhan : <?php echo $rt_sndr["jumlah"];?></td></tr>
					<tr>
						<td><b></td>
						<td><b>Kategori U: Kegiatan badan internasional dan badan ekstra internasional lainnya</td>
					</tr>
					<tr><td><font size="1">88</font></td><td>Kegiatan badan internasional dan badan ekstra internasional lainnya : <?php echo $inter["jumlah"];?></td></tr>
				<tr>
					<td><b>D7</td>
					<td><b>Jelaskan tugas-tugas utama dalam pekerjaan anda sekarang?</b></td>
				</tr>
				<tr><td></td><td>Alumni yang telah menulis tugas-tugas utama : <?php echo $tug_utm["jumlah"];?></td></tr>
				<tr>
					<td><b>D8</td>
					<td><b>Berapa jam rata-rata per minggu anda bekerja?</b></td>
				</tr>
				<tr><td></td><td>Tugas-tugas utama sesuai kontrak <br/><br/>
						Rata-Rata Per Alumni : <?php echo $rt_jm_tug_utm["jumlah"];?><br/>
						Paling Banyak : <?php echo $max_jm_tug_utm["jumlah"];?><br/>
						paling Sedikit : <?php echo $min_jm_tug_utm["jumlah"];?><br/>
				</td></tr>
				<tr><td></td><td>Tugas-tugas tambahan di luar tugas utama (termasuk lembur dibayar dan tidak dibayar)<br/><br/>
						Rata-Rata Per Alumni : <?php echo $rt_jm_tug_tam["jumlah"];?><br/>
						Paling Banyak : <?php echo $max_jm_tug_tam["jumlah"];?><br/>
						paling Sedikit : <?php echo $min_jm_tug_tam["jumlah"];?><br/>
				</td></tr>
				<tr><td></td><td>Pekerjaan lainnya (pekerjaan kedua, pekerjaan sambilan, dll) <br/><br/>
						Rata-Rata Per Alumni : <?php echo $rt_jm_tug_lain["jumlah"];?><br/>
						Paling Banyak : <?php echo $max_jm_tug_lain["jumlah"];?><br/>
						paling Sedikit : <?php echo $min_jm_tug_lain["jumlah"];?><br/>
				</td></tr>
				<tr><td></td><td>Jumlah jam kerja total (hanya untuk yang wiraswasta)<br/><br/>
						Rata-Rata Per Alumni : <?php echo $rt_jm_krj_tot["jumlah"];?><br/>
						Paling Banyak : <?php echo $max_jm_krj_tot["jumlah"];?><br/>
						paling Sedikit : <?php echo $min_jm_krj_tot["jumlah"];?><br/>
				</td></tr>
				<tr></tr>
				<tr>
					<td><b>D9</td>
					<td><b>Jika anda menjalankan perusahaan sendiri, apa jenis bisnis/usaha yang sedang anda jalani saat ini? </b><i><font size="2">Jawaban bisa lebih dari satu</b></td>
				</tr>
				<tr>
					<td></td>
					<td>Saya memiliki/melayani kontraktor tunggal : <?php echo $ju_kontraktor["jumlah"];?></td>
				</tr>
				<tr>
					<td></td>
					<td>Saya mengambil alih/membeli perusahaan : <?php echo $ju_beli_perus["jumlah"];?></td>
				</tr>
				<tr>
					<td></td>
					<td>Saya membangun dari awal sebuah firma/kantor : <?php echo $ju_bngun_kntr["jumlah"];?></td>
				</tr>
				<tr>
					<td></td>
					<td>Saya diminta untuk membuka perusahaan sendiri oleh perusahaan tempat saya bekerja dulu : <?php echo $ju_mint["jumlah"];?></td>
				</tr>
				<tr>
					<td></td>
					<td>Saya bekerja di rumah : <?php echo $ju_rmh["jumlah"];?></td>
				</tr>
				<tr>
					<td></td>
					<td>Saya tidak mempunyai pegawai/bekerja sendiri : <?php echo $ju_sendiri["jumlah"];?></td>
				</tr>
				<tr>
					<td></td>
					<td>Saya bekerjasama dengan teman/saudara : <?php echo $ju_sdr["jumlah"];?></td>
				</tr>
				<tr>
					<td></td>
					<td>Lainnya :
					<button type="button" class="btn btn-primary btn-small" data-toggle="modal" data-target="#myModald9">
			  klik disini
			</button>
					</td>
				</tr>
				<tr>
					<td><b>D10</td>
					<td><b>Kira-kira berapa pendapatan anda setiap bulannya? </b></td>
				</tr>
					<tr><td></td><td>Dari pekerjaan utama <br/><br/>
						Rata-Rata Per Alumni : <?php echo $rt_pndptn_pkrj_utm["jumlah"];?><br/>
						Paling Banyak : <?php echo $max_pndptn_pkrj_utm["jumlah"];?><br/>
						paling Sedikit : <?php echo $min_pndptn_pkrj_utm["jumlah"];?><br/>
					</td></tr>
					<tr><td></td><td>Dari lembur dan tips<br/><br/>
						Rata-Rata Per Alumni : <?php echo $rt_pndptn_lmbr_tips["jumlah"];?><br/>
						Paling Banyak : <?php echo $max_pndptn_lmbr_tips["jumlah"];?><br/>
						paling Sedikit : <?php echo $min_pndptn_lmbr_tips["jumlah"];?><br/>
					</td></tr>
					<tr><td></td><td>Dari pekerjaan lainnya<br/><br/>
						Rata-Rata Per Alumni : <?php echo $rt_pndptn_lain["jumlah"];?><br/>
						Paling Banyak : <?php echo $max_pndptn_lain["jumlah"];?><br/>
						paling Sedikit : <?php echo $min_pndptn_lain["jumlah"];?><br/>
					</td></tr>
				<tr>
					<td><b>D11</td>
					<td><b>Dalam setahun terakhir ini apakah anda melakukan perjalanan ke luar negeri dalam rangka bisnis/profesi? </b></td>
				</tr>
				<tr>
					<td></td>
					<td>Ya, alumni ke luar negeri (bulan)<br/><br/>
						Banyak Alumni yang ke LN :  <?php echo $cnt_jln_ln["hasil"];?> <br/>
						Rata-Rata Per Alumni : <?php echo $rt_jln_ln["hasil"];?><br/>
						Paling Banyak : <?php echo $max_jln_ln["hasil"];?><br/>
						paling Sedikit : <?php echo $min_jln_ln["hasil"];?><br/>
					</td>
				</tr>
				<tr>
					<td></td>
					<td>Tidak : <?php echo $tdk_jln_ln["jumlah"];?></td>
				</tr>
				<tr>
					<td><b>D12</td>
					<td><b>Berapa persen dari waktu kerja anda yang memiliki konteks internasional?</b></td>
				</tr>
				<tr><td></td><td>Persentase waktu kerja (%) <br/><br/>
					Alumni Mengisi : <?php echo $cnt_prsn_inter["hasil"];?><br/>
					Rata-Rata Per Alumni : <?php echo $rt_prsn_inter["hasil"];?><br/>
					Paling Banyak : <?php echo $max_prsn_inter["hasil"];?><br/>
					paling Sedikit : <?php echo $min_prsn_inter["hasil"];?><br/>
				</td>
				</tr>
				<tr>
					<td></td>
					<td>Tidak Ada : <?php echo $tdk_prsn_inter["jumlah"];?></td>
				</tr>
				
			</table>

	</div>

