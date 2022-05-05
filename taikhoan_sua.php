<?php
	include('includes/header.php');
    session_start();
?>
   <div class="container">
        <div class="card mt-3">
            <?php
                if(isset($_SESSION['status']))
                {
                    ?>
                    <div class="alert alert-success alert-dismissible fale show" role="alert">
                        <strong><?php echo $_SESSION['status'] ?></strong>
                    </div>
                    <?php
                    unset($_SESSION['status']);
                }
            ?>
            <div class="card-header">Cập nhật</div>
            <div class="card-body">
                <?php 
                    include('dbcon.php');
                    if(isset($_GET['id']))
                    {
                        $key_child = $_GET['id'];
                        $ref = 'taikhoan';
                        $getdata = $database->getReference($ref)->getChild($key_child)->getValue();
                        if($getdata > 0)
                        {
                             ?>
                             <form action="xuly.php" method="post" class="needs-validation" novalidate>
                                <input type="hidden" name="key"value ="<?=$key_child;?>">
                                <div class="mb-3">
                                    <label for="hovaten" class="form-label">Họ và tên</label>
                                    <input type="text" class="form-control" id="hovaten" name="hovaten"
                                    value="<?=$getdata['hovaten'];?>" required>
                                </div>
                                <div class="mb-3">
                                    <label for="tendangnhap" class="form-label">Tên đăng nhập</label>
                                    <input type="text" class="form-control" id="tendangnhap" name="tendangnhap" value="<?=$getdata['tendangnhap'];?>" required>
                                </div>
                               
                                <div class="mb-3 form-check">
                                    <input class="form-check-input" type="checkbox" id="change_password_checkbox" name="change_password_checkbox" />
                                    <label class="form-check-label" for="change_password_checkbox">Đổi mật khẩu</label>
                                </div>
                                <div id="change_password_group">
                                    <div class="mb-3">
                                        <label class="form-label" for="matkhau">Mật khẩu mới</label>
                                        <input type="matkhau" class="form-control is-invalid" id="matkhau" name="matkhau" >
                                    
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="xacnhanmatkhau">Xác nhận mật khẩu mới</label>
                                        <input type="xacnhanmatkhau" class="form-control  is-invalid" id="xacnhanmatkhau" name="xacnhanmatkhau" >
                                        
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="quyenhan" class="form-label">Quyền hạn</label>
                                    <select id="quyenhan" name="quyenhan" class="form-select" required>
                                        <?php if($getdata['quyenhan'] === 0) ?>
                                            <option value="0" selected>User</option>
                                            <option value="1">Admin</option>
                                        <?php 
                                            if($getdata['quyenhan'] === 1)
                                        ?>
                                        <option value="0" >User</option>
                                        <option value="1"selected>Admin</option>
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-primary" name="suataikhoan"><i class="bi bi-cloud-arrow-up"></i> Cập nhật tài khoản </button>
                            </form>
                             <?php
                        }
                        else
                        {
                            $_SESSION['status'] = "Không hợp lệ";
                            header('Lacation:taikhoan.php');
                            exit();
                        }

                    }
                    else
                        {
                            $_SESSION['status'] = "Không tìm thấy";
                            header('Lacation:taikhoan.php');
                            exit();
                           
                        }

                ?>
                
            </div>
        </div>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script>
    $(document).ready(function() {
        $("#change_password_group").hide();
        $("#change_password_checkbox").change(function() {
            if($(this).is(":checked"))
            {
                $("#change_password_group").show();
                $("#change_password_group :input").attr("required", "required");
            }
            else
            {
                $("#change_password_group").hide();
                $("#change_password_group :input").removeAttr("required");
            }
        });
    });
</script>
    </div>
<?php

  include('includes/footer.php');
?>