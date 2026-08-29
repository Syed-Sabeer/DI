<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>{{ $blog->title }}</title>
</head>
<body style="margin:0;padding:0;background:#eef1eb;color:#1c211d;font-family:Arial,Helvetica,sans-serif;">
  <div style="display:none;max-height:0;overflow:hidden;opacity:0;color:transparent;">
    {{ \Illuminate\Support\Str::limit(strip_tags($blog->content), 120) }}
  </div>
  <table role="presentation" width="100%" cellspacing="0" cellpadding="0" border="0" style="width:100%;background:#eef1eb;">
    <tr>
      <td align="center" style="padding:38px 14px;">
        <table role="presentation" width="640" cellspacing="0" cellpadding="0" border="0" style="width:100%;max-width:640px;background:#ffffff;border-radius:22px;overflow:hidden;box-shadow:0 18px 50px rgba(18,28,16,.12);">
          <tr>
            <td style="padding:28px 34px;background:#090d0a;border-bottom:4px solid #b8e900;">
              <table role="presentation" width="100%" cellspacing="0" cellpadding="0" border="0">
                <tr>
                  <td>
                    <div style="font-size:22px;font-weight:800;letter-spacing:-.5px;color:#ffffff;">DEVEON<span style="color:#b8e900;">.</span></div>
                    <div style="margin-top:5px;color:#909b91;font-size:11px;letter-spacing:1.8px;text-transform:uppercase;">Powering Intelligent Systems</div>
                  </td>
                  <td align="right" style="color:#b8e900;font-size:12px;font-weight:700;letter-spacing:1px;text-transform:uppercase;">New insight</td>
                </tr>
              </table>
            </td>
          </tr>

          @php
            $coverImage = $blog->image && \Illuminate\Support\Facades\Storage::disk('public')->exists($blog->image)
                ? asset('storage/'.$blog->image)
                : asset(config('seo.defaultImage'));
          @endphp
          <tr>
            <td style="background:#111712;">
              <a href="{{ $articleUrl }}" style="text-decoration:none;">
                <img src="{{ $coverImage }}" width="640" alt="{{ $blog->title }}" style="display:block;width:100%;max-width:640px;height:auto;border:0;">
              </a>
            </td>
          </tr>

          <tr>
            <td style="padding:38px 38px 34px;">
              @if($blog->category)
                <div style="display:inline-block;margin-bottom:18px;padding:7px 12px;border-radius:999px;background:#eff7d7;color:#4b6100;font-size:11px;font-weight:800;letter-spacing:1px;text-transform:uppercase;">{{ $blog->category }}</div>
              @endif
              <h1 style="margin:0 0 16px;color:#111712;font-size:32px;line-height:1.18;letter-spacing:-.7px;">{{ $blog->title }}</h1>
              <div style="margin-bottom:22px;color:#778078;font-size:13px;">
                {{ optional($blog->created_at)->format('F j, Y') }}@if($blog->min_read) &nbsp;•&nbsp; {{ $blog->min_read }}@endif
              </div>
              <p style="margin:0;color:#505951;font-size:16px;line-height:1.75;">
                {{ \Illuminate\Support\Str::limit(preg_replace('/\s+/', ' ', strip_tags($blog->content)), 260) }}
              </p>
              <table role="presentation" cellspacing="0" cellpadding="0" border="0" style="margin-top:30px;">
                <tr>
                  <td style="border-radius:11px;background:#b8e900;">
                    <a href="{{ $articleUrl }}" style="display:inline-block;padding:15px 24px;color:#111712;font-size:14px;font-weight:800;text-decoration:none;">Read the full article&nbsp; →</a>
                  </td>
                </tr>
              </table>
            </td>
          </tr>

          <tr>
            <td style="padding:24px 38px;background:#111712;color:#8f9990;font-size:12px;line-height:1.7;text-align:center;">
              <div style="margin-bottom:7px;color:#dce3dd;">You received this because you subscribed to the Deveon Inc newsletter.</div>
              <a href="{{ route('privacy') }}" style="color:#b8e900;text-decoration:none;">Privacy policy</a>
              <span style="color:#59615a;"> &nbsp;•&nbsp; </span>
              <a href="{{ $unsubscribeUrl }}" style="color:#b8e900;text-decoration:none;">Unsubscribe</a>
              <div style="margin-top:12px;">© {{ now()->year }} Deveon Inc · Ottawa, Canada</div>
            </td>
          </tr>
        </table>
      </td>
    </tr>
  </table>
</body>
</html>
