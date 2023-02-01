<?php

namespace App\Libs;

/**
 * かなをヘボン式ローマ字に変換
 */

class Convert
{
    /**
     * かな、読み対応
     */
    public const KANA_ALPHABET_TABLE = [
        'あ' => 'a',  'い' => 'i',   'う' => 'u',   'え' => 'e',  'お' => 'o',
        'か' => 'ka', 'き' => 'ki',  'く' => 'ku',  'け' => 'ke', 'こ' => 'ko',
        'さ' => 'sa', 'し' => 'shi', 'す' => 'su',  'せ' => 'se', 'そ' => 'so',
        'た' => 'ta', 'ち' => 'chi', 'つ' => 'tsu', 'て' => 'te', 'と' => 'to',
        'な' => 'na', 'に' => 'ni',  'ぬ' => 'nu',  'ね' => 'ne', 'の' => 'no',
        'は' => 'ha', 'ひ' => 'hi',  'ふ' => 'hu',  'へ' => 'he', 'ほ' => 'ho',
        'ま' => 'ma', 'み' => 'mi',  'む' => 'mu',  'め' => 'me', 'も' => 'mo',
        'や' => 'ya', 'ゆ' => 'yu',  'よ' => 'yo',
        'ら' => 'ra', 'り' => 'ri',  'る' => 'ru',  'れ' => 're', 'ろ' => 'ro',
        'わ' => 'wa', 'ゐ' => 'i',   'ゑ' => 'e',   'を' => 'o',
        'が' => 'ga', 'ぎ' => 'gi',  'ぐ' => 'gu',  'げ' => 'ge', 'ご' => 'go',
        'ざ' => 'za', 'じ' => 'ji',  'ず' => 'zu',  'ぜ' => 'ze', 'ぞ' => 'zo',
        'だ' => 'da', 'ぢ' => 'ji',  'づ' => 'zu',  'で' => 'de', 'ど' => 'do',
        'ば' => 'ba', 'び' => 'bi',  'ぶ' => 'bu',  'べ' => 'be', 'ぼ' => 'bo',
        'ぱ' => 'pa', 'ぴ' => 'pi',  'ぷ' => 'pu',  'ぺ' => 'pe', 'ぽ' => 'po',
        'きゃ' => 'kya', 'きゅ' => 'kyu', 'きょ' => 'kyo',
        'しゃ' => 'sha', 'しゅ' => 'shu', 'しょ' => 'sho',
        'ちゃ' => 'cha', 'ちゅ' => 'chu', 'ちょ' => 'cho',
        'にゃ' => 'nya', 'にゅ' => 'nyu', 'にょ' => 'nyo',
        'ひゃ' => 'hya', 'ひゅ' => 'hyu', 'ひょ' => 'hyo',
        'みゃ' => 'mya', 'みゅ' => 'myu', 'みゅ' => 'myo',
        'りゃ' => 'rya', 'りゅ' => 'ryu', 'りょ' => 'ryo',
        'ぎゃ' => 'gya', 'ぎゅ' => 'gyu', 'ぎょ' => 'gyo',
        'じゃ' => 'ja',  'じゅ' => 'ju',  'じょ' => 'jo',
        'びゃ' => 'bya', 'びゅ' => 'byu', 'びょ' => 'byo',
        'ぴゃ' => 'pya', 'ぴゅ' => 'pyu', 'ぴょ' => 'pyo',
    ];

    /**
     * 変換不可　長音だけど読む
     * 部分一致変換
     */
    private const RARE_CASE = [
        'のうえ'   => 'noue',
        'こうちわ' => 'kouchiwa',
        'まつうら' => 'matsuura',
    ];

    /**
     * 先変換リスト
     *
     * @var array key: kana, value: hebon
     */
    private $rareCase;

    /**
     * 名前
     *
     * @var array
     */
    private $names;

    /**
     * コンストラクタ
     *
     * @param string|array $name
     * @param array $rareCase
     */
    public function __construct($name, $rareCase = [])
    {
        $this->rareCase = array_merge(self::RARE_CASE, $rareCase);
        $this->setName($name);
    }

    /**
     * 名前セット
     *
     * @param string|array $name
     * @return void
     */
    private function setName($name)
    {
        $arr_name = $name;
        if (!is_array($name) && is_string($name)) {
            $name = preg_replace('/　/', ' ', $name);
            $arr_name = explode(' ', $name);
        }

        $this->names = $arr_name;
    }

    /**
     * ヘボン式ローマ字取得
     *
     * @return array
     */
    public function getHebon()
    {
        if (!is_array($this->names)) false;

        $hebon = [];
        foreach ($this->names as $name) {
            $hebon[] = $this->convertNameToHebon($name);
        }

        return $hebon;
    }

