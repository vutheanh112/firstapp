<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
<?php include '../classes/localgory.php'  ?>
<?php

$cat = new catagory();
if (!isset($_GET['catid']) || $_GET['catid'] == NULL) {
  echo "<script>window.location = 'catlist.php'</script>";
}else{
    $id =  $_GET['catid'];
}
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $catName = $_POST['catName'];                                    //goi class login_admin ben adminlogin.php 
  
    $updateCat = $cat->update_cat($catName,$id);
    
}

?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>sửa danh mục</h2>
        <?php
        if (isset($updateCat)) {
            echo $updateCat;
        }
        ?>
        <?php
        $get_cate_name = $cat->getcatbyId($id);
        if ($get_cate_name) {
            while ($result = $get_cate_name->fetch_assoc()) {


        ?>
                
                <div class="block copyblock">
                    <form action="" method="post">
                        <table class="form">
                            <tr>
                                <td>
                                    <input name="catName" type="text" value="<?php echo  $result['catName']  ?>" placeholder=" sửa Danh mục sản phẩm" class="medium" />
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="submit" name="submit" Value="edit" />
                                </td>
                            </tr>
                        </table>
                    </form>
            <?php
            }
        }
            ?>
                </div>
    </div>
</div>
<?php include 'inc/footer.php'; ?>