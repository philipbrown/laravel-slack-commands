<?php namespace App\Slack;

use App\User;
use Exception;

class Last10UsersCommand implements Command
{
    /**
     * @var string
     */
    private $token = 'oprterigw043tngj2303mdo2';

    /**
     * @var array
     */
    private $data;

    /**
     * @param array $data
     */
    public function __construct(array $data)
    {
        $this->data = $data;
    }

    /**
     * Handle the Command
     *
     * @return array
     */
    public function handle()
    {
        if (array_get($this->data, 'token') !== $this->token) {
            throw new Exception(sprintf('%s is an invalid token!', array_get($this->data, 'token')));
        }

        return [
            'text'   => 'Here are the last 10 users',
            'fields' => User::orderBy('created_at')->take(10)->get()->reduce(function ($carry, $user) {
                $carry->push([
                    'title' => 'id',
                    'value' => $user->id,
                    'short' => true
                ]);
                $carry->push([
                    'title' => 'name',
                    'value' => $user->name,
                    'short' => true
                ]);

                return $carry;
            }, collect())->all()
        ];
    }
}
