<?php
namespace W360\Masiv\Notifications\Tests;

use W360\Masiv\MasivServiceProvider;
use W360\Masiv\Notifications\MasivChannelServiceProvider;
use Orchestra\Testbench\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{

    /**
     * @param $app
     * @return void
     */
    protected function getEnvironmentSetUp($app)
    {
        $app['config']->set('masiv.api_key', 'my_api_key');
        $app['config']->set('masiv.api_secret', 'my_secret');
    }


    /**
     * Setup the test environment.
     *
     * @return void
     * @throws \Exception
     */
    protected function setUp(): void
    {
        parent::setUp();
    }

    /**
     * Clean up the testing environment before the next test.
     *
     * @return void
     *
     * @throws \Mockery\Exception\InvalidCountException
     */
    public function tearDown(): void
    {
        parent::tearDown();
    }

    /**
     * Get package providers.
     *
     * @param \Illuminate\Foundation\Application $app
     * @return array<int, class-string>
     */
    protected function getPackageProviders($app)
    {
        return [
            MasivServiceProvider::class,
            MasivChannelServiceProvider::class
        ];
    }

}