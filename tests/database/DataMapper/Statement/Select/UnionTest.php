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

namespace Phalcon\Tests\Database\DataMapper\Statement\Select;

use Phalcon\DataMapper\Statement\Select;
use Phalcon\Tests\AbstractStatementTestCase;

use function env;

final class UnionTest extends AbstractStatementTestCase
{
    /**
     * Database Tests Phalcon\DataMapper\Statement\Select :: union()
     *
     * @since  2020-01-20
     *
     * @group  common
     */
    public function testDmStatementSelectUnion(): void
    {
        $driver = env('driver');
        $select = Select::new($driver);

        $select
            ->from('co_invoices')
            ->where('inv_id = 1')
            ->union()
            ->from('co_invoices')
            ->where('inv_id = 2')
            ->union()
            ->from('co_invoices')
            ->where('inv_id = 3')
        ;

        $expected = 'SELECT * FROM co_invoices WHERE inv_id = 1 UNION '
            . 'SELECT * FROM co_invoices WHERE inv_id = 2 UNION '
            . 'SELECT * FROM co_invoices WHERE inv_id = 3';
        $actual   = $select->getStatement();
        $this->assertSame($expected, $actual);
    }
}
