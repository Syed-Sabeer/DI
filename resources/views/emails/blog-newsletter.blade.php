<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>{{ $blog->title }}</title>
  <style>
    @media only screen and (max-width: 620px) {
      .outer { padding: 20px 12px !important; }
      .heading { padding: 30px 24px !important; }
      .content { padding: 28px 24px !important; }
      .title { font-size: 30px !important; }
    }
  </style>
</head>
<body style="margin:0;padding:0;background:#f3f4ef;color:#263028;font-family:Arial,Helvetica,sans-serif;">
  @php
    $summary = \Illuminate\Support\Str::limit(preg_replace('/\s+/', ' ', html_entity_decode(strip_tags($blog->content), ENT_QUOTES | ENT_HTML5, 'UTF-8')), 600);
  @endphp
  <table role="presentation" width="100%" cellspacing="0" cellpadding="0" border="0" style="background:#f3f4ef;">
    <tr>
      <td class="outer" align="center" style="padding:44px 20px;">
        <table role="presentation" width="600" cellspacing="0" cellpadding="0" border="0" style="width:100%;max-width:600px;">
          <tr>
            <td style="padding:0 4px 22px;">
              <table role="presentation" width="100%" cellspacing="0" cellpadding="0" border="0">
                <tr>
                  <td style="font-size:24px;font-weight:800;letter-spacing:-1px;color:#142018;">deveon<span style="color:#5a7600;">.</span></td>
                  <td align="right" style="font-size:12px;color:#687166;">{{ optional($blog->created_at)->format('F j, Y') }}</td>
                </tr>
              </table>
            </td>
          </tr>
          <tr>
            <td class="heading" style="padding:40px;background:#142018;border-radius:16px 16px 0 0;border-top:4px solid #b8e900;">
              <p style="margin:0 0 20px;color:#b8e900;font-size:12px;font-weight:700;letter-spacing:2px;">A FRESH PERSPECTIVE</p>
              <h1 class="title" style="margin:0;color:#ffffff;font-family:Georgia,'Times New Roman',serif;font-size:38px;line-height:1.2;font-weight:normal;letter-spacing:-.7px;">{{ $blog->title }}</h1>
              @if($blog->min_read)
                <p style="margin:20px 0 0;color:#c4cec3;font-size:13px;">{{ $blog->min_read }}</p>
              @endif
            </td>
          </tr>
          <tr>
            <td class="content" style="padding:36px 40px 40px;background:#ffffff;border:1px solid #e0e5da;border-top:0;border-radius:0 0 16px 16px;">
              <p style="margin:0 0 18px;font-size:16px;line-height:1.8;color:#263028;">Hello,</p>
              <p style="margin:0 0 26px;font-size:16px;line-height:1.85;color:#4b574d;">{{ $summary }}</p>
              <table role="presentation" cellspacing="0" cellpadding="0" border="0">
                <tr>
                  <td bgcolor="#b8e900" style="background:#b8e900;border-radius:7px;">
                    <a href="{{ $articleUrl }}" style="display:inline-block;padding:14px 22px;border:1px solid #b8e900;border-radius:7px;color:#142018;font-size:14px;font-weight:700;line-height:20px;text-decoration:none;">Continue reading &nbsp;&rarr;</a>
                  </td>
                </tr>
              </table>
              <p style="margin:32px 0 0;font-size:14px;line-height:1.8;color:#687166;">Best,<br><span style="font-weight:700;color:#263028;">The Deveon team</span></p>
            </td>
          </tr>
          <tr>
            <td style="padding:22px 4px 0;">
              <table role="presentation" width="100%" cellspacing="0" cellpadding="0" border="0">
                <tr>
                  <td style="font-size:12px;line-height:1.6;color:#747e72;">&copy; {{ now()->year }} Deveon Inc.</td>
                  <td align="right" style="font-size:12px;line-height:1.6;"><a href="{{ $unsubscribeUrl }}" style="color:#626d60;text-decoration:underline;">Unsubscribe</a></td>
                </tr>
              </table>
            </td>
          </tr>
        </table>
      </td>
    </tr>
  </table>
</body>
</html>
