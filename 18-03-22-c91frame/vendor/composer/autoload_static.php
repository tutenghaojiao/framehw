<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit43c99aa24e38c48568ad0524fb7cae7e
{
    public static $files = array (
        '59fa7950b86d68591420dc5acbd12825' => __DIR__ . '/../..' . '/system/helper.php',
    );

    public static $prefixLengthsPsr4 = array (
        'h' => 
        array (
            'houdunwang\\' => 11,
        ),
        'a' => 
        array (
            'app\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'houdunwang\\' => 
        array (
            0 => __DIR__ . '/../..' . '/houdunwang',
        ),
        'app\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit43c99aa24e38c48568ad0524fb7cae7e::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit43c99aa24e38c48568ad0524fb7cae7e::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
