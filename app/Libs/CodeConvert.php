<?

namespace App\Libs;

class CodeConvert
{
    public static function KanaConvert($str)
    {
        return mb_convert_kana($str, 'c');
    }
}
