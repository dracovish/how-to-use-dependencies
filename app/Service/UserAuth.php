<?php

declare(strict_types=1);
/**
 * This file is part of Hyperf.
 *
 * @link     https://www.hyperf.io
 * @document https://doc.hyperf.io
 * @contact  group@hyperf.io
 * @license  https://github.com/hyperf/hyperf/blob/master/LICENSE
 */

namespace App\Service;

use Hyperf\Utils\Traits\StaticInstance;

class UserAuth
{
    use StaticInstance;

    protected $user;

    public function load(object $user)
    {
        $this->user = $user;
    }

    public function getUser()
    {
        return $this->user;
    }
}
