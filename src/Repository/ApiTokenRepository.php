<?php
namespace App\Repository;

use App\Entity\ApiToken;
use App\Entity\User;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method ApiToken|null find($id, $lockMode = null, $lockVersion = null)
 * @method ApiToken|null findOneBy(array $criteria, array $orderBy = null)
 * @method ApiToken[]    findAll()
 * @method ApiToken[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ApiTokenRepository extends ServiceEntityRepository
{
    private $currentDate;

    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ApiToken::class);

        $this->currentDate = new \DateTime();
    }

    public function findValidToken(string $apiToken)
    {
        $qb = $this->createQueryBuilder('a')
            ->where('a.token = :token')
            ->andWhere(':date < a.expiresAt')
            ->setParameter('token', $apiToken)
            ->setParameter('date', $this->currentDate);

        return $qb->getQuery()->getOneOrNullResult();
    }

    public function removeExpiredTokens()
    {
        $qb = $this->createQueryBuilder('a')
            ->delete()
            ->where(':date > a.expiresAt')
            ->setParameter('date', $this->currentDate);

        return $qb->getQuery()->execute();
    }
}
