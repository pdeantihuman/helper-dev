<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Article
 *
 * @property int $id
 * @property string $title
 * @property string $body
 * @property int $leftChild
 * @property int $rightChild
 * @property int $isRoot
 * @property int|null $root
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read mixed $parent_id
 * @method static \Illuminate\Database\Eloquent\Builder|Article where(string $column, mixed $operator = null, $value = null, string $boolean = 'and')
 * @method static Article findOrFail($id)
 * @method static \Illuminate\Database\Eloquent\Builder getModel()
 */
class Article extends Model
{
    protected $fillable = ['title','body','root','rightChild','leftChild','isRoot'];

    public function getParentIdAttribute(){
        return Article::where('leftChild',$this->id)
            ->orWhere('rightChild',$this->id)
            ->first()->id;
    }
}
