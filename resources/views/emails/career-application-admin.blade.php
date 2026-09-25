<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="color-scheme" content="light">
  <meta name="x-apple-disable-message-reformatting">
  <title>New application — {{ $career->job_title }}</title>
</head>
<body style="margin:0;padding:0;background:#f2f3f0;color:#181b18;font-family:Arial,Helvetica,sans-serif;-webkit-font-smoothing:antialiased;">

  <div style="display:none;max-height:0;overflow:hidden;opacity:0;color:transparent;">
    {{ $application->first_name }} {{ $application->last_name }} applied for {{ $career->job_title }}.&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;
  </div>

  @php
    $logoPath = public_path('FrontendAssets/images/brand/logo.png');
    $logo = is_file($logoPath) && is_readable($logoPath)
        ? $message->embed($logoPath)
        : asset('FrontendAssets/images/brand/logo.png');

    $candidate = collect([
        ['Name', trim($application->first_name.' '.$application->last_name)],
        ['Email', $application->email],
        ['Phone', $application->phone],
        ['Experience', $application->years_experience],
        ['Current workplace', $application->current_workplace],
        ['Current position', $application->current_position],
        ['Current salary', $application->current_salary],
        ['Expected salary', $application->expected_salary],
    ])->map(fn ($row) => [$row[0], trim((string) $row[1]) !== '' ? $row[1] : 'Not provided'])->values();

    $location = collect([
        $application->address,
        $application->city,
        $application->state,
        $application->postal_code,
        $application->country,
    ])->filter(fn ($part) => trim((string) $part) !== '')->implode(', ');

    $attachments = $application->cover_letter_path ? 'Resume and cover letter are attached' : 'Resume is attached';
  @endphp

  <table role="presentation" width="100%" cellspacing="0" cellpadding="0" border="0" style="width:100%;background:#f2f3f0;">
    <tr>
      <td align="center" style="padding:32px 12px;">
        <table role="presentation" width="660" cellspacing="0" cellpadding="0" border="0" style="width:100%;max-width:660px;">

          <tr>
            <td style="padding:0 4px 18px;">
              <table role="presentation" cellspacing="0" cellpadding="0" border="0">
                <tr>
                  <td valign="middle" style="padding-right:12px;">
                    <img src="{{ $logo }}" width="54" height="54" alt="Deveon Inc" style="display:block;width:54px;height:54px;border:0;border-radius:14px;background:#ffffff;">
                  </td>
                  <td valign="middle">
                    <div style="font-size:18px;font-weight:700;letter-spacing:-.3px;color:#151815;">Deveon Inc</div>
                    <div style="margin-top:4px;font-size:11px;letter-spacing:1.3px;text-transform:uppercase;color:#697069;">Recruitment notifications</div>
                  </td>
                </tr>
              </table>
            </td>
          </tr>

          <tr>
            <td style="overflow:hidden;border:1px solid #dde1da;border-radius:18px;background:#ffffff;box-shadow:0 12px 36px rgba(27,34,25,.08);">
              <table role="presentation" width="100%" cellspacing="0" cellpadding="0" border="0">

                <tr>
                  <td style="padding:13px 30px;background:#151a16;color:#c9d0ca;font-size:11px;font-weight:700;letter-spacing:1.4px;text-transform:uppercase;border-bottom:3px solid #b8e900;">New candidate application</td>
                </tr>

                <tr>
                  <td style="padding:32px 34px 0;background:#ffffff;">
                    <div style="margin-bottom:10px;color:#607700;font-size:11px;font-weight:700;letter-spacing:1.2px;text-transform:uppercase;">Applied for</div>
                    <h1 style="margin:0 0 8px;color:#171a17;font-size:26px;line-height:1.25;letter-spacing:-.6px;font-weight:700;">{{ $career->job_title }}</h1>
                    <div style="color:#8b928a;font-size:13px;line-height:1.6;">
                      {{ trim(collect([$career->job_type, $career->location])->filter()->implode('  ·  ')) ?: 'Deveon Inc' }}
                      &nbsp;&middot;&nbsp; Submitted {{ optional($application->created_at)->format('d M Y, h:i A') }}
                    </div>
                  </td>
                </tr>

                <tr>
                  <td style="padding:28px 34px 0;background:#ffffff;">
                    <div style="margin-bottom:14px;color:#607700;font-size:11px;font-weight:700;letter-spacing:1.2px;text-transform:uppercase;">Candidate details</div>
                    <table role="presentation" width="100%" cellspacing="0" cellpadding="0" border="0" style="border-collapse:collapse;border:1px solid #e9ece5;border-radius:12px;">
                      @foreach($candidate as $row)
                      <tr>
                        <td width="38%" valign="top" style="width:38%;padding:13px 18px;background:#fafbf8;color:#8b928a;font-size:11px;font-weight:700;letter-spacing:1.1px;text-transform:uppercase;@if(! $loop->last)border-bottom:1px solid #eceee9;@endif">{{ $row[0] }}</td>
                        <td valign="top" style="padding:13px 18px;color:#22271f;font-size:15px;font-weight:600;line-height:1.45;@if(! $loop->last)border-bottom:1px solid #eceee9;@endif">{{ $row[1] }}</td>
                      </tr>
                      @endforeach
                    </table>
                  </td>
                </tr>

                @if($location !== '')
                <tr>
                  <td style="padding:26px 34px 0;background:#ffffff;">
                    <div style="margin-bottom:10px;color:#607700;font-size:11px;font-weight:700;letter-spacing:1.2px;text-transform:uppercase;">Location</div>
                    <p style="margin:0;color:#4e554f;font-size:15px;line-height:1.7;">{{ $location }}</p>
                  </td>
                </tr>
                @endif

                @if($application->linkedin_url || $application->github_url)
                <tr>
                  <td style="padding:24px 34px 0;background:#ffffff;">
                    <div style="margin-bottom:12px;color:#607700;font-size:11px;font-weight:700;letter-spacing:1.2px;text-transform:uppercase;">Profiles</div>
                    <table role="presentation" cellspacing="0" cellpadding="0" border="0">
                      <tr>
                        @if($application->linkedin_url)
                        <td style="padding-right:10px;">
                          <a href="{{ $application->linkedin_url }}" style="display:inline-block;padding:10px 16px;border:1px solid #dde1da;border-radius:8px;color:#3d4a16;font-size:13px;font-weight:700;text-decoration:none;background:#f7f9f3;">LinkedIn profile &rarr;</a>
                        </td>
                        @endif
                        @if($application->github_url)
                        <td>
                          <a href="{{ $application->github_url }}" style="display:inline-block;padding:10px 16px;border:1px solid #dde1da;border-radius:8px;color:#3d4a16;font-size:13px;font-weight:700;text-decoration:none;background:#f7f9f3;">GitHub profile &rarr;</a>
                        </td>
                        @endif
                      </tr>
                    </table>
                  </td>
                </tr>
                @endif

                <tr>
                  <td style="padding:26px 34px 0;background:#ffffff;">
                    <table role="presentation" width="100%" cellspacing="0" cellpadding="0" border="0" style="border-radius:10px;background:#10150f;">
                      <tr>
                        <td style="padding:15px 18px;color:#e6eadf;font-size:14px;line-height:1.6;">
                          <span style="color:#b8e900;font-weight:700;">&#128206;</span>&nbsp; {{ $attachments }} to this email.
                        </td>
                      </tr>
                    </table>
                  </td>
                </tr>

                <tr>
                  <td style="padding:24px 34px 36px;background:#ffffff;">
                    <table role="presentation" cellspacing="0" cellpadding="0" border="0">
                      <tr>
                        <td style="border-radius:9px;background:#b8e900;">
                          <a href="{{ route('admin.career-applications.index') }}" style="display:inline-block;padding:14px 24px;color:#10150f;font-size:14px;font-weight:700;text-decoration:none;">Open in admin panel&nbsp; &rarr;</a>
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
              <div>Deveon Inc recruitment system &middot; automated notification</div>
              <div style="margin-top:8px;color:#969c96;">&copy; {{ now()->year }} Deveon Inc. All rights reserved.</div>
            </td>
          </tr>

        </table>
      </td>
    </tr>
  </table>
</body>
</html>
