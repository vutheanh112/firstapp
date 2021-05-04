<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php  include '../classes/localgory.php'  ?>
<?php
$cat = new catagory();
  if($_SERVER['REQUEST_METHOD'] == 'POST'){
	  $catName = $_POST['catName'];                                    //goi class login_admin ben adminlogin.php 
	
	  $insertCat = $cat->insert_cat($catName ,$id);
	  
  }
?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Add New Category</h2>
                <?php
                   if(isset($insertCat)){
                       echo $insertCat;
                   }
                ?>
               <div class="block copyblock"> 
                 <form action="catadd.php" method="post">
                    <table class="form">					
                        <tr>
                            <td>
                                <input name="catName" type="text" placeholder="Danh mục sản phẩm" class="medium" />
                            </td>
                        </tr>
						<tr> 
                            <td>
                                <input type="submit" name="submit" Value="Save" />
                            </td>
                        </tr>
                    </table>
                    </form>
                </div>
            </div>
        </div>
<?php include 'inc/footer.php';?>