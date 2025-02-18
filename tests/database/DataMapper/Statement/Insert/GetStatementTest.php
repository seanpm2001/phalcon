<?php

/**
 * This file is part of the Phalcon Framework.
 *
 * (c) Phalcon Team <team@phalcon.io>
 *
 * For the full copyright and license information, please view the LICENSE.txt
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Phalcon\Tests\Database\DataMapper\Statement\Insert;

use PDO;
use Phalcon\DataMapper\Statement\Insert;
use Phalcon\Tests\AbstractDatabaseTestCase;

use function env;

final class GetStatementTest extends AbstractDatabaseTestCase
{
    /**
     * Database Tests Phalcon\DataMapper\Statement\Insert :: getStatement()
     *
     * @since  2020-01-20
     *
     * @group  common
     */
    public function testDmStatementInsertGetStatement(): void
    {
        $driver = env('driver');
        $insert = Insert::new($driver);

        $insert
            ->into('co_invoices')
            ->columns(['inv_cst_id', 'inv_total' => 'total'])
            ->set('inv_id', null)
            ->set('inv_status_flag', 1)
            ->set('inv_created_date', 'NOW()')
            ->columns(['inv_cst_id' => 1])
            ->returning(['inv_id', 'inv_cst_id'])
            ->returning(['inv_total'])
        ;

        $expected = 'INSERT INTO co_invoices ('
            . $insert->quote($driver, 'inv_cst_id') . ', '
            . $insert->quote($driver, 'inv_total') . ', '
            . $insert->quote($driver, 'inv_id') . ', '
            . $insert->quote($driver, 'inv_status_flag') . ', '
            . $insert->quote($driver, 'inv_created_date')
            . ') VALUES ('
            . ':inv_cst_id, '
            . ':inv_total, '
            . 'NULL, '
            . '1, '
            . 'NOW()) '
            . 'RETURNING inv_id, inv_cst_id, inv_total';
        $actual   = $insert->getStatement();
        $this->assertSame($expected, $actual);

        $expected = [
            'inv_total'  => ['total', PDO::PARAM_STR],
            'inv_cst_id' => [1, PDO::PARAM_INT],
        ];
        $actual   = $insert->getBindValues();
        $this->assertSame($expected, $actual);

        $insert->resetReturning();

        $expected = 'INSERT INTO co_invoices ('
            . $insert->quote($driver, 'inv_cst_id') . ', '
            . $insert->quote($driver, 'inv_total') . ', '
            . $insert->quote($driver, 'inv_id') . ', '
            . $insert->quote($driver, 'inv_status_flag') . ', '
            . $insert->quote($driver, 'inv_created_date')
            . ') VALUES ('
            . ':inv_cst_id, '
            . ':inv_total, '
            . 'NULL, '
            . '1, '
            . 'NOW())';
        $actual   = $insert->getStatement();
        $this->assertSame($expected, $actual);

        $expected = 'co_invoices';
        $actual   = $insert->getTable();
        $this->assertSame($expected, $actual);
    }
}
