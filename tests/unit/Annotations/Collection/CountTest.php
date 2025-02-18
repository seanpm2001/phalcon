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

namespace Phalcon\Tests\Unit\Annotations\Collection;

use Phalcon\Annotations\Collection;
use Phalcon\Tests\AbstractUnitTestCase;

final class CountTest extends AbstractUnitTestCase
{
    /**
     * Tests Phalcon\Annotations\Collection :: count()
     *
     * @author Jeremy PASTOURET <https://github.com/jenovateurs>
     * @since  2020-01-27
     */
    public function testAnnotationsCollectionCount(): void
    {
        $reflectionData = [
            [
                'name' => 'NovAnnotation',
            ],
            [
                'name' => 'NovAnnotation1',
            ],
        ];

        $collection = new Collection($reflectionData);

        $expected = count($reflectionData);
        $actual   = $collection->count();
        $this->assertSame($expected, $actual);
    }
}