    /**
     * 名前をヘボン式ローマ字に
     *
     * @param string $kanaName
     * @return string hebon name
     */
    private function convertNameToHebon($kanaName)
    {
        $kanaName = mb_convert_kana($kanaName, 'Hc');
        $kanaName = strtoupper($kanaName);

        $kanaName = $this->rareCaseCheck($kanaName);

        $alphabetName = '';
        $lastChar = [
            'kana'     => '',
            'alphabet' => ''
        ];

        for ($i = 0; $i < mb_strlen($kanaName, 'UTF-8'); $i++) {
            $indexChar = $this->indexChar($i, $kanaName);

            if ('ん' === $indexChar['kana']) {
                $indexChar['alphabet'] = $this->hatsuon($i, $kanaName);
            }

            if ('っ' === $indexChar['kana']) {
                $indexChar['alphabet'] = $this->sokuon($i, $kanaName);
            }

            if ('' !== $indexChar['alphabet']) {
                if ('' !== $lastChar['alphabet'] && !preg_match('/[a-z]/', $indexChar['kana'])) {
                    $indexChar['alphabet'] = $this->chouon($i, $kanaName, $lastChar, $indexChar);
                }

                $alphabetName .= $indexChar['alphabet'];
            }

            if (mb_strlen($indexChar['kana'], 'UTF-8') > 1) {
                $i++;
            }

            $lastChar = $indexChar;
        }

        return $alphabetName;
    }

    /**
     * 指定のインデックスの対応アルファベット取得
     *
     * @param int $index
     * @param string $kanaName
     * @return array kana and alphabet
     */
    private function indexChar($index, $kanaName)
    {
        if ($index + 1 < mb_strlen($kanaName, 'UTF-8')) {
            if (array_key_exists(mb_substr($kanaName, $index, 2, 'UTF-8'), self::KANA_ALPHABET_TABLE)) {
                return [
                    'kana'     => mb_substr($kanaName, $index, 2, 'UTF-8'),
                    'alphabet' => self::KANA_ALPHABET_TABLE[mb_substr($kanaName, $index, 2, 'UTF-8')]
                ];
            }
        }

        if (array_key_exists(mb_substr($kanaName, $index, 1, 'UTF-8'), self::KANA_ALPHABET_TABLE)) {
            return [
                'kana'     => mb_substr($kanaName, $index, 1, 'UTF-8'),
                'alphabet' => self::KANA_ALPHABET_TABLE[mb_substr($kanaName, $index, 1, 'UTF-8')]
            ];
        }

        if (preg_match('/[A-Z]/', mb_substr($kanaName, $index, 1, 'UTF-8'))) {
            return [
                'kana'     => mb_substr($kanaName, $index, 1, 'UTF-8'),
                'alphabet' => mb_substr($kanaName, $index, 1, 'UTF-8')
            ];
        }

        return [
            'kana'     => mb_substr($kanaName, $index, 1, 'UTF-8'),
            'alphabet' => ''
        ];
    }

    /**
     * 撥音対応「ん」
     *
     * @param int $index
     * @param string $kanaName
     * @return string M or N
     */
    private function hatsuon($index, $kanaName)
    {
        if ($index + 1 < mb_strlen($kanaName, 'UTF-8')) {
            $nextIndexChar = $this->indexChar($index + 1, $kanaName);

            $targets = [
                'b', 'm', 'p'
            ];

            if (in_array(mb_substr($nextIndexChar['alphabet'], 0, 1, 'UTF-8'), $targets, true)) {
                return 'm';
            }
        }

        return 'n';
    }

    /**
     * 促音「っ」
     *
     * @param int $index
     * @param string $kanaName
     * @return string T or next char
     */
    private function sokuon($index, $kanaName)
    {
        if ($index + 1 >= mb_strlen($kanaName, 'UTF-8')) return '';

        $nextIndexChar = $this->indexChar($index + 1, $kanaName);

        if (0 === strpos($nextIndexChar['alphabet'], 'ch', 0)) {
            return 't';
        }

        return mb_substr($nextIndexChar['alphabet'], 0, 1, 'UTF-8');
    }

    /**
     * 長音対応
     *
     * @param int $index
     * @param string $kanaName
     * @param array $lastChar last changed pair
     * @param array $indexChar now pair
     * @return string 
     */
    private function chouon($index, $kanaName, $lastChar, $indexChar)
    {
        $targets = [
            'aa',
            'uu',
            'ee',
            'oo',
            'ou'
        ];
        $join_char = $lastChar['alphabet'] . $indexChar['alphabet'];

        if ('お' === $indexChar['kana'] && $index + 1 === mb_strlen($kanaName, 'UTF-8')) {
            return $indexChar['alphabet'];
        }

        foreach ($targets as $target) {
            if (preg_match('/' . $target . '/', $join_char)) {
                return '';
            }
        }

        return $indexChar['alphabet'];
    }

    /**
     * 例外形処理
     *
     * @param string $kanaName
     * @return string change alphabet if match rare case
     */
    private function rareCaseCheck($kanaName)
    {
        foreach ($this->rareCase as $kana => $alphabet) {
            if (preg_match('/' . $kana . '/', $kanaName)) {
                return preg_replace('/' . $kana . '/', $alphabet, $kanaName);
            }
        }

        return $kanaName;
    }
}
