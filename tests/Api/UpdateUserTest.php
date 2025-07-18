<?php
use PHPUnit\Framework\TestCase;
use Tests\Api\ApiClient;

class UpdateUserTest extends TestCase
{
    private $userId;

    protected function setUp(): void
    {
        $response = ApiClient::client()->post('users', [
            'json' => [
                'name' => 'User Before Update',
                'email' => 'update' . time() . '@mail.com',
                'gender' => 'male',
                'status' => 'active'
            ]
        ]);
        $this->userId = json_decode($response->getBody(), true)['data']['id'];
    }

    public function testUpdateUserPositive()
    {
        $response = ApiClient::client()->put("users/{$this->userId}", [
            'json' => [
                'name' => 'User After Update',
                'status' => 'inactive'
            ]
        ]);
        $data = json_decode($response->getBody(), true);
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertEquals('User After Update', $data['data']['name']);
        $this->assertEquals('inactive', $data['data']['status']);
    }
}
