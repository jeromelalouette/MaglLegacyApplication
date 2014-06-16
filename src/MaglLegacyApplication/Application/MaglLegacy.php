<?php

/**
 * @author Matthias Glaub <magl@magl.net>
 * @license http://opensource.org/licenses/BSD-3-Clause BSD-3-Clause
 */

namespace MaglLegacyApplication\Application;

class MaglLegacy
{

    /**
     *
     * @var MaglLegacy
     */
    private static $instance = null;

    /**
     *
     * @var \Zend\Mvc\Application
     */
    private $application;

    /**
     *
     * @var string full path of the requested file (may be used within your legacy application)
     */
    private $legacyScriptFilename = null;

    /**
     *
     * @var string url path of the requested file (may be used within your legacy application)
     */
    private $legacyScriptName = null;

    /**
     * 
     * @return MaglLegacy
     */
    public static function getInstance()
    {
        if (null === self::$instance) {
            self::$instance = new static();
        }
        return self::$instance;
    }

    private function __construct()
    {
        return null;
    }

    private function __clone()
    {
        return null;
    }

    public function setApplication(\Zend\Mvc\Application $application)
    {
        $this->application = $application;
    }

    /**
     *
     * @return \Zend\Mvc\Application
     */
    public function getApplication()
    {
        return $this->application;
    }

    /**
     *
     * @return string the full path of the requested legacy filename
     */
    public function getLegacyScriptFilename()
    {
        return $this->legacyScriptFilename;
    }

    /**
     *
     * @param  string    $legacyScriptFilename
     * @return boolean   true, if the script filenamename was set, false otherwise, e.g. it has already been set
     */
    public function setLegacyScriptFilename($legacyScriptFilename)
    {
        return $this->legacyScriptFilename = $legacyScriptFilename;
    }

    /**
     *
     * @return string the URI path of the requested legacy filename
     */
    public function getLegacyScriptName()
    {
        return $this->legacyScriptName;
    }

    /**
     *
     * @param  string    $legacyScriptName
     * @return boolean   true, if the script name was set, false otherwise, e.g. it has already been set
     */
    public function setLegacyScriptName($legacyScriptName)
    {
        return $this->legacyScriptName = $legacyScriptName;
    }
}