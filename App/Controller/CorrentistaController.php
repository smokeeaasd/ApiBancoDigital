<?php

namespace App\Controller;

use App\Model\CorrentistaModel;

use Exception;

class CorrentistaController extends Controller
{
    public static function getCorrentistas() : void
    {
        try
        {
            $model = new CorrentistaModel();
            $model->getAll();
            parent::getResponseAsJSON($model->rows);

        } catch (Exception $e) {
            parent::getExceptionAsJSON($e);
        }
    }
    
    public static function getCorrentistaById() : void
    {
        try 
        {
            $id = parent::getIntFromUrl($_GET['id']);
            
            $model = new CorrentistaModel();

            $model->getById($id);

            parent::getResponseAsJSON($model->rows);

        }
        catch (Exception $e)
        {
            parent::getExceptionAsJSON($e);
        }
    }

    public static function getCorrentistaByCPFandSenha() : void
    {
        try 
        {
            $cpf = parent::getStringFromUrl($_GET['cpf']);
            $senha = parent::getStringFromUrl($_GET['senha']);
            
            $model = new CorrentistaModel();

            $model->getByCPFAndSenha($cpf, $senha);

            parent::getResponseAsJSON($model->rows);

        }
        catch (Exception $e)
        {
            parent::getExceptionAsJSON($e);
        }
    }

    public static function addCorrentista() : void
    {
        try 
        {
			$model = new CorrentistaModel();

			$model->nome = $_POST['nome'];
			$model->cpf = $_POST['cpf'];
			$model->data_nasc = $_POST['data_nasc'];
			$model->senha = $_POST['senha'];

			$model->addCorrentista();

			parent::getResponseAsJSON(['message' => 'Correntista adicionado!']);
        }
        catch (Exception $e)
        {
            parent::getExceptionAsJSON($e);
        }
    }

    public static function updateCorrentista() : void
    {
        try 
        {
            $model = new CorrentistaModel();

			$model->id = $_POST['id'];
			$model->nome = $_POST['nome'];
			$model->cpf = $_POST['cpf'];
			$model->data_nasc = $_POST['data_nasc'];
			$model->senha = $_POST['senha'];

			$model->updateCorrentista();

			parent::getResponseAsJSON(['message' => 'Atualizado!']);
        }
        catch (Exception $e)
        {
            parent::getExceptionAsJSON($e);
        }
    }
}