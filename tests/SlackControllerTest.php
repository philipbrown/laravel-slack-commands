<?php

use Illuminate\Foundation\Testing\DatabaseMigrations;

class SlackControllerTest extends \TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function should_get_the_last_10_users()
    {
        Artisan::call('db:seed');

        $this->post('slack/last_10_users', ['token' => 'oprterigw043tngj2303mdo2']);

        $this->assertResponseOk();
    }
}
