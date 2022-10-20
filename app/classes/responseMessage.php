<?php
namespace App\classes;
class responseMessage  {
    var $success;
    var $message;
    var $token;

    public function message($log, $tipoErro = null, $token = null)
    {
        if($log == false)
        {
            if($tipoErro == 'email')
            {
                $mensagem = 'O usuario nao existe';
            }
            if($tipoErro == 'senha')
            {
                $mensagem = 'A senha está incorreta';
            }

            $this->message = $mensagem;
            $this->success = false;
            $this->token = false;
        }

        if($log)
        {
            $this->message = null;
            $this->success = true;
            $this->token = $token;
        }
        
    }

}