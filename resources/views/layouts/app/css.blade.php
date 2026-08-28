<!-- css -->
<link href="https://fonts.googleapis.com/css?family=Rubik:400,400i,500,500i,700,700i&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i,900&amp;display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{asset('AdminAssets/css/fontawesome.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('AdminAssets/css/vendors/icofont.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('AdminAssets/css/vendors/themify.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('AdminAssets/css/vendors/flag-icon.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('AdminAssets/css/vendors/feather-icon.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('AdminAssets/css/vendors/slick.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('AdminAssets/css/vendors/slick-theme.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('AdminAssets/css/vendors/scrollbar.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('AdminAssets/css/vendors/animate.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('AdminAssets/css/vendors/jquery.dataTables.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('AdminAssets/css/vendors/select.bootstrap5.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('AdminAssets/css/vendors/bootstrap.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('AdminAssets/css/style.css')}}">
    <link id="color" rel="stylesheet" href="{{asset('AdminAssets/css/color-1.css')}}" media="screen">
    <link rel="stylesheet" type="text/css" href="{{asset('AdminAssets/css/responsive.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('AdminAssets/css/custom.css')}}">
<style>
  .page-body nav[aria-label="Pagination Navigation"]{width:100%}
  .page-body nav[aria-label="Pagination Navigation"]>div{gap:14px}
  .page-body .pagination{display:flex;flex-wrap:wrap;gap:6px;margin:0;align-items:center}
  .page-body .pagination .page-item{margin:0}
  .page-body .pagination .page-link{min-width:38px;height:38px;padding:0 12px;display:inline-flex;align-items:center;justify-content:center;border:1px solid #e5e8eb;border-radius:9px!important;background:#fff;color:#51546c;font-weight:600;line-height:1;box-shadow:none;transition:.2s ease}
  .page-body .pagination .page-link:hover{border-color:var(--theme-default);background:rgba(115,102,255,.08);color:var(--theme-default)}
  .page-body .pagination .page-item.active .page-link{border-color:var(--theme-default);background:var(--theme-default);color:#fff;box-shadow:0 5px 14px rgba(115,102,255,.24)}
  .page-body .pagination .page-item.disabled .page-link{background:#f7f7f9;color:#a9adb5;border-color:#eceef1;opacity:.75}
  .page-body nav[aria-label="Pagination Navigation"] p{margin:0;color:#777b88;font-size:13px}
  body.dark-only .page-body .pagination .page-link{background:#1d1e26;border-color:#343640;color:#d5d7df}
  body.dark-only .page-body .pagination .page-item.active .page-link{background:var(--theme-default);border-color:var(--theme-default);color:#fff}
  body.dark-only .page-body .pagination .page-item.disabled .page-link{background:#181920;color:#676a76;border-color:#292b34}
  @media(max-width:575.98px){.page-body nav[aria-label="Pagination Navigation"]>div{align-items:flex-start!important}.page-body .pagination .page-link{min-width:34px;height:34px;padding:0 9px}}
</style>
@yield('css')
