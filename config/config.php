<?php
#diretorios raiz

$internPath = "";
define('DIRPAGE', "{$_SERVER['REQUEST_SCHEME']}://{$_SERVER['HTTP_HOST']}/{$internPath}");

if(substr($_SERVER['DOCUMENT_ROOT'], -1) === '/') 
{
    define('DIRREQ', "{$_SERVER['DOCUMENT_ROOT']}{$internPath}");
} else {
    define('DIRREQ', "{$_SERVER['DOCUMENT_ROOT']}/{$internPath}"); 
}


#diretorio especifico
define('DIRPUBLIC',  DIRPAGE."public/");
define('VIEW',  DIRREQ."views/");

