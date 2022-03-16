<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder;

class Tracker extends Model
{
    use HasFactory;
    public $attributes = ['hits' => 0];
    protected $fillable = ['ip', 'date'];
    protected $table = 'trackers';

    public function get_browser_name($user_agent){
        $t = strtolower($user_agent);
        $t = " " . $t;
        if     (strpos($t, 'opera'     ) || strpos($t, 'opr/')     ) return 'Opera'            ;
        elseif (strpos($t, 'edge'      )                           ) return 'Edge'             ;
        elseif (strpos($t, 'chrome'    )                           ) return 'Chrome'           ;
        elseif (strpos($t, 'safari'    )                           ) return 'Safari'           ;
        elseif (strpos($t, 'firefox'   )                           ) return 'Firefox'          ;
        elseif (strpos($t, 'msie'      ) || strpos($t, 'trident/7')) return 'Internet Explorer';
        return 'Unkown';
    }

    public static function boot()
    {
        parent::boot();
        static::saving(function ($tracker){
            $tracker->visit_time = date('H:i:s');
            $tracker->browser = Tracker::get_browser_name($_SERVER['HTTP_USER_AGENT']);
            $tracker->hits++;
        });
    }

    public static function hit(){
        static::firstOrCreate([
           'ip'     => $_SERVER['REMOTE_ADDR'],
           'date' => date('Y-m-d'),
        ])->save();
    }
}
