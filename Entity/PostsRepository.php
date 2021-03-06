<?php

namespace ddmani\BlogBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * PostsRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class PostsRepository extends EntityRepository
{
    public function PostCount(){
        return $this->createQueryBuilder('a')
                    ->select('COUNT(a)')
                    ->getQuery()
                    ->getSingleScalarResult();
    }
    
    public function PostListPage($page,$ResultsPerPage){
        $FirstResult = $page === 1 ? 0 : ($page-1)*$ResultsPerPage;
        return $this->getEntityManager()
                    ->createQuery('SELECT a FROM ddmaniBlogBundle:Posts a')
                    ->setMaxResults($ResultsPerPage)
                    ->setFirstResult($FirstResult)
                    ->getResult();
    }
}
