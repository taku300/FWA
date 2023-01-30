<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Route;
use App\Models\Affiliation;

class Lifter extends Model
{
    use HasFactory;
    protected $fillable = [
        'first_name',
        'last_name',
        'first_name_kana',
        'last_name_kana',
        'gender',
        'category',
        'affiliation_id',
        'weight_class',
        'image_path',
        'performance',
        'birthday',
        'comment',
        'top_post_flag'
    ];

    public function affiliation()
    {
        return $this->belongsTo(Affiliation::class);
    }

    /**
     * コントローラー名取得
     */
    public function getRoute()
    {
        $controller = explode("@", Route::currentRouteAction());
        $controllerName = explode('\\', $controller[0]);
        $key = mb_substr($controllerName[3], 0, -10);

        return $key;
    }

    /**
     * 選手情報 取得
     * 
     * @return collection
     */
    public function getLifterList()
    {
        /**
         * トップページ用 選手情報
         * top_post_flag = 0 非掲載
         * top_post_flag = 1 掲載
         */
        if ($this->getRoute() == 'Top') {
            $query = Lifter::with('affiliation')->where('top_post_flag', 1)->orderBy('updated_at', 'DESC')->take(2)->get()->toArray();
            foreach ($query as $key => $value) {
                if ($key === array_key_first($query)) {
                    $firstQuery = $value;
                    $fname = $value['first_name_kana'];
                    $lname = $value['last_name_kana'];
                }
            }
            $subQuery = [
                'test' => ucfirst($this->NamePlace(mb_convert_kana($fname, "c"))),
                'test2' => ucfirst($this->NamePlace(mb_convert_kana($lname, "c")))
            ];
            $firstQuery = $firstQuery + $subQuery;
            return $firstQuery;
        }

        /**
         * お知らせページ用 選手情報 名前順
         */
        if ($this->getRoute() == 'Lifters') {
            return Lifter::with('lifters')->orderBy('last_name', 'DESC');
        }
    }

    /**
     * 英字変換
     */
    public function NamePlace($name)
    {

        $kana = array(
            'きゃ', 'きぃ', 'きゅ', 'きぇ', 'きょ',
            'ぎゃ', 'ぎぃ', 'ぎゅ', 'ぎぇ', 'ぎょ',
            'くぁ', 'くぃ', 'くぅ', 'くぇ', 'くぉ',
            'ぐぁ', 'ぐぃ', 'ぐぅ', 'ぐぇ', 'ぐぉ',
            'しゃ', 'しぃ', 'しゅ', 'しぇ', 'しょ',
            'じゃ', 'じぃ', 'じゅ', 'じぇ', 'じょ',
            'ちゃ', 'ちぃ', 'ちゅ', 'ちぇ', 'ちょ',
            'ぢゃ', 'ぢぃ', 'ぢゅ', 'ぢぇ', 'ぢょ',
            'つぁ', 'つぃ', 'つぇ', 'つぉ',
            'てゃ', 'てぃ', 'てゅ', 'てぇ', 'てょ',
            'でゃ', 'でぃ', 'でぅ', 'でぇ', 'でょ',
            'とぁ', 'とぃ', 'とぅ', 'とぇ', 'とぉ',
            'にゃ', 'にぃ', 'にゅ', 'にぇ', 'にょ',
            'ヴぁ', 'ヴぃ', 'ヴぇ', 'ヴぉ',
            'ひゃ', 'ひぃ', 'ひゅ', 'ひぇ', 'ひょ',
            'ふぁ', 'ふぃ', 'ふぇ', 'ふぉ',
            'ふゃ', 'ふゅ', 'ふょ',
            'びゃ', 'びぃ', 'びゅ', 'びぇ', 'びょ',
            'ヴゃ', 'ヴぃ', 'ヴゅ', 'ヴぇ', 'ヴょ',
            'ぴゃ', 'ぴぃ', 'ぴゅ', 'ぴぇ', 'ぴょ',
            'みゃ', 'みぃ', 'みゅ', 'みぇ', 'みょ',
            'りゃ', 'りぃ', 'りゅ', 'りぇ', 'りょ',
            'うぃ', 'うぇ', 'いぇ',
            'あ', 'い', 'う', 'え', 'お',
            'か', 'き', 'く', 'け', 'こ',
            'さ', 'し', 'す', 'せ', 'そ',
            'た', 'ち', 'つ', 'て', 'と',
            'な', 'に', 'ぬ', 'ね', 'の',
            'は', 'ひ', 'ふ', 'へ', 'ほ',
            'ま', 'み', 'む', 'め', 'も',
            'や', 'ゆ', 'よ',
            'ら', 'り', 'る', 'れ', 'ろ',
            'わ', 'ゐ', 'ゑ', 'を', 'ん',
            'が', 'ぎ', 'ぐ', 'げ', 'ご',
            'ざ', 'じ', 'ず', 'ぜ', 'ぞ',
            'だ', 'ぢ', 'づ', 'で', 'ど',
            'ば', 'び', 'ぶ', 'べ', 'ぼ',
            'ぱ', 'ぴ', 'ぷ', 'ぺ', 'ぽ'
        );

        $romaji  = array(
            'kya', 'kyi', 'kyu', 'kye', 'kyo',
            'gya', 'gyi', 'gyu', 'gye', 'gyo',
            'qwa', 'qwi', 'qwu', 'qwe', 'qwo',
            'gwa', 'gwi', 'gwu', 'gwe', 'gwo',
            'sya', 'syi', 'syu', 'sye', 'syo',
            'ja', 'jyi', 'ju', 'je', 'jo',
            'cha', 'cyi', 'chu', 'che', 'cho',
            'dya', 'dyi', 'dyu', 'dye', 'dyo',
            'tsa', 'tsi', 'tse', 'tso',
            'tha', 'ti', 'thu', 'the', 'tho',
            'dha', 'di', 'dhu', 'dhe', 'dho',
            'twa', 'twi', 'twu', 'twe', 'two',
            'nya', 'nyi', 'nyu', 'nye', 'nyo',
            'va', 'vi', 've', 'vo',
            'hya', 'hyi', 'hyu', 'hye', 'hyo',
            'fa', 'fi', 'fe', 'fo',
            'fya', 'fyu', 'fyo',
            'bya', 'byi', 'byu', 'bye', 'byo',
            'vya', 'vyi', 'vyu', 'vye', 'vyo',
            'pya', 'pyi', 'pyu', 'pye', 'pyo',
            'mya', 'myi', 'myu', 'mye', 'myo',
            'rya', 'ryi', 'ryu', 'rye', 'ryo',
            'wi', 'we', 'ye',
            'a', 'i', 'u', 'e', 'o',
            'ka', 'ki', 'ku', 'ke', 'ko',
            'sa', 'shi', 'su', 'se', 'so',
            'ta', 'chi', 'tsu', 'te', 'to',
            'na', 'ni', 'nu', 'ne', 'no',
            'ha', 'hi', 'fu', 'he', 'ho',
            'ma', 'mi', 'mu', 'me', 'mo',
            'ya', 'yu', 'yo',
            'ra', 'ri', 'ru', 're', 'ro',
            'wa', 'wyi', 'wye', 'wo', 'n',
            'ga', 'gi', 'gu', 'ge', 'go',
            'za', 'ji', 'zu', 'ze', 'zo',
            'da', 'ji', 'du', 'de', 'do',
            'ba', 'bi', 'bu', 'be', 'bo',
            'pa', 'pi', 'pu', 'pe', 'po'
        );

        return str_replace($kana, $romaji, $name);
    }
}
