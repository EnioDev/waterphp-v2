<?php
    function loadClass($classname)
    {
        $filename = '';

        if (false !== ($lastNsPos = strripos($classname, '\\'))) {
            $namespace = substr($classname, 0, $lastNsPos);
            $classname = substr($classname, $lastNsPos + 1);
            $filename = str_replace('\\', DS, $namespace).DS;
        }

        $filename .= $classname.'.php';
        $fullFilename = CORE_PATH.$filename;

        if (file_exists($fullFilename)) {
            require_once $fullFilename;
        } else {
            $fullFilename = APP_PATH.$filename;
            if (file_exists($fullFilename)) {
                require_once $fullFilename;
            }
        }
    }
    spl_autoload_register('loadClass');
