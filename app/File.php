<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    static function setUp($project_id)
    {
        $html = new File();
        $html->project_id = $project_id;
        $html->type = 'html';
        $html->content = '';


        $css = new File();
        $css->project_id = $project_id;
        $css->type = 'css';
        $css->content = '';


        $js = new File();
        $js->project_id = $project_id;
        $js->type = 'javascript';
        $js->content = '';


        if ($html->save() &&
            $css->save() &&
            $js->save()) {
            return true;
        }
        return false;

    }
}
