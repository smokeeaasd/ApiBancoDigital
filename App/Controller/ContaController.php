<?php

namespace App\Controller;

use App\Model\ContaModel;

use Exception;

class ContaController extends Controller
{
    public static function getContas() : void
    {
        try
        {
            $model = new ContaModel();
            $model->getAll();
            parent::getResponseAsJSON($model->rows);

        } catch (Exception $e) {
            parent::getExceptionAsJSON($e);
        }
    }
    
    public static function getContaById() : void
    {
        try 
        {
            $id = parent::getIntFromUrl($_GET['id']);
            
            $model = new ContaModel();

            $model->getById($id);

            parent::getResponseAsJSON($model->rows);

        }
        catch (Exception $e)
        {
            parent::getExceptionAsJSON($e);
        }
    }

    public static function getContaByCorrentista() : void
    {
        try 
        {
            $id_correntista = parent::getStringFromUrl($_GET['id']);
            
            $model = new ContaModel();

            $model->getByCorrentista($id_correntista);

            parent::getResponseAsJSON($model->rows);
        }
        catch (Exception $e)
        {
            parent::getExceptionAsJSON($e);
        }
    }

	public static function getContaByNumero() : void
	{
		try
		{
			$numero = parent::getIntFromUrl($_GET['numero']);

			$model = new ContaModel();

			$model->getByNumero($numero);

			parent::getResponseAsJSON($model->rows);
		}
		catch (Exception $e)
        {
            parent::getExceptionAsJSON($e);
        }
	}

    public static function addConta() : void
    {
        try 
        {
			$model = new ContaModel();

            $json = file_get_contents("php://input");
            
			$model->numero = $json['numero'];
			$model->tipo = $json['tipo'];
			$model->senha = $json['senha'];
			$model->id_correntista = $json['id_correntista'];

			$model->addConta();

			parent::getResponseAsJSON(['message' => 'Conta adicionada!']);
        }
        catch (Exception $e)
        {
            parent::getExceptionAsJSON($e);
        }
    }

    public static function updateConta() : void
    {
        try 
        {
            $model = new ContaModel();

            $json = file_get_contents("php://input");

			$model->id = $json['id'];
			$model->numero = $json['numero'];
			$model->tipo = $json['tipo'];
			$model->senha = $json['senha'];
			$model->id_correntista = $json['id_correntista'];

			$model->updateConta();

			parent::getResponseAsJSON(['message' => 'Atualizada!']);
        }
        catch (Exception $e)
        {
            parent::getExceptionAsJSON($e);
        }
    }
}