<?php

/**
 * @author Matthias Glaub <magl@magl.net>
 * @license http://opensource.org/licenses/BSD-3-Clause BSD-3-Clause
 */

namespace MaglLegacyApplication;

use Exception;
use Zend\Mvc\Application;

class MaglLegacyApplication
{

    /**
     *
     * @var Application
     */
    private static $application;

    /**
     *
     * @var string full path of the requested file (may be used within your legacy application)
     */
    private static $legacyScriptFilename = null;

    /**
     *
     * @var string url path of the requested file (may be used within your legacy application)
     */
    private static $legacyScriptName = null;

    public static function run($config)
    {
        // Run the application!
        self::$application = Application::init($config);
        self::$application->run();
    }

    /**
     *
     * @return Application
     */
    public static function getApplication()
    {
        return self::$application;
    }

    /**
     *
     * @return string the full path of the requested legacy filename
     */
    public static function getLegacyScriptFilename()
    {
        return self::$legacyScriptFilename;
    }

    /**
     *
     * @param  string    $legacyScriptFilename
     * @return boolean   true, if the script filenamename was set, false otherwise, e.g. it has already been set
     */
    public static function setLegacyScriptFilename($legacyScriptFilename)
    {
        if (null === self::$legacyScriptFilename) {
            self::$legacyScriptFilename = $legacyScriptFilename;

            return true;
        }

        return false;
    }

    /**
     *
     * @return string the URI path of the requested legacy filename
     */
    public static function getLegacyScriptName()
    {
        return self::$legacyScriptName;
    }

    /**
     *
     * @param  string    $legacyScriptName
     * @return boolean   true, if the script name was set, false otherwise, e.g. it has already been set
     */
    public static function setLegacyScriptName($legacyScriptName)
    {
        if (null === self::$legacyScriptName) {
            self::$legacyScriptName = $legacyScriptName;

            return true;
        }

        return false;
    }


}
