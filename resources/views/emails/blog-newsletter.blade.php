<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>{{ $blog->title }}</title>
</head>
<body style="margin:0;padding:28px 20px;background:#ffffff;color:#252a26;font-family:Arial,Helvetica,sans-serif;font-size:16px;line-height:1.75;">
  <div style="max-width:600px;margin:0 auto;">
    <p style="margin:0 0 24px;">Hello,</p>
    <h1 style="margin:0 0 18px;font-family:Georgia,'Times New Roman',serif;font-size:28px;font-weight:normal;line-height:1.35;color:#18241d;">{{ $blog->title }}</h1>
    <p style="margin:0 0 22px;">{{ \Illuminate\Support\Str::limit(preg_replace('/\s+/', ' ', html_entity_decode(strip_tags($blog->content), ENT_QUOTES | ENT_HTML5, 'UTF-8')), 600) }}</p>
    <p style="margin:0 0 30px;"><a href="{{ $articleUrl }}" style="color:#315c46;text-decoration:underline;">Continue reading</a></p>
    <p style="margin:0;">Best,<br>Deveon team</p>
    <p style="margin:32px 0 0;font-size:12px;line-height:1.5;"><a href="{{ $unsubscribeUrl }}" style="color:#707770;text-decoration:underline;">Unsubscribe</a></p>
  </div>
</body>
</html>
