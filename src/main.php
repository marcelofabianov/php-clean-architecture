<?php

require_once  __DIR__.'/../vendor/autoload.php';

use App\Core\Shared\HttpResponse\StatusCode;
use Slim\Factory\AppFactory;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

function main(): void
{
    $app = AppFactory::create();

    $app->addErrorMiddleware(
        getenv('APP_DISPLAY_ERROR', false),
        getenv('APP_LOG_ERROR', false),
        getenv('APP_LOG_ERROR_DETAILS', false)
    );

    $app->get('/', function (Request $request, Response $response, $args) {
        $response->getBody()->write(json_encode(['status' => StatusCode::HTTP_OK]));
        return $response;
    });

    $app->run();
}