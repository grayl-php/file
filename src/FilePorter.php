<?php

   namespace Grayl\File;

   use Grayl\File\Controller\FileController;
   use Grayl\File\Entity\FileData;
   use Grayl\File\Service\FileService;
   use Grayl\File\Storage\FileMapper;
   use Grayl\Mixin\Common\Traits\StaticTrait;

   /**
    * Front-end for the File package
    *
    * @package Grayl\File
    */
   class FilePorter
   {

      // Use the static instance trait
      use StaticTrait;

      /**
       * Creates a FileController entity
       *
       * @param string $file The path to the file
       *
       * @return FileController
       */
      public function newFileController ( string $file ): FileController
      {

         // Grab the file's path and file name
         $parts = pathinfo( $file );

         // Create a new FileData entity
         $file_data = new FileData( $parts[ 'dirname' ],
                                    $parts[ 'basename' ] );

         // Return a new FileController
         return new FileController( $file_data,
                                    new FileService(),
                                    new FileMapper() );
      }

   }