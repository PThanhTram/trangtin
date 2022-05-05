<?php
	include('includes/header.php');
    session_start();
?>
   <div class="container">
        <div class="card mt-3">
            <div class="card-header">Thêm mới</div>
            <div class="card-body">
                <form action="xuly.php" method="post" class="needs-validation" novalidate>
                    <div class="mb-3">
                        <label for="tenchude" class="form-label">Tên chủ đề</label>
                        <input type="text" class="form-control" id="tenchude" name="tenchude" required>
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
                    <button type="submit" class="btn btn-primary" name="themchude"><i class="bi bi-cloud-arrow-up"></i> Thêm chủ đề</button>
                </form>
            </div>
        </div>
    </div>
   
<?php
  include('includes/footer.php');
?>