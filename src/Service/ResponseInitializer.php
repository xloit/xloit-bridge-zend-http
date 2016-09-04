<?php
/**
 * This source file is part of Xloit project.
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the MIT License that is bundled with this package in the file LICENSE.
 * It is also available through the world-wide-web at this URL:
 * <http://www.opensource.org/licenses/mit-license.php>
 * If you did not receive a copy of the license and are unable to obtain it through the world-wide-web,
 * please send an email to <license@xloit.com> so we can send you a copy immediately.
 *
 * @license   MIT
 * @link      http://xloit.com
 * @copyright Copyright (c) 2016, Xloit. All rights reserved.
 */

namespace Xloit\Bridge\Zend\Http\Service;

use Xloit\Bridge\Zend\Http\ResponseAwareInterface;
use Xloit\Bridge\Zend\ServiceManager\AbstractServiceInitializer;
use Zend\Http\Response;

/**
 * A {@link ResponseInitializer} class.
 *
 * @since   0.0.1
 * @package Xloit\Bridge\Zend\Http\Service
 */
class ResponseInitializer extends AbstractServiceInitializer
{
    /**
     *
     *
     * @since 0.0.1
     * @return string
     */
    protected function getAwareInstanceInterface()
    {
        return ResponseAwareInterface::class;
    }

    /**
     *
     *
     * @since 0.0.1
     * @return string
     */
    protected function getInstanceInterface()
    {
        return Response::class;
    }

    /**
     *
     *
     * @since 0.0.1
     * @return array
     */
    protected function getServiceNames()
    {
        return [
            'xloit.http.response',
            Response::class,
            'Response'
        ];
    }

    /**
     *
     *
     * @since 0.0.1
     * @return array
     */
    protected function getMethods()
    {
        return [
            'getter' => 'getResponse',
            'setter' => 'setResponse'
        ];
    }
}
