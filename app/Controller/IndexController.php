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

namespace App\Controller;

use App\Service\DemoService;
use App\Service\UserAuth;
use Hyperf\HttpServer\Annotation\AutoController;

/**
 * @AutoController
 */
class IndexController extends Controller
{
    public function index()
    {
        $user = $this->request->input('user', 'Hyperf');
        $method = $this->request->getMethod();
        return $this->response->success([
            'user' => $user,
            'method' => $method,
            'message' => 'Hello Hyperf.',
        ]);
    }

    public function say()
    {
        return $this->response->success(
            $this->container->get(DemoService::class)->say()
        );
    }

    public function pool()
    {
        $user = UserAuth::instance()->getUser();

        return $this->response->success($user->pool);
    }
}
