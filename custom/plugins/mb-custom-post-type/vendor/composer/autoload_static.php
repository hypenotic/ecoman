<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitae2b2549c8d75d7b10895f4f49d9a272
{
    public static $prefixLengthsPsr4 = array (
        'M' => 
        array (
            'MBCPT\\' => 6,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'MBCPT\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitae2b2549c8d75d7b10895f4f49d9a272::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitae2b2549c8d75d7b10895f4f49d9a272::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitae2b2549c8d75d7b10895f4f49d9a272::$classMap;

        }, null, ClassLoader::class);
    }
}
