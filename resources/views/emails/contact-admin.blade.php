<!doctype html><html><body style="margin:0;background:#f3f5f1;font-family:Arial,sans-serif;color:#161816">
<table role="presentation" width="100%" cellspacing="0" cellpadding="0" style="padding:36px 14px;background:#f3f5f1"><tr><td align="center">
<table role="presentation" width="620" cellspacing="0" cellpadding="0" style="max-width:620px;width:100%;background:#fff;border-radius:18px;overflow:hidden;box-shadow:0 16px 45px rgba(0,0,0,.08)">
<tr><td style="padding:30px 34px;background:#080b09;border-bottom:4px solid #b8e900"><div style="color:#b8e900;font-size:13px;font-weight:bold;letter-spacing:2px;text-transform:uppercase">Deveon Inc</div><h1 style="margin:10px 0 4px;color:#fff;font-size:26px">New website enquiry</h1><p style="margin:0;color:#aeb5af">Received {{ $contact->created_at->format('d M Y, h:i A') }}</p></td></tr>
<tr><td style="padding:30px 34px">
<table role="presentation" width="100%" cellspacing="0" cellpadding="0">
@foreach(['Name' => $contact->fullname, 'Email' => $contact->email, 'Phone' => $contact->phone, 'Subject' => $contact->subject, 'Country' => $contact->country ?: 'Unknown'] as $label => $value)
<tr><td style="padding:8px 0;color:#747a75;width:100px">{{ $label }}</td><td style="padding:8px 0;font-weight:bold">{{ $value }}</td></tr>
@endforeach
</table>
<div style="margin-top:22px;padding:22px;background:#f6f8f4;border-left:4px solid #b8e900;border-radius:10px;white-space:pre-line;line-height:1.65">{{ $contact->message }}</div>
<div style="margin-top:26px"><a href="mailto:{{ $contact->email }}?subject={{ rawurlencode('Re: '.$contact->subject) }}" style="display:inline-block;padding:13px 22px;background:#0a0c0a;color:#fff;text-decoration:none;border-radius:8px;font-weight:bold">Reply to {{ $contact->fullname }}</a></div>
</td></tr><tr><td style="padding:18px 34px;background:#f6f8f4;color:#777;font-size:12px">Submission #{{ $contact->id }} · IP {{ $contact->ip_address ?: 'Unavailable' }}</td></tr>
</table></td></tr></table></body></html>
