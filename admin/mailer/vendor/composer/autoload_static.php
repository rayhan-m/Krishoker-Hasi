<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitfa7f713fd739d6261b6be4c33bad3cf7
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'PHPMailer\\PHPMailer\\' => 20,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'PHPMailer\\PHPMailer\\' => 
        array (
            0 => __DIR__ . '/..' . '/phpmailer/phpmailer/src',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitfa7f713fd739d6261b6be4c33bad3cf7::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitfa7f713fd739d6261b6be4c33bad3cf7::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
