Hi {!! $recipientName !!},

{!! $blog->title !!}

{!! \Illuminate\Support\Str::limit(preg_replace('/\s+/', ' ', html_entity_decode(strip_tags($blog->content), ENT_QUOTES | ENT_HTML5, 'UTF-8')), 600) !!}

View the full story: {!! $articleUrl !!}

Best,
Deveon team

Unsubscribe: {!! $unsubscribeUrl !!}
