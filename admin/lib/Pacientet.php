<?php

namespace Admin\Lib;

class Pacientet extends Database
{
    public $pacientiid;
    public $emri;
    public $mbiemri;
    public $data_lindjes;
    public $gjinia;
    public $email;
    public $telefoni;
    public $adresa;
    public $data_regjistrimit;
    public $informata_shtese;

    protected static $db_table = "pacientet";
    protected static $db_tables_fields = array('emri', 'mbiemri', 'data_lindjes', 'gjinia', 'email', 'telefoni','adresa','data_regjistrimit','informata_shtese',);

    public function getPacientiId()
    {
        return $this->pacientiid;
    }

    public function setPacientiId($pacientiid): void
    {
        $this->pacientiid = $pacientiid;
    }

    public function getEmri()
    {
        return $this->rmti;
    }

    public function setEmri($emri): void
    {
        $this->emri = $emri;
    }

    public function getMbiemri()
    {
        return $this->mbiemri;
    }

    public function setMbiemri($mbiemri): void
    {
        $this->mbiemri = $mbiemri;
    }

    public function getData_lindjes()
    {
        return $this->data_lindjes;
    }

    public function setData_lindjes($data_lindjes): void
    {
        $this->data_lindjes = $data_lindjes;
    }

    public function getGjinia()
    {
        return $this->gjinia;
    }

    public function setGjinia($gjinia): void
    {
        $this->gjinia = $gjinia;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email): void
    {
        $this->email = $email;
    }

    public function getTelefoni()
    {
        return $this->telefoni;
    }

    public function setTelefoni($telefoni): void
    {
        $this->telefoni = $telefoni;
    }

    public function getAdresa()
    {
        return $this->adresa;
    }

    public function setAdresa($adresa): void
    {
        $this->adresa = $adresa;
    }
    public function getData_regjistrimit()
    {
        return $this->data_regjistrimit;
    }

    public function setdData_regjistrimit($data_regjistrimit): void
    {
        $this->data_regjistrimit = $data_regjistrimit;
    }
    public function getInformata_shtese()
    {
        return $this->informata_shtese;
    }

    public function setInformata_shtese($informata_shtese): void
    {
        $this->informata_shtese = $informata_shtese;
    }


}