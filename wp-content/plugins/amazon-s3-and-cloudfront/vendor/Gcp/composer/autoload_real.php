<?php

namespace DeliciousBrains\WP_Offload_Media\Gcp;

// autoload_real.php @generated by Composer
class ComposerAutoloaderInit4af97097451661674e5dcb30ff9827f1
{
    private static $loader;
    public static function loadClassLoader($class)
    {
        if ('DeliciousBrains\\WP_Offload_Media\\Gcp\\Composer\\Autoload\\ClassLoader' === $class) {
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
        \spl_autoload_register(array('DeliciousBrains\\WP_Offload_Media\\Gcp\\ComposerAutoloaderInit4af97097451661674e5dcb30ff9827f1', 'loadClassLoader'), \true, \true);
        self::$loader = $loader = new \DeliciousBrains\WP_Offload_Media\Gcp\Composer\Autoload\ClassLoader(\dirname(__DIR__));
        \spl_autoload_unregister(array('DeliciousBrains\\WP_Offload_Media\\Gcp\\ComposerAutoloaderInit4af97097451661674e5dcb30ff9827f1', 'loadClassLoader'));
        require __DIR__ . '/autoload_static.php';
        \call_user_func(\DeliciousBrains\WP_Offload_Media\Gcp\Composer\Autoload\ComposerStaticInit4af97097451661674e5dcb30ff9827f1::getInitializer($loader));
        $loader->setClassMapAuthoritative(\true);
        $loader->register(\true);
        $includeFiles = \DeliciousBrains\WP_Offload_Media\Gcp\Composer\Autoload\ComposerStaticInit4af97097451661674e5dcb30ff9827f1::$files;
        foreach ($includeFiles as $fileIdentifier => $file) {
            composerRequire4af97097451661674e5dcb30ff9827f1($fileIdentifier, $file);
        }
        return $loader;
    }
}
/**
 * @param string $fileIdentifier
 * @param string $file
 * @return void
 */
function composerRequire4af97097451661674e5dcb30ff9827f1($fileIdentifier, $file)
{
    if (empty($GLOBALS['__composer_autoload_files'][$fileIdentifier])) {
        $GLOBALS['__composer_autoload_files'][$fileIdentifier] = \true;
        require $file;
    }
}
