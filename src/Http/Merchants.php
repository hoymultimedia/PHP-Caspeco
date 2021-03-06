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
 * This is the merchants class.
 *
 * @author Vincent Klaiber <vincent@hoy.se>
 */
final class Merchants extends AbstractClient
{
    /**
     * Create a new merchant.
     *
     * @param array $params
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function create($params = [])
    {
        return $this->post('merchants', ['json' => $params]);
    }

    /**
     * Get a merchant by their id.
     *
     * @param int $id
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function find($id)
    {
        return $this->get('merchants/'.$id);
    }
}
