<?php

namespace Tests\Units;

use App\Contracts\LoggerInterface;
use App\Exception\InvalidLogLevelArgument;
use App\Helpers\App;
use App\Logger\Logger;
use App\Logger\LogLevel;
use PHPUnit\Framework\TestCase;

class LoggerTest extends TestCase
{
  /* @var Logger $logger */
  private $logger;

  public function setUp()
  {
    $this->logger = new Logger();
    parent::setUp();
  }

  public function testItImplementsTheLoggerInterface()
  {
    self::assertInstanceOf(LoggerInterface::class, new Logger);
  }

  public function testItCanCreateDifferentTypesOfLogLevel()
  {
    $this->logger->info("Testing Info Logs");
    $this->logger->error("Testing Error Logs");
    $this->logger->log(LogLevel::ALERT, "Testing ALERT Logs");
    $app = new App;

    $fileName = sprintf(
      "%s/%s-%s.log",
      $app->getLogPath(),
      'test',
      (new \DateTime)->format('j.n.Y'),
    );

    self::assertFileExists($fileName);

    $contentOfLogFile = file_get_contents($fileName);
    self::assertStringContainsString('Testing Info Logs', $contentOfLogFile);
    self::assertStringContainsString('Testing Error Logs', $contentOfLogFile);
    self::assertStringContainsString(LogLevel::ALERT, $contentOfLogFile);

    unlink($fileName);
    self::assertFileNotExists($fileName);
  }

  public function testItThrowsInvalidLogLevelArgumentExceptionWhenGivenAWrongLogLevel()
  {
    self::expectException(InvalidLogLevelArgument::class);
    $this->logger->log('invalid log level', 'invalid log level message');
  }
}
