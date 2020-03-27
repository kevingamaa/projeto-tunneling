<?php
#diretorios raiz
$internPath = "projeto-tunneling/";
define('DIRPAGE', "{$_SERVER['REQUEST_SCHEME']}://{$_SERVER['HTTP_HOST']}/{$internPath}" );
// dd
if(substr($_SERVER['DOCUMENT_ROOT'], -1) === '/') 
{
    define('DIRREQ', "{$_SERVER['DOCUMENT_ROOT']}{$internPath}");
} else {
    define('DIRREQ', __DIR__."/../"); 
}


#diretorio especifico
define('DIRPUBLIC',  DIRPAGE."public/");
define('VIEW',  DIRREQ."views/");

