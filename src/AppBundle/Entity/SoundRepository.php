<?php

namespace AppBundle\Entity;

class SoundRepository extends \Doctrine\ORM\EntityRepository
{
  public function findByName($name) {
    return $this->createQueryBuilder('S')
      ->where("S.name = :name")
      ->setParameter("name", $name)
      ->getQuery()
      ->getResult();
  }
}
