<?php

/*
 * This file is part of Caspeco.
 *
 (c) HOY Multimedia AB <info@hoy.se>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Hoy\Caspeco;

use Hoy\Caspeco\Http\Cards;
use Hoy\Caspeco\Http\Charges;
use Hoy\Caspeco\Http\Customers;
use Hoy\Caspeco\Http\Merchants;
use Hoy\Caspeco\Http\Subscriptions;
use InvalidArgumentException;

/**
 * This is the Caspeco class.
 *
 * @author Vincent Klaiber <vincent@hoy.se>
 */
class Caspeco
{
    /**
     * The config array.
     *
     * @var array
     */
    protected $config;

    /**
     * Create a new Caspeco instance.
     *
     * @param array $config
     *
     * @return void
     */
    public function __construct(array $config = [])
    {
        $this->config = $this->getConfig($config);
    }

    /**
     * Get the cards endpoint.
     *
     * @return \Hoy\Caspeco\Http\Cards
     */
    public function cards()
    {
        return new Cards($this->config);
    }

    /**
     * Get the charges endpoint.
     *
     * @return \Hoy\Caspeco\Http\Charges
     */
    public function charges()
    {
        return new Charges($this->config);
    }

    /**
     * Get the customers endpoint.
     *
     * @return \Hoy\Caspeco\Http\Customers
     */
    public function customers()
    {
        return new Customers($this->config);
    }

    /**
     * Get the merchants endpoint.
     *
     * @return \Hoy\Caspeco\Http\Merchants
     */
    public function merchants()
    {
        return new Merchants($this->config);
    }

    /**
     * Get the subscriptions endpoint.
     *
     * @return \Hoy\Caspeco\Http\Subscriptions
     */
    public function subscriptions()
    {
        return new Subscriptions($this->config);
    }

    /**
     * Get the configuration data.
     *
     * @param array $config
     *
     * @throws \InvalidArgumentException
     *
     * @return array
     */
    protected function getConfig(array $config)
    {
        $keys = ['id', 'secret'];

        foreach ($keys as $key) {
            if (!array_key_exists($key, $config)) {
                throw new InvalidArgumentException("Missing configuration key [$key].");
            }
        }

        if (!array_key_exists('url', $config)) {
            $config['url'] = 'https://pay.caspeco.net';
        }

        return array_only($config, ['id', 'secret', 'url']);
    }
}
