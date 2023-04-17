<?php

namespace App\DAO;

use App\Model\TransacaoModel;

class TransacaoDAO extends DAO
{
	public function __construct()
	{
		parent::__construct();
	}

	public function selectAll()
	{
		$sql = "SELECT t.*, tc.* FROM Transacao t
				JOIN Transacao_Conta tc ON (t.id = tc.id)
				GROUP BY t.id";

		$stmt = $this->conexao->prepare($sql);

		$stmt->execute();

		return $stmt->fetchAll(DAO::FETCH_CLASS);
	}

	public function selectById(int $id)
	{
		$sql = "SELECT t.*, tc.* FROM Transacao t
				JOIN Transacao_Conta tc ON (t.id = tc.id)
				WHERE t.id = ?
				GROUP BY t.id";

		$stmt = $this->conexao->prepare($sql);

		$stmt->bindValue(1, $id);

		$stmt->execute();

		return $stmt->fetchObject("App\\Model\\TransacaoModel");
	}

	public function selectByRemetente(int $id_remetente)
	{
		$sql = "SELECT t.*, tc.* FROM Transacao t
				JOIN Transacao_Conta tc ON (t.id = tc.id)
				WHERE tc.id_remetente = ?
				GROUP BY t.id";

		$stmt = $this->conexao->prepare($sql);

		$stmt->bindValue(1, $id_remetente);

		$stmt->execute();

		return $stmt->fetchObject("App\\Model\\TransacaoModel");
	}

	public function selectByDestinatario(int $id_destinatario)
	{
		$sql = "SELECT t.*, tc.* FROM Transacao t
				JOIN Transacao_Conta tc ON (t.id = tc.id)
				WHERE tc.id_destinatario = ?
				GROUP BY t.id";

		$stmt = $this->conexao->prepare($sql);

		$stmt->bindValue(1, $id_destinatario);

		$stmt->execute();

		return $stmt->fetchObject("App\\Model\\TransacaoModel");
	}

	public function insert(TransacaoModel $model)
	{
		$sql = "INSERT INTO Transacao (data_transacao, valor) VALUES (now(), ?);
				INSERT INTO Transacao_Conta(id_transacao, id_remetente, id_destinatario) VALUES(last_insert_id(), ?, ?)";

		$stmt = $this->conexao->prepare($sql);

		$stmt->bindValue(1, $model->valor);
		$stmt->bindValue(2, $model->id_remetente);
		$stmt->bindValue(3, $model->id_destinatario);

		$stmt->execute();
	}

	public function deleteByIdRemetente(int $id_remetente)
	{
		$sql = "DELETE FROM Transacao_Conta WHERE id_remetente = ?";

		$stmt = $this->conexao->prepare($sql);

		$stmt->bindValue(1, $id_remetente);

		$stmt->execute();
	}

	public function deleteByIdDestinatario(int $id_destinatario)
	{
		$sql = "DELETE FROM Transacao_Conta WHERE id_destinatario = ?";

		$stmt = $this->conexao->prepare($sql);

		$stmt->bindValue(1, $id_destinatario);

		$stmt->execute();
	}
}
