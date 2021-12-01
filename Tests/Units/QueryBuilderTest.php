<?php

namespace Tests\Units;

use PHPUnit\Framework\TestCase;
use App\Database\QueryBuilder;

class QueryBuilderTest extends TestCase
{

  private $queryBuilder;

  public function setUp()
  {
    $this->queryBuilder = new QueryBuilder();
    parent::setUp();
  }

  public function testItCanCreateRecords()
  {
    $id = $this->queryBuilder->table('reports')
      ->create($data);
    self::assertNotNull($id);
  }

  public function testInCanPerfomRawQuery()
  {
    $result = $this->queryBuilder->raw('SELECT * FROM reports;');
    self::assertNotNull($result);
  }

  public function testItCanPerfomSelectQuery()
  {
    $result = $this->queryBuilder
      ->table('reports')
      ->select('*')
      ->where('id', 1)
      ->first();

    self::assertNotNull($result);
    self::assertSame(1, (int)$result->id);
  }

  public function testItCanPerfomSelectQueryWithMultipleWhereClause()
  {
    $results = $this->queryBuilder
      ->table('reports')
      ->select('*')
      ->where('id', 1)
      ->where('report_type', '=', 'Report Type 1')
      ->first();

    self::assertNotNull($results);
    self::assertSame(1, (int) $results->id);
    self::assertSame('Report Type 1', (string) $results->report_type);
  }
}
