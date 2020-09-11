<?php

namespace core\SimpleORM\DataDB;

use core\Interfaces\DataDB\FindAllDataInterface;
use core\Interfaces\QuerySql\QuerySqlStringInterface;
use core\interfaces\Repository\RepositoryDataDBInterface;

class FindAllData implements FindAllDataInterface
{
  /**
   * @var QuerySqlStringInterface $querySqlStringInterface
   */
  private $querySqlStringInterface;

  /**
   * @var RepositoryDataDBInterface $repositoryDataDBInterface
   */
  private $repositoryDataDBInterface;

  public function __construct(QuerySqlStringInterface &$querySqlStringInterface, RepositoryDataDBInterface &$repositoryDataDBInterface)
  {
    $this->querySqlStringInterface = $querySqlStringInterface;
    $this->repositoryDataDBInterface = $repositoryDataDBInterface;
  }

  public function findAll(array $tableColumns = null): array
  {
    $this->querySqlStringInterface->setSelect($tableColumns);
    $this->repositoryDataDBInterface->setQuery($this->querySqlStringInterface->getSelect());

    return $this->repositoryDataDBInterface->getDataDB();
  }
}