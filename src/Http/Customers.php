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
 * @author Vincent Klaiber <vincent@hoy.se>
 */
final class Customers extends AbstractClient
{
    /**
     * Authenticate a customer.
     *
     * @param array $params
     *
     * @return mixed|\Psr\Http\Message\ResponseInterface
     */
    public function authenticate(array $params)
    {
        return $this->post('authentication', ['json' => $params]);
    }

    /**
     * Create a new customer.
     *
     * @param array $params
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function create($params = [])
    {
        return $this->post('customers', ['json' => $params]);
    }

    /**
     * Update a customer.
     *
     * @param array $params
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function update($id, $params = [])
    {
        return $this->post('customers/'.$id, ['json' => $params]);
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

    /**
     * Delete a customer by their id.
     *
     * @param int $id
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function remove($id)
    {
        return $this->delete('customers/'.$id);
    }
}
