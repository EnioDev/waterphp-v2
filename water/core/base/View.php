<?php

declare(strict_types=1);

namespace core\base;

final class View
{
    public static function load(string $view, array $data = [])
    {
        if (is_string($view)) {
            if (is_array($data)) {
                foreach ($data as $index => $value) {
                    ${$index} = $value;
                }
            }
            if (file_exists(self::getFilename($view))) {
                require_once self::getFilename($view);
            } else {
                $idx = (strripos(debug_backtrace()[0]['file'], 'helpers.php')) ? 1 : 0;
                $_SESSION['debug_backtrace_file'] = debug_backtrace()[$idx]['file'];
                $_SESSION['debug_backtrace_line'] = debug_backtrace()[$idx]['line'];
                trigger_error('An error has occurred to open the view file. Make sure that both directory and filename were informed rightly.', E_USER_ERROR);
            }
        }
    }

    private static function getFilename(string $view): string
    {
        $parts = explode('/', $view);
        $total = count($parts);
        $final = $total - 1;
        $filename = VIEW_PATH;
        for ($i = 0; $i < $final; ++$i) {
            $filename .= $parts[$i].DS;
        }
        $filename .= $parts[$final].'.php';

        return $filename;
    }
}
