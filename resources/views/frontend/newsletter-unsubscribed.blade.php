<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Unsubscribed · Deveon Inc</title>
  <style>
    *{box-sizing:border-box}body{margin:0;min-height:100vh;display:grid;place-items:center;padding:24px;background:radial-gradient(circle at 80% 10%,rgba(184,233,0,.14),transparent 32%),#080c09;color:#fff;font-family:Arial,Helvetica,sans-serif}.card{width:min(100%,560px);padding:48px;border:1px solid rgba(184,233,0,.26);border-radius:24px;background:linear-gradient(145deg,#131a14,#0d120e);box-shadow:0 30px 80px rgba(0,0,0,.34);text-align:center}.icon{display:grid;width:66px;height:66px;margin:0 auto 24px;place-items:center;border-radius:20px;background:#b8e900;color:#111712;font-size:30px;font-weight:bold}.brand{color:#b8e900;font-size:12px;font-weight:800;letter-spacing:2px;text-transform:uppercase}h1{margin:14px 0;font-size:34px}p{margin:0;color:#a9b2aa;line-height:1.7}.email{color:#fff;font-weight:700}.button{display:inline-block;margin-top:30px;padding:14px 22px;border-radius:10px;background:#b8e900;color:#111712;font-weight:800;text-decoration:none}
  </style>
</head>
<body>
  <main class="card">
    <div class="icon">✓</div>
    <div class="brand">Deveon Inc</div>
    <h1>You’re unsubscribed</h1>
    <p><span class="email">{{ $email }}</span> has been removed from our newsletter. You won’t receive future blog announcements.</p>
    <a class="button" href="{{ route('home') }}">Return to Deveon</a>
  </main>
</body>
</html>
