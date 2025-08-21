<?php

use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;
use SAlexsan\TaskManager\Traits\HasFormattedDate;

class HasFormatterDateTest extends TestCase
{
    use HasFormattedDate;

    #[DataProvider('providerFormatData')]
    public function testFormatDate(string $expected, DateTime $dateTime, string $format)
    {
        $dateFormated = $this->formatDate($dateTime, $format);

        static::assertEquals($expected, $dateFormated);
    }

    public static function providerFormatData(): array
    {
        return [
            ['2025-01-01', new \DateTime('2025-01-01 15:30:00'), 'Y-m-d'],
            ['01/01/2025', new \DateTime('2025-01-01 15:30:00'), 'd/m/Y'],
            ['15:30', new \DateTime('2025-01-01 15:30:00'), 'H:i'],
            ['01-01-25', new \DateTime('2025-01-01 15:30:00'), 'd-m-y'],
            ['Wednesday', new \DateTime('2025-01-01 15:30:00'), 'l'],
            ['2025-08-21 19:00', new \DateTime('2025-08-21 19:00:00'), 'Y-m-d H:i'],
        ];
    }
}