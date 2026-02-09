<?php

namespace Admin\Lib;

use PDO;
use PDOException;

class Category extends Database
{
    public $id;
    public $name;
    public $description;

    protected static $db_table = "categories";
    protected static $db_tables_fields = array('name', 'description');

    public function getId()
    {
        return $this->id;
    }

    public function setId($id): void
    {
        $this->id = $id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name): void
    {
        $this->name = $name;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setDescription($description): void
    {
        $this->description = $description;
    }
}