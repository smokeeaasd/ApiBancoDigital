<?php

namespace App\Controller;

use App\Model\TransacaoModel;

use Exception;

class TransacaoController extends Controller
{
    public static function getTransacoes() : void
    {
        try
        {
            $model = new TransacaoModel();
            $model->getAll();
            parent::getResponseAsJSON($model->rows);

        } catch (Exception $e) {
            parent::getExceptionAsJSON($e);
        }
    }
    
    public static function getTransacaoById() : void
    {
        try 
        {
            $id = parent::getIntFromUrl($_GET['id']);
            
            $model = new TransacaoModel();

            $model->getById($id);

            parent::getResponseAsJSON($model->rows);

        }
        catch (Exception $e)
        {
            parent::getExceptionAsJSON($e);
        }
    }

    public static function getTransacaoByDestinatario() : void
    {
        try 
        {
            $id_destinatario = parent::getIntFromUrl($_GET['id_destinatario']);
            
            $model = new TransacaoModel();

            $model->getByDestinatario($id_destinatario);

            parent::getResponseAsJSON($model->rows);
        }
        catch (Exception $e)
        {
            parent::getExceptionAsJSON($e);
        }
    }

	public static function getTransacaoByRemetente() : void
	{
		try
		{
			$id_remetente = parent::getIntFromUrl($_GET['id_remetente']);

			$model = new TransacaoModel();

			$model->getByRemetente($id_remetente);

			parent::getResponseAsJSON($model->rows);
		}
		catch (Exception $e)
        {
            parent::getExceptionAsJSON($e);
        }
	}

    public static function addTransacao() : void
    {
        try 
        {
			$model = new TransacaoModel();

            $json = file_get_contents("php://input");

			$model->data_transacao = $json['data_transacao'];
			$model->valor = $json['valor'];
			$model->id_remetente = $json['id_remetente'];
			$model->id_destinatario = $json['id_destinatario'];

			$model->addTransacao();

			parent::getResponseAsJSON(['message' => 'Transacao adicionada!']);
        }
        catch (Exception $e)
        {
            parent::getExceptionAsJSON($e);
        }
    }
}