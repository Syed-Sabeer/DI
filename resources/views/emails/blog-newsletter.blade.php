<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>{{ $blog->title }}</title>
  <style>
    @media only screen and (max-width: 620px) {
      .outer { padding: 20px 12px !important; }
      .heading { padding: 32px 24px !important; }
      .content { padding: 30px 24px !important; }
      .title { font-size: 28px !important; line-height: 1.25 !important; }
      .brand { width: 120px !important; }
    }
  </style>
</head>
<body style="margin:0;padding:0;background:#f3f4ef;color:#263028;font-family:Arial,Helvetica,sans-serif;">
  @php
    $summary = \Illuminate\Support\Str::limit(preg_replace('/\s+/', ' ', html_entity_decode(strip_tags($blog->content), ENT_QUOTES | ENT_HTML5, 'UTF-8')), 600);
    $logoPath = public_path('FrontendAssets/images/brand/logo-dark.png');
    $logoUrl = is_readable($logoPath) ? $message->embed($logoPath) : asset('FrontendAssets/images/brand/logo-dark.png');
  @endphp
  <table role="presentation" width="100%" cellspacing="0" cellpadding="0" border="0" style="background:#f3f4ef;">
    <tr>
      <td class="outer" align="center" style="padding:48px 20px;">
        <table role="presentation" width="600" cellspacing="0" cellpadding="0" border="0" style="width:100%;max-width:600px;">
          <tr>
            <td style="padding:0 4px 28px;">
              <table role="presentation" width="100%" cellspacing="0" cellpadding="0" border="0">
                <tr>
                  <td valign="middle"><img class="brand" src="{{ $logoUrl }}" width="144" alt="Deveon Inc" style="display:block;width:144px;max-width:100%;height:auto;border:0;"></td>
                  <td align="right" valign="middle" style="padding-left:16px;font-size:12px;line-height:1.6;color:#687166;">{{ optional($blog->created_at)->format('F j, Y') }}</td>
                </tr>
              </table>
            </td>
          </tr>
          <tr>
            <td class="heading" style="padding:42px 40px;background:#142018;border-radius:12px 12px 0 0;">
              <table role="presentation" width="36" cellspacing="0" cellpadding="0" border="0" style="width:36px;margin-bottom:24px;"><tr><td height="3" bgcolor="#b8e900" style="height:3px;line-height:3px;font-size:0;background:#b8e900;">&nbsp;</td></tr></table>
              <h1 class="title" style="margin:0;color:#ffffff;font-family:Arial,Helvetica,sans-serif;font-size:34px;line-height:1.25;font-weight:700;letter-spacing:-.8px;overflow-wrap:break-word;">{{ $blog->title }}</h1>
              @if($blog->min_read)
                <p style="margin:20px 0 0;color:#c4cec3;font-size:13px;">{{ $blog->min_read }}</p>
              @endif
            </td>
          </tr>
          <tr>
            <td class="content" style="padding:36px 40px 40px;background:#ffffff;border:1px solid #e0e5da;border-top:0;border-radius:0 0 12px 12px;">
              <p style="margin:0 0 16px;font-size:16px;font-weight:700;line-height:1.7;color:#263028;overflow-wrap:break-word;">Hi {{ $recipientName }},</p>
              <p style="margin:0 0 28px;font-size:16px;line-height:1.8;color:#4b574d;overflow-wrap:break-word;">{{ $summary }}</p>
              <table role="presentation" cellspacing="0" cellpadding="0" border="0">
                <tr>
                  <td bgcolor="#b8e900" style="background:#b8e900;border-radius:6px;">
                    <a href="{{ $articleUrl }}" style="display:inline-block;padding:15px 24px;border:1px solid #b8e900;border-radius:6px;color:#142018;font-size:14px;font-weight:700;line-height:20px;text-decoration:none;">Continue reading &nbsp;&nbsp;&rarr;</a>
                  </td>
                </tr>
              </table>
              <table role="presentation" width="100%" cellspacing="0" cellpadding="0" border="0" style="margin-top:32px;"><tr><td style="padding-top:24px;border-top:1px solid #edf0e9;">
                <p style="margin:0;font-size:14px;line-height:1.8;color:#687166;">Best,<br><span style="font-weight:700;color:#263028;">The Deveon team</span></p>
              </td></tr></table>
            </td>
          </tr>
          <tr>
            <td style="padding:24px 4px 0;">
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
