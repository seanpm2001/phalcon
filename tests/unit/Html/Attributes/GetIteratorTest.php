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

final class GetIteratorTest extends AbstractUnitTestCase
{
    /**
     * Tests Phalcon\Html\Attributes :: getIterator()
     *
     * @author Phalcon Team <team@phalcon.io>
     * @since  2019-06-02
     */
    public function testHtmlAttributesGetIterator(): void
    {
        $data = [
            'type'  => 'text',
            'class' => 'form-control',
            'name'  => 'q',
            'value' => '',
        ];

        $attributes = new Attributes($data);

        foreach ($attributes as $key => $value) {
            $this->assertSame(
                $data[$key],
                $attributes[$key]
            );
        }
    }
}
