<?php

   namespace Grayl\File\Controller;

   use Grayl\File\Entity\FileData;
   use Grayl\File\Service\FileService;
   use Grayl\File\Storage\FileMapper;

   /**
    * Class FileController
    * The controller for working with file data objects
    *
    * @package Grayl\File
    */
   class FileController
   {

      /**
       * The FileData instance to interact with
       *
       * @var FileData
       */
      private FileData $file_data;

      /**
       * The FileService instance to interact with
       *
       * @var FileService
       */
      private FileService $file_service;

      /**
       * The FileMapper instance to interact with
       *
       * @var FileMapper
       */
      private FileMapper $file_mapper;


      /**
       * The class constructor
       *
       * @param FileData    $file_data    The FileData instance to interact with
       * @param FileService $file_service The FileService instance to use
       * @param FileMapper  $file_mapper  The FileMapper instance to interact with
       */
      public function __construct ( FileData $file_data,
                                    FileService $file_service,
                                    FileMapper $file_mapper )
      {

         // Setup the class
         $this->file_data = $file_data;

         // Set the file service
         $this->file_service = $file_service;

         // Set the file mapper
         $this->file_mapper = $file_mapper;
      }


      /**
       * Gets the path
       *
       * @return string
       */
      public function getPath (): string
      {

         // Return the path
         return $this->file_data->getPath();
      }


      /**
       * Gets the filename
       *
       * @return string
       */
      public function getFilename (): string
      {

         // Return the filename
         return $this->file_data->getFilename();
      }


      /**
       * Gets the entire path with filename
       *
       * @return string
       */
      public function getFullPath (): string
      {

         // Return the joined path with filename
         return $this->file_service->getJoinedPath( $this->getPath(),
                                                    $this->getFilename() );
      }


      /**
       * Includes a specified file and returns its contents as an array
       *
       * @return mixed
       * @throws \Exception
       */
      public function getIncludedFile ()
      {

         // Return the file contents
         return $this->file_service->getIncludedFile( $this->file_data,
                                                      $this->file_mapper );
      }


      /**
       * Reads a specified file and returns it contents as a string
       *
       * @return string
       * @throws \Exception
       */
      public function getRawFile (): ?string
      {

         // Return the file contents
         return $this->file_service->getRawFile( $this->file_data,
                                                 $this->file_mapper );
      }


      /**
       * Renders a file with all PHP parsed and returns it as a string
       *
       * @param array $vars An array of vars for use inside the file as $vars[]
       *
       * @return string
       * @throws \Exception
       */
      public function getRenderedFile ( array $vars ): ?string
      {

         // Return the rendered file contents
         return $this->file_service->getRenderedFile( $this->file_data,
                                                      $vars,
                                                      $this->file_mapper );
      }

   }