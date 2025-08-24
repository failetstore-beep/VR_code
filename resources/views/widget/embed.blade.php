<!DOCTYPE html>
<html lang="en">
<head><meta charset="UTF-8"><title>Embed Widget</title></head>
<body style="margin:0">
<iframe src="{{ url('/w/'.$embed->product->slug) }}?lang={{ $embed->lang_default ?? 'en' }}" style="border:0;width:100%;height:100vh;"></iframe>
</body>
</html>
