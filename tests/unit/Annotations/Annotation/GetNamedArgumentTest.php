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

namespace Phalcon\Tests\Unit\Annotations\Annotation;

use Phalcon\Annotations\Annotation;
use Phalcon\Tests\AbstractUnitTestCase;

final class GetNamedArgumentTest extends AbstractUnitTestCase
{
    private $PHANNOT_T_ARRAY  = 308;
    private $PHANNOT_T_STRING = 303;

    /**
     * Tests Phalcon\Annotations\Annotation :: getNamedArgument()
     *
     * @author Jeremy PASTOURET <https://github.com/jenovateurs>
     * @since  2020-01-22
     */
    public function testAnnotationsAnnotationGetNamedArgument(): void
    {
        $value  = 'test';
        $value1 = 'test1';
        $value2 = 'test2';

        $oneExpr = [
            'type'  => $this->PHANNOT_T_STRING,
            'value' => $value,
        ];

        $twoExpr = [
            'type'  => $this->PHANNOT_T_STRING,
            'value' => $value1,
        ];

        $threeExpr = [
            'type'  => $this->PHANNOT_T_STRING,
            'value' => $value2,
        ];

        $name  = 'one_item';
        $name1 = 'two_item';
        $name2 = 'three_item';

        $exprName  = 'first_argument';
        $exprName1 = 'second_argument';

        $annotation = new Annotation([
            'name'      => 'NovAnnotation',
            'arguments' => [
                [
                    'name' => $exprName,
                    'expr' => [
                        'type'  => $this->PHANNOT_T_ARRAY,
                        'items' => [
                            [
                                'name' => $name,
                                'expr' => $oneExpr,
                            ],
                            [
                                'name' => $name1,
                                'expr' => $twoExpr,
                            ],
                        ],
                    ],
                ],
                [
                    'name' => $exprName1,
                    'expr' => [
                        'type'  => $this->PHANNOT_T_ARRAY,
                        'items' => [
                            [
                                'name' => $name2,
                                'expr' => $threeExpr,
                            ],
                        ],
                    ],
                ],
            ],
        ]);

        $result = [
            $name  => $value,
            $name1 => $value1,
        ];

        $this->assertSame($annotation->getNamedArgument($exprName), $result);

        $result1 = [
            $name2 => $value2,
        ];

        $this->assertSame($annotation->getNamedArgument($exprName1), $result1);
    }
}
