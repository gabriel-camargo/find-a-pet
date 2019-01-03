<?php

namespace FindAPet\Helper;

class MensagemHelper
{
    const ERRO_SESSION = "Mensagem_Erro";

    public static function setMensagemErro($msg)
    {
        $_SESSION[MensagemHelper::ERRO_SESSION] = $msg;
    }

    public static function getMensagemErro()
    {
        $msg = (isset($_SESSION[MensagemHelper::ERRO_SESSION]) &&
            ($_SESSION[MensagemHelper::ERRO_SESSION])) ? 
            $_SESSION[MensagemHelper::ERRO_SESSION] :
            "";

        MensagemHelper::limparMensagemErro();

        return $msg;
    }

    public static function limparMensagemErro()
    {
        $_SESSION[MensagemHelper::ERRO_SESSION] = NULL;
    }

}