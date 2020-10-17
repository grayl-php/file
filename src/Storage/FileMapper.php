<?php

   namespace Grayl\File\Storage;

   /**
    * Class FileMapper
    * The mapper for getting the contents of a file
    *
    * @package Grayl\File
    */
   class FileMapper
   {

      /**
       * Includes a specified file and returns its contents as an array
       *
       * @param string $file The full path to the file
       *
       * @return mixed
       * @throws \Exception
       * @noinspection PhpIncludeInspection
       */
      public function includeFile ( string $file )
      {

         // Make sure the file exists
         if ( ! is_file( $file ) ) {
            // Throw an error and exit
            throw new \Exception( 'File cannot be included.' );
         }

         try {
            // Grab the file contents by including it /** @var array $data */
            $data = include $file;
         }
         catch ( \Exception $e ) {
            // Throw an error and exit
            throw new \Exception( 'File include failed.' );
         }

         // Return the contents
         return $data;
      }


      /**
       * Reads a specified file and returns it contents as a string
       *
       * @param string $file The full path to the file
       *
       * @return string
       * @throws \Exception
       */
      public function readFile ( string $file ): ?string
      {

         // Make sure the file exists
         if ( ! is_file( $file ) ) {
            // Throw an error and exit
            throw new \Exception( 'File cannot be read.' );
         }

         // Grab the file contents by reading it as a string /** @var string $data */
         $data = file_get_contents( $file );

         // Make sure the file was read
         if ( $data === false ) {
            // Throw an error and exit
            throw new \Exception( 'File read failed.' );
         }

         // Return the contents
         return $data;
      }


      /**
       * Renders a file (with all PHP parsed) and returns it as a string
       *
       * @param string $file The full path to the file
       * @param array  $vars An array of vars for use inside the file as $vars[]
       *
       * @return string
       * @throws \Exception
       * @noinspection PhpIncludeInspection
       */
      public function renderFile ( string $file,
                                   array $vars ): string
      {

         // Make sure the file exists
         if ( ! is_file( $file ) ) {
            // Throw an error and exit
            throw new \Exception( 'File cannot be rendered.' );
         }

         try {
            // Turn on output buffering
            ob_start();

            // Include the file
            include $file;

            // Grab the output and flush
            $output = ob_get_clean();
         }
         catch ( \Exception $e ) {
            // Throw an error and exit
            throw new \Exception( 'Could not render file.' );
         }

         // Return the parsed output as a string
         return $output;
      }

   }