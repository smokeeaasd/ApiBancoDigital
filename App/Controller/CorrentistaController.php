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

            $json = json_decode(file_get_contents("php://input"));
            $cpf = $json->CPF;

            if (!(new CorrentistaModel())->getByCPF($cpf))
            {		
                $model->nome = $json->Nome;
                $model->cpf = $json->CPF;
                $model->data_nasc = $json->data_nasc;
                $model->senha = $json->Senha;

                $last_id = $model->addCorrentista();

                $model->getById($last_id);

                parent::getResponseAsJSON($model->rows);
            } else {
                parent::getResponseAsJSON([
                    'ErrNumber' => 1,
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

            $json = json_decode(file_get_contents("php://input"));

			$model->id = $json->Id;
			$model->nome = $json->Nome;
			$model->cpf = $json->CPF;
			$model->data_nasc = $json->data_nasc;
			$model->senha = $json->Senha;

			$model->updateCorrentista();

			parent::getResponseAsJSON(['message' => 'Atualizado!']);
        }
        catch (Exception $e)
        {
            parent::getExceptionAsJSON($e);
        }
    }
}