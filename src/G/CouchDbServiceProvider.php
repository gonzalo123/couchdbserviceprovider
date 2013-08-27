<?php

namespace G;

use Silex\Application;
use Silex\ServiceProviderInterface;
use Doctrine\CouchDB\CouchDBClient;

class CouchDbServiceProvider implements ServiceProviderInterface
{
    public function register(Application $app)
    {
        $app['cdb'] = $app->protect(function ($db, $name) use ($app) {
            $conf = $app['cdb.hosts'][$db];

            $conf['dbname'] = $name;
            return CouchDBClient::create($conf);
        });
    }

    public function boot(Application $app)
    {
    }
}