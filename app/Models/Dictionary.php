<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dictionary extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    // Search pada Admin Data Kamus
    public function scopeSearching($query, $keyword)
    {
        $query->when($keyword, function ($query, $keyword) {
            return $query->where('ngoko', 'like', '%' . $keyword . '%')
                ->orWhere('krama', 'like', '%' . $keyword . '%');
        });
    }

    // Search pada homepage - kamus
    public function scopeSearching2($query, $keyword)
    {
        if ($keyword) {
            return $query->where(function ($query) use ($keyword) {
                $query->where('ngoko', '=', $keyword)
                    ->orWhere('krama', '=', $keyword);
            });
        } else {
            return $query;
        }
    }
}
