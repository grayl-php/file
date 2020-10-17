<?php

   namespace Grayl\Test\File;

   use Grayl\File\Controller\FileController;
   use Grayl\File\FilePorter;
   use PHPUnit\Framework\TestCase;

   /**
    * Test class for the File package
    *
    * @package Grayl\File
    */
   class FileControllerTest extends TestCase
   {

      /**
       * Tests the creation of a FileController object that includes a file
       *
       * @return FileController
       */
      public function testCreateFileControllerFromInclude (): FileController
      {

         // Create a FileController
         $file = FilePorter::getInstance()
                           ->newFileController( __DIR__ . '/data/include.php' );

         // Check the type of object created
         $this->assertInstanceOf( FileController::class,
                                  $file );

         // Return it
         return $file;
      }


      /**
       * Tests that data of a FileController using include
       *
       * @param FileController $file A FileController entity to test
       *
       * @depends testCreateFileControllerFromInclude
       * @throws \Exception
       */
      public function testFileControllerDataFromInclude ( FileController $file ): void
      {

         // Get the file content
         $content = $file->getIncludedFile();

         // Test a piece of the included content
         $this->assertNotEmpty( $content[ 'string' ] );
         $this->assertIsString( $content[ 'string' ] );
         $this->assertEquals( 'test',
                              $content[ 'string' ] );

         // Test another piece of content from the second file
         $this->assertNotEmpty( $content[ 'int' ] );
         $this->assertIsInt( $content[ 'int' ] );
         $this->assertEquals( 21,
                              $content[ 'int' ] );
      }


      /**
       * Tests the creation of a FileController object that reads a file
       *
       * @return FileController
       */
      public function testCreateFileControllerFromRead (): FileController
      {

         // Create a FileController
         $file = FilePorter::getInstance()
                           ->newFileController( __DIR__ . '/data/read.php' );

         // Check the type of object created
         $this->assertInstanceOf( FileController::class,
                                  $file );

         // Return it
         return $file;
      }


      /**
       * Tests that data of a FileController using read
       *
       * @param FileController $file A FileController entity to test
       *
       * @depends testCreateFileControllerFromRead
       * @throws \Exception
       */
      public function testFileControllerDataFromRead ( FileController $file ): void
      {

         // Get the file content
         $content = $file->getRawFile();

         // Test the returned content
         $this->assertNotEmpty( $content );
         $this->assertIsString( $content );
         $this->assertEquals( 'testing 123',
                              $content );
      }


      /**
       * Tests the creation of a FileController object that renders a file
       *
       * @return FileController
       */
      public function testCreateFileControllerFromRender (): FileController
      {

         // Create a FileController
         $file = FilePorter::getInstance()
                           ->newFileController( __DIR__ . '/data/render.php' );

         // Check the type of object created
         $this->assertInstanceOf( FileController::class,
                                  $file );

         // Return it
         return $file;
      }


      /**
       * Tests that data of a FileController using render
       *
       * @param FileController $file A FileController entity to test
       *
       * @depends testCreateFileControllerFromRender
       * @throws \Exception
       */
      public function testFileControllerDataFromRender ( FileController $file ): void
      {

         // Get the file content
         $content = $file->getRenderedFile( [ 'int' => 2 ] );

         // Test the rendered content
         $this->assertNotEmpty( $content );
         $this->assertIsString( $content );
         $this->assertEquals( '4',
                              $content );
      }

   }
