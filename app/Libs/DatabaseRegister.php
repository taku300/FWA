<?

namespace App\Libs;

use Illuminate\Http\Request;

/**
 * 新規登録処理
 * 
 * @param  App\Models\**  $model
 * @param  array  $columns
 * @param  Illuminate\Http\Request  $request
 */
class DatabaseRegister
{
    public static function databaseRegister($model, $columns, $request)
    {
        foreach ($columns as $column) {
            if (str_pos($column, '_path' !== false) && !empty($request->$column)) {
                $path = $request->$column->store('public');
                $model->$column = basename($path);
            }
            if (str_pos($column, '_path' !== false) && empty($request->$column)) {
                $model->$column = $model->$column;
            }
            if (str_pos($column, '_path' === false)) {
                $model->$column = $request->$column;
            }
        }
        $model->save();
    }
}
