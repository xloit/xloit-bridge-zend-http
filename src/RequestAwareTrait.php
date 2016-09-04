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

namespace Xloit\Bridge\Zend\Http;

use Zend\Http\Request;

/**
 * A {@link RequestAwareTrait} trait.
 *
 * @since   0.0.1
 * @package Xloit\Bridge\Zend\Http
 */
trait RequestAwareTrait
{
    /**
     *
     *
     * @since 0.0.1
     * @var Request
     */
    protected $request;

    /**
     *
     *
     * @since 0.0.1
     * @return Request
     */
    public function getRequest()
    {
        return $this->request;
    }

    /**
     *
     *
     * @since 0.0.1
     *
     * @param Request $request
     *
     * @return static
     */
    public function setRequest(Request $request)
    {
        $this->request = $request;

        return $this;
    }
}
