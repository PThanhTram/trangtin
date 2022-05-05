<?php
	include('includes/header.php');
	session_start();
?>
	<div class="container">
		<div class="card mt-3">
			<?php
				if(isset($_SESSION['status'])&&$_SESSION['status'] != "")
				{
					?>
					<div class="alert alert-success alert-dismissible fale show" role="alert">
						<strong><?php echo $_SESSION['status'] ?></strong>
					</div>
					<?php
					unset($_SESSION['status']);
				}
			?>
			<div class="card-header">Tài khoản</div>
			<div class="card-body table-responsive">
				<a href="chude_them.php" class="btn btn-primary mb-2"><i class="bi bi-plus-lg"></i> Thêm mới</a>
				<table class="table table-bordered table-hover table-sm mb-0">
					<thead style="text-align: center;">
						<tr>
								<th width="5%">#</th>
								<th>Họ và tên</th>
								<th>Email</th>
								<th>Tên đăng nhập</th>
								<th>Quyền hạn</th>
								<th>Trạng thái</th>
								<th width="5%">Sửa</th>
								<th width="5%">Xóa</th>
						</tr>
					</thead>
					<tbody style="text-align: center;">
						<?php 
								include('dbcon.php');
								$ref = 'taikhoan';
								$fetchdata = $database->getReference($ref)->getValue();
								if($fetchdata > 0 )
								{
									$i=1;
										foreach($fetchdata as $key =>$value)
										{
											?>
												<tr class="align-middle text-right">
												
													<td><?=$i++;?></td>
													<td></td>
													<td class="text-center">
														<a href="chude_sua.php?id=<?=$key;?>" class="btn btn-primary"><i class="bi bi-pencil-square"></i> Cập nhật</a>
														 
													</td>
													<td class="text-center">
														<form action="xuly.php" method="post" class="needs-validation" novalidate>
														  <button type="submit" value="<?=$key;?>" class="btn btn-danger" name="xoachude"><i class="bi bi-x-square"></i> Xóa</button>
					                	</form>

													</td>
												</tr>
											<?php
										}
								}
								else
								{
									?>
										<tr>
												
												<td colspan="9">Không tìm thấy dòng nào</td>
											
										</tr>
									<?php
								}
						?>
						
					</tbody>
				</table>
			</div>
		</div>
	</div>

<?php
  include('includes/footer.php');
?>