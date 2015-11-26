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

  public function selectByName($name) {
    return $this->createQueryBuilder('S')
      ->where("S.name LIKE :name OR S.dialogue LIKE :name")
      ->setParameter("name", '%'.$name.'%')
      ->getQuery()
      ->getResult();
  }
}
