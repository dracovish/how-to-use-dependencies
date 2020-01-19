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

namespace App\Middleware;

use App\Service\UserAuth;
use Psr\Container\ContainerInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Server\RequestHandlerInterface;

class AuthMiddleware implements MiddlewareInterface
{
    /**
     * @var ContainerInterface
     */
    protected $container;

    /**
     * @var string
     */
    protected $pool;

    public function __construct(ContainerInterface $container, string $pool)
    {
        $this->container = $container;
        $this->pool = $pool;
    }

    public function process(ServerRequestInterface $request, RequestHandlerInterface $handler): ResponseInterface
    {
        // TODO: 根据 pool 查询不通的 Redis 等存储引擎 并验证权限

        // 将对应的权限放到 UserAuth 中，这里模式传入一个 object，实际可以传入 Model 等。
        UserAuth::instance()->load((object) [
            'pool' => $this->pool,
        ]);

        return $handler->handle($request);
    }
}
