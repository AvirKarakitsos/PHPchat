<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit8ba9575fa36ae80152e4648210b9422f
{
    public static $prefixLengthsPsr4 = array (
        'R' => 
        array (
            'Router\\' => 7,
        ),
        'D' => 
        array (
            'Database\\' => 9,
        ),
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Router\\' => 
        array (
            0 => __DIR__ . '/../..' . '/routes',
        ),
        'Database\\' => 
        array (
            0 => __DIR__ . '/../..' . '/database',
        ),
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app',
        ),
    );

    public static $classMap = array (
        'App\\Controllers\\Controller' => __DIR__ . '/../..' . '/app/Controllers/Controller.php',
        'App\\Controllers\\SiteController' => __DIR__ . '/../..' . '/app/Controllers/SiteController.php',
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
        'Database\\DBConnection' => __DIR__ . '/../..' . '/database/DBConnection.php',
        'Router\\Route' => __DIR__ . '/../..' . '/routes/Route.php',
        'Router\\Router' => __DIR__ . '/../..' . '/routes/Router.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit8ba9575fa36ae80152e4648210b9422f::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit8ba9575fa36ae80152e4648210b9422f::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit8ba9575fa36ae80152e4648210b9422f::$classMap;

        }, null, ClassLoader::class);
    }
}
