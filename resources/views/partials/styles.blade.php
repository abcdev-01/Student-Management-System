<style>
    :root {
        --primary: #B33534;
        --primary-hover: #8c2827;
        --secondary: #D1CEBD;
        --secondary-hover: #b8b4a3;
        --bg: #FAFCEE;
        --danger: #B33534;
        --success: #E3EBC0;
        --text: #333333;
        --text-muted: #666666;
    }

    * {
        box-sizing: border-box;
    }

    body {
        font-family: system-ui, sans-serif;
        background-color: var(--bg);
        color: var(--text);
        margin: 0;
        padding: 24px;
    }

    .container {
        max-width: 1400px;
        margin: 0 auto;
    }

    .grid {
        display: grid;
        grid-template-columns: 1fr 2fr;
        gap: 24px;
    }

    @media (max-width: 900px) {
        .grid {
            grid-template-columns: 1fr;
        }
    }

    .card {
        background-color: #ffffff;
        padding: 24px;
        border: 1px solid var(--border);
        border-radius: 4px;
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);
        margin-bottom: 24px;
    }

    h2 {
        margin-top: 0;
        border-bottom: 2px solid var(--border);
        padding-bottom: 8px;
        font-size: 18px;
        color: var(--primary);
    }

    h3 {
        color: var(--primary);
    }

    .form-group {
        margin-bottom: 12px;
        display: flex;
        flex-direction: column;
    }

    label {
        font-weight: 600;
        margin-bottom: 4px;
        font-size: 14px;
        color: var(--text);
    }

    input,
    select {
        padding: 8px;
        border: 1px solid var(--border);
        border-radius: 4px;
        font-size: 14px;
        background-color: #ffffff;
        color: var(--text);
    }

    input:focus,
    select:focus {
        outline: none;
        border-color: var(--primary);
        box-shadow: 0 0 0 2px rgba(179, 53, 52, 0.2);
    }

    button,
    .btn {
        background: var(--primary);
        color: white;
        border: none;
        padding: 10px 16px;
        border-radius: 4px;
        cursor: pointer;
        font-weight: 500;
        font-size: 14px;
        text-decoration: none;
        display: inline-block;
        transition: background 0.2s ease;
    }

    button:hover,
    .btn:hover {
        background: var(--primary-hover);
    }

    button.btn-danger,
    .btn-danger {
        background: var(--primary);
    }

    button.btn-danger:hover,
    .btn-danger:hover {
        background: var(--primary-hover);
    }

    button.btn-secondary,
    .btn-secondary {
        background: var(--secondary);
        color: var(--text);
    }

    button.btn-secondary:hover,
    .btn-secondary:hover {
        background: var(--secondary-hover);
    }

    button.btn-sm,
    .btn-sm {
        padding: 6px 10px;
        font-size: 12px;
    }

    .table-container {
        width: 100%;
        overflow-x: auto;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 12px;
        white-space: nowrap;
    }

    th,
    td {
        text-align: left;
        padding: 10px;
        border-bottom: 1px solid var(--border);
        font-size: 14px;
    }

    th {
        background-color: var(--accent);
        font-weight: 600;
        color: var(--text);
    }

    tr:hover {
        background-color: #fcfdf7;
    }

    .flex-actions {
        display: flex;
        gap: 8px;
        align-items: center;
        margin-bottom: 16px;
        flex-wrap: wrap;
    }

    .badge {
        display: inline-block;
        padding: 2px 8px;
        font-size: 12px;
        font-weight: bold;
    }

    .badge.Active {
        color: #4a5d23;
    }

    .badge.Graduated {
        color: blue;
    }

    .badge.Dropped {
        color: var(--primary);
    }

    .alert {
        padding: 12px;
        border-radius: 4px;
        margin-bottom: 16px;
    }

    .alert-success {
        background-color: var(--success);
        color: #4a5d23;
        border: 1px solid #b5c480;
    }

    .alert-danger {
        background-color: #fce8e8;
        color: var(--primary);
        border: 1px solid #e8a3a3;
    }

    .nav-links {
        margin-bottom: 24px;
        display: flex;
        gap: 16px;
    }

    .nav-links a {
        color: var(--primary);
        text-decoration: none;
        font-weight: 500;
    }

    .nav-links a:hover {
        text-decoration: underline;
        color: var(--primary-hover);
    }
</style>