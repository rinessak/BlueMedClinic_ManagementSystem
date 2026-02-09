<?php

namespace Admin\Lib;

use Exception;
use PDO;
use PDOException;

class User extends Database
{
    use UploadPhoto;

    public $id;
    public $firstname;
    public $lastname;
    public $phone;
    public $photo;
    public $email;
    public $password;
    public $photoImage;


    protected static $db_table = "users";
    protected static $db_tables_fields = array('firstname', 'lastname', 'phone', 'photo', 'email', 'password');


    public function getId()
    {
        return $this->id;
    }

    public function setId($id): void
    {
        $this->id = $id;
    }

    public function getFirstname()
    {
        return $this->firstname;
    }

    public function setFirstname($firstname): void
    {
        $this->firstname = $firstname;
    }

    public function getLastname()
    {
        return $this->lastname;
    }

    public function setLastname($lastname): void
    {
        $this->lastname = $lastname;
    }

    public function getPhone()
    {
        return $this->phone;
    }

    public function setPhone($phone): void
    {
        $this->phone = $phone;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email): void
    {
        $this->email = $email;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword($password): void
    {
        $this->password = $password;
    }

    public function getPhoto()
    {
        return $this->photo;
    }

    public function setPhoto($photo): void
    {
        $this->photo = $photo;
    }

    public function getPhotoImage()
    {
        return $this->photoImage;
    }

    public function setPhotoImage($photoImage): void
    {
        $this->photoImage = $photoImage;
    }

    public function create()
    {
        try {
            $this->startupLoad($this->photoImage);
            $this->photo = $this->filename;
            $uploadFile = $this->uploadFile();
            if ($uploadFile) {
                parent::create();
            } else {
                foreach ($this->errors as $error) {
                    echo $error . "<br>";
                }
            }
        } catch (Exception  $e) { // use \Exception in PHP < 7.0
            echo "Test" . $e->getMessage();
        }
    }
}