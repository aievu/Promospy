<?php

namespace App\Enums;

enum ProductCategoryEnum: int
{
    case ELETRONIC = 1;
    case FASHION = 2;
    case HOME_AND_DECORATION = 3;
    case BEAUTY_AND_SELF_CARE = 4;
    case GIFT_CARD = 5;

    public function label(): string {
        return match ($this) {
            self::ELETRONIC => '<i class="fa-solid fa-mobile-screen"></i>Eletronic',
            self::FASHION => '<i class="fa-solid fa-shirt"></i>Fashion',
            self::HOME_AND_DECORATION => '<i class="fa-solid fa-house"></i>Home and Decoration',
            self::BEAUTY_AND_SELF_CARE => '<i class="fa-solid fa-face-smile-beam"></i>Beauty and Self Care',
            self::GIFT_CARD => '<i class="fa-solid fa-gift"></i>Gift Card'
        };
    }

    public function color(): String {
        return match ($this) {
            self::ELETRONIC => 'rgba(0, 155, 175, 0.5)',
            self::FASHION => 'rgba(175, 0, 53, 0.5)',
            self::HOME_AND_DECORATION => 'rgba(0, 168, 70, 0.5)',
            self::BEAUTY_AND_SELF_CARE => 'rgba(52, 0, 148, 0.5)',
            self::GIFT_CARD => 'rgba(177, 0, 0, 0.5)'
        };
    }

    public static function fromValue(int $value): ?self
    {
        return collect(self::cases())->firstWhere('value', $value);
    }
}
