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

namespace App\Controller\Admin;

use App\Controller\Controller;
use App\Service\UserAuth;
use Hyperf\HttpServer\Annotation\AutoController;

/**
 * @AutoController(server="admin", prefix="index")
 */
class IndexController extends Controller
{
    public function index()
    {
        return $this->response->success();
    }

    public function pool()
    {
        $user = UserAuth::instance()->getUser();

        return $this->response->success($user->pool);
    }
}
