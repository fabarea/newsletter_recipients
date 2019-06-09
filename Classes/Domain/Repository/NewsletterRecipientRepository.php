<?php

namespace Fab\NewsletterRecipients\Domain\Repository;

/*
 * This file is part of the Fab/NewsletterRecipients project under GPLv2 or later.
 *
 * For the full copyright and license information, please read the
 * LICENSE.md file that was distributed with this source code.
 */

use TYPO3\CMS\Core\Database\ConnectionPool;
use TYPO3\CMS\Core\Database\Query\QueryBuilder;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;

/**
 * Class NewsletterRecipientRepository
 */
class NewsletterRecipientRepository extends ActionController
{

    /**
     * @var string
     */
    protected $tableName = 'tx_newsletter_recipient';

    /**
     * @return void
     */
    public function deleteAllAction(): void
    {
        $this->getQueryBuilder()
            ->delete($this->tableName)
            ->execute();
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
        ->execute()
        ->fetch();
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
            ->execute();
        return (bool)$result;
    }

    /**
     * @return object|QueryBuilder
     */
    protected function getQueryBuilder(): QueryBuilder
    {
        /** @var ConnectionPool $connectionPool */
        $connectionPool = GeneralUtility::makeInstance(ConnectionPool::class);
        return $connectionPool->getQueryBuilderForTable($this->tableName);
    }

}
