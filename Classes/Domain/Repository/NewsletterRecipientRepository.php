<?php

namespace Fab\NewsletterRecipients\Domain\Repository;

/*
 * This file is part of the Fab/NewsletterRecipients project under GPLv2 or later.
 *
 * For the full copyright and license information, please read the
 * LICENSE.md file that was distributed with this source code.
 */

use Fab\NewsletterRecipients\Domain\Model\NewsletterRecipient;
use TYPO3\CMS\Core\Database\ConnectionPool;
use TYPO3\CMS\Core\Database\Query\QueryBuilder;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Persistence\Repository;

/**
 * Class NewsletterRecipientRepository
 * @extends Repository<NewsletterRecipient>
 */
class NewsletterRecipientRepository extends Repository
{

    /**
     * @var string
     */
    protected $tableName = 'tx_newsletter_recipient';
    public function __construct(private \TYPO3\CMS\Core\Database\ConnectionPool $connectionPool)
    {
    }

    /**
     * @return void
     */
    public function deleteAllAction(): void
    {
        $this->getQueryBuilder()
            ->delete($this->tableName)
            ->executeQuery();
    }

    /**
     * @param string $email
     * @return bool
     */
    public function exists(string $email): bool
    {
        $query = $this->getQueryBuilder();
        $record = $query
            ->select('*')
            ->from($this->tableName)
            ->where(
                $this->getQueryBuilder()->expr()->eq(
                    'email',
                    $this->getQueryBuilder()->expr()->literal($email)
                )
            )
        ->executeQuery()
        ->fetchAssociative();
        return !empty($record);
    }

    /**
     * @return bool
     */
    public function insert(array $values): bool
    {
        $result = $this->getQueryBuilder()
            ->insert($this->tableName)
            ->values($values)
            ->executeQuery();
        return (bool)$result;
    }

    /**
     * @return object|QueryBuilder
     */
    protected function getQueryBuilder(): QueryBuilder
    {
        /** @var ConnectionPool $connectionPool */
        $connectionPool = $this->connectionPool;
        return $connectionPool->getQueryBuilderForTable($this->tableName);
    }

}
