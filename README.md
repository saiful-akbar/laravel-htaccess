# htaccess for Laravel
Script `.htaccess` untuk pengembangan project laravel

# Cara penggunaan
1. Buat file `.htaccess` pada root folder project dan isikan script berikut:

```php
# Display error
php_value display_errors 1

<IfModule mod_rewrite.c>
    <IfModule mod_negotiation.c>
        Options -MultiViews
    </IfModule>

    RewriteEngine On

    RewriteCond %{REQUEST_FILENAME} -d [OR]
    RewriteCond %{REQUEST_FILENAME} -f
    RewriteRule ^ ^$1 [N]

    RewriteCond %{REQUEST_URI} (\.\w+$) [NC]
    RewriteRule ^(.*)$ public/$1

    RewriteCond %{REQUEST_FILENAME} !-d
    RewriteCond %{REQUEST_FILENAME} !-f
    RewriteRule ^ index.php
</IfModule>
```

2. Buat file `index.php` pada root folder project dan isikan script berikut:

```php
<?php

/**
 * Ambil path pada url
 */
$uri = urldecode(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));

/**
 * Cek path pada variable $uri.
 * Serta cek apakan file public/index.php ada atau tidak.
 */
if ($uri !== '/' && file_exists(__DIR__ . '/public' . $uri)) {
    return false;
}

require_once __DIR__ . '/public/index.php';
```
