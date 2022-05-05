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




	//bài viết


?>