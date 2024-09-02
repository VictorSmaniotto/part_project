<?php

namespace App\Helpers;

class AvatarUrl
{
    public static function generate($email, $size = 80)
    {
        $default = 'https://www.gravatar.com/avatar/00000000000000000000000000000000?d=mp&f=y';
        $gravatar = 'https://www.gravatar.com/avatar/' . md5(strtolower(trim($email))) . '?s=' . $size . '&d=' . urlencode($default);
        return $gravatar;
    }
}
