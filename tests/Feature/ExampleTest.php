<?php

it('returns a successful response for the root URL', function () {
    $response = $this->get('/');

    $response->assertStatus(200);
});

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

// it('returns a successful response for the detect API', function () {
//     $response = $this->get('/api/detect');

//     $response->assertStatus(200);
// });

it('returns a successful response for the detect IP API', function () {
    $response = $this->get('/api/detect/8.8.8.8');

    $response->assertStatus(200);
});
