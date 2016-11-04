<?php

/*
 * This file is part of Caspeco.
 *
 (c) HOY Multimedia AB <info@hoy.se>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Hoy\Caspeco\Http;

/**
 * This is the customers class.
 *
 * @author Christoffer Rydberg <christoffer@rydberg.me>
 */
final class Subscriptions extends AbstractClient
{
    /**
     * Create a new subscription.
     *
     * @param array $params
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function create($params = [])
    {
        return $this->post('subscriptions', ['json' => $params]);
    }
}
