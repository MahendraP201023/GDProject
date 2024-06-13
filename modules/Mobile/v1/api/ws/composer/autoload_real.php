<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInit11fdd4d3f9166cf3cf9e54872e98ac38
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

        spl_autoload_register(array('ComposerAutoloaderInit11fdd4d3f9166cf3cf9e54872e98ac38', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInit11fdd4d3f9166cf3cf9e54872e98ac38', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInit11fdd4d3f9166cf3cf9e54872e98ac38::getInitializer($loader));

        $loader->register(true);

        return $loader;
    }
}
