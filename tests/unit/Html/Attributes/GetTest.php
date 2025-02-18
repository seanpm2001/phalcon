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
use Phalcon\Tests\AbstractUnitTestCase;

final class GetTest extends AbstractUnitTestCase
{
    /**
     * Tests Phalcon\Html\Attributes :: get()
     *
     * @author Phalcon Team <team@phalcon.io>
     * @since  2019-06-02
     */
    public function testHtmlAttributesGet(): void
    {
        $data = [
            'type'  => 'text',
            'class' => 'form-control',
            'name'  => 'q',
            'value' => '',
        ];

        $attributes = new Attributes($data);

        $expected = 'form-control';

        $this->assertSame(
            $expected,
            $attributes->get('class')
        );

        $this->assertSame(
            $expected,
            $attributes->get('CLASS')
        );

        $this->assertSame(
            $expected,
            $attributes->get('unknown', 'form-control')
        );
    }
}
