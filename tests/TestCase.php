<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Nuwave\Lighthouse\Testing\MakesGraphQLRequests;
use Illuminate\Contracts\Config\Repository as ConfigRepository;
use Illuminate\Foundation\Testing\RefreshDatabase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;
    use MakesGraphQLRequests;
    use RefreshDatabase;

    /**
     * Return the full URL to the GraphQL endpoint.
     */
    protected function graphQLEndpointUrl(): string
    {
        /** @var \Illuminate\Contracts\Config\Repository $config */
        $config = app(ConfigRepository::class);

        return route($config->get('lighthouse.route.name'), ['organization' => 'teste']);
    }

    public function _getJson($uri, array $headers = [], $organization = null)
    {
        $organization ??= env('DEFAULT_ORGANIZATION', 'testing');

        return parent::getJson("/v1/{$organization}/{$uri}", $headers);
    }

    public function _postJson($uri, array $data = [], array $headers = [], $organization = null)
    {
        $organization ??= env('DEFAULT_ORGANIZATION', 'testing');

        return $this->postJson("v1/{$organization}/{$uri}", $data, $headers);
    }
}
