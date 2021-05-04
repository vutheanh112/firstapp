<?php
include '../lib/session.php';
Session::checkLogin();
include '../lib/database.php';
include '../heapers/format.php';
?>
<?php

 class adminlogin{
     private $db;
     private $fm;
    public function __construct()
     {
         $this->db = new Database();
         $this->fm = new Format();
     }
     public function login_admin($adminUser,$adminpass){
         $adminUser = $this->fm->validation($adminUser);
         $adminpass = $this->fm->validation($adminpass);
         $adminUser = mysqli_real_escape_string($this->db->link,$adminUser);
         $adminpass = mysqli_real_escape_string($this->db->link,$adminpass);
         if(empty($adminUser)|| empty($adminpass)){
             $alert = "User pass must be not emty";
             return $alert;
         }else{
          $query = "SELECT*FROM tbl_admins WHERE username = '$adminUser' AND password = '$adminpass'LIMIT 1";
            $result = $this->db->select($query);
            if($result != false){
                $value = $result->fetch_assoc();

                Session :: set('adminlogin',true);

                Session:: set('id',$value['id']);
                Session:: set('username',$value['username']);
                Session:: set('name',$value['name']);
                header('Location:index.php');
            }else{
                $alert=("mat khau hoac tk khong trung khop");
                return $alert ;
            }
         }
     }
 }
?>