<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInitd4dddbd4cc8d3783aaf23a96b8bcca1f
{
    private static $loader;

    public static function loadClassLoader($class)
    {
        if ('Composer\Autoload\ClassLoader' === $class) {
            require __DIR__ . '/ClassLoader.php';
        }
    }

    /**
     * @return \Composer\Autoload\ClassLoader
     */
    public static function getLoader()
    {
        if (null !== self::$loader) {
            return self::$loader;
        }

        require __DIR__ . '/platform_check.php';

        spl_autoload_register(array('ComposerAutoloaderInitd4dddbd4cc8d3783aaf23a96b8bcca1f', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInitd4dddbd4cc8d3783aaf23a96b8bcca1f', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInitd4dddbd4cc8d3783aaf23a96b8bcca1f::getInitializer($loader));

        $loader->register(true);

        return $loader;
    }
}
