<style>
    :root {
        --primary: #44a9f4;
        --danger: #dc2626;
        --success: #38ce3c;
        --bg: white;
    }

    * {
        box-sizing: border-box;
    }

    body {
        font-family: system-ui, sans-serif;
        background: var(--bg);
        margin: 0;
        padding: 24px;
        color: #1e293b;
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
        padding: 24px;
        border: 1px solid gray;
        border-radius: 4px;
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
        margin-bottom: 24px;
    }

    h2 {
        margin-top: 0;
        border-bottom: 2px solid #e2e8f0;
        padding-bottom: 8px;
        font-size: 18px;
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
    }

    input, select {
        padding: 8px;
        border: 1px solid gray;
        border-radius: 4px;
        font-size: 14px;
    }

    button, .btn {
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
    }

    button:hover, .btn:hover {
        opacity: 0.4;
    }

    button.btn-danger, .btn-danger {
        background: var(--danger);
    }

    button.btn-secondary, .btn-secondary {
        background: #64748b;
    }

    button.btn-sm, .btn-sm {
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

    th, td {
        text-align: left;
        padding: 10px;
        border-bottom: 1px solid #e2e8f0;
        font-size: 14px;
    }

    th {
        background: #fffef9;
        font-weight: 600;
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
        border: 1px solid gray;
        border-radius: 12px;
        font-size: 12px;
        font-weight: bold;
    }

    .badge.Active {
        background: none;
        color: #16a34a;
    }

    .badge.Graduated {
        background: none;
        color: #2563eb;
    }

    .badge.Dropped {
        background: none;
        color: #dc2626;
    }

    .alert {
        padding: 12px;
        border-radius: 4px;
        margin-bottom: 16px;
    }

    .alert-success {
        background: #dcfce7;
        color: #166534;
        border: 1px solid #166534;
    }

    .alert-danger {
        background: #fee2e2;
        color: #991b1b;
        border: 1px solid #991b1b;
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
    }
</style>