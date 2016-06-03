<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Shared\Library\Storage\Adapter\KeyValue;

use Predis\Client;
use Predis\Connection\ConnectionException;
use Spryker\Shared\Config\Config;
use Spryker\Shared\Library\LibraryConstants;

/**
 * @property \Predis\Client $resource
 *
 * @method \Predis\Client getResource()
 */
abstract class Redis extends AbstractKeyValue
{

    /**
     * @throws \Predis\Connection\ConnectionException
     *
     * @return void
     */
    public function connect()
    {
        if (!$this->resource) {
            $resource = new Client($this->config);

            if (!$resource) {
                throw new ConnectionException($resource, 'Could not connect to redis server');
            }

            $this->resource = $resource;
        }
    }

    /**
     * close redis connection
     */
    public function __destruct()
    {
        $isPersistent = (bool)Config::get(LibraryConstants::YVES_STORAGE_SESSION_PERSISTENT_CONNECTION);

        if (!$isPersistent && $this->resource) {
            $this->resource->disconnect();
        }
    }

}
