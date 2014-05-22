<?php

/**
 * @author Matthias Glaub <magl@magl.net>
 * @license http://opensource.org/licenses/BSD-3-Clause BSD-3-Clause
 */

namespace MaglLegacyApplication\Options;

class LegacyControllerOptions extends \Zend\Stdlib\AbstractOptions
{
    
    private $docRoot = 'public';
    
    private $globals = array(
        'get' => true,
        'request' => true,
    );
    
    public function getDocRoot()
    {
        return $this->docRoot;
    }

    public function getGlobals()
    {
        return $this->globals;
    }

    public function setDocRoot($docRoot)
    {
        $this->docRoot = $docRoot;
    }

    public function setGlobals($globals)
    {
        $this->globals = $globals;
    }


}
