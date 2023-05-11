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
            parent::getResponseAsJSON($model->rows, 1);

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

            parent::getResponseAsJSON($model->rows, 1);

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

            if ($model->rows)
                parent::getResponseAsJSON($model->rows, 1);
            else
                parent::getResponseAsJSON([], 2);
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

			parent::getResponseAsJSON($model->rows, 1);
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

            $json = json_decode(file_get_contents("php://input"));
            
			$model->numero = $json->Numero;
			$model->tipo = $json->Tipo;
			$model->senha = $json->Senha;
			$model->id_correntista = $json->IdCorrentista;

			$model->addConta();

			parent::getResponseAsJSON(['message' => 'Conta adicionada!'], 1);
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

            $json = json_decode(file_get_contents("php://input"));

			$model->id = $json->Id;
			$model->numero = $json->Numero;
			$model->tipo = $json->Tipo;
			$model->senha = $json->Senha;
			$model->id_correntista = $json->IdCorrentista;

			$model->updateConta();

			parent::getResponseAsJSON(['message' => 'Atualizada!'], 1);
        }
        catch (Exception $e)
        {
            parent::getExceptionAsJSON($e);
        }
    }
}