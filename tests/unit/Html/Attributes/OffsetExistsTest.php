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

namespace Phalcon\Tests\Unit\Html\Attributes;

use Phalcon\Html\Attributes;
use Phalcon\Tests\UnitTestCase;

final class OffsetExistsTest extends UnitTestCase
{
    /**
     * Tests Phalcon\Html\Attributes :: offsetExists()
     *
     * @author Phalcon Team <team@phalcon.io>
     * @since  2019-06-02
     */
    public function testHtmlAttributesOffsetExists(): void
    {
        $data = [
            'type'  => 'text',
            'class' => 'form-control',
            'name'  => 'q',
            'value' => '',
        ];

        $attributes = new Attributes($data);

        $this->assertTrue(
            isset($attributes['class'])
        );

        $this->assertFalse(
            isset($attributes['unknown'])
        );

        $this->assertTrue(
            $attributes->offsetExists('class')
        );

        $this->assertFalse(
            $attributes->offsetExists('unknown')
        );
    }
}