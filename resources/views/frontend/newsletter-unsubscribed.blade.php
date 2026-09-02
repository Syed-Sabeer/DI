<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>{{ !empty($resubscribed) ? 'Subscribed again' : 'Unsubscribed' }} | Deveon Inc</title>
  <style>
    * {
      box-sizing: border-box;
    }

    body {
      margin: 0;
      min-height: 100vh;
      display: grid;
      place-items: center;
      padding: 24px;
      background: #f2f3f0;
      color: #171a17;
      font-family: Arial, Helvetica, sans-serif;
    }

    .card {
      width: min(100%, 540px);
      padding: 46px;
      border: 1px solid #dde1da;
      border-radius: 20px;
      background: #fff;
      box-shadow: 0 18px 55px rgba(27, 34, 25, .1);
      text-align: center;
    }

    .logo {
      display: block;
      width: 72px;
      height: 72px;
      margin: 0 auto 24px;
      border: 1px solid #e4e7e2;
      border-radius: 18px;
    }

    .eyebrow {
      color: #607700;
      font-size: 11px;
      font-weight: 700;
      letter-spacing: 1.5px;
      text-transform: uppercase;
    }

    h1 {
      margin: 13px 0;
      font-size: 32px;
      letter-spacing: -.6px;
    }

    p {
      margin: 0;
      color: #626963;
      line-height: 1.7;
    }

    .email {
      color: #202420;
      font-weight: 700;
    }

    .actions {
      display: flex;
      justify-content: center;
      gap: 12px;
      margin-top: 28px;
      flex-wrap: wrap;
    }

    .button {
      display: inline-block;
      padding: 14px 22px;
      border: 0;
      border-radius: 8px;
      background: #151a16;
      color: #fff;
      font: inherit;
      font-weight: 700;
      text-decoration: none;
      cursor: pointer;
    }

    .button-secondary {
      border: 1px solid #d8ddd6;
      background: #fff;
      color: #303630;
    }
  </style>
</head>

<body>
  <main class="card">
    <img class="logo" src="{{ asset('FrontendAssets/images/brand/logo.png') }}" alt="Deveon Inc">
    @if(!empty($resubscribed))
    <div class="eyebrow">Welcome back</div>
    <h1>You are subscribed again</h1>
    <p><span class="email">{{ $email }}</span> will receive future Deveon Insights and blog announcements.</p>
    <div class="actions">
      <a class="button" href="{{ route('home') }}">Return to Deveon</a>
    </div>
    @else
    <div class="eyebrow">Preferences updated</div>
    <h1>You are unsubscribed</h1>
    <p><span class="email">{{ $email }}</span> has been removed from Deveon Insights. You will not receive future blog
      announcements.</p>
    <div class="actions">
      <form method="POST" action="{{ route('newsletter.resubscribe') }}">
        @csrf
        <input type="hidden" name="email" value="{{ $email }}">
        <button class="button" type="submit">Subscribe again</button>
      </form>
      <a class="button button-secondary" href="{{ route('home') }}">Return to Deveon</a>
    </div>
    @endif
  </main>
</body>

</html>