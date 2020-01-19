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

namespace App\Kernel\Http;

use Hyperf\HttpMessage\Stream\SwooleStream;
use Hyperf\HttpServer;
use Psr\Http\Message\ServerRequestInterface;

class CoreMiddleware extends HttpServer\CoreMiddleware
{
    protected function handleNotFound(ServerRequestInterface $request)
    {
        return $this->response()->withStatus(404)->withBody(new SwooleStream('Not Found.'));
    }
}
