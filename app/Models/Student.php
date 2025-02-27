<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'biologi',
        'fisika',
        'kimia',
        'mtk',
        'bindo',
        'bing',
        'rata_rata',
    ];
}