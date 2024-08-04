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

namespace Phalcon\Tests\Unit\Filter\Validation;

use Phalcon\Tests\UnitTestCase;
use Phalcon\Filter\Validation;
use Phalcon\Filter\Validation\Validator\Alpha;

final class AllowEmptyTest extends UnitTestCase
{
    /**
     * Tests Phalcon\Filter\Validation :: allowEmpty()
     *
     * @author Phalcon Team <team@phalcon.io>
     * @since  2021-11-07
     */
    public function testFilterValidationAllowEmptyFalse(): void
    {
        $data       = ['name' => ''];
        $validation = new Validation();
        $validator  = new Alpha(['allowEmpty' => false]);
        $validation->add('name', $validator);
        $messages = $validation->validate($data);

        $this->assertCount(0, $messages);
    }

    public function testFilterValidationAllowEmptyTrue(): void
    {
        $data       = ['name' => ''];
        $validation = new Validation();
        $validator  = new Alpha(['allowEmpty' => true]);
        $validation->add('name', $validator);
        $messages = $validation->validate($data);

        $this->assertCount(0, $messages);
    }
}