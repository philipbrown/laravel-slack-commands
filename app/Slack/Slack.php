<?php namespace App\Slack;

use Exception;

class Slack
{
    /**
     * Handle the Slack command
     *
     * @param string $command
     * @param array $body
     * @return array
     */
    public static function handle($command, array $body)
    {
        $class = sprintf('App\Slack\%sCommand', studly_case($command));

        if (class_exists($class)) {
            return (new $class($body))->handle();
        }

        throw new Exception(sprintf('%s is not a valid Slack command!', $command));
    }
}
