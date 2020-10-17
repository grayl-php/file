<?php

   namespace Grayl\File\Entity;

   /**
    * Class FileData
    * The entity for a file
    *
    * @package Grayl\File
    */
   class FileData
   {

      /**
       * The path to the folder of the file
       *
       * @var string
       */
      private string $path;

      /**
       * The filename of the file
       *
       * @var string
       */
      private string $filename;


      /**
       * The class constructor
       *
       * @param string $path     The path to the folder of the file
       * @param string $filename The filename of the file
       */
      public function __construct ( string $path,
                                    string $filename )
      {

         // Set the class data
         $this->setPath( $path );
         $this->setFilename( $filename );
      }


      /**
       * Gets the path
       *
       * @return string
       */
      public function getPath (): string
      {

         // Return the path
         return $this->path;
      }


      /**
       * Sets the path
       *
       * @param string $path The path to the folder of the file
       */
      public function setPath ( string $path ): void
      {

         // Set the path
         $this->path = $path;
      }


      /**
       * Gets the filename
       *
       * @return string
       */
      public function getFilename (): string
      {

         // Return the filename
         return $this->filename;
      }


      /**
       * Sets the filename
       *
       * @param string $filename The filename of the file
       */
      public function setFilename ( string $filename ): void
      {

         // Set the filename
         $this->filename = $filename;
      }

   }