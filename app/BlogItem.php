<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\BlogItem
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string $title
 * @property string $fulltext
 * @property string $description
 * @property string $image
 * @method static \Illuminate\Database\Eloquent\Builder|BlogItem newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BlogItem newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BlogItem query()
 * @method static \Illuminate\Database\Eloquent\Builder|BlogItem whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BlogItem whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BlogItem whereFulltext($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BlogItem whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BlogItem whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BlogItem whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BlogItem whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class BlogItem extends Model
{
    //
}
