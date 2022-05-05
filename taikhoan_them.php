<?php
	include('includes/header.php');
    session_start();
?>
   <div class="container">
        <div class="card mt-3">
            <div class="card-header">Thêm mới tài khoản</div>
            <div class="card-body">
                <form action="xuly.php" method="post" class="needs-validation" novalidate>
                    <div class="mb-3">
                        <label for="hovaten" class="form-label">Họ và tên</label>
                        <input type="text" class="form-control" id="hovaten" name="hovaten" required>
                    </div>
                    <div class="mb-3">
                        <label for="tendangnhap" class="form-label">Tên đăng nhập</label>
                        <input type="text" class="form-control" id="tendangnhap" name="tendangnhap" required>
                    </div>
                    <div class="mb-3">
                        <label for="matkhau" class="form-label">Mật khẩu</label>
                        <input type="password" class="form-control" id="matkhau" name="matkhau" required>
                    </div>
                    <div class="mb-3">
                        <label for="xacnhanmatkhau" class="form-label">Xác nhận mật khẩu</label>
                        <input type="password" class="form-control" id="xacnhanmatkhau" name="xacnhanmatkhau" required>
                    </div>
                    <div class="mb-3">
                        <label for="quyenhan" class="form-label">Quyền hạn</label>
                        <select id="quyenhan" name="quyenhan" class="form-select" required>
                            <option value="0">User</option>
                            <option value="1">Admin</option>
                        </select>
                    </div>
                    <div class="col-3">
                        <?php
                        if(isset($_SESSION['status']))
                        {
                            ?>
                            <div class="alert alert-danger alert-dismissible fale show" role="alert">
                                <strong><?php echo $_SESSION['status'] ?></strong>
                            </div>
                            <?php
                            unset($_SESSION['status']);
                        }
                    ?>
                    </div>
                    <button type="submit" class="btn btn-primary" name="themtaikhoan"><i class="bi bi-cloud-arrow-up"></i> Thêm tài khoản </button>
                </form>
            </div>
        </div>
    </div>
   
<?php
  include('includes/footer.php');

?>