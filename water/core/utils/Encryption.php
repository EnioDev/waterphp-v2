<?php

declare(strict_types=1);

namespace core\utils;

use core\contracts\ICrypt;

final class Encryption implements ICrypt
{
    public static function encode(string $decrypted): string
    {
        if (ENCRYPTION_KEY && SECRET_WORD && is_string($decrypted) && strlen($decrypted) > 0) {
            $iv = substr(hash('sha256', SECRET_WORD), 0, 16);
            $encrypted = openssl_encrypt($decrypted, 'AES-256-CBC', ENCRYPTION_KEY, 0, $iv);
            $encrypted = base64_encode($encrypted);

            return trim($encrypted);
        }

        return '';
    }

    public static function decode(string $encrypted): string
    {
        if (ENCRYPTION_KEY && SECRET_WORD && is_string($encrypted) && strlen($encrypted) > 0) {
            $iv = substr(hash('sha256', SECRET_WORD), 0, 16);
            $encrypted = base64_decode($encrypted, true);
            $decrypted = openssl_decrypt($encrypted, 'AES-256-CBC', ENCRYPTION_KEY, 0, $iv);

            return trim($decrypted);
        }

        return '';
    }
}
