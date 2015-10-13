<?php

/*
 * This file is part of Caspeco.
 *
 (c) Schimpanz Solutions <info@schimpanz.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Schimpanz\Caspeco\Http;

/**
 * This is the customers class.
 *
 * @author Vincent Klaiber <vincent@schimpanz.com>
 */
final class Customers extends AbstractClient
{
    /**
     * Create a new customer.
     *
     * @param array $params
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function create($params = [])
    {
        return $this->post('customers', ['form_params' => $params]);
    }

    /**
     * Get a customer by their id.
     *
     * @param int $id
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function find($id)
    {
        return $this->get('customers/'.$id);
    }
}
