<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="color-scheme" content="light">
  <meta name="x-apple-disable-message-reformatting">
  <title>{{ $career->job_title }}</title>
  <!--[if mso]>
  <style>table,td,div,p,a{font-family:Arial,Helvetica,sans-serif !important;}</style>
  <![endif]-->
</head>
<body style="margin:0;padding:0;background:#f2f3f0;color:#181b18;font-family:Arial,Helvetica,sans-serif;-webkit-font-smoothing:antialiased;">

  {{-- Inbox preview line --}}
  <div style="display:none;max-height:0;overflow:hidden;opacity:0;color:transparent;">
    {{ $preheader }}&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;
  </div>

  @php
    $logoPath = public_path('FrontendAssets/images/brand/logo.png');
    $logo = is_file($logoPath) && is_readable($logoPath)
        ? $message->embed($logoPath)
        : asset('FrontendAssets/images/brand/logo.png');

    $facts = collect([
        ['Job type', $career->job_type],
        ['Location', $career->location],
        ['Experience', $career->experience],
        ['Position', $career->position],
        ['Work schedule', $career->work_schedule],
        ['Workweek', $career->workweek],
        ['Education', $career->education],
        ['Salary range', $career->salary_range],
    ])->filter(fn ($row) => trim((string) $row[1]) !== '')->values();

    $factRows = $facts->chunk(2);

    $summary = \Illuminate\Support\Str::limit(
        preg_replace('/\s+/', ' ', strip_tags($career->description)), 320
    );

    $responsibilities = collect($career->responsibilities_points ?? [])
        ->filter(fn ($point) => trim((string) $point) !== '')
        ->take(4)
        ->values();

    $deadline = $career->application_deadline;
  @endphp

  <table role="presentation" width="100%" cellspacing="0" cellpadding="0" border="0" style="width:100%;background:#f2f3f0;">
    <tr>
      <td align="center" style="padding:32px 12px;">
        <table role="presentation" width="620" cellspacing="0" cellpadding="0" border="0" style="width:100%;max-width:620px;">

          {{-- ---------- Brand bar ---------- --}}
          <tr>
            <td style="padding:0 4px 18px;">
              <table role="presentation" width="100%" cellspacing="0" cellpadding="0" border="0">
                <tr>
                  <td valign="middle">
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
                  <td align="right" valign="middle" style="font-size:12px;">
                    <a href="{{ $unsubscribeUrl }}" style="color:#697069;text-decoration:underline;">Unsubscribe</a>
                  </td>
                </tr>
              </table>
            </td>
          </tr>

          {{-- ---------- Main card ---------- --}}
          <tr>
            <td style="overflow:hidden;border:1px solid #dde1da;border-radius:18px;background:#ffffff;box-shadow:0 12px 36px rgba(27,34,25,.08);">
              <table role="presentation" width="100%" cellspacing="0" cellpadding="0" border="0">

                {{-- Eyebrow --}}
                <tr>
                  <td style="padding:13px 30px;background:#151a16;color:#c9d0ca;font-size:11px;font-weight:700;letter-spacing:1.4px;text-transform:uppercase;border-bottom:3px solid #b8e900;">We&rsquo;re hiring at Deveon</td>
                </tr>

                {{-- Dark hero --}}
                <tr>
                  <td style="padding:38px 34px 34px;background:#10150f;background-image:linear-gradient(135deg,#10150f 0%,#1b2418 100%);">
                    <div style="margin-bottom:16px;">
                      <span style="display:inline-block;padding:7px 14px;border-radius:999px;background:#b8e900;color:#10150f;font-size:11px;font-weight:700;letter-spacing:1.1px;text-transform:uppercase;">New opening</span>
                    </div>
                    <h1 style="margin:0 0 14px;color:#ffffff;font-size:31px;line-height:1.22;letter-spacing:-.8px;font-weight:700;">{{ $career->job_title }}</h1>
                    <p style="margin:0 0 26px;color:rgba(255,255,255,.72);font-size:14px;line-height:1.65;">
                      {{ trim(collect([$career->job_type, $career->location])->filter()->implode('  ·  ')) ?: 'Join the team building intelligent systems.' }}
                    </p>
                    <table role="presentation" cellspacing="0" cellpadding="0" border="0">
                      <tr>
                        <td style="border-radius:9px;background:#b8e900;">
                          <a href="{{ $applyUrl }}" style="display:inline-block;padding:15px 26px;color:#10150f;font-size:14px;font-weight:700;text-decoration:none;letter-spacing:.2px;">View role &amp; apply&nbsp; &rarr;</a>
                        </td>
                      </tr>
                    </table>
                  </td>
                </tr>

                {{-- Facts grid --}}
                @if($factRows->isNotEmpty())
                <tr>
                  <td style="padding:0 34px;background:#ffffff;">
                    <table role="presentation" width="100%" cellspacing="0" cellpadding="0" border="0" style="border-collapse:collapse;">
                      @foreach($factRows as $row)
                      <tr>
                        @foreach($row as $fact)
                        <td width="50%" valign="top" style="width:50%;padding:18px 16px 18px 0;border-bottom:1px solid #eceee9;">
                          <div style="margin-bottom:5px;color:#8b928a;font-size:10px;font-weight:700;letter-spacing:1.2px;text-transform:uppercase;">{{ $fact[0] }}</div>
                          <div style="color:#22271f;font-size:15px;font-weight:600;line-height:1.45;">{{ $fact[1] }}</div>
                        </td>
                        @endforeach
                        @if($row->count() === 1)
                        <td width="50%" style="width:50%;border-bottom:1px solid #eceee9;">&nbsp;</td>
                        @endif
                      </tr>
                      @endforeach
                    </table>
                  </td>
                </tr>
                @endif

                {{-- About the role --}}
                <tr>
                  <td style="padding:32px 34px 0;background:#ffffff;">
                    <div style="margin-bottom:12px;color:#607700;font-size:11px;font-weight:700;letter-spacing:1.2px;text-transform:uppercase;">About the role</div>
                    <p style="margin:0;color:#4e554f;font-size:16px;line-height:1.72;">{{ $summary }}</p>
                  </td>
                </tr>

                {{-- Responsibilities --}}
                @if($responsibilities->isNotEmpty())
                <tr>
                  <td style="padding:28px 34px 0;background:#ffffff;">
                    <div style="margin-bottom:14px;color:#607700;font-size:11px;font-weight:700;letter-spacing:1.2px;text-transform:uppercase;">What you&rsquo;ll be doing</div>
                    <table role="presentation" width="100%" cellspacing="0" cellpadding="0" border="0">
                      @foreach($responsibilities as $point)
                      <tr>
                        <td valign="top" width="22" style="width:22px;padding:0 0 12px;color:#b8e900;font-size:17px;line-height:1.55;font-weight:700;">&bull;</td>
                        <td valign="top" style="padding:0 0 12px;color:#4e554f;font-size:15px;line-height:1.62;">{{ $point }}</td>
                      </tr>
                      @endforeach
                    </table>
                  </td>
                </tr>
                @endif

                {{-- Deadline --}}
                @if($deadline)
                <tr>
                  <td style="padding:24px 34px 0;background:#ffffff;">
                    <table role="presentation" width="100%" cellspacing="0" cellpadding="0" border="0" style="border:1px solid #e4e8df;border-left:4px solid #b8e900;border-radius:10px;background:#f7f9f3;">
                      <tr>
                        <td style="padding:15px 18px;color:#39402f;font-size:14px;line-height:1.6;">
                          <strong style="color:#22271f;">Applications close {{ $deadline->format('F j, Y') }}.</strong>
                          Send your application before then to be considered for this round.
                        </td>
                      </tr>
                    </table>
                  </td>
                </tr>
                @endif

                {{-- Closing CTA --}}
                <tr>
                  <td align="center" style="padding:30px 34px 38px;background:#ffffff;">
                    <table role="presentation" cellspacing="0" cellpadding="0" border="0">
                      <tr>
                        <td style="border-radius:9px;background:#151a16;">
                          <a href="{{ $applyUrl }}" style="display:inline-block;padding:15px 30px;color:#ffffff;font-size:14px;font-weight:700;text-decoration:none;">Apply for this role&nbsp; &rarr;</a>
                        </td>
                      </tr>
                    </table>
                    <div style="margin-top:16px;color:#8b928a;font-size:12.5px;line-height:1.6;">
                      Not the right fit? Forward it to someone who would be great for it.
                    </div>
                  </td>
                </tr>

              </table>
            </td>
          </tr>

          {{-- ---------- Footer ---------- --}}
          <tr>
            <td align="center" style="padding:22px 24px 4px;color:#777e77;font-size:12px;line-height:1.65;">
              <div>You are receiving this email because you subscribed to updates from Deveon Inc.</div>
              <div style="margin-top:9px;">
                <a href="{{ route('careers') }}" style="color:#454b45;text-decoration:underline;">All open roles</a>
                <span style="color:#a5aaa5;">&nbsp;&nbsp;&middot;&nbsp;&nbsp;</span>
                <a href="{{ route('privacy') }}" style="color:#454b45;text-decoration:underline;">Privacy policy</a>
                <span style="color:#a5aaa5;">&nbsp;&nbsp;&middot;&nbsp;&nbsp;</span>
                <a href="{{ $unsubscribeUrl }}" style="color:#454b45;text-decoration:underline;">Unsubscribe</a>
              </div>
              <div style="margin-top:8px;color:#969c96;">&copy; {{ now()->year }} Deveon Inc. All rights reserved.</div>
            </td>
          </tr>

        </table>
      </td>
    </tr>
  </table>

  <img src="{{ $openTrackingUrl }}" width="1" height="1" alt="" style="display:block;width:1px;height:1px;opacity:0;overflow:hidden;border:0;">
</body>
</html>
