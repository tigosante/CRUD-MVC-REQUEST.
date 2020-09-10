<?php

namespace core\Interfaces\Pagination;

use core\Interfaces\{
  QuerySql\QuerySqlInterface,
  DataDB\FindAllDataInterface
};
use core\interfaces\Helpers\SetDataHelper;

interface PaginationInterface extends SetDataHelper
{
  public function __construct(QuerySqlInterface $querySqlInterface, FindAllDataInterface $findAllDataInterface);

  public function init(int $paginationInit = null): self;
  public function amount(int $paginationAmount = null): self;
  public function end(int $paginationEnd = null): self;

  public function findAll(array $tableColumns = null): array;
  public function select(array $tableColumns = null): QuerySqlInterface;
  public function where(string $condition): FindAllDataInterface;
}
