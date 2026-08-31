<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="color-scheme" content="light">
  <title>{{ $blog->title }}</title>
</head>
<body style="margin:0;padding:0;background:#f2f3f0;color:#181b18;font-family:Arial,Helvetica,sans-serif;">
  <div style="display:none;max-height:0;overflow:hidden;opacity:0;color:transparent;">
    {{ \Illuminate\Support\Str::limit(preg_replace('/\s+/', ' ', strip_tags($blog->content)), 130) }}
  </div>

  @php
    $publicDisk = \Illuminate\Support\Facades\Storage::disk('public');
    $coverPath = $blog->image && $publicDisk->exists($blog->image)
        ? $publicDisk->path($blog->image)
        : public_path(config('seo.defaultImage'));
    $coverImage = is_file($coverPath) && is_readable($coverPath)
        ? $message->embed($coverPath)
        : asset(config('seo.defaultImage'));
    $summary = \Illuminate\Support\Str::limit(preg_replace('/\s+/', ' ', strip_tags($blog->content)), 300);
  @endphp

  <table role="presentation" width="100%" cellspacing="0" cellpadding="0" border="0" style="width:100%;background:#f2f3f0;">
    <tr>
      <td align="center" style="padding:32px 12px;">
        <table role="presentation" width="620" cellspacing="0" cellpadding="0" border="0" style="width:100%;max-width:620px;">
          <tr>
            <td style="padding:0 4px 18px;">
              <table role="presentation" width="100%" cellspacing="0" cellpadding="0" border="0">
                <tr>
                  <td valign="middle">
                    <table role="presentation" cellspacing="0" cellpadding="0" border="0">
                      <tr>
                        <td valign="middle" style="padding-right:12px;">
                          <img src="{{ $message->embed(public_path('FrontendAssets/images/brand/logo.png')) }}" width="54" height="54" alt="Deveon Inc" style="display:block;width:54px;height:54px;border:0;border-radius:14px;background:#ffffff;">
                        </td>
                        <td valign="middle">
                          <div style="font-size:18px;font-weight:700;letter-spacing:-.3px;color:#151815;">Deveon Inc</div>
                          <div style="margin-top:4px;font-size:11px;letter-spacing:1.3px;text-transform:uppercase;color:#697069;">Insights &amp; ideas</div>
                        </td>
                      </tr>
                    </table>
                  </td>
                  <td align="right" valign="middle" style="font-size:12px;">
                    <a href="{{ $unsubscribeUrl }}" style="color:#697069;text-decoration:underline;">Unsubscribe</a>
                  </td>
                </tr>
              </table>
            </td>
          </tr>

          <tr>
            <td style="overflow:hidden;border:1px solid #dde1da;border-radius:18px;background:#ffffff;box-shadow:0 12px 36px rgba(27,34,25,.08);">
              <table role="presentation" width="100%" cellspacing="0" cellpadding="0" border="0">
                <tr>
                  <td style="padding:13px 30px;background:#151a16;color:#c9d0ca;font-size:11px;font-weight:700;letter-spacing:1.4px;text-transform:uppercase;border-bottom:3px solid #b8e900;">New from Deveon</td>
                </tr>
                <tr>
                  <td style="background:#e7eae5;">
                    <a href="{{ $articleUrl }}" style="display:block;text-decoration:none;">
                      <img src="{{ $coverImage }}" width="618" alt="{{ $blog->title }}" style="display:block;width:100%;max-width:618px;height:auto;border:0;">
                    </a>
                  </td>
                </tr>
                <tr>
                  <td style="padding:36px 34px 38px;">
                    @if($blog->category)
                      <div style="margin-bottom:15px;color:#607700;font-size:11px;font-weight:700;letter-spacing:1.2px;text-transform:uppercase;">{{ $blog->category }}</div>
                    @endif
                    <h1 style="margin:0 0 14px;color:#171a17;font-size:30px;line-height:1.2;letter-spacing:-.7px;font-weight:700;">{{ $blog->title }}</h1>
                    <div style="margin-bottom:22px;color:#7a817a;font-size:13px;line-height:1.5;">
                      {{ optional($blog->created_at)->format('F j, Y') }}@if($blog->min_read) &nbsp;&middot;&nbsp; {{ $blog->min_read }}@endif
                    </div>
                    <p style="margin:0;color:#4e554f;font-size:16px;line-height:1.7;">{{ $summary }}</p>
                    <table role="presentation" cellspacing="0" cellpadding="0" border="0" style="margin-top:28px;">
                      <tr>
                        <td style="border-radius:8px;background:#151a16;">
                          <a href="{{ $articleUrl }}" style="display:inline-block;padding:14px 22px;color:#ffffff;font-size:14px;font-weight:700;text-decoration:none;">Read the article&nbsp; &rarr;</a>
                        </td>
                      </tr>
                    </table>
                  </td>
                </tr>
              </table>
            </td>
          </tr>

          <tr>
            <td align="center" style="padding:22px 24px 4px;color:#777e77;font-size:12px;line-height:1.65;">
              <div>You are receiving this email because you subscribed to Deveon Insights.</div>
              <div style="margin-top:7px;">
                <a href="{{ route('privacy') }}" style="color:#454b45;text-decoration:underline;">Privacy policy</a>
                <span style="color:#a5aaa5;">&nbsp;&nbsp;&middot;&nbsp;&nbsp;</span>
                <a href="{{ $unsubscribeUrl }}" style="color:#454b45;text-decoration:underline;">Unsubscribe from this newsletter</a>
              </div>
              <div style="margin-top:8px;color:#969c96;">&copy; {{ now()->year }} Deveon Inc. All rights reserved.</div>
            </td>
          </tr>
        </table>
      </td>
    </tr>
  </table>
</body>
</html>
