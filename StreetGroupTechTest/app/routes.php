<?php

declare(strict_types=1);

use App\Application\Controllers\FileUpload\FileUploadController;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\App;
use Slim\Interfaces\RouteCollectorProxyInterface as Group;

return function (App $app) {
    $app->options('/{routes:.*}', function (Request $request, Response $response) {
        // CORS Pre-Flight OPTIONS Request Handler
        return $response;
    });

    $app->get('/', FileUploadController::class . ':file_upload_form');

    $app->post('/process_file', FileUploadController::class . ':file_process');
};
