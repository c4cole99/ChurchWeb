<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FEMW Church</title>
    
    <!-- React and Babel -->
    <script src="https://unpkg.com/react@17/umd/react.development.js"></script>
    <script src="https://unpkg.com/react-dom@17/umd/react-dom.development.js"></script>
    <script src="https://unpkg.com/babel-standalone@6/babel.min.js"></script>
    
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Custom CSS -->
    <link href="/churchweb/assets/css/style.css" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    
    <!-- Add to your header -->
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400;600;700&family=Crimson+Text:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="assets/css/theme.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg" style="background-color: #fffbdb;">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center" href="/churchweb" style="color: #a31511;">
                <img 
                    src="/churchweb/uploads/logo.jpg" 
                    alt="FEMW Logo" 
                    class="navbar-logo me-2"
                />
                Faith Evangelical Mission WorldWide
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="/churchweb">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/churchweb/about.php">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/churchweb/events.php">Events</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/churchweb/branches.php">Branches</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/churchweb/ministries.php">Ministries</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/churchweb/contact.php">Contact</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

<style>
:root {
    --church-primary: #a31511;
}

.navbar {
    background-color: #fffbdb !important;
    box-shadow: 0 2px 4px rgba(0,0,0,0.1);
}

.navbar-brand {
    color: var(--church-primary) !important;
    font-weight: 600;
}

.navbar-logo {
    height: 40px;
    width: auto;
    object-fit: contain;
    border-radius: 4px;
}

.nav-link {
    color: var(--church-primary) !important;
    font-weight: 500;
    transition: color 0.3s ease;
    padding: 0.5rem 1rem;
}

.nav-link:hover {
    color: #000000 !important;  /* Black color on hover */
}

.navbar-toggler {
    border-color: var(--church-primary);
}

.navbar-toggler-icon {
    background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 30 30'%3e%3cpath stroke='rgba%28163, 21, 17, 0.75%29' stroke-linecap='round' stroke-miterlimit='10' stroke-width='2' d='M4 7h22M4 15h22M4 23h22'/%3e%3c/svg%3e");
}

@media (max-width: 768px) {
    .navbar-logo {
        height: 30px;
    }
    
    .navbar-brand {
        font-size: 0.9rem;
    }
}
</style>
</body>
</html> 