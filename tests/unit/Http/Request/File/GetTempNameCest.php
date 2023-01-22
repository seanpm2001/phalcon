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

namespace Phalcon\Tests\Unit\Http\Request\File;

use Page\Http;
use Phalcon\Http\Request\File;
use UnitTester;

use function dataDir;

class GetTempNameCest
{
    /**
     * Tests Phalcon\Http\Request\File :: getTempName()
     *
     * @author Phalcon Team <team@phalcon.io>
     * @since  2020-03-17
     */
    public function httpRequestFileGetTempName(UnitTester $I)
    {
        $I->wantToTest('Http\Request\File - getTempName()');

        $file = new File(
            [
                'name'     => 'test',
                'type'     => Http::HEADERS_CONTENT_TYPE_PLAIN,
                'tmp_name' => dataDir('/assets/images/example-jpg.jpg'),
                'size'     => 1,
                'error'    => 0,
            ]
        );

        $expected = dataDir('/assets/images/example-jpg.jpg');
        $actual   = $file->getTempName();
        $I->assertSame($expected, $actual);
    }
}