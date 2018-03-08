<?php

namespace core\contracts;

interface ICrypt
{
    public static function encode(string $decrypted): string;

    public static function decode(string $encrypted): string;
}
