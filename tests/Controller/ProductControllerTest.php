<?php

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ProductControllerTest extends WebTestCase
{
    public function testEnvironment(): void
    {
        // Просто проверяем, что тестовое окружение работает
        $this->assertTrue(true);
    }
}