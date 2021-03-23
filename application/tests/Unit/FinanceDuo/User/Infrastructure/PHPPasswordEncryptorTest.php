<?php

declare(strict_types=1);

use FinanceDuo\Users\Domain\Password;
use FinanceDuo\Users\Infrastructure\PHPPasswordEncryptor;

class PHPPasswordEncryptorTest extends TestCase
{
    public function testEncryptSuccess(): void
    {
        $encryptor = new PHPPasswordEncryptor();

        $password = $encryptor->encrypt('123456');

        $this->assertInstanceOf(Password::class, $password);
    }

    public function testVerifySuccess(): void
    {
        $encryptor = new PHPPasswordEncryptor();

        $hash = $encryptor->encrypt('123456');

        $password = new Password('123456');

        $verify = $encryptor->verify($password, $hash);

        $this->assertTrue($verify);
    }

    public function testVerifyWhenWrongPassword(): void
    {
        $encryptor = new PHPPasswordEncryptor();

        $hash = $encryptor->encrypt('123456');

        $password = new Password('78910');

        $verify = $encryptor->verify($password, $hash);

        $this->assertFalse($verify);
    }
}
