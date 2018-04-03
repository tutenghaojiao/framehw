<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInite6cb0fe9fe27c4e1487b79d2bec1aa6f
{
    public static $files = array (
        '7ccec5fd6ac33664bdb211c29f39ab93' => __DIR__ . '/../..' . '/system/helper.php',
    );

    public static $prefixLengthsPsr4 = array (
        's' => 
        array (
            'system\\' => 7,
        ),
        'f' => 
        array (
            'frames\\' => 7,
        ),
        'a' => 
        array (
            'app\\' => 4,
        ),
        'W' => 
        array (
            'Whoops\\' => 7,
        ),
        'S' => 
        array (
            'Symfony\\Component\\Finder\\' => 25,
        ),
        'P' => 
        array (
            'Psr\\Log\\' => 8,
        ),
        'G' => 
        array (
            'Gregwar\\' => 8,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'system\\' => 
        array (
            0 => __DIR__ . '/../..' . '/system',
        ),
        'frames\\' => 
        array (
            0 => __DIR__ . '/../..' . '/frames',
        ),
        'app\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app',
        ),
        'Whoops\\' => 
        array (
            0 => __DIR__ . '/..' . '/filp/whoops/src/Whoops',
        ),
        'Symfony\\Component\\Finder\\' => 
        array (
            0 => __DIR__ . '/..' . '/symfony/finder',
        ),
        'Psr\\Log\\' => 
        array (
            0 => __DIR__ . '/..' . '/psr/log/Psr/Log',
        ),
        'Gregwar\\' => 
        array (
            0 => __DIR__ . '/..' . '/gregwar/captcha/src/Gregwar',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInite6cb0fe9fe27c4e1487b79d2bec1aa6f::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInite6cb0fe9fe27c4e1487b79d2bec1aa6f::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
