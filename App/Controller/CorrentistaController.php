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

            $json = file_get_contents("php://input");
            
            $cpf = $json['cpf'];

            if (!(new CorrentistaModel())->getByCPF($cpf))
            {		
                $model->nome = $json['nome'];
                $model->cpf = $json['cpf'];
                $model->data_nasc = $json['data_nasc'];
                $model->senha = $json['senha'];

                $last_id = $model->addCorrentista();

                parent::getResponseAsJSON($model->getById($last_id));
            } else {
                parent::getResponseAsJSON([
                    'errNumber' => 1,
                    'message' => 'CPF já cadastrado.'
                ]);
            }
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

            $json = file_get_contents("php://input");

			$model->id = $json['id'];
			$model->nome = $json['nome'];
			$model->cpf = $json['cpf'];
			$model->data_nasc = $json['data_nasc'];
			$model->senha = $json['senha'];

			$model->updateCorrentista();

			parent::getResponseAsJSON(['message' => 'Atualizado!']);
        }
        catch (Exception $e)
        {
            parent::getExceptionAsJSON($e);
        }
    }
}