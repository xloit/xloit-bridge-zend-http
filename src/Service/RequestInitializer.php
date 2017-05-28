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

use Xloit\Bridge\Zend\Http\RequestAwareInterface;
use Xloit\Bridge\Zend\ServiceManager\AbstractServiceInitializer;
use Zend\Http\Request;

/**
 * A {@link RequestInitializer} class.
 *
 * @package Xloit\Bridge\Zend\Http\Service
 */
class RequestInitializer extends AbstractServiceInitializer
{
    /**
     *
     *
     * @return string
     */
    protected function getAwareInstanceInterface()
    {
        return RequestAwareInterface::class;
    }

    /**
     *
     *
     * @return string
     */
    protected function getInstanceInterface()
    {
        return Request::class;
    }

    /**
     *
     *
     * @return array
     */
    protected function getServiceNames()
    {
        return [
            'xloit.http.request',
            Request::class,
            'Request'
        ];
    }

    /**
     *
     *
     * @return array
     */
    protected function getMethods()
    {
        return [
            'getter' => 'getRequest',
            'setter' => 'setRequest'
        ];
    }
}
