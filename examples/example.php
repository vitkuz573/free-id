<?php

declare(strict_types=1);

include __DIR__ . '/../vendor/autoload.php';

use Vitkuz573\FreeId\Parsers\Database\MySql;
use Vitkuz573\FreeId\Parsers\Database\PgSql;
use Vitkuz573\FreeId\Parsers\Database\Sqlite;
use Vitkuz573\FreeId\Parsers\File\Json;
use Vitkuz573\FreeId\Parsers\File\Xml;

const MYSQL_HOST = '127.0.0.1';
const MYSQL_PORT = '3306';
const MYSQL_DATABASE = 'test';
const MYSQL_TABLE = 'items';
const MYSQL_CREDENTIALS = ['username' => 'root', 'password' => 'root'];

const PGSQL_HOST = '127.0.0.1';
const PGSQL_PORT = '5432';
const PGSQL_DATABASE = 'test';
const PGSQL_TABLE = 'items';
const PGSQL_CREDENTIALS = ['username' => 'postgres', 'password' => 'postgres'];

const SQLITE_DATABASE = 'test.sqlite3';
const SQLITE_TABLE = 'items';

echo PHP_EOL;

$start_xml = microtime(true);
$xml = new Xml(__DIR__ . '/../tests/files/test.xml', 'node');
echo 'Free ID (XML): ' . $xml->find() . PHP_EOL;
$stop_xml = (microtime(true) - $start_xml);

$start_json = microtime(true);
$json = new Json(__DIR__ . '/../tests/files/test.json', 'nodes');
echo 'Free ID (JSON): ' . $json->find() . PHP_EOL;
$stop_json = (microtime(true) - $start_json);

$start_mysql = microtime(true);
$mysql = new MySql(MYSQL_HOST, MYSQL_PORT, MYSQL_DATABASE, MYSQL_TABLE, MYSQL_CREDENTIALS);
echo 'Free ID (MySQL): ' . $mysql->find() . PHP_EOL;
$stop_mysql = (microtime(true) - $start_mysql);

$start_pgsql = microtime(true);
$pgsql = new PgSql(PGSQL_HOST, PGSQL_PORT, PGSQL_DATABASE, PGSQL_TABLE, PGSQL_CREDENTIALS);
echo 'Free ID (PostgreSQL): ' . $pgsql->find() . PHP_EOL;
$stop_pgsql = (microtime(true) - $start_pgsql);

$start_sqlite = microtime(true);
$sqlite = new Sqlite(SQLITE_DATABASE, SQLITE_TABLE);
echo 'Free ID (SQLite): ' . $sqlite->find() . PHP_EOL;
$stop_sqlite = (microtime(true) - $start_sqlite);

echo PHP_EOL . 'The XML parser was executed in ' . $stop_xml . ' seconds';
echo PHP_EOL . 'The Json parser was executed in ' . $stop_json . ' seconds';
echo PHP_EOL . 'The MySQL parser was executed in ' . $stop_mysql . ' seconds';
echo PHP_EOL . 'The PostgreSQL parser was executed in ' . $stop_pgsql . ' seconds';
echo PHP_EOL . 'The SQLite parser was executed in ' . $stop_sqlite . ' seconds';

echo PHP_EOL;
