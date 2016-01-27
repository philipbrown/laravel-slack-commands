<?php

Route::post('slack/{command}', [
    'as'   => 'slack.commands',
    'uses' => 'SlackController@commands'
]);
