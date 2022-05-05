<?php 
	session_start();
	include('dbcon.php');

	//chude
	if(isset($_POST['themchude']))
	{	
		$ref = "chude/";
		$tenchude = $_POST['tenchude'];
		//$trung = $database->getReference($ref)->orderByChild("tenchude")->equalTo($tenchude);

		if($tenchude == "")
		{
			$_SESSION['status'] = "Chủ đề không được bỏ trống";
			header("Location:chude_them.php");
		}

		
		else

		{
			$postData = [
			'tenchude' => $tenchude,
			];
			$ref = "chude/";

			$postRef = $database->getReference($ref)->push($postData);
			
			if ($postRef) {
				$_SESSION['status'] = "Thêm chủ đề thành công";
				header("Location:chude.php");
			}
			else
			{
				$_SESSION['status'] = "Thêm chủ đề không thành công";
				header("Location:chude.php");
			}
		}
		
	}

	if(isset($_POST['suachude']))
	{	
		$key = $_POST['key'];
		$tenchude = $_POST['tenchude'];
		$ref = "chude/".$key;
		if($tenchude == "")
		{
			$_SESSION['status'] = "Chủ đề không được bỏ trống";
			header("Location:chude_sua.php?id=$key");
			 exit();
		}
		else
		{
			$updateData = [
			'tenchude' => $tenchude,
			];


			$ref = "chude/".$key;
			$update = $database->getReference($ref)->update($updateData);

			if ($update) {
				$_SESSION['status'] = "Cập nhật chủ đề thành công";
				header("Location:chude.php");
			}
			else
			{
				$_SESSION['status'] = "Cập nhật chủ đề không thành công";
				header("Location:chude.php");
			}
		}
		
		
		
	}

	if(isset($_POST['xoachude']))
	{	
		$del = $_POST['xoachude'];
		$ref = "chude/".$del;
		$delete = $database->getReference($ref)->remove();

		if ($delete) {
			$_SESSION['status'] = "Xóa chủ đề thành công";
			header("Location:chude.php");
		}
		else
		{
			$_SESSION['status'] = "Xóa chủ đề không thành công";
			header("Location:chude.php");
		}
	}

	//tài khoản

	if(isset($_POST['themtaikhoan']))
	{	
		$ref = "taikhoan/";
		$hovaten = $_POST['hovaten'];
		$tendangnhap = $_POST['tendangnhap'];
		$matkhau = $_POST['matkhau'];
		$xacnhanmatkhau = $_POST['xacnhanmatkhau'];
		$quyenhan = $_POST['quyenhan'];

		if($matkhau !== $xacnhanmatkhau)
		{
			$_SESSION['status'] = "Xác nhận mật khẩu không chính xác";
			header("Location:taikhoan_them.php");
		}
		else
		{
			$hashPassword = md5($matkhau);
			$postData = [
				'hovaten' => $hovaten,
				'tendangnhap' => $tendangnhap,
				'matkhau' => $hashPassword,
				'quyenhan' => $quyenhan,
				'trangthai' => 1,
			];
	
			$postRef = $database->getReference($ref)->push($postData);
			
			if ($postRef) {
				$_SESSION['status'] = "Thêm tài khoản thành công";
				header("Location:taikhoan.php");
			}
			else
			{
				$_SESSION['status'] = "Thêm tài khoản không thành công";
				header("Location:taikhoan.php");
			}
		}
	}

	if(isset($_POST['suataikhoan']))
	{	
		$key = $_POST['key'];
		$ref = "taikhoan/".$key;

		$hovaten = $_POST['hovaten'];
		$tendangnhap = $_POST['tendangnhap'];
		$matkhau = $_POST['matkhau'];
		$xacnhanmatkhau = $_POST['xacnhanmatkhau'];
		$quyenhan = $_POST['quyenhan'];

		$getdata = $database->getReference("taikhoan")->getChild($key)->getValue();

		if($matkhau !== $xacnhanmatkhau)
		{
			$_SESSION['status'] = "Xác nhận mật khẩu không chính xác";
			header("Location:taikhoan_sua.php?id=$key");
		}
		else if($matkhau ==='' && $xacnhanmatkhau === ''){
			$updateData = [
				'hovaten' => $hovaten,
				'tendangnhap' => $tendangnhap,
				'matkhau' => $getdata['matkhau'],
				'quyenhan' => $quyenhan,
				'trangthai' => $getdata['trangthai'],
			];
			$update = $database->getReference($ref)->update($updateData);
	
			if ($update) {
				$_SESSION['status'] = "Cập nhật tài khoản thành công";
				header("Location:taikhoan.php");
			}
			else
			{
				$_SESSION['status'] = "Cập nhật tài khoản không thành công";
				header("Location:taikhoan.php");
			}
		}
		else{

			$hashPassword = md5($matkhau);
			$updateData = [
				'hovaten' => $hovaten,
				'tendangnhap' => $tendangnhap,
				'matkhau' => $hashPassword,
				'quyenhan' => $quyenhan,
				'trangthai' => $getdata['trangthai'],
			];
			$update = $database->getReference($ref)->update($updateData);
	
			if ($update) {
				$_SESSION['status'] = "Cập nhật tài khoản thành công";
				header("Location:taikhoan.php");
			}
			else
			{
				$_SESSION['status'] = "Cập nhật tài khoản không thành công";
				header("Location:taikhoan.php");
			}
		}
		
			
	}

	if(isset($_POST['xoataikhoan']))
	{	
		$del = $_POST['xoataikhoan'];
		$ref = "taikhoan/".$del;
		$delete = $database->getReference($ref)->remove();

		if ($delete) {
			$_SESSION['status'] = "Xóa tài khoản thành công";
			header("Location:taikhoan.php");
		}
		else
		{
			$_SESSION['status'] = "Xóa tài khoản không thành công";
			header("Location:taikhoan.php");
		}
	}

	if(isset($_POST['trangthaitaikhoan']))
	{	
		$key = $_POST['trangthaitaikhoan'];
		$ref = "taikhoan/".$key;

		$getdata = $database->getReference("taikhoan")->getChild($key)->getValue();

			$hashPassword = md5($matkhau);
			$updateData = [
				'hovaten' => $getdata['hovaten'],
				'tendangnhap' => $getdata['tendangnhap'],
				'matkhau' => $getdata['matkhau'],
				'quyenhan' => $getdata['quyenhan'],
				'trangthai' => 1 - $getdata['trangthai'],
			];
			$update = $database->getReference($ref)->update($updateData);
	
			if ($update) {
				header("Location:taikhoan.php");
			}
	}
		
			
	//bài viết


?>