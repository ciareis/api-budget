<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Nuwave\Lighthouse\Testing\MakesGraphQLRequests;
use Illuminate\Contracts\Config\Repository as ConfigRepository;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;
    use MakesGraphQLRequests;

    /**
     * Return the full URL to the GraphQL endpoint.
     */
    protected function graphQLEndpointUrl(): string
    {
        /** @var \Illuminate\Contracts\Config\Repository $config */
        $config = app(ConfigRepository::class);

        return route($config->get('lighthouse.route.name'), ['organization' => 'teste']);
    }
}
