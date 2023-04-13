<?php

namespace App\DAO;

use App\Model\CorrentistaModel;

class CorrentistaDAO extends DAO
{
    public function __construct()
    {
        parent::__construct();
    }

    public function selectAll()
    {
        $sql = "SELECT * FROM Correntista";

        $stmt = $this->conexao->prepare($sql);

        $stmt->execute();

        return $stmt->fetchAll(DAO::FETCH_CLASS);
    }

    public function selectById(int $id)
    {
        $sql = "SELECT * FROM Correntista WHERE id = ?";

        $stmt = $this->conexao->prepare($sql);

        $stmt->bindValue(1, $id);

        $stmt->execute();

        return $stmt->fetchObject("App\\Model\\CorrentistaModel");
    }

    public function selectByCPF(string $cpf)
    {
        $sql = "SELECT * FROM Correntista WHERE cpf = ?";

        $stmt = $this->conexao->prepare($sql);

        $stmt->bindValue(1, $cpf);

        $stmt->execute();

        return $stmt->fetchObject("App\\Model\\CorrentistaModel");
    }

    public function insert($nome, $cpf, $data_nasc, $senha)
    {
        $sql = "INSERT INTO Correntista (nome, cpf, data_nasc, senha) VALUES (?, ?, ?, sha1(?))";

        $stmt = $this->conexao->prepare($sql);

        $stmt->bindValue(1, $nome);
        $stmt->bindValue(2, $cpf);
        $stmt->bindValue(3, $data_nasc);
        $stmt->bindValue(4, $senha);

        $stmt->execute();
    }

    public function update($nome, $cpf, $data_nasc, $senha, $id)
    {
        $sql = "UPDATE Correntista SET nome = ?, cpf = ?, data_nasc = ?, senha = sha1(?) WHERE id = ?";

        $stmt = $this->conexao->prepare($sql);

        $stmt->bindValue(1, $nome);
        $stmt->bindValue(2, $cpf);
        $stmt->bindValue(3, $data_nasc);
        $stmt->bindValue(4, $senha);
        $stmt->bindValue(5, $id);

        $stmt->execute();
    }

}
