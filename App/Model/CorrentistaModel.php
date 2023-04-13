<?php

namespace App\Model;

use App\DAO\CorrentistaDAO;
use Exception;

class CorrentistaModel extends Model
{
    public $id, $nome, $cpf, $data_nasc, $senha;

    public function getAll()
    {
        try
        {
            $dao = new CorrentistaDAO();
            $this->rows = $dao->selectAll();
        }
        catch (Exception $e)
        {
            throw $e;
        }
    }

    public function getById(int $id)
    {
        try
        {
            $dao = new CorrentistaDAO();
            $this->rows = $dao->selectById($id);
        }
        catch (Exception $e)
        {
            throw $e;
        }
    }

    public function getByCPF(string $cpf)
    {
        try
        {
            $dao = new CorrentistaDAO();
            $this->rows = $dao->selectByCPF($cpf);
        }
        catch (Exception $e)
        {
            throw $e;
        }
    }

    public function addCorrentista($nome, $cpf, $data_nasc, $senha)
    {
        try
        {
            $dao = new CorrentistaDAO();
            $dao->insert($nome, $cpf, $data_nasc, $senha);
        }
        catch (Exception $e)
        {
            throw $e;
        }
    }
}
