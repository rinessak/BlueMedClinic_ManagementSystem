<?php

namespace Admin\Lib;

trait UploadPhoto
{
    public $src = "uploads/";
    public $tmp;
    public $filename;
    public $type;
    public $size;
    public $uploadfile;
    public $errors= array();


    public function startupLoad($file){
        $this -> filename = $file["name"];
        $this -> tmp = $file["tmp_name"];
        $this -> size = $file["size"];
        $this -> type = $file["type"];
        $this -> uploadfile = $this->src . basename(time() ."-". $this -> filename);
    }
    public function uploadFile(){
        if(isset($this->filename)){
            $file_ext = explode('.', $this->filename);
            $file_ext= end($file_ext);
            $extensions= array("jpeg","jpg","png");

            if(in_array($file_ext,$extensions)=== false){
                $errors[]="extension not allowed, please choose a JPEG or PNG file.";
            }

            if($this -> size > 2097152){
                $errors[]='File size must be excately 2 MB';
            }

            if(empty($errors)==true){
                move_uploaded_file($this -> tmp,$this->uploadfile);
                return true;
            }else{
                return false;
            }
        }
    }

}