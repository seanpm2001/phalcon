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

namespace Phalcon\Tests\Unit\Filter\Validation\Validator\StringLength\Max;

use Phalcon\Filter\Validation\Validator\StringLength\Max;
use Phalcon\Tests\AbstractUnitTestCase;

final class GetTemplatesTest extends AbstractUnitTestCase
{
    /**
     * Tests Phalcon\Filter\Validation\Validator\StringLength\Max :: getTemplates()
     *
     * @author Phalcon Team <team@phalcon.io>
     * @since  2019-05-23
     */
    public function testFilterValidationValidatorStringLengthMaxGetTemplates(): void
    {
        $validator = new Max();

        $this->assertTrue(is_array($validator->getTemplates()), 'Templates have to be a array');
        $this->assertCount(0, $validator->getTemplates(), 'templates count 0');

        $messageLastName  = "We don't like really long last names";
        $messageFirstName = "We don't like really long first names";

        $validator = new Max(
            [
                'max'      => [
                    'name_last'  => 50,
                    'name_first' => 40,
                ],
                'message'  => [
                    'name_last'  => $messageLastName,
                    'name_first' => $messageFirstName,
                ],
                'included' => [
                    'name_last'  => false,
                    'name_first' => true,
                ],
            ]
        );

        $this->assertTrue(is_array($validator->getTemplates()), 'Multi templates have to be an array');
        $this->assertSame(
            $messageLastName,
            $validator->getTemplate('name_last'),
            'Last name template'
        );
        $this->assertSame(
            $messageFirstName,
            $validator->getTemplate('name_first'),
            'First name template'
        );
    }
}
