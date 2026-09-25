<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="color-scheme" content="light">
  <meta name="x-apple-disable-message-reformatting">
  <title>Application received — {{ $career->job_title }}</title>
</head>
<body style="margin:0;padding:0;background:#f2f3f0;color:#181b18;font-family:Arial,Helvetica,sans-serif;-webkit-font-smoothing:antialiased;">

  <div style="display:none;max-height:0;overflow:hidden;opacity:0;color:transparent;">
    We have received your application for {{ $career->job_title }}. Here is what happens next.&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;
  </div>

  @php
    $logoPath = public_path('FrontendAssets/images/brand/logo.png');
    $logo = is_file($logoPath) && is_readable($logoPath)
        ? $message->embed($logoPath)
        : asset('FrontendAssets/images/brand/logo.png');

    $facts = collect([
        ['Position', $career->job_title],
        ['Job type', $career->job_type],
        ['Location', $career->location],
        ['Submitted', optional($application->created_at)->format('d M Y, h:i A')],
    ])->filter(fn ($row) => trim((string) $row[1]) !== '')->values();
  @endphp

  <table role="presentation" width="100%" cellspacing="0" cellpadding="0" border="0" style="width:100%;background:#f2f3f0;">
    <tr>
      <td align="center" style="padding:32px 12px;">
        <table role="presentation" width="620" cellspacing="0" cellpadding="0" border="0" style="width:100%;max-width:620px;">

          <tr>
            <td style="padding:0 4px 18px;">
              <table role="presentation" cellspacing="0" cellpadding="0" border="0">
                <tr>
                  <td valign="middle" style="padding-right:12px;">
                    <img src="{{ $logo }}" width="54" height="54" alt="Deveon Inc" style="display:block;width:54px;height:54px;border:0;border-radius:14px;background:#ffffff;">
                  </td>
                  <td valign="middle">
                    <div style="font-size:18px;font-weight:700;letter-spacing:-.3px;color:#151815;">Deveon Inc</div>
                    <div style="margin-top:4px;font-size:11px;letter-spacing:1.3px;text-transform:uppercase;color:#697069;">Careers &amp; hiring</div>
                  </td>
                </tr>
              </table>
            </td>
          </tr>

          <tr>
            <td style="overflow:hidden;border:1px solid #dde1da;border-radius:18px;background:#ffffff;box-shadow:0 12px 36px rgba(27,34,25,.08);">
              <table role="presentation" width="100%" cellspacing="0" cellpadding="0" border="0">

                <tr>
                  <td style="padding:38px 34px 34px;background:#10150f;background-image:linear-gradient(135deg,#10150f 0%,#1b2418 100%);border-bottom:3px solid #b8e900;">
                    <div style="margin-bottom:16px;">
                      <span style="display:inline-block;padding:7px 14px;border-radius:999px;background:#b8e900;color:#10150f;font-size:11px;font-weight:700;letter-spacing:1.1px;text-transform:uppercase;">Application received</span>
                    </div>
                    <h1 style="margin:0 0 12px;color:#ffffff;font-size:29px;line-height:1.24;letter-spacing:-.7px;font-weight:700;">Thank you, {{ $application->first_name }}.</h1>
                    <p style="margin:0;color:rgba(255,255,255,.72);font-size:15px;line-height:1.65;">Your application is with our team and nothing further is needed from you right now.</p>
                  </td>
                </tr>

                <tr>
                  <td style="padding:32px 34px 0;background:#ffffff;">
                    <p style="margin:0 0 24px;color:#4e554f;font-size:16px;line-height:1.72;">
                      We have received your application for <strong style="color:#22271f;">{{ $career->job_title }}</strong>, along with the documents you attached.
                    </p>

                    <table role="presentation" width="100%" cellspacing="0" cellpadding="0" border="0" style="border-collapse:collapse;border:1px solid #e4e8df;border-radius:12px;background:#f7f9f3;">
                      @foreach($facts as $index => $fact)
                      <tr>
                        <td width="42%" valign="top" style="width:42%;padding:14px 18px;color:#8b928a;font-size:11px;font-weight:700;letter-spacing:1.1px;text-transform:uppercase;@if(! $loop->last)border-bottom:1px solid #e7eae2;@endif">{{ $fact[0] }}</td>
                        <td valign="top" style="padding:14px 18px;color:#22271f;font-size:15px;font-weight:600;line-height:1.45;@if(! $loop->last)border-bottom:1px solid #e7eae2;@endif">{{ $fact[1] }}</td>
                      </tr>
                      @endforeach
                    </table>
                  </td>
                </tr>

                <tr>
                  <td style="padding:30px 34px 0;background:#ffffff;">
                    <div style="margin-bottom:14px;color:#607700;font-size:11px;font-weight:700;letter-spacing:1.2px;text-transform:uppercase;">What happens next</div>
                    <table role="presentation" width="100%" cellspacing="0" cellpadding="0" border="0">
                      @foreach([
                        'Our careers team reviews your experience against the role.',
                        'If your profile is a strong match, we reach out using the contact details you provided.',
                        'Shortlisted candidates are invited to an introductory conversation.',
                      ] as $step)
                      <tr>
                        <td valign="top" width="30" style="width:30px;padding:0 0 13px;">
                          <span style="display:inline-block;width:22px;height:22px;border-radius:50%;background:#eef4dc;color:#4e6600;font-size:12px;font-weight:700;text-align:center;line-height:22px;">{{ $loop->iteration }}</span>
                        </td>
                        <td valign="top" style="padding:1px 0 13px;color:#4e554f;font-size:15px;line-height:1.62;">{{ $step }}</td>
                      </tr>
                      @endforeach
                    </table>
                  </td>
                </tr>

                <tr>
                  <td align="center" style="padding:26px 34px 38px;background:#ffffff;">
                    <table role="presentation" cellspacing="0" cellpadding="0" border="0">
                      <tr>
                        <td style="border-radius:9px;background:#151a16;">
                          <a href="{{ route('careers') }}" style="display:inline-block;padding:15px 28px;color:#ffffff;font-size:14px;font-weight:700;text-decoration:none;">Browse other openings&nbsp; &rarr;</a>
                        </td>
                      </tr>
                    </table>
                    <div style="margin-top:16px;color:#8b928a;font-size:12.5px;line-height:1.6;">
                      Warm regards,<br><strong style="color:#4e554f;">The Deveon Inc careers team</strong>
                    </div>
                  </td>
                </tr>

              </table>
            </td>
          </tr>

          <tr>
            <td align="center" style="padding:22px 24px 4px;color:#777e77;font-size:12px;line-height:1.65;">
              <div>This is an automated confirmation — please keep it for your records.</div>
              <div style="margin-top:9px;">
                <a href="{{ route('careers') }}" style="color:#454b45;text-decoration:underline;">Open roles</a>
                <span style="color:#a5aaa5;">&nbsp;&nbsp;&middot;&nbsp;&nbsp;</span>
                <a href="{{ route('privacy') }}" style="color:#454b45;text-decoration:underline;">Privacy policy</a>
                <span style="color:#a5aaa5;">&nbsp;&nbsp;&middot;&nbsp;&nbsp;</span>
                <a href="{{ route('contact') }}" style="color:#454b45;text-decoration:underline;">Contact us</a>
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
