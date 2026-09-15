<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>{{ $blog->title }}</title>
</head>
<body style="margin:0;padding:24px;background:#ffffff;color:#222222;font-family:Arial,Helvetica,sans-serif;font-size:16px;line-height:1.7;">
  <div style="max-width:620px;margin:0 auto;">
    <p>Hello,</p>
    <p>We have a new article on Deveon Insights:</p>
    <h1 style="font-size:24px;line-height:1.3;">{{ $blog->title }}</h1>
    <p>{{ \Illuminate\Support\Str::limit(preg_replace('/\s+/', ' ', html_entity_decode(strip_tags($blog->content), ENT_QUOTES | ENT_HTML5, 'UTF-8')), 600) }}</p>
    <p><a href="{{ $articleUrl }}">Read the full article</a></p>
    <p>Deveon Insights</p>
    <p style="margin-top:32px;font-size:12px;color:#666666;">You received this email because you subscribed to Deveon Insights.<br>
      <a href="{{ $unsubscribeUrl }}">Unsubscribe</a>
    </p>
  </div>
</body>
</html>
