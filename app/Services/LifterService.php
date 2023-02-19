<?php

namespace App\Services;

use App\Libs\Convert;
use App\Models\Lifter;
use Illuminate\Support\Facades\DB;

class LifterService
{
    public $lifter;

    /**
     * @param  \App\Models\Lifter  $lifter
     */
    public function __construct(Lifter $lifter)
    {
        $this->lifter = $lifter;
    }

    /**
     * Lifters画面用lifters list
     *
     * @param  int  $gender
     * @return array
     */
    public function getLiftersList($gender): array
    {
        $targetLifters = $this->lifter->getLifters()->where('gender', $gender)->orderBy('last_name_kana', 'DESC')->get()->toArray();
        $lifters = [];
        foreach ($targetLifters as $value) {
            $value['image_path'] = \Storage::url(\CommonConst::LIFTERS_FILE_PATH_NAME . $value['image_path']);
            $lifters[] = $this->addColumn($value);
        }
        return $lifters;
    }

    /**
     * top画面用lifters list
     *
     * @return array
     */
    public function getTopLifterList(): array
    {
        $lifters = $this->lifter->getTopLifter();
        $topLifters = [];
        foreach ($lifters as $value) {
            $value['image_path'] = \Storage::url(\CommonConst::LIFTERS_FILE_PATH_NAME . $value['image_path']);
            $topLifters[] = $this->addColumn($value);
        }
        return $topLifters;
    }

    public function getTopLifterNameList()
    {
        $lifters = $this->lifter->getLifters()->where('top_post_flag', 1)->get();
        $list = [];
        foreach ($lifters as $val) {
            $list[] = ['id' => $val['id']];
        }
        return $list;
    }

    public function getAllLifterNameList()
    {
        $lifters = $this->lifter->getLifters()->get();
        $list = [];
        foreach ($lifters as $val) {
            $list[] = ['id' => $val['id'], 'name' => $val['last_name'] . $val['first_name']];
        }
        return array_column($list, 'name', 'id');
    }

    /**
     * ヘボン式ローマ字を成形して追加したカラムへ格納
     *
     * @param  array  $value
     *
     * @return array
     */
    public function addColumn($value): array
    {
        $firstName = $this->codeConvert($value['first_name_kana']);
        $lastName = $this->codeConvert($value['last_name_kana']);
        $addColumn = [
            'first_name_hebon' => ucfirst(implode('', $firstName)),
            'last_name_hebon' => ucfirst(implode('', $lastName))
        ];
        return $value + $addColumn;
    }

    /**
     * ヘボン式ローマ字へ変換
     *
     * @param  string  $name
     *
     * @return array
     */
    public function codeConvert($name): array
    {
        $convertName = new Convert(mb_convert_kana($name, "Hc"));
        return $convertName->getHebon();
    }

    /**
     * @param  Illuminate\Http\Request  $request
     */
    public function createLifter($request)
    {
        DB::beginTransaction();
        try {
            $datas = $this->getDatas($request);
            $lifter = new Lifter($datas);
            $lifter->save();
        } catch (Exception $e) {
            DB::rollback();
            return back()->withInput();
        }
        DB::commit();
    }

    /**
     * @param  int  $id
     * @param  Illuminate\Http\Request  $request
     */
    public function updateLifter($id, $request)
    {
        DB::beginTransaction();
        try {
            $datas = $this->getDatas($request);
            $lifter = Lifter::find($id);
            \DeleteFile::deleteFilePath('image_path', $lifter);
            $lifter->update($datas);
        } catch (Exception $e) {
            DB::rollback();
            return back()->withInput();
        }
        DB::commit();
    }

    /**
     * @param  mixed  $file
     *
     * @return  mixed
     */
    public function getDatas($request): mixed
    {
        $datas = $request->all();
        $path = $request->file('image_path')->store('public/lifter-images');
        $datas['image_path'] = basename($path);
        return $datas;
    }
}
