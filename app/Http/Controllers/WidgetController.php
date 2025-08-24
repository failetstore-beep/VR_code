<?php
namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Embed;

class WidgetController extends Controller
{
    public function show($slug)
    {
        $product = Product::where('slug', $slug)->firstOrFail();
        return view('widget.shell', compact('product'));
    }

    public function embed($token)
    {
        $embed = Embed::with('product')->where('token', $token)->firstOrFail();
        return view('widget.embed', compact('embed'));
    }

    public function embedJs($token)
    {
        $embed = Embed::where('token', $token)->firstOrFail();
        $url = url('/embed/' . $embed->token);
        $script = <<<'JS'
(function(){
  var root = document.getElementById('augmira-widget');
  if(!root){ return; }
  var btn = document.createElement('button');
  btn.textContent = 'Try On';
  btn.onclick = function(){
    var iframe = document.createElement('iframe');
    iframe.src = '{$url}';
    iframe.style = 'position:fixed;top:0;left:0;width:100%;height:100%;border:0;z-index:9999';
    var close = function(){ document.body.removeChild(iframe); };
    iframe.addEventListener('load', function(){
      iframe.contentWindow.addEventListener('keydown', function(e){ if(e.key==='Escape'){ close(); } });
    });
    document.body.appendChild(iframe);
  };
  root.appendChild(btn);
})();
JS;
        return response($script, 200)->header('Content-Type', 'application/javascript');
    }
}
