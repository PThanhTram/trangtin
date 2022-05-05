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
                        $ref = 'chude';
                        $getdata = $database->getReference($ref)->getChild($key_child)->getValue();
                        if($getdata > 0)
                        {
                             ?>
                             <form action="xuly.php" method="post" class="needs-validation" novalidate>
                                <input type="hidden" name="key"value ="<?=$key_child;?>">
                                <div class="mb-3">
                                    <label for="tenchude" class="form-label">Tên chủ đề</label>
                                    <input type="text" class="form-control" id="tenchude" name="tenchude"
                                    value="<?=$getdata['tenchude'];?>" required>
                                </div>
                                
                                <button type="submit" class="btn btn-primary" name="suachude"><i class="bi bi-cloud-arrow-up"></i> Cập nhật chủ đề</button>
                            </form>
                             <?php
                        }
                        else
                        {
                            $_SESSION['status'] = "Không hợp lệ";
                            header('Lacation:chude.php');
                            exit();
                        }

                    }
                    else
                        {
                            $_SESSION['status'] = "Không tìm thấy";
                            header('Lacation:chude.php');
                            exit();
                           
                        }

                ?>
                
            </div>
        </div>
    </div>
<?php
  include('includes/footer.php');
?>