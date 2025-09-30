<!-- Tailwind CSS -->
<script src="https://cdn.tailwindcss.com"></script>
<script>
    tailwind.config = {
        theme: {
            extend: {
                colors: {
                    primary: '#2c5aa0',
                    'primary-dark': '#1e3d72',
                    secondary: '#f39c12',
                    accent: '#e74c3c'
                },
                fontFamily: {
                    'sans': ['Inter', 'system-ui', 'sans-serif']
                }
            }
        }
    }
</script>

<style>
    :root {
        --primary-color: #2c5aa0;
        --primary-dark: #1e3d72;
        --secondary-color: #f39c12;
        --accent-color: #e74c3c;
        --text-primary: #333;
        --text-secondary: #666;
        --text-light: #999;
        --bg-primary: #ffffff;
        --bg-secondary: #f8f9fa;
        --border-color: #ddd;
        --shadow: 0 2px 10px rgba(0,0,0,0.1);
        --shadow-lg: 0 10px 30px rgba(0,0,0,0.2);
        --border-radius: 8px;
        --transition: all 0.3s ease;
    }

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
        line-height: 1.6;
        color: var(--text-primary);
        background-color: var(--bg-primary);
    }

    .container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 1.25rem;
    }

    /* Header & Navigation */
    header {
        background: var(--bg-primary);
        box-shadow: var(--shadow);
        position: fixed;
        width: 100%;
        top: 0;
        z-index: 1000;
        transition: var(--transition);
    }

    nav {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 1rem 0;
        min-height: 70px;
    }

    .logo {
        font-size: 1.75rem;
        font-weight: 700;
        color: var(--primary-color);
        text-decoration: none;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    .nav-links {
        display: flex;
        list-style: none;
        gap: 2rem;
        margin: 0;
    }

    .nav-links a {
        text-decoration: none;
        color: var(--text-primary);
        font-weight: 500;
        font-size: 0.95rem;
        padding: 0.5rem 0;
        position: relative;
        transition: var(--transition);
    }

    .nav-links a:hover,
    .nav-links a.active {
        color: var(--primary-color);
    }

    .nav-links a::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        width: 0;
        height: 2px;
        background: var(--primary-color);
        transition: width 0.3s ease;
    }

    .nav-links a:hover::after,
    .nav-links a.active::after {
        width: 100%;
    }

    .auth-buttons {
        display: flex;
        gap: 0.75rem;
        align-items: center;
    }

    /* Buttons */
    .btn {
        padding: 0.625rem 1.25rem;
        border: none;
        border-radius: var(--border-radius);
        cursor: pointer;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        font-weight: 500;
        font-size: 0.9rem;
        transition: var(--transition);
        text-align: center;
        gap: 0.5rem;
    }

    .btn-primary {
        background: var(--primary-color);
        color: white;
    }

    .btn-primary:hover {
        background: var(--primary-dark);
        transform: translateY(-1px);
        box-shadow: 0 4px 12px rgba(44, 90, 160, 0.3);
    }

    .btn-outline {
        background: transparent;
        color: var(--primary-color);
        border: 1.5px solid var(--primary-color);
    }

    .btn-outline:hover {
        background: var(--primary-color);
        color: white;
        transform: translateY(-1px);
    }

    .btn-secondary {
        background: var(--secondary-color);
        color: white;
    }

    .btn-secondary:hover {
        background: #e67e22;
        transform: translateY(-1px);
    }

    .btn:disabled {
        opacity: 0.6;
        cursor: not-allowed;
        transform: none !important;
    }

    /* Hero Section */
    .hero {
        background: linear-gradient(135deg, rgba(44, 90, 160, 0.8) 0%, rgba(30, 61, 114, 0.9) 100%), 
                    url('/images/001_0469.jpg') center/cover no-repeat;
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        text-align: center;
        color: white;
        position: relative;
        margin-top: 70px;
    }

    .hero::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: linear-gradient(45deg, rgba(44, 90, 160, 0.1) 0%, rgba(30, 61, 114, 0.2) 100%);
        z-index: 1;
    }

    .hero-content {
        position: relative;
        z-index: 2;
        max-width: 1000px;
        padding: 2rem;
    }

    .hero-content h1 {
        font-size: 3.5rem;
        margin-bottom: 1.5rem;
        font-weight: 700;
        line-height: 1.2;
        text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
    }

    .hero-content .subtitle {
        font-size: 1.3rem;
        margin-bottom: 2.5rem;
        opacity: 0.95;
        max-width: 600px;
        margin-left: auto;
        margin-right: auto;
        font-weight: 400;
        text-shadow: 1px 1px 2px rgba(0,0,0,0.3);
    }

    /* Booking Form */
    .booking-form {
        background: white;
        padding: 2.5rem;
        border-radius: 15px;
        box-shadow: var(--shadow-lg);
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 1.5rem;
        max-width: 900px;
        margin: 2rem auto 0;
        backdrop-filter: blur(10px);
        border: 1px solid rgba(255,255,255,0.2);
    }

    .form-group {
        display: flex;
        flex-direction: column;
    }

    .form-group label {
        color: var(--text-primary);
        margin-bottom: 0.5rem;
        font-weight: 500;
        font-size: 0.9rem;
    }

    .form-group input,
    .form-group select {
        padding: 0.875rem;
        border: 2px solid var(--border-color);
        border-radius: var(--border-radius);
        font-size: 1rem;
        transition: var(--transition);
        background: white;
    }

    .form-group input:focus,
    .form-group select:focus {
        outline: none;
        border-color: var(--primary-color);
        box-shadow: 0 0 0 3px rgba(44, 90, 160, 0.1);
    }

    .form-group input[type="date"]::-webkit-calendar-picker-indicator {
        cursor: pointer;
        padding: 4px;
        border-radius: 4px;
        transition: var(--transition);
    }

    .form-group input[type="date"]::-webkit-calendar-picker-indicator:hover {
        background-color: rgba(44, 90, 160, 0.1);
    }

    .search-btn {
        background: var(--primary-color);
        color: white;
        padding: 1rem 2rem;
        border: none;
        border-radius: var(--border-radius);
        cursor: pointer;
        font-size: 1.1rem;
        font-weight: 600;
        grid-column: 1 / -1;
        margin-top: 1rem;
        transition: var(--transition);
        position: relative;
        overflow: hidden;
    }

    .search-btn:hover:not(:disabled) {
        background: var(--primary-dark);
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(44, 90, 160, 0.4);
    }

    .search-btn:disabled {
        background: #95a5a6;
        cursor: not-allowed;
        transform: none;
        box-shadow: none;
    }

    .search-btn::before {
        content: '';
        position: absolute;
        top: 50%;
        left: 50%;
        width: 0;
        height: 0;
        background: rgba(255,255,255,0.2);
        border-radius: 50%;
        transform: translate(-50%, -50%);
        transition: width 0.6s, height 0.6s;
    }

    .search-btn:active::before {
        width: 300px;
        height: 300px;
    }

    /* Section Styling */
    .section {
        padding: 5rem 0;
    }

    .section-title {
        text-align: center;
        margin-bottom: 3rem;
    }

    .section-title h2 {
        font-size: 2.5rem;
        margin-bottom: 1rem;
        color: var(--text-primary);
        font-weight: 700;
    }

    .section-title p {
        font-size: 1.1rem;
        color: var(--text-secondary);
        max-width: 600px;
        margin: 0 auto;
    }

    /* Mobile Menu */
    .mobile-menu-btn {
        display: none;
        background: none;
        border: none;
        font-size: 1.5rem;
        color: var(--primary-color);
        cursor: pointer;
        padding: 0.5rem;
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        .nav-links {
            display: none;
            position: absolute;
            top: 100%;
            left: 0;
            right: 0;
            background: white;
            flex-direction: column;
            padding: 1rem;
            box-shadow: var(--shadow);
            gap: 1rem;
        }

        .nav-links.active {
            display: flex;
        }

        .mobile-menu-btn {
            display: block;
        }

        .hero-content h1 {
            font-size: 2.5rem;
        }

        .hero-content .subtitle {
            font-size: 1.1rem;
        }

        .booking-form {
            grid-template-columns: 1fr;
            margin: 1rem;
            padding: 1.5rem;
        }

        .container {
            padding: 0 1rem;
        }
    }

    @media (max-width: 480px) {
        .hero-content h1 {
            font-size: 2rem;
        }

        .hero-content .subtitle {
            font-size: 1rem;
        }

        .booking-form {
            padding: 1.25rem;
        }

        .btn {
            padding: 0.5rem 1rem;
            font-size: 0.85rem;
        }

        .auth-buttons {
            gap: 0.5rem;
        }
    }

    /* Utility Classes */
    .text-center { text-align: center; }
    .text-left { text-align: left; }
    .text-right { text-align: right; }
    .mb-2 { margin-bottom: 0.5rem; }
    .mb-3 { margin-bottom: 1rem; }
    .mb-4 { margin-bottom: 1.5rem; }
    .mt-2 { margin-top: 0.5rem; }
    .mt-3 { margin-top: 1rem; }
    .mt-4 { margin-top: 1.5rem; }
    .hidden { display: none; }
    .block { display: block; }
    .flex { display: flex; }
    .grid { display: grid; }
</style>
