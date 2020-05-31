<script>
	$(function()
	{
		var keyword = <?= $keyword != '' ? $keyword : '""' ?> ;
		$( "#cari" ).autocomplete(
			{
				source: keyword,
				maxShowItems: 10,
			});
	});

</script>
<style>
	.input-sm
	{
		padding: 4px 4px;
	}
	@media (max-width:780px)
	{
		.btn-group-vertical
		{
			display: block;
		}
	}
	.table-responsive
	{
		min-height:275px;
	}
	}
</style>
<div class="content-wrapper">
	<section class="content-header">
		<h1>Daftar Bidang Persil</h1>
		<ol class="breadcrumb">
			<li><a href="<?= site_url('hom_sid')?>"><i class="fa fa-home"></i> Home</a></li>
			<li><a href="<?= site_url('cdesa')?>"> Daftar C-DESA</a></li>
			<li class="active">Daftar Bidang Persil</li>
		</ol>
	</section>
	<section class="content" id="maincontent">
		<div class="row">
			<div class="col-md-12">
				<div class="box box-info">
					<div class="box-header with-border">
						<a href="<?=site_url('cdesa')?>" class="btn btn-social btn-flat btn-info btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block" title="Kembali Ke Daftar C-DESA"><i class="fa fa-arrow-circle-o-left"></i> Kembali Ke Daftar C-DESA</a>
					</div>
					<div class="box-body">
						<div class="row">
							<div class="col-sm-12">
								<div class="dataTables_wrapper form-inline dt-bootstrap no-footer">
								<form id="mainform" name="mainform" action="" method="post">
								<input type="hidden" name="id" value="<?php echo $this->uri->segment(4) ?>">
									<div class="row">
										<div class="col-sm-12">
											<div class="row">
												<div class="col-sm-9">
													<div class="box-header with-border">
														<h3 class="box-title">Daftar Bidang Persil</h3>
													</div>
												</div>
												<div class="col-sm-3">
													<div class="input-group input-group-sm pull-right">
														<input name="cari" id="cari" class="form-control" placeholder="Cari..." type="text" value="<?=html_escape($cari_peserta)?>" onkeypress="if (event.keyCode == 13){$('#'+'mainform').attr('action', '<?=site_url("program_bantuan/search_peserta")?>');$('#'+'mainform').submit();}">
														<div class="input-group-btn">
															<button type="submit" class="btn btn-default" onclick="$('#'+'mainform').attr('action', '<?=site_url("program_bantuan/search_peserta")?>');$('#'+'mainform').submit();"><i class="fa fa-search"></i></button>
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="col-sm-12">
										<?php $peserta = $program[1];?>
											<div class="table-responsive">
												<table class="table table-bordered table-striped dataTable table-hover">
													<thead class="bg-gray disabled color-palette">
														<tr>
															<th>No</th>
															<th>Aksi</th>
															<th>C-Desa</th>
															<th>No. Persil</th>
															<th>Kelas Tanah</th>
															<th>Lokasi</th>
															<th>No. Bidang Persil</th>
															<th>Luas (M2)</th>
															<th>Tipe Persil</th>
															<th>Peruntukan</th>
															<th>NOP</th>
															<th>No. SPPT PBB</th>
															<th>Keterangan</th>
														</tr>
													</thead>
													<tbody>
														<?php $nomer = $paging->offset;?>
														<?php foreach ($bidang as $key=>$item): $nomer++;?>
															<tr>
																<td class="text-center"><?= $nomer?></td>
																<td nowrap class="text-center">
																	<a href="<?= site_url("cdesa/create_bidang/$cdesa[id]/$item[id]")?>" class="btn bg-orange btn-flat btn-sm" title="Ubah"><i class="fa fa-edit"></i></a>
																</td>
																<td><a href="<?= site_url("cdesa/rincian/".$item["id_cdesa_masuk"])?>"><?= $item['no_cdesa']?></a></td>
																<td><a href="<?= site_url("data_persil/rincian/".$item["id_persil"])?>"><?= $item['nomor']?></a></td>
																<td><?= $item['kelas_tanah']?></td>
																<td><?= $item['alamat'] ?: $item['lokasi']?></td>
																<td><?= $item['no_bidang_persil']?></td>
																<td><?= $item['luas']?></td>
																<td><?= $item['jenis_persil']?></td>
																<td><?= $item['peruntukan']?></td>
																<td><?= $item['no_objek_pajak']?></td>
																<td><?= $item['no_sppt_pbb']?></td>
																<td><?= $item['keterangan']?></td>
															</tr>
														<?php endforeach; ?>
													</tbody>
												</table>
											</div>
										</div>

									</div>
                  <div class="row">
                    <div class="col-sm-6">
                      <div class="dataTables_length">
                        <form id="paging" action="<?= site_url("program_bantuan/detail/1/$detail[id]")?>" method="post" class="form-horizontal">
                         <label>
                            Tampilkan
                            <select name="per_page" class="form-control input-sm" onchange="$('#mainform').submit();" id="per_page_input">
      	                      <option value="20" <?php selected($per_page, 20); ?> >20</option>
                              <option value="50" <?php selected($per_page, 50); ?> >50</option>
                              <option value="100" <?php selected($per_page, 100); ?> >100</option>
                            </select>
        	                  Dari
                            <strong><?= $paging->num_rows?></strong>
                            Total Data
                          </label>
                        </form>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="dataTables_paginate paging_simple_numbers">
                        <ul class="pagination">
                          <?php if ($paging->start_link): ?>
                            <li><a href="<?=site_url("program_bantuan/detail/$paging->start_link/$detail[id]")?>" aria-label="First"><span aria-hidden="true">Awal</span></a></li>
                          <?php endif; ?>
                          <?php if ($paging->prev): ?>
                            <li><a href="<?=site_url("program_bantuan/detail/$paging->prev/$detail[id]")?>" aria-label="Previous"><span aria-hidden="true">&laquo;</span></a></li>
                          <?php endif; ?>
                          <?php for ($i=$paging->start_link;$i<=$paging->end_link;$i++): ?>
                            <li <?=jecho($p, $i, "class='active'")?>><a href="<?= site_url("program_bantuan/detail/$i/$detail[id]")?>"><?= $i?></a></li>
                          <?php endfor; ?>
                          <?php if ($paging->next): ?>
                            <li><a href="<?=site_url("program_bantuan/detail/$paging->next/$detail[id]")?>" aria-label="Next"><span aria-hidden="true">&raquo;</span></a></li>
                          <?php endif; ?>
                          <?php if ($paging->end_link): ?>
                            <li><a href="<?=site_url("program_bantuan/detail/$paging->end_link/$detail[id]")?>" aria-label="Last"><span aria-hidden="true">Akhir</span></a></li>
                          <?php endif; ?>
                        </ul>
                      </div>
                    </div>
                  </div>
								</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>
