<?php namespace App\Slack;

interface Command
{
    /**
     * Handle the Command
     *
     * @return array
     */
    public function handle();
}
