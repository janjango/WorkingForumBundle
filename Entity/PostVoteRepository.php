<?php

namespace Yosimitso\WorkingForumBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * Class PostVoteRepository
 *
 * @package Yosimitso\WorkingForumBundle\Entity
 */
class PostVoteRepository extends EntityRepository
{

    public function getThreadVoteByUser($thread, $user)
    {
        $queryBuilder = $this->_em->createQueryBuilder();
        $query = $queryBuilder
            ->select('a.post')
            ->from('YosimitsoWorkingForumBundle:PostVote', 'a')
            ->where('a.thread = :thread')
            ->andWhere('a.user = :user')
            ->setParameter('thread', $thread)
            ->setParameter('user', $user)
            ->getQuery()
        ;

        return $query->getScalarResult();
    }
}
