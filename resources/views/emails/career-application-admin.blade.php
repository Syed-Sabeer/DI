<!doctype html><html><body style="margin:0;background:#eef0eb;font-family:Arial,sans-serif;color:#151815">
<table role="presentation" width="100%" cellpadding="0" cellspacing="0"><tr><td style="padding:32px 12px"><table role="presentation" width="100%" cellpadding="0" cellspacing="0" style="max-width:680px;margin:auto;background:#fff;border-radius:18px;overflow:hidden;box-shadow:0 12px 35px rgba(0,0,0,.09)">
<tr><td style="background:#0b0e0c;padding:30px 36px;border-bottom:4px solid #b8e900"><div style="color:#b8e900;font-size:12px;font-weight:700;letter-spacing:2px;text-transform:uppercase">Deveon Inc Careers</div><h1 style="color:#fff;margin:10px 0 0;font-size:27px">New candidate application</h1></td></tr>
<tr><td style="padding:32px 36px"><p style="margin-top:0;color:#666">A new application was submitted for:</p><div style="background:#f4f7ef;border-left:4px solid #b8e900;padding:18px 20px;border-radius:8px"><strong style="font-size:20px">{{ $career->job_title }}</strong></div>
<h2 style="font-size:18px;margin:30px 0 14px">Candidate details</h2>
<table role="presentation" width="100%" cellpadding="8" cellspacing="0" style="font-size:14px;border-collapse:collapse">
@foreach(['Name' => $application->first_name.' '.$application->last_name, 'Email' => $application->email, 'Phone' => $application->phone, 'Experience' => $application->years_experience, 'Current workplace' => $application->current_workplace ?: 'Not provided', 'Current position' => $application->current_position ?: 'Not provided', 'Current salary' => $application->current_salary ?: 'Not provided', 'Expected salary' => $application->expected_salary ?: 'Not provided'] as $label => $value)
<tr><td style="width:34%;color:#777;border-bottom:1px solid #eee">{{ $label }}</td><td style="font-weight:600;border-bottom:1px solid #eee">{{ $value }}</td></tr>
@endforeach
</table>
<h2 style="font-size:18px;margin:30px 0 14px">Address & profiles</h2><p style="line-height:1.6">{{ $application->address }}, {{ $application->city }}, {{ $application->state }}, {{ $application->postal_code }}, {{ $application->country }}</p>
@if($application->linkedin_url)<p><a style="color:#547000" href="{{ $application->linkedin_url }}">View LinkedIn profile</a></p>@endif
@if($application->github_url)<p><a style="color:#547000" href="{{ $application->github_url }}">View GitHub profile</a></p>@endif
<p style="margin:28px 0 0;padding:15px;background:#0b0e0c;color:#fff;border-radius:10px">The resume{{ $application->cover_letter_path ? ' and cover letter are' : ' is' }} attached to this email.</p></td></tr>
<tr><td style="padding:18px 36px;background:#f7f8f5;color:#777;font-size:12px">Submitted {{ $application->created_at->format('d M Y, h:i A') }} · Deveon Inc recruitment system</td></tr>
</table></td></tr></table></body></html>
