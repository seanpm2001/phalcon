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

use Phalcon\Annotations\Annotation;
use Phalcon\Annotations\Collection;
use Phalcon\Tests\AbstractUnitTestCase;

final class KeyNextRewindTest extends AbstractUnitTestCase
{
    /**
     * Tests Phalcon\Annotations\Collection :: key() / next() / rewind()
     *
     * @author Jeremy PASTOURET <https://github.com/jenovateurs>
     * @since  2020-01-31
     */
    public function testAnnotationsCollectionKeyNextRewind(): void
    {
        $dataAnnotation = [
            'name' => 'NovAnnotation',
        ];

        $dataAnnotation1 = [
            'name' => 'Phalconatation',
        ];

        $reflectionData = [
            $dataAnnotation,
            $dataAnnotation1,
        ];

        $collection  = new Collection($reflectionData);
        $annotation  = new Annotation($dataAnnotation);
        $annotation1 = new Annotation($dataAnnotation1);

        $expected = 0;
        $actual   = $collection->key();
        $this->assertSame($expected, $actual);

        $expected = $annotation;
        $actual   = $collection->current();
        $this->assertEquals($expected, $actual);

        $collection->next();

        $expected = 1;
        $actual   = $collection->key();

        $this->assertSame($expected, $actual);
        $expected = $annotation1;
        $actual   = $collection->current();
        $this->assertEquals($expected, $actual);

        $collection->rewind();

        $expected = 0;
        $actual   = $collection->key();
        $this->assertSame($expected, $actual);

        $expected = $annotation;
        $actual   = $collection->current();
        $this->assertEquals($expected, $actual);
    }
}
