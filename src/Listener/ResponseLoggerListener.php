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

namespace Xloit\Bridge\Zend\Http\Listener;

use Xloit\Bridge\Zend\EventManager\Listener\AbstractListenerAggregate;
use Xloit\Bridge\Zend\Log\LoggerAwareTrait;
use Zend\EventManager\EventManagerInterface;
use Zend\Log\LoggerAwareInterface;
use Zend\Mvc\MvcEvent;
use Zend\Stdlib\RequestInterface as HttpRequest;

/**
 * A {@link ResponseLoggerListener} class.
 *
 * @package Xloit\Bridge\Zend\Http\Listener
 */
class ResponseLoggerListener extends AbstractListenerAggregate implements LoggerAwareInterface
{
    use LoggerAwareTrait;

    /**
     * Attach one or more listeners.
     * Implementors may add an optional $priority argument; the EventManager implementation will pass
     * this to the aggregate.
     *
     * @param EventManagerInterface $events
     * @param int                   $priority
     *
     * @return void
     */
    public function attach(EventManagerInterface $events, $priority = 1)
    {
        $this->listeners[] = $events->attach(
            MvcEvent::EVENT_FINISH,
            [
                $this,
                'logResponse'
            ],
            $priority
        );
        $this->listeners[] = $events->attach(
            MvcEvent::EVENT_FINISH,
            [
                $this,
                'shutdown'
            ],
            $priority
        );
    }

    /**
     *
     *
     * @param MvcEvent $event
     *
     * @return void
     */
    public function logResponse(MvcEvent $event)
    {
        /** @var $request \Zend\Http\PhpEnvironment\Request */
        $request = $event->getRequest();
        /** @var $response \Zend\Http\PhpEnvironment\Response */
        $response = $event->getResponse();

        if ($request instanceOf HttpRequest) {
            /** @var \Zend\Http\Header\ContentType $contentType */
            $contentType = $response->getHeaders()->get('Content-Type');
            $content     = $response->getContent();
            $messages    = [
                $request->getUri()->getHost() => [
                    'response' => [
                        'status_code'  => $response->getStatusCode(),
                        'content_type' => (!$contentType)
                            ? 'unknown' : $contentType->getMediaType(),
                        'content'      => $content
                    ]
                ]
            ];

            $this->getLogger()->debug('Response', $messages);
        }
    }

    /**
     *
     *
     * @return void
     */
    public function shutdown()
    {
        /** @noinspection PhpUndefinedMethodInspection */
        /** @noinspection ForeachSourceInspection */
        foreach ($this->getLogger()->getWriters() as $writer) {
            /** @noinspection PhpUndefinedMethodInspection */
            $writer->shutdown();
        }
    }
}
