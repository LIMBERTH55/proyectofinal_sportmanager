<svg viewBox="0 0 220 190" role="img" aria-label="SportManager" class="{{ $class ?? 'h-auto w-full' }}">
    <defs>
        <linearGradient id="sm-blue" x1="38" y1="17" x2="175" y2="151" gradientUnits="userSpaceOnUse">
            <stop stop-color="#2563eb" />
            <stop offset="1" stop-color="#0f3ea8" />
        </linearGradient>
        <linearGradient id="sm-green" x1="37" y1="132" x2="177" y2="132" gradientUnits="userSpaceOnUse">
            <stop stop-color="#22c55e" />
            <stop offset="1" stop-color="#16a34a" />
        </linearGradient>
        <filter id="sm-shadow" x="-20%" y="-20%" width="140%" height="150%">
            <feDropShadow dx="0" dy="8" stdDeviation="8" flood-color="#0f172a" flood-opacity=".2" />
        </filter>
    </defs>

    <path d="M110 10l8.1 16.3 18 2.6-13 12.7 3.1 17.9L110 51l-16.2 8.5 3.1-17.9-13-12.7 18-2.6L110 10z" fill="#22c55e" />
    <path d="M65 23l5.4 10.9 12 1.8-8.7 8.5 2.1 12-10.8-5.7-10.8 5.7 2.1-12-8.7-8.5 12-1.8L65 23zM155 23l5.4 10.9 12 1.8-8.7 8.5 2.1 12-10.8-5.7-10.8 5.7 2.1-12-8.7-8.5 12-1.8L155 23z" fill="#fff" />

    <g filter="url(#sm-shadow)">
        <path d="M42 65l68-24 68 24v47c0 38-31 58-68 68-37-10-68-30-68-68V65z" fill="white" />
        <path d="M53 73l57-20 57 20v38c0 29-22 47-57 57-35-10-57-28-57-57V73z" fill="url(#sm-blue)" />
        <path d="M65 83l45-16 45 16v24c0 24-17 39-45 48-28-9-45-24-45-48V83z" fill="white" opacity=".96" />
        <path d="M75 91l35-12 35 12v18c0 19-12 31-35 39-23-8-35-20-35-39V91z" fill="url(#sm-blue)" />

        <circle cx="110" cy="105" r="28" fill="white" />
        <circle cx="110" cy="105" r="22" fill="url(#sm-blue)" />
        <path d="M110 86l10 7-4 12h-12l-4-12 10-7zM91 101l9-6 6 10-7 10-12-2 4-12zM129 101l4 12-12 2-7-10 6-10 9 6zM100 124l4-12h12l4 12-10 8-10-8z" fill="white" />
        <path d="M89 83c-14 7-24 22-24 40 0 16 8 29 20 37" fill="none" stroke="white" stroke-width="9" stroke-linecap="round" />
        <path d="M131 83c14 7 24 22 24 40 0 16-8 29-20 37" fill="none" stroke="white" stroke-width="9" stroke-linecap="round" />
        <path d="M110 132v35" stroke="white" stroke-width="12" stroke-linecap="round" />
        <path d="M83 169c18 11 38 12 59 1" stroke="url(#sm-green)" stroke-width="14" stroke-linecap="round" />
        <path d="M58 145c37 20 77 18 119-5" stroke="url(#sm-green)" stroke-width="12" stroke-linecap="round" />
        <path d="M137 177c17-7 30-16 43-30" stroke="#16a34a" stroke-width="10" stroke-linecap="round" />
    </g>
</svg>
