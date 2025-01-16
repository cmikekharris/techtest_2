<?php

declare(strict_types=1);

namespace App\Application\Controllers\FileUpload;

use App\Domain\Data\Data;
use App\Domain\Record\Record;
use Psr\Container\ContainerInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Log\LoggerInterface;
use Slim\Psr7\UploadedFile;
use Slim\Views\Twig;

class FileUploadController
{
   private $container;
   private $twig;
   private $logger;

   public function __construct(ContainerInterface $container, Twig $twig, LoggerInterface $logger)
   {
       $this->container = $container;
       $this->twig = $twig;
       $this->logger = $logger;
   }

   public function file_upload_form(ServerRequestInterface $request, ResponseInterface $response, array $args): ResponseInterface
   {    
        $this->logger->info("Upload form was viewed.");

        return $this->twig->render($response, 'file_upload_form.html.twig');
   }

   public function file_process(ServerRequestInterface $request, ResponseInterface $response, array $args): ResponseInterface
   {
        $this->logger->info("Processing page was viewed.");

        $uploadedFiles = $request->getUploadedFiles();
        $uploadedFile = $uploadedFiles['names_csv'];

        $data = new Data($uploadedFile);
        $data->processData($data->getOldData());

        $this->logger->info("============");
        $this->logger->info("Processed " . count($data->getOldData()) . " rows.");
        $this->logger->info("Converted to " . count($data->getNewData()) . " usable records.");
        $this->logger->info("============");

        // return results
        return $this->twig->render(
            $response,
            'file_process_form.html.twig',
            [
                'existing_records' => $data->getOldData(),
                'updated_records' => $data->getNewData(),
                'number_of_original_rows' => count($data->getOldData()),
                'number_of_new_rows' => count($data->getNewData()),
            ]
        );
   }
}
