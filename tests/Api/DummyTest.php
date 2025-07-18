<?php
use PHPUnit\Framework\TestCase;
use App\Dummy;

class DummyTest extends TestCase
{
    public function testSayHi()
    {
        $dummy = new Dummy();
        $this->assertEquals('Hi!', $dummy->sayHi());
    }
}
