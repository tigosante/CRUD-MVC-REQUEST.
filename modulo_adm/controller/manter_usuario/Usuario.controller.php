<?php

require_once($_SERVER["DOCUMENT_ROOT"] . "_classes_abstratas/AbstractController.class.php");
require_once("../../model/manter_usuario/Usuario.model.class.php");

class UsuarioController extends AbstractControllerCore
{
    private $model;

    public function __construct()
    {
        $acao = trim($_REQUEST["acao"]);
        $this->model = new UsuarioModel($acao);
        $this->enviar_parametro($this->model);

        switch ($_SERVER["REQUEST_METHOD"]) {
            case "POST":
                echo $this->model->post();
                break;
            case "PUT":
                echo $this->model->put();
                break;
            case "DELETE":
                echo $this->model->delete();
                break;
            default:
                echo $this->corpoPesquisa($this->model->get());
                break;
        }
    }
}

UsuarioController::init();
