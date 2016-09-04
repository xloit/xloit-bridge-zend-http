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

use Zend\Http\Response;

/**
 * A {@link ResponseAwareTrait} trait.
 *
 * @since   0.0.1
 * @package Xloit\Bridge\Zend\Http
 */
trait ResponseAwareTrait
{
    /**
     *
     *
     * @since 0.0.1
     * @var Response
     */
    protected $response;

    /**
     *
     *
     * @since 0.0.1
     * @return Response
     */
    public function getResponse()
    {
        return $this->response;
    }

    /**
     *
     *
     * @since 0.0.1
     *
     * @param Response $response
     *
     * @return static
     */
    public function setResponse(Response $response)
    {
        $this->response = $response;

        return $this;
    }
}
