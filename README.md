CouchDB service provider for Silex
======================

## Example

```php
use Silex\Application;
use G\CouchDbServiceProvider;
use Doctrine\CouchDB\CouchDBClient;

$app = new Application();
$app['debug'] = true;

$app->register(new CouchDbServiceProvider(), [
    'cdb.hosts' => [
        'main' => [
            'host' => 'host',
            'port' => 5984,
            'user' => 'user',
            'password' => 'pass',
        ]
    ]
]);

$app->get("/", function() use ($app) {
    /** @var CouchDBClient $cdb  */
    $c1 = $app['cdb']('main', 'database1')->findDocument('doc1')->body['name'];
    $c2 = $app['cdb']('main', 'database2')->findDocument('doc2')->body['name'];

    return "Hola {$c1} {$c2}";
});

$app->run()
```
