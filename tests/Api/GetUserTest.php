<?php
use PHPUnit\Framework\TestCase;
use Tests\Api\ApiClient;

class GetUserTest extends TestCase
{
    private $userId;

    protected function setUp(): void
    {
        $response = ApiClient::client()->post('users', [
            'json' => [
                'name' => 'Fetch User',
                'email' => 'fetch' . time() . '@mail.com',
                'gender' => 'female',
                'status' => 'active'
            ]
        ]);
        $this->userId = json_decode($response->getBody(), true)['data']['id'];
    }

    public function testGetUserPositive()
    {
        $response = ApiClient::client()->get("users/{$this->userId}");
        $data = json_decode($response->getBody(), true);
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertEquals($this->userId, $data['data']['id']);
    }

    public function testGetUserNegative()
    {
        $response = ApiClient::client()->get("users/0");
        $data = json_decode($response->getBody(), true);
        $this->assertEquals(404, $data['code']);
    }
}
