<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Minimarket Mass</title>
    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; }
        body { font-family: 'Segoe UI', Arial, sans-serif; background: #f4f6f9; min-height: 100vh; display: flex; flex-direction: column; }

        /* NAVBAR */
        .navbar {
            background: #0066B3;
            color: #fff;
            padding: 14px 24px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            box-shadow: 0 2px 6px rgba(0,0,0,.15);
        }
        .navbar-brand { font-weight: 800; font-size: 17px; letter-spacing: .5px; }
        .navbar-user { display: flex; align-items: center; gap: 14px; font-size: 14px; }
        .btn-salir {
            background: #FFB81C; color: #0a2540;
            font-weight: 700; font-size: 13px;
            padding: 6px 14px; border-radius: 7px;
            text-decoration: none;
        }
        .btn-salir:hover { background: #e6a500; }

        /* LAYOUT */
        .contenedor { display: flex; flex: 1; }

        /* SIDEBAR */
        .sidebar {
            background: #0c1f33;
            width: 200px;
            flex: 0 0 200px;
            padding: 20px 12px;
            display: flex;
            flex-direction: column;
            gap: 6px;
        }
        .sidebar-link {
            color: #cdd9e6;
            text-decoration: none;
            padding: 10px 14px;
            border-radius: 8px;
            font-size: 14px;
            font-weight: 500;
            transition: background .2s;
        }
        .sidebar-link:hover { background: #11304d; color: #fff; }
        .sidebar-link.activo { background: #0066B3; color: #fff; font-weight: 700; }

        /* MAIN */
        main {
            flex: 1;
            padding: 28px 32px;
        }
        h1 {
            color: #0066B3;
            border-bottom: 3px solid #FFB81C;
            padding-bottom: 10px;
            margin-bottom: 20px;
            font-size: 22px;
        }

        /* TABLA */
        table { width: 100%; border-collapse: collapse; background: #fff; border-radius: 10px; overflow: hidden; box-shadow: 0 2px 8px rgba(0,0,0,.07); }
        th { background: #0066B3; color: #fff; padding: 12px 14px; text-align: left; font-size: 13px; }
        td { padding: 10px 14px; border-bottom: 1px solid #eef2f7; font-size: 14px; }
        tr:hover td { background: #f0f6ff; }
        .precio { font-weight: 700; color: #0066B3; }
        .sin-stock { color: #dc2626; font-weight: 600; }

        /* FOOTER */
        .footer {
            background: #0c1422;
            color: #9fb0c6;
            text-align: center;
            padding: 14px;
            font-size: 13px;
        }
    </style>
</head>
<body>