<?php
use PHPUnit\Framework\TestCase;
use Tests\Api\ApiClient;

class DeleteUserTest extends TestCase
{
    private $userId;

    protected function setUp(): void
    {
        $response = ApiClient::client()->post('users', [
            'json' => [
                'name' => 'Delete Me',
                'email' => 'delete' . time() . '@mail.com',
                'gender' => 'female',
                'status' => 'active'
            ]
        ]);
        $this->userId = json_decode($response->getBody(), true)['data']['id'];
    }

    public function testDeleteUserPositive()
    {
        $response = ApiClient::client()->delete("users/{$this->userId}");
        $this->assertEquals(200, $response->getStatusCode());
    }

    public function testDeleteUserNegative()
    {
        $response = ApiClient::client()->delete("users/0");
        $data = json_decode($response->getBody(), true);
        $this->assertEquals(404, $data['code']);
    }
}
