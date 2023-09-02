<?php

$publicPath = __DIR__ . '/public';

$uri = urldecode(
    parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH) ?? ''
);

/**
 * id: File ini memungkinkan kita untuk meniru fungsionalitas "mod_rewrite" Apache dari
 * server web PHP bawaan. Ini menyediakan cara yang mudah untuk menguji aplikasi Laravel
 * tanpa perlu menginstal perangkat lunak server web "asli" di sini.
 * 
 * en: This file allows us to emulate Apache's "mod_rewrite" functionality from the
 * built-in PHP web server. This provides a convenient way to test a Laravel
 * application without having installed a "real" web server software here.
 */
if ($uri !== '/' && file_exists($publicPath . $uri)) {
    return false;
}

require_once $publicPath . '/index.php';
