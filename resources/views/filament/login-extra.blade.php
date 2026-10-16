<style>
    /* DC Equipment Admin Login Page Custom Styling */
    .fi-simple-layout {
        background: radial-gradient(circle at 50% 10%, rgba(30, 58, 138, 0.25) 0%, rgba(15, 23, 42, 1) 70%), #0b0f19 !important;
        position: relative;
        min-height: 100vh;
    }

    .fi-simple-layout::before {
        content: '';
        position: absolute;
        inset: 0;
        background-image: radial-gradient(rgba(245, 158, 11, 0.08) 1px, transparent 1px);
        background-size: 24px 24px;
        pointer-events: none;
        opacity: 0.6;
    }

    .fi-simple-main-ctn {
        position: relative;
        z-index: 10;
    }

    .fi-simple-main {
        background-color: rgba(17, 24, 39, 0.85) !important;
        backdrop-filter: blur(16px) !important;
        border: 1px solid rgba(255, 255, 255, 0.1) !important;
        box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.5), 0 0 30px rgba(30, 58, 138, 0.2) !important;
        border-radius: 1rem !important;
    }

    .fi-logo {
        display: flex;
        justify-content: center;
        align-items: center;
    }
</style>
