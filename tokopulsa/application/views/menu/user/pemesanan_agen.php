	
	<?php ?>
	<div class="main-panel">
		<div class="content">
			<div class="page-inner">
				<div class="page-header">
					<h4 class="page-title">Kasir Grosir</h4>
						<?php $this->load->view('_partial/breadcrumbs') ?>
					</div>
						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<div class="d-flex align-items-center">
										<h4 class="card-title"></h4>
										<button class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#addRowModal">
											<i class="fa fa-plus"></i>
											Tambah Barang
										</button>
									</div>
								</div>
								<div class="card-body">
									<!-- Modal -->
									<div class="modal fade" id="addRowModal" role="dialog" aria-hidden="true">
										<div class="modal-dialog" role="document">
											<div class="modal-content">
												<div class="modal-header no-bd">
													<h5 class="modal-title">
														<span class="fw-mediumbold">
														Tambah</span> 
														<span class="fw-light">
															Barang
														</span>
													</h5>
													<button type="button" class="close" data-dismiss="modal" aria-label="Close">
														<span aria-hidden="true">&times;</span>
													</button>
												</div>
												<!--action="<?php //echo base_url(); ?>admin/kasir/grosir/keranjang_kasir"-->
												<div class="modal-body">
													<form method="post" >
														<div class="row">
															<div class="col-md-12">
																<div class="form-group ">
																	<label>ID Barang</label>
																	<input id="id_barang" name="id_barang" type="text" class="form-control" placeholder="Id Barang .." readonly>
																</div>
															</div>
															<div class="col-md-6">
																<div class="form-group">
																	<label>Nama Barang</label><br>
																	<select class="form-control form-control-md-12" id="nama_barang" name="nama_barang">
															<option value="0">&nbsp;</option>
															<?php 
																foreach ($barang as $key) {
															?>
															<option><?php echo $key->nama_barang; ?></option>
															<?php 	
																}
															?>
														</select>
																</div>
															</div>
															<div class="col-md-6">
																<div class="form-group ">
																	<label>Sisa Stok</label>
																	<input id="stok" name="stok" type="text" class="form-control" placeholder="Stok Barang .." readonly>
																</div>
															</div>
															<div class="col-md-6 pr-0">
																<div class="form-group ">
																	<label>Qty</label>
																	<input id="qty" name="qty" type="number" class="form-control" placeholder="Qty ...">
																</div>
															</div>
															<div class="col-md-6">
																<div class="form-group ">
																	<label>Harga</label>
																	<input id="harga" name="harga" type="text" class="form-control" placeholder="Harga ..." readonly>
																</div>
															</div>
														</div>
														<div class="modal-footer no-bd">
															<button id="add_keranjang" class="add_keranjang btn btn-primary">Simpan</button>
															<button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
														</div>
													</form>
												</div>
											</div>
										</div>
									</div>

									<div class="table-responsive">
										<form action="<?php echo base_url('admin/kasir/grosir/proses_jual') ?>" method="post">
											<div class="row">
												<div class="col-md-3">
													<div class="form-group">
														<label for="nama_pelanggan">Nama Pelanggan</label>
														<input type="text" class="form-control form-control-sm" id="nama_pelanggan" name="nama_pelanggan" value="<?php $nama =  $this->session->userdata("nama");
														echo $nama; ?>" readonly="readonly">
													</div>
												</div>
												<div class="col-md-3">
													<div class="form-group">
														<label for="Alamat">Alamat</label>
														<input type="text" class="form-control form-control-sm" id="alamat" name="alamat" value="<?php $alamat =  $this->session->userdata("alamat");
														echo $alamat; ?>" readonly="readonly">
													</div>
												</div>
												<div class="col-md-2">
													<div class="form-group">
														<?php
															date_default_timezone_set('Asia/Jakarta');
															$tgl=date('d-m-Y');
														?>
														<label for="tanggal">Tanggal</label>
														<input type="text" class="form-control form-control-sm" id="tanggal" name="tanggal" value="<?php echo $tgl ?>" readonly="readonly">
													</div>
												</div>
											</div>
											<table class="table table-hover">
												<thead>
													<tr>
														<th scope="col">ID Barang</th>
														<th scope="col">Nama Barang</th>
														<th scope="col">Qty</th>
														<th scope="col">Harga</th>
														<th scope="col">Subtotal</th>
														<th scope="col">Action</th>
													</tr>
												</thead>
												<!-- <tbody id="detail_keranjang"></tbody> -->
												<tbody>
													<?php foreach ($this->cart->contents() as $items): ?>
														
													<tr>
									                    <td>
									                    	<?php echo $items['id']?>
								                    	</td>
									                    <td>
									                    	<div class="col-md-12">
									                    		<div class="form-group">
									                    			<input type="text" name="name" id="name" value="<?php echo $items['name']?>" class="form-control form-control-sm "readonly>
									                    		</div>
									                    	</div>
									                    </td>
									                    <td>
									                    	<div class="col-sm-12">
									                    		<div class="form-group">
									                    			<input type="text" name="rowid" id="rowid" value="<?php echo $items['rowid']?>" class="form-control "hidden>
									                    			<input type="number" name="qtykeranjang" id="qtykeranjang" value="<?php echo $items['qty']?>" class="form-control ">
									                    		</div>
									                    	</div>
									                    </td>
									                    <td><?php echo number_format($items['price'])?></td>
									                    <td>
										                    <div class="col-md-12">
									                			<div class="form-group">
									                				<input type="text" id="subtotal" name="subtotal" value="<?php echo number_format($items['subtotal'])?>" class="form-control" style="text-align:right;margin-bottom:5px;" readonly>
									                			</div>
									                		</div>
									                	</td>
									                    <td>
									                    	<a href="#" class="btn btn-link btn-primary btn-lg" data-toggle="modal" data-target="#update<?php echo $items['rowid']?>">
 																<i class="fas fa-edit"></i>
 															</a>
 														</td>
									                </tr>
													<?php endforeach ?>
												</tbody>
											</table>
											<div class="col-md-6 ml-auto ">
												<div class="form-group form-inline">
													<label for="inlineinput" class="col-md-4 col-form-label">Total Rp. </label>
													<input type="number" class="form-control" id="total" name="total" value="<?php echo $this->cart->total() ?>" readonly>
												</div>
											</div>
											<div class="col-md-6 ml-auto ">
												<div class="form-group form-inline">
													<label for="inlineinput" class="col-md-4 col-form-label">Bayar Rp. </label>
													<input type="number" class="form-control" id="bayar" name="bayar">
												</div>
											</div>
											<div class="col-md-6 ml-auto ">
												<div class="form-group form-inline">
													<label for="inlineinput" class="col-md-4 col-form-label">Kembali Rp. </label>
													<input type="number" class="form-control" id="kembali" name="kembali" readonly>
												</div>
											</div>
											<div class="col-md-4">
												<div class="form-group">
													<label>Jenis Pembayaran</label>
													<select class="form-control" name="jenis_pembayaran" id="jenis_pembayaran">
														<option value="Cash">Cash</option>
														<option value="Transfer">Transfer</option>
													</select>
												</div>
											</div>
											<div class="col-md-4">
												<div class="form-group">	
													<button id="simpan" name="simpan" class=" btn btn-primary ml-auto">Simpan</button>
													<button id="reset" name="reset" class="btn btn-danger ml-auto">Reset</button>
												</div>
											</div>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			<?php $this->load->view('_partial/foot.php') ?>
			</div>
			<?php $this->load->view('_partial/scripttable') ?>
			<script type="text/javascript">
				$(document).ready(function(){
					$(".add_keranjang").click(function(){
						var id = $("#id_barang").val();
						// // var id = $(this).data("id_barang");
						var name = $("#nama_barang").val();
						// // var name = $(this).data("nama_barang");
						var qty = $("#qty").val();
						// // var qty = $(this).data("qty");
						var price = $("#harga").val();
						// // var price = $(this).data("harga");
						// var id = $(this).attr("id_barang");
						// var name = $(this).attr("nama_barang");
						// var qty = $(this).attr("qty");
						// var price = $(this).attr("harga");
							// window.alert(id);
							// window.alert(name);
							// window.alert(qty);
							// window.alert(price);
						$.ajax({
							url : "<?php echo base_url(); ?>admin/kasir/grosir/keranjang_kasir",
							method : "POST",
							data : {id : id, name : name, qty : qty, price : price },
							success: function(data){
								$("#detail_keranjang").html(data);
							}
						});
					});
					$('#detail_keranjang').load("<?php echo base_url();?>admin/kasir/grosir/load_cart");
					$(document).on('click', '.hapus_cart', function(){
						var row_id = $(this).attr("id");
						swal({
						title: 'Apakah Kamu Yakin?',
						text: "Kamu Tidak Dapat Mengembalikannya !",
						type: 'warning',
						buttons:{
							cancel: {
								visible: true,
								text : 'Tidak, BATALKAN !',
								className: 'btn btn-danger'
							},        			
							confirm: {
								text : 'Ya, Hapus saja !',
								className : 'btn btn-success'
							}
						}
					}).then((willDelete) => {
						if (willDelete) {
						$.ajax({
							url		: "<?php echo base_url(); ?>admin/kasir/grosir/hapus_keranjang",
							method 	:"POST",
							data 	: {row_id : row_id},
							success	: function(data){
								$('#detail_keranjang').html(data);
								location.reload();
							}
						});
						} else {
							swal("Data Kamu Aman!", {
								buttons : {
									confirm : {
										className: 'btn btn-success'
									}
								}
							});
						}
					});
					});
				});
			</script>
			<script src="<?php echo base_url("assets/") ?>js/select2.min.js"></script>
			<script type="text/javascript">
				$(document).ready(function(){
					$("#nama_pelanggan").select2({
						placeholder: "Pilih Pelanggan",
    					allowClear: true,
    					minimumInputLength : 2
					});
					$("#nama_barang").select2({
						placeholder: "Pilih Barang",
    					allowClear: true,
    					minimumInputLength : 2
					});
				});
			</script>
			<script type="text/javascript">
		        $(document).ready(function(){
		             $('#nama_barang').on('change',function(){
		                 
		                var kode=$(this).val();
		                var qty = $('#qty').val();
		                $.ajax({
		                    type : "POST",
		                    url  : "<?php echo base_url('admin/kasir/grosir/get_barang')?>",
		                    dataType : "JSON",
		                    data : {nama_barang: kode,qty : qty },
		                    cache:false,
		                    success: function(data){
		                        $.each(data,function(id_barang, nama_barang, harga,stok){
		                            $('[name="id_barang"]').val(data.id_barang);
		                            $('[name="stok"]').val(data.stok);
		                            $('[name="harga"]').val(data.harga);
		                             
		                        });
		                         
		                    }
		                });
		                return false;
		           });
		        });
		    </script>
		    <script type="text/javascript">
		    	$(document).ready(function(){
		    		$('#qty').on('input', function(){
		 				var qty = $('#qty').val();
		 				var stok = $('#stok').val();
		 				if (Number(stok) < Number(qty)) {
		 					swal("Warning", "STOK YANG DIMINTA TIDAK TERSEDIA!", {
								icon : "error",
								buttons: {        			
									confirm: {
										className : 'btn btn-danger'
									}
								},
							});
		 					$('#add_keranjang').prop('disabled',true);
		 				}else if (Number(stok) >= Number(qty)){
		 					$('#add_keranjang').prop('disabled',false);
		 				}
		 				$.ajax({
		 					type : "POST",
		 					url : "<?php echo base_url('admin/kasir/grosir/get_harga')?>",
		 					data :{qty : qty, nama_barang : $('#nama_barang').val()},
		 					dataType : "JSON",
		 					cache : false,
		 					success : function(data){
		 						$.each(data,function(harga){
		                            $('[name="harga"]').val(data.harga);
		                        });
		 					}
		 				});
		 			});
		    	});
		    </script>
		    <script type="text/javascript">
		    	$(document).ready(function(){
		    		$('#bayar').on('keyup', function(){
		    			var total = $('#total').val()
		    			var bayar = $('#bayar').val();
		    			var hasil = bayar - total;
		    			$('#kembali').val(hasil);
		    		});
		    	});
		    </script>
		</body>
		</html>
