<?php

   namespace Grayl\File\Service;

   use Grayl\File\Entity\FileData;
   use Grayl\File\Storage\FileMapper;

   /**
    * Class FileService
    * The service for working with files
    *
    * @package Grayl\File
    */
   class FileService
   {

      /**
       * Includes a specified file and returns its contents as an array
       *
       * @param FileData   $file_data   The FileData entity to use
       * @param FileMapper $file_mapper The FileMapper instance to interact with
       *
       * @return mixed
       * @throws \Exception
       */
      public function getIncludedFile ( FileData $file_data,
                                        FileMapper $file_mapper )
      {

         // Determine the complete file path
         $file = $this->getJoinedPath( $file_data->getPath(),
                                       $file_data->getFilename() );

         // Return the file contents from an include
         return $file_mapper->includeFile( $file );
      }


      /**
       * Reads a specified file and returns it contents as a string
       *
       * @param FileData   $file_data   The FileData entity to use
       * @param FileMapper $file_mapper The FileMapper instance to interact with
       *
       * @return string
       * @throws \Exception
       */
      public function getRawFile ( FileData $file_data,
                                   FileMapper $file_mapper ): ?string
      {

         // Determine the complete file path
         $file = $this->getJoinedPath( $file_data->getPath(),
                                       $file_data->getFilename() );

         // Return the raw file contents
         return $file_mapper->readFile( $file );
      }


      /**
       * Renders a file with all PHP parsed and returns it as a string
       *
       * @param FileData   $file_data   The FileData entity to use
       * @param array      $vars        An array of vars for use inside the file as $vars[]
       * @param FileMapper $file_mapper The FileMapper instance to interact with
       *
       * @return string
       * @throws \Exception
       */
      public function getRenderedFile ( FileData $file_data,
                                        array $vars,
                                        FileMapper $file_mapper ): ?string
      {

         // Determine the complete file path
         $file = $this->getJoinedPath( $file_data->getPath(),
                                       $file_data->getFilename() );

         // Return the rendered file contents
         return $file_mapper->renderFile( $file,
                                          $vars );
      }


      /**
       * Merges two system paths properly by removing slashes and joining them
       *
       * @param string $base_path The base path ( left side )
       * @param string $rel_path  The relative path ( right side )
       *
       * @return string
       */
      public function getJoinedPath ( string $base_path,
                                      string $rel_path ): string
      {

         // Cleanup the base path
         $path = rtrim( $base_path,
                        '/' ) . '/';

         // Add the relative path
         $path .= ltrim( $rel_path,
                         '/' );

         // Return the formatted path
         return $path;
      }

   }