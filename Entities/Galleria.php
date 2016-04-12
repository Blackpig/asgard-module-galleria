<?php namespace Modules\Galleria\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\Media\Support\Traits\MediaRelation;

class Galleria extends Model
{
    use MediaRelation;

    protected $table = 'galleria__galleries';
    protected $fillable = ['*'];
}
