<?php

namespace App\Controller;

use App\Model\ChavePixModel;

use Exception;

class ChavePixController extends Controller
{
	public static function getChavesPix(): void
	{
		try {
			$model = new ChavePixModel();
			$model->getAll();
			parent::getResponseAsJSON($model->rows);
		} catch (Exception $e) {
			parent::getExceptionAsJSON($e);
		}
	}

	public static function getChavePixById(): void
	{
		try {
			$id = parent::getIntFromUrl($_GET['id']);

			$model = new ChavePixModel();

			$model->getById($id);

			parent::getResponseAsJSON($model->rows);
		} catch (Exception $e) {
			parent::getExceptionAsJSON($e);
		}
	}

	public static function getChavesPixByConta(): void
	{
		try {
			$id_conta = parent::getStringFromUrl($_GET['id']);

			$model = new ChavePixModel();

			$model->getByConta($id_conta);

			parent::getResponseAsJSON($model->rows);
		} catch (Exception $e) {
			parent::getExceptionAsJSON($e);
		}
	}

	public static function getChavePixByChave(): void
	{
		try {
			$chave = parent::getStringFromUrl($_GET['numero']);

			$model = new ChavePixModel();

			$model->getByChave($chave);

			parent::getResponseAsJSON($model->rows);
		} catch (Exception $e) {
			parent::getExceptionAsJSON($e);
		}
	}

	public static function addChavePix(): void
	{
		try {
			$model = new ChavePixModel();

			$model->chave = $_POST['chave'];
			$model->tipo = $_POST['tipo'];
			$model->id_conta = $_POST['id_conta'];

			$model->addChavePix();

			parent::getResponseAsJSON(['message' => 'ChavePix adicionada!']);
		} catch (Exception $e) {
			parent::getExceptionAsJSON($e);
		}
	}

	public static function updateChavePix(): void
	{
		try {
			$model = new ChavePixModel();

			$model->id = $_POST['id'];
			$model->chave = $_POST['chave'];
			$model->tipo = $_POST['tipo'];
			$model->id_conta = $_POST['id_conta'];

			$model->updateChavePix();

			parent::getResponseAsJSON(['message' => 'Atualizada!']);
		} catch (Exception $e) {
			parent::getExceptionAsJSON($e);
		}
	}

	public static function deleteChavePix()
	{
		try
		{
			$model = new ChavePixModel();

			$id = parent::getIntFromUrl($_GET['id']);

			$model->deleteChavePix($id);
		}
		catch (Exception $e)
		{
			parent::getExceptionAsJSON($e);
		}
	}
}
