<?php

it('returns a successful response for the API root', function () {
    $response = $this->get('/api');

    $response->assertStatus(200)
        ->assertJsonStructure([
            'message',
            'version',
            'License',
            'website',
            'documentation',
            'github',
            'author',
        ]);
});
