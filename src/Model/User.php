<?php
namespace Devi\Model;

use DateTime;
use JsonSerializable;

class User implements JsonSerializable
{
  // Variables
  private $id;
  private $name;
  private $email;
  private $password;
  private $public_key;
  private $private_key;
  private $date_created;
  private $date_modified;
  
  // Management
  public function getId(): int
  {
    return $this->id;
  }
  public function setId(int $id)
  {
    $this->id = $id;
    return $this;
  }
  public function getName(): string
  {
    return $this->name;
  }
  public function setName(string $name): self
  {
    $this->name = $name;
    return $this;
  }
  public function getEmail(): string
  {
    return $this->email;
  }
  public function setEmail(string $email): self
  {
    $this->email = $email;
    return $this;
  }
  public function getPassword(): string
  {
    return $this->password;
  }
  public function setPassword(string $password): self
  {
    $this->password = $password;
    return $this;
  }
  public function getPublicKey(): string
  {
    return $this->public_key;
  }
  public function setPublicKey(string $public_key): self
  {
    $this->public_key = $public_key;
    return $this;
  }
  public function getPrivateKey(): string
  {
    return $this->private_key;
  }
  public function setPrivateKey(string $private_key): self
  {
    $this->private_key = $private_key;
    return $this;
  }
  public function getDateCreated(): DateTime
  {
    return $this->date_created;
  }
  public function setDateCreated(DateTime $date_created): self
  {
    $this->date_created = $date_created;
    return $this;
  }
  public function getDateModified(): DateTime
  {
    return $this->date_modified;
  }
  public function setDateModified(DateTime $date_modified): self
  {
    $this->date_modified = $date_modified;
    return $this;
  }
  
  // Serialize to JSON
  public function jsonSerialize(): array
  {
    return [
      'name' => $this->getName(),
      'email' => $this->getEmail(),
      'date_created' => $this->getDateCreated()->format(DateTime::ISO8601),
      'date_modified' => $this->getDateModified()->format(DateTime::ISO8601)
    ];
  }

  // Create a user
  public static function create($name, $email, $password): self
  {
    // Return the new user
    return (new User)
      ->setName($name)
      ->setEmail($email)
      ->setPassword($password)
      ->setPublicKey(self::createKey())
      ->setPrivateKey(self::createKey())
      ->setDateCreated(new DateTime)
      ->setDateModified(new DateTime);
  }
  
  // Create a public or private key
  private static function createKey($length = 32): string
  {    
    // Create pattern
    $pattern = '0123456789abcdefghijklmnopqrstuvwxyz';
    
    // Generate a key
    for ($i = 0; $i < $length; $i ++)
      $generated .= $pattern[mt_rand(0,strlen($pattern)-1)];
    
    // Return the generated key
    return $generated;
  }
}