<?php
namespace Devi\Model\Storage;

use Symfony\Component\HttpFoundation\Response;

interface StorageInterface 
{
  // Read the contents of a blob
  public function read($index);
  
  // Read the contents of a blob as a stream
  public function readStream($index);
  
  // Write a string to a blob
  public function write($index, $contents);
  
  // Write a stream to a blob
  public function writeStream($index, $stream);
  
  // Delete a blob
  public function delete($index);
  
  // Create a response with the contents of a blob
  public function respond($index, $filename, $filetype): Response;
}
