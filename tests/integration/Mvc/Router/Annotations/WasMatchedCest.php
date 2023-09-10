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

namespace Phalcon\Tests\Integration\Mvc\Router\Annotations;

use IntegrationTester;

/**
 * Class WasMatchedCest
 */
class WasMatchedCest
{
    /**
     * Tests Phalcon\Mvc\Router\Annotations :: wasMatched()
     *
     * @author Phalcon Team <team@phalcon.io>
     * @since  2018-11-13
     */
    public function mvcRouterAnnotationsWasMatched(IntegrationTester $I)
    {
        $I->wantToTest('Mvc\Router\Annotations - wasMatched()');
        $I->skipTest('Need implementation');
    }
}
