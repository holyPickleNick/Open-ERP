<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit6276ccd6eff6a4cf61ad2c1c7f6b8fbd
{
    public static $prefixLengthsPsr4 = array (
        'O' => 
        array (
            'OpenErp\\TimeTracking\\' => 21,
            'OpenErp\\Manufacturing\\' => 22,
            'OpenErp\\HR\\' => 11,
            'OpenErp\\' => 8,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'OpenErp\\TimeTracking\\' => 
        array (
            0 => __DIR__ . '/../..' . '/includes/modules/timetracking',
        ),
        'OpenErp\\Manufacturing\\' => 
        array (
            0 => __DIR__ . '/../..' . '/includes/modules/manufacturing',
        ),
        'OpenErp\\HR\\' => 
        array (
            0 => __DIR__ . '/../..' . '/includes/modules/hr',
        ),
        'OpenErp\\' => 
        array (
            0 => __DIR__ . '/../..' . '/includes',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit6276ccd6eff6a4cf61ad2c1c7f6b8fbd::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit6276ccd6eff6a4cf61ad2c1c7f6b8fbd::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
