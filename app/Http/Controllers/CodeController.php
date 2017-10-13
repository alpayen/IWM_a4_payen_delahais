<?php

namespace App\Http\Controllers;

use App\File;
use App\Project;
use Illuminate\Http\Request;

class CodeController extends Controller
{

    public function saveCode(Request $request)
    {
        $body = $request->body;
        $file = File::where('project_id', $body['project_id'])
        ->where('type', $body['type'])->first();
        if ($file) {
            $file->content = $this->treatContent($body['content']);
            $file->update();
            return response('Content Saved', 200)
                ->header('Content-Type', 'text/plain');
        } else {
            return response('File not found', 404)
                ->header('Content-Type', 'text/plain');
        }
    }

    public function getCode($project_id, $type)
    {
        $content = File::where('project_id', $project_id)
            ->where('type', $type)->first();
        return $content->content;
    }

    /**
     * Remove php related markups
     * @param string
     * @return string
     */

    private function treatContent($string)
    {
        $forbiddenChars = ['<?php', '?>', '<?=', '{{', '}}'];
        foreach ($forbiddenChars as $char) {
            $string = str_replace($char, '(Looks like php to me)', $string);
        }
        return $string;

    }
}
