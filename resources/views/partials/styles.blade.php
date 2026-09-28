<style>
    :root {
        --primary: #74c6f2;
        --primary-hover: #0b8aa1;
        --secondary: #D1CEBD;
        --secondary-hover: #b8b4a3;
        --accent: #E3EBC0;
        --bg: #FAFCEE;
        --text: #333333;
        --text-muted: #666666;
        --border: #D1CEBD;
        --white: #ffffff;
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

    .page-nav {
        max-width: 1400px;
        margin: 0 auto 24px auto;
        display: flex;
        gap: 16px;
    }

    .page-nav a {
        color: var(--primary);
        text-decoration: none;
        font-weight: 500;
    }

    .page-nav a:hover {
        text-decoration: underline;
        color: var(--primary-hover);
    }

    .content-card {
        max-width: 1400px;
        margin: 0 auto 24px auto;
        background-color: var(--white);
        padding: 24px;
        border: 1px solid var(--border);
        border-radius: 4px;
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);
    }

    .content-card.narrow {
        max-width: 640px;
    }

    .card-heading {
        margin-top: 0;
        border-bottom: 2px solid var(--border);
        padding-bottom: 8px;
        font-size: 18px;
        color: var(--primary);
    }

    .form-field {
        margin-bottom: 12px;
        display: flex;
        flex-direction: column;
    }

    .form-label {
        font-weight: 600;
        margin-bottom: 4px;
        font-size: 14px;
        color: var(--text);
    }

    .form-input {
        padding: 8px;
        border: 1px solid var(--border);
        border-radius: 4px;
        font-size: 14px;
        background-color: var(--white);
        color: var(--text);
        font-family: inherit;
    }

    .form-input:focus {
        outline: none;
        border-color: var(--primary);
        box-shadow: 0 0 0 2px rgba(15, 15, 15, 0.098);
    }

    .form-error {
        color: var(--primary);
        font-size: 12px;
        margin-top: 4px;
    }

    .form-actions {
        display: flex;
        gap: 8px;
        margin-top: 20px;
    }

    .toolbar {
        display: flex;
        gap: 8px;
        align-items: center;
        justify-content: space-between;
        margin-bottom: 16px;
        flex-wrap: wrap;
    }

    .filter-form {
        display: flex;
        gap: 8px;
        align-items: center;
        flex-wrap: wrap;
        margin: 0;
    }

    .filter-input,
    .filter-select {
        padding: 8px;
        border: 1px solid var(--border);
        border-radius: 4px;
        font-size: 14px;
        background-color: var(--white);
        color: var(--text);
        font-family: inherit;
    }

    .filter-input:focus,
    .filter-select:focus {
        outline: none;
        border-color: var(--primary);
        box-shadow: 0 0 0 2px rgba(179, 53, 52, 0.2);
    }

    .btn-add-student,
    .btn-add-course,
    .btn-add-enrollment,
    .btn-save,
    .btn-update,
    .btn-apply-filter,
    .btn-view,
    .btn-cancel,
    .btn-clear-filter {
        display: inline-block;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-weight: 500;
        text-decoration: none;
        text-align: center;
        transition: background 0.2s ease;
        font-family: inherit;
        line-height: 1.2;
    }

    .btn-add-student,
    .btn-add-course,
    .btn-add-enrollment,
    .btn-save,
    .btn-update,
    .btn-apply-filter {
        background: var(--primary);
        color: var(--white);
    }

    .btn-add-student:hover,
    .btn-add-course:hover,
    .btn-add-enrollment:hover,
    .btn-save:hover,
    .btn-update:hover,
    .btn-apply-filter:hover {
        background: var(--primary-hover);
    }

    .btn-view,
    .btn-cancel,
    .btn-clear-filter {
        background: var(--secondary);
        color: var(--text);
    }

    .btn-view:hover,
    .btn-cancel:hover,
    .btn-clear-filter:hover {
        background: var(--secondary-hover);
    }

    .btn-add-student,
    .btn-add-course,
    .btn-add-enrollment,
    .btn-save,
    .btn-update,
    .btn-apply-filter,
    .btn-cancel,
    .btn-clear-filter {
        padding: 10px 16px;
        font-size: 14px;
    }

    .btn-view,
    .btn-edit,
    .btn-delete {
        padding: 6px 10px;
        font-size: 12px;
    }
    .btn-edit{
        color:white;
        display: inline-block;
        border-radius: 4px;
        cursor: pointer;
        font-weight: 500;
        text-decoration: none;
        text-align: center;
        font-family: inherit;
        line-height: 1.2;
        background: rgba(82, 177, 82, 0.968);
    }
    .btn-delete{
        color: white;
        border: none;
        font-family: inherit;
        border-radius: 4px;
        background: rgb(224, 112, 112);
    }

    .table-wrapper {
        width: 100%;
        overflow-x: auto;
    }

    .data-table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 12px;
        white-space: nowrap;
    }

    .data-table th,
    .data-table td {
        text-align: left;
        padding: 10px;
        border-bottom: 1px solid var(--border);
        font-size: 14px;
    }

    .data-table th {
        background-color: var(--accent);
        font-weight: 600;
        color: var(--text);
    }

    .data-table tr:hover {
        background-color: #fcfdf7;
    }

    .empty-row {
        text-align: center;
        color: var(--text-muted);
        padding: 20px;
    }

    .status-badge {
        display: inline-block;
        padding: 2px 8px;
        font-size: 12px;
        font-weight: bold;
    }

    .status-active {
        color: #2ba139df;
    }

    .status-graduated {
        color: #2e6df4;
    }

    .status-dropped {
        color: rgb(243, 94, 94);
    }

    .alert-success,
    .alert-error {
        max-width: 1400px;
        margin: 0 auto 16px auto;
        padding: 12px;
        border-radius: 4px;
    }

    .alert-success {
        background-color: var(--accent);
        color: #4a5d23;
        border: 1px solid #b5c480;
    }

    .alert-error {
        background-color: #fce8e8;
        color: var(--primary);
        border: 1px solid #e8a3a3;
    }

    .profile-field {
        margin-bottom: 10px;
        font-size: 14px;
    }

    .profile-label {
        font-weight: 600;
        color: var(--text-muted);
        display: inline-block;
        min-width: 130px;
    }

    .profile-value {
        color: var(--text);
    }

    .enrollment-list {
        list-style: none;
        padding: 0;
        margin: 12px 0;
    }

    .enrollment-item {
        padding: 8px 12px;
        background-color: var(--accent);
        border-radius: 4px;
        margin-bottom: 6px;
        font-size: 14px;
    }

    .enrollment-code {
        font-family: monospace;
        color: var(--primary);
        font-weight: 600;
    }
</style>