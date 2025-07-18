<?php
use PHPUnit\Framework\TestCase;
use Tests\Api\ApiClient;

class CreateUserTest extends TestCase
{
    public function testCreateUserPositive()
    {
        $response = ApiClient::client()->post('users', [
            'json' => [
                'name' => 'Create User',
                'email' => 'create' . time() . '@mail.com',
                'gender' => 'male',
                'status' => 'active'
            ]
        ]);

        $this->assertEquals(200, $response->getStatusCode());

        $data = json_decode($response->getBody(), true);

        $this->assertArrayHasKey('data', $data);
        $this->assertArrayHasKey('id', $data['data']);
    }
}
