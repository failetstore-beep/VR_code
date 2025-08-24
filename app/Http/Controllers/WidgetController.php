<?php
namespace App\Http\Controllers;

class WidgetController
{
    public function show($slug)
    {
        return "Widget for {$slug}";
    }

    public function embed($token)
    {
        return "Embed widget {$token}";
    }

    public function embedJs($token)
    {
        return "// JS for embed {$token}";
    }
}
