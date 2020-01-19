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

use App\Middleware;
use App\Service;

return [
    // Hyperf\Contract\StdoutLoggerInterface::class => App\Kernel\Log\LoggerFactory::class,
    Service\DemoService::class => Service\Demo2Service::class,
    'AdminServer' => Hyperf\HttpServer\Server::class,
    // 'UserAuthMiddleware' => Middleware\Factory\AuthMiddlewareFactory::class,
    // 'AdminUserAuthMiddleware' => Middleware\Factory\AdminAuthMiddlewareFactory::class,
    'UserAuthMiddleware' => function () {
        return make(Middleware\AuthMiddleware::class, ['pool' => 'user']);
    },
    'AdminUserAuthMiddleware' => function () {
        return make(Middleware\AuthMiddleware::class, ['pool' => 'admin']);
    },
];
