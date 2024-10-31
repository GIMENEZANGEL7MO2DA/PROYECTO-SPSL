<html>
<head>
    <title>Pagina Principal</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f3f2ef;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 100%;
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }
        .header {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            background-color: #ffffff;
            padding: 10px 20px;
            border-bottom: 1px solid #ddd;
        }
        .header .logo-placeholder {
            height: 40px;
            width: 40px;
            border: 1px solid #ddd;
            border-radius: 5px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #666;
            font-size: 16px;
            cursor: pointer;
        }
        .header .search-container {
            display: flex;
            align-items: center;
            margin-left: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
            padding: 5px;
        }
        .header .search-container input {
            border: none;
            outline: none;
            padding: 5px;
            width: 200px;
        }
        .header .search-container i {
            color: #666;
            cursor: pointer;
        }
        .header .filter {
            margin-left: 10px;
            padding: 5px 10px;
            width: 200px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        .header .icons {
            margin-left: auto;
            display: flex;
            align-items: center;
        }
        .header .icons i {
            margin: 0 10px;
            font-size: 20px;
            color: #666;
            cursor: pointer;
        }
        .header .profile-pic {
            height: 40px;
            width: 40px;
            border-radius: 50%;
            border: 1px solid #ddd;
            margin-left: 10px;
            cursor: pointer;
        }
        .content {
            display: flex;
            margin-top: 20px;
            flex-wrap: wrap;
        }
        .main-content {
            flex: 3;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 100%;
        }
        .main-content .post-header {
            display: flex;
            align-items: center;
            flex-wrap: wrap;
        }
        .main-content .post-header img {
            height: 40px;
            border-radius: 50%;
            cursor: pointer;
            max-width: 100%;
        }
        .main-content .post-header .post-info {
            margin-left: 10px;
            flex: 1;
            width: 100%;
        }
        .main-content .post-header .post-info input {
            width: 100%;
            padding: 5px;
            border: 1px solid #ddd;
            border-radius: 5px;
            margin-bottom: 5px;
            box-sizing: border-box;
        }
        .main-content .post-header .post-info p {
            margin: 0;
            font-weight: bold;
            margin-bottom: 10px;
        }
        .main-content .post-content {
            margin-top: 10px;
        }
        .main-content .post-content textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            margin-bottom: 10px;
            font-size: 14px;
            box-sizing: border-box;
        }
        .main-content .post-content .image-placeholder {
            width: 100%;
            height: 300px;
            border: 1px solid #ddd;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #666;
            font-size: 16px;
            margin-top: 10px;
            cursor: pointer;
            max-width: 100%;
        }
        .main-content .post-content .action-buttons {
            display: flex;
            justify-content: space-between;
            margin-top: 10px;
        }
        .main-content .post-content .action-buttons button {
            background-color: #0073b1;
            color: #ffffff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            margin-left: 10px;
        }
        .main-content .post-content .action-buttons .delete-button {
            background-color: #ff0000;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .main-content .post-content .action-buttons .delete-button i {
            margin-right: 5px;
        }
        .comment-section {
            margin-top: 20px;
        }
        .comment-section .comment-box {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
            flex-wrap: wrap;
        }
        .comment-section .comment-box img {
            height: 40px;
            border-radius: 50%;
            margin-right: 10px;
            cursor: pointer;
            max-width: 100%;
        }
        .comment-section .comment-box textarea {
            flex: 1;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            width: 100%;
            box-sizing: border-box;
        }
        .comment-section .comment-box button {
            background-color: #0073b1;
            color: #ffffff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            margin-left: 10px;
            margin-top: 10px;
            flex-shrink: 0;
        }
        .comment-section .comment-display {
            display: flex;
            align-items: flex-start;
            margin-bottom: 10px;
            flex-wrap: wrap;
        }
        .comment-section .comment-display img {
            height: 40px;
            border-radius: 50%;
            margin-right: 10px;
            cursor: pointer;
            max-width: 100%;
        }
        .comment-section .comment-display .comment-content {
            background-color: #f3f2ef;
            padding: 10px;
            border-radius: 5px;
            flex: 1;
            width: 100%;
            box-sizing: border-box;
        }
        /* Mejora responsiva para dispositivos más pequeños */
        @media (max-width: 768px) {
            .header .search-container, .header .filter {
                width: 100%;
                margin: 5px 0;
            }
            .header .icons {
                margin-left: 0;
                margin-top: 10px;
            }
            .main-content .post-header .post-info input {
                width: 100%;
            }
            .main-content, .comment-section .comment-box, .comment-section .comment-display {
                padding: 10px;
            }
        }
        @media (max-width: 480px) {
            .header {
                flex-direction: column;
            }
            .header .icons {
                justify-content: center;
                margin-top: 10px;
            }
            .main-content, .comment-section .comment-box, .comment-section .comment-display {
                padding: 5px;
            }
            .main-content .post-content .image-placeholder {
                height: 200px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <img alt="Logo Placeholder" class="logo-placeholder" src="https://via.placeholder.com/40"/>
            <div class="search-container">
                <input placeholder="Buscar usuario" type="text"/>
                <i class="fas fa-search"></i>
            </div>
            <input class="filter" placeholder="Filtrar profesion" type="text"/>
            <input class="filter" placeholder="Filtrar especialidad" type="text"/>
            <div class="icons">
                <i class="fas fa-home"></i>
                <i class="fas fa-envelope"></i>
                <i class="fas fa-bell"></i>
                <img alt="User Profile Picture" class="profile-pic" src="https://via.placeholder.com/40"/>
            </div>
        </div>
        <div class="content">
            <div class="main-content">
                <div class="post-header">
                    <img alt="User Profile Picture" height="40" src="https://via.placeholder.com/40" width="40"/>
                    <div class="post-info">
                        <p>Agrega una oferta de trabajo</p>
                        <input placeholder="Nombre del usuario" type="text"/>
                        <input placeholder="Profesion" type="text"/>
                        <input placeholder="Especialidad" type="text"/>
                    </div>
                </div>
                <div class="post-content">
                    <textarea placeholder="Escribe la informacion sobre tu oferta de trabajo"></textarea>
                    <div class="image-placeholder">Espacio para agregar imagen</div>
                    <div class="action-buttons">
                        <button class="delete-button"><i class="fas fa-trash"></i> Eliminar</button>
                        <button>Publicar oferta</button>
                        <button>Estado de oferta</button>
                    </div>
                </div>
                <div class="comment-section">
                    <div class="comment-box">
                        <img alt="User Profile Picture" height="40" src="https://via.placeholder.com/40" width="40"/>
                        <textarea placeholder="Escribe un comentario..."></textarea>
                        <button>Enviar</button>
                    </div>
                    <div class="comment-display">
                        <img alt="User Profile Picture" height="40" src="https://via.placeholder.com/40" width="40"/>
                        <div class="comment-content">
                            <p><strong>Usuario 1</strong></p>
                            <p>Este es un comentario de ejemplo.</p>
                        </div>
                    </div>
                    <div class="comment-display">
                        <img alt="User Profile Picture" height="40" src="https://via.placeholder.com/40" width="40"/>
                        <div class="comment-content">
                            <p><strong>Usuario 2</strong></p>
                            <p>Este es otro comentario de ejemplo.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>