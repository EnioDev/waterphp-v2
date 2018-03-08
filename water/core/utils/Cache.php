<?php

declare(strict_types=1);

namespace core\utils;

final class Cache
{
    private static $cacheTime = CACHE_TIME ?? '30 minutes';
    private static $folder = ROOT_PATH.'storage'.DIRECTORY_SEPARATOR.'cache'.DIRECTORY_SEPARATOR;

    public static function save(string $key, string $content, string $time = null): int
    {
        $now = strtotime(date('Y-m-d H:i:s'));

        if (null === $time) {
            $time = self::$cacheTime;
        }

        $expires = strtotime($time, $now);

        $content = serialize([
            'expires' => $expires,
            'content' => $content, ]);

        return self::createCacheFile($key, $content);
    }

    public static function read(string $key)
    {
        $filename = self::generateFileLocation($key);

        if (file_exists($filename) && is_readable($filename)) {
            $cache = unserialize(file_get_contents($filename));
            if ($cache['expires'] > time()) {
                return $cache['content'];
            }
            unlink($filename);
        }

        return null;
    }

    private static function generateFileLocation(string $key): string
    {
        return self::$folder.sha1($key).'.tmp';
    }

    private static function createCacheFile(string $key, string $content): int
    {
        $filename = self::generateFileLocation($key);

        return file_put_contents($filename, $content);
    }
}
