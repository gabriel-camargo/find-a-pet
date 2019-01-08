<?php

namespace FindAPet\Helper;

class MensagemHelper
{
    const MSG_SESSION = "Mensagem_Erro";

    public static function setMensagem($msg)
    {
        $_SESSION[MensagemHelper::MSG_SESSION] = $msg;
    }

    public static function getMensagem()
    {
        $msg = (isset($_SESSION[MensagemHelper::MSG_SESSION]) &&
            ($_SESSION[MensagemHelper::MSG_SESSION])) ? 
            $_SESSION[MensagemHelper::MSG_SESSION] :
            "";

        MensagemHelper::limparMensagem();

        return $msg;
    }

    public static function limparMensagem()
    {
        $_SESSION[MensagemHelper::MSG_SESSION] = NULL;
    }

}