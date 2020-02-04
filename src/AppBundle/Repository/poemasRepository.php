<?php

namespace AppBundle\Repository;

/**
 * poemasRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class poemasRepository extends \Doctrine\ORM\EntityRepository
{
    
    public function findAllOrderByDate(){
       
        // Consulta a base de datos con SQL Personalizado
        $query = $this->getEntityManager()->createQuery(
                'SELECT * FROM AppBundle:poemas'
                . 'ORDER BY id'
                );
        return $query->getResult();
       
    }
}
