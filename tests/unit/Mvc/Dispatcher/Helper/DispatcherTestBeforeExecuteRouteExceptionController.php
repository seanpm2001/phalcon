<?php

namespace Phalcon\Tests\Unit\Mvc\Dispatcher\Helper;

use Exception;
use Phalcon\Mvc\Controller;

/**
 * \Phalcon\Tests\Unit\Mvc\Dispatcher\Helper\DispatcherTestBeforeExecuteRouteExceptionController
 * Dispatcher Controller for testing different dispatch scenarios
 *
 * @copyright (c) 2011-2017 Phalcon Team
 * @link          https://www.phalcon.io
 * @author        Andres Gutierrez <andres@phalcon.io>
 * @author        Nikolaos Dimopoulos <nikos@phalcon.io>
 *
 * The contents of this file are subject to the New BSD License that is
 * bundled with this package in the file docs/LICENSE.txt
 *
 * If you did not receive a copy of the license and are unable to obtain it
 * through the world-wide-web, please send an email to license@phalcon.io
 * so that we can send you a copy immediately.
 */
class DispatcherTestBeforeExecuteRouteExceptionController extends Controller
{
    public function beforeExecuteRoute()
    {
        $this->trace('beforeExecuteRoute-method');

        throw new Exception('beforeExecuteRoute exception occurred');
    }

    public function indexAction()
    {
        $this->trace('indexAction');
    }

    public function initialize()
    {
        $this->trace('initialize-method');
    }

    /**
     * Add tracing information into the current dispatch tracer
     */
    protected function trace($text)
    {
        $this->getDI()->getShared('dispatcherListener')->trace($text);
    }
}
