<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class Image extends Model
{
  protected $table = 'images';
  protected $fillable = [
   'url', 'forms_id'
  ];
public function product()
{
  return $this->belongsTo('upload\blog', 'forms_id');
}
}
