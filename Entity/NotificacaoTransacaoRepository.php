<?php

namespace BFOS\PagseguroBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * SituacaoTransacaoRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class SituacaoTransacaoRepository extends EntityRepository
{
    public function getSituacoesPorReference($reference, $vendedor_email = null){
        $qb = $this->createQueryBuilder('s');
        $qb->where('s.reference LIKE :reference')->setParameter('reference', $reference);
        if(!is_null($vendedor_email)){
            $qb->andWhere('s.vendedor_email LIKE :vendedor_email')->setParameter('vendedor_email', $vendedor_email);
        }
        $qb->orderBy('s.updated_at', 'DESC');
        return $qb->getQuery()->getResult();
    }
}