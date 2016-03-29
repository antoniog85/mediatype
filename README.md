# Media types

## Collection+JSON

http://amundsen.com/media-types/collection/examples/

## Integration

### Silex

```
$app->after(function (Request $request, Response $response) use ($app) {
    $collectionJson = new \Antoniog85\MediaType\CollectionJson();
    $collectionJson->setVersion(getenv('API_VERSION'));
    $collectionJson->setHref($request->getUri());
    $collectionJson->setError($response);
    $collectionJson->setItems($response);

    return $app->json(
        $collectionJson->render(),
        $response->getStatusCode(),
        [
            'Access-Control-Allow-Origin' => '*',
            'Access-Control-Allow-Methods' => 'GET,POST,PUT,DELETE,OPTIONS',
            'Content-Type' => 'application/vnd.collection+json',
        ]
    );
});
```

### Lumen

```
class AfterMiddleware
{
    public function handle($request, Closure $next): Response
    {
        /** @var Response $response */
        $response = $next($request);
        $response->headers->add([
            'Access-Control-Allow-Origin' => '*',
            'Access-Control-Allow-Methods' => 'GET,POST,PUT,DELETE,OPTIONS',
            'Content-Type' => 'application/vnd.collection+json',
        ]);
        $collectionJson = new \Antoniog85\MediaType\CollectionJson();
        $collectionJson->setVersion(getenv('API_VERSION'));
        $collectionJson->setHref($request->getUri());
        $collectionJson->setError($response);
        $collectionJson->setItems($response);
        $response->setContent($collectionJson->render());
        return $response;
    }
}
```
