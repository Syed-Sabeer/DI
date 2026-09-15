<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>{{ $blog->title }}</title>
  <style>
    @media only screen and (max-width: 620px) {
      .email-body { padding: 28px 20px !important; }
      .email-title { font-size: 28px !important; }
    }
  </style>
</head>
<body style="margin:0;padding:0;background:#ffffff;color:#263028;font-family:Arial,Helvetica,sans-serif;">
  @php
    $summary = \Illuminate\Support\Str::limit(preg_replace('/\s+/', ' ', html_entity_decode(strip_tags($blog->content), ENT_QUOTES | ENT_HTML5, 'UTF-8')), 600);
    $publicDisk = \Illuminate\Support\Facades\Storage::disk('public');
    $coverPath = $blog->image && $publicDisk->exists($blog->image)
        ? $publicDisk->path($blog->image)
        : public_path(config('seo.defaultImage'));
    $coverUrl = is_file($coverPath) && is_readable($coverPath)
        ? $message->embed($coverPath)
        : asset(config('seo.defaultImage'));
  @endphp
  <table role="presentation" width="100%" cellspacing="0" cellpadding="0" border="0">
    <tr>
      <td class="email-body" align="center" style="padding:44px 24px;">
        <table role="presentation" width="560" cellspacing="0" cellpadding="0" border="0" style="width:100%;max-width:560px;">
          <tr>
            <td style="padding:0 0 24px;border-bottom:2px solid #b8e900;">
              <span style="font-family:Arial,Helvetica,sans-serif;font-size:28px;line-height:1.2;font-weight:700;letter-spacing:-1px;color:#18241d;">Deveon<span style="color:#6b8500;">.</span></span>
            </td>
          </tr>
          <tr>
            <td style="padding:28px 0 0;">
              <p style="margin:0 0 24px;font-size:16px;line-height:1.75;overflow-wrap:break-word;">Hi {{ $recipientName }},</p>
              <h1 class="email-title" style="margin:0 0 18px;color:#18241d;font-family:Georgia,'Times New Roman',serif;font-size:34px;line-height:1.25;letter-spacing:-.5px;font-weight:normal;overflow-wrap:break-word;">{{ $blog->title }}</h1>
              <p style="margin:0 0 24px;color:#4b574d;font-size:16px;line-height:1.8;overflow-wrap:break-word;">{{ $summary }}</p>
              <img src="{{ $coverUrl }}" width="560" alt="{{ $blog->title }}" style="display:block;width:100%;max-width:560px;height:auto;border:0;border-radius:8px;">
              <p style="margin:24px 0 32px;font-size:15px;line-height:1.7;"><a href="{{ $articleUrl }}" style="color:#315c46;font-weight:700;text-decoration:underline;">View the full story &rarr;</a></p>
              <p style="margin:0;font-size:15px;line-height:1.8;color:#4b574d;">Best,<br><span style="color:#263028;">The Deveon team</span></p>
            </td>
          </tr>
          <tr>
            <td style="padding-top:32px;">
              <p style="margin:0;border-top:1px solid #e8ece6;padding-top:18px;font-size:12px;line-height:1.6;"><a href="{{ $unsubscribeUrl }}" style="color:#707970;text-decoration:underline;">Unsubscribe</a></p>
            </td>
          </tr>
        </table>
      </td>
    </tr>
  </table>
</body>
</html>
