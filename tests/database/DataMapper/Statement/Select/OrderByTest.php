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

final class OrderByTest extends AbstractStatementTestCase
{
    /**
     * Database Tests Phalcon\DataMapper\Statement\Select :: orderBy()
     *
     * @since  2020-01-20
     *
     * @group  common
     */
    public function testDmStatementSelectOrderBy(): void
    {
        $driver = env('driver');
        $select = Select::new($driver);

        $select
            ->from('co_invoices')
            ->orderBy(
                [
                    'inv_cst_id',
                    'UPPER(inv_title)',
                ]
            )
        ;


        $expected = 'SELECT * FROM co_invoices '
            . 'ORDER BY inv_cst_id, UPPER(inv_title)';
        $actual   = $select->getStatement();
        $this->assertSame($expected, $actual);
    }
}
