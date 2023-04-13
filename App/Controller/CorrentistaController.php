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
    
    public static function getCorrentista() : void
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

    public static function addCorrentista() : void
    {
        try 
        {
            //terminar
        }
        catch (Exception $e)
        {
            parent::getExceptionAsJSON($e);
        }
    }
}