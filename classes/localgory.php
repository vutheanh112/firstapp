<?php

include '../lib/database.php';
include '../heapers/format.php';
?>
<?php

class catagory
{
    private $db;
    private $fm;
    public function __construct()
    {
        $this->db = new Database();
        $this->fm = new Format();
    }
    public function insert_cat($catName)
    {
        $catName = $this->fm->validation($catName);

        $catName = mysqli_real_escape_string($this->db->link, $catName);

        if (empty($catName)) {
            $alert = "$catName must be not emty";
            return $alert;
        } else {
            $query = "INSERT INTO tbl_catagory(catName)VALUES ('$catName')";
            $result = $this->db->insert($query);
            if ($result) {
                $alert = "<span class = 'success'>insert category SUCCESSFULLy</span>";
                return $alert;
            } else {
                $alert = "<span class = 'error'>insert category not SUCCESS</span>";
            }
        }
    }
    // show danh mục sản phẩm catlist.php
    public function show_catagory()
    {
        $query = "SELECT * FROM tbl_catagory ORDER BY cat_id DESC";
        $result = $this->db->select($query);
        return $result;
    }
    //xoa sửa sản phẩm catedit.php
    //update
    public function update_cat($catName, $id)
    {
        $$catName = $this->fm->validation($catName);

        $$catName = mysqli_real_escape_string($this->db->link, $catName);

        if (empty($catName)) {
            $alert = "$catName must be not emty";
            return $alert;
        } else {
            $query = "UPDATE tbl_catagory SET catName = '$catName' WHERE cat_id = '$id'";
            $result = $this->db->update($query);
            if ($result) {
                $alert = "<span class = 'success'>update category SUCCESSFULLy</span>";
                return $alert;
            } else {
                $alert = "<span class = 'error'>update category not SUCCESS</span>";
            }
        }
    }
    //xóa
    public function dele_cat($id){
         $query = "DELETE FROM tbl_catagory WHERE cat_id = '$id'";
         $result = $this->db->delete($query);
         if ($result) {
            $alert = "<span class = 'success'>deleted category SUCCESSFULLy</span>";
            return $alert;
        } else {
            $alert = "<span class = 'error'>deleted category not SUCCESS</span>";
        }

    }
    public function getcatbyId($id)
    {
        $query = "SELECT * FROM tbl_catagory WHERE cat_id ='$id'";
        $result = $this->db->select($query);
        return $result;
    }
}
?>