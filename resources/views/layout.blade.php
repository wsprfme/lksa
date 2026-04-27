<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Produk UMKM</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: Arial, sans-serif; font-size: 14px; background: #f0f0f0; color: #222; }
        .navbar { background: #1a5276; padding: 12px 20px; color: #fff; font-size: 16px; font-weight: bold; }
        .container { width: 960px; margin: 24px auto; background: #fff; padding: 24px; border: 1px solid #ccc; }
        h1 { font-size: 20px; color: #1a5276; margin-bottom: 16px; border-bottom: 2px solid #1a5276; padding-bottom: 6px; }
        .btn { display: inline-block; padding: 7px 16px; font-size: 13px; cursor: pointer; border: 1px solid #ccc; text-decoration: none; }
        .btn-primary { background: #1a5276; color: #fff; border-color: #1a5276; }
        .btn-warning { background: #f39c12; color: #fff; border-color: #d68910; }
        .btn-danger { background: #c0392b; color: #fff; border-color: #a93226; }
        .btn:hover { opacity: 0.85; }
        .alert-sukses { background: #d4edda; border: 1px solid #c3e6cb; color: #155724; padding: 10px 14px; margin-bottom: 16px; }
        table { width: 100%; border-collapse: collapse; font-size: 13px; }
        table th { background: #1a5276; color: #fff; padding: 9px 12px; text-align: left; }
        table td { padding: 8px 12px; border-bottom: 1px solid #ddd; }
        table tr:nth-child(even) td { background: #f7f7f7; }
        .form-group { margin-bottom: 14px; }
        .form-group label { display: block; font-weight: bold; margin-bottom: 4px; }
        .form-group input, .form-group select, .form-group textarea { width: 100%; padding: 7px 10px; border: 1px solid #ccc; font-size: 13px; font-family: Arial, sans-serif; }
        .form-group textarea { height: 100px; resize: vertical; }
        .error { color: #c0392b; font-size: 12px; margin-top: 3px; }
    </style>
</head>
<body>

<div class="navbar">Manajemen Produk UMKM</div>

<div class="container">
    @yield('content')
</div>

</body>
</html>
