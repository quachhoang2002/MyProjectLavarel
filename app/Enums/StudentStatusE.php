<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class StudentStatusE extends Enum
{
    public const study=0;
    public const stop=1;
    public const reserve=2;

    public  static function arrayStatus():array{

        return [
            'Di Hoc'=>self::study,
            'Bo Hoc'=>self::stop,
            'Bao luu'=>self::reserve
        ];
    }

}
