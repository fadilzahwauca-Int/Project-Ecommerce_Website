<meta charset="utf-8" />
<meta content="width=device-width, initial-scale=1.0" name="viewport" />
<title><?= e($pageTitle ?? 'AdminLTE 4 - E-Commerce') ?></title>

<link href="https://fonts.googleapis.com" rel="preconnect" />
<link crossorigin="" href="https://fonts.gstatic.com" rel="preconnect" />
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Source+Sans+3:wght@400;600;700&display=swap" rel="stylesheet" />
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet" />

<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
<script id="tailwind-config">
  tailwind.config = {
    darkMode: 'class',
    theme: { extend: {
      colors: {
        primary: '#b1c5ff', 'surface-hover': '#22272e', 'primary-container': '#0d6efd',
        'text-secondary': '#c9d1d9', 'surface-container-low': '#191c20', 'on-surface': '#e1e2e8',
        'surface-container-lowest': '#0b0e12', 'surface-card': '#1e2227',
        'surface-container-high': '#272a2e', 'border-default': '#30363d',
        'text-muted': '#8b949e', 'surface-dim': '#111417', 'secondary': '#c2c7d0',
        'badge-warning': '#f59e0b', 'tertiary': '#4edea3', 'error': '#ffb4ab',
        'badge-success': '#10b981', 'surface-container': '#1d2024', 'outline': '#8c90a1',
        'border-subtle': '#2d333b', 'badge-info': '#06b6d4', surface: '#111417',
        'badge-danger': '#ef4444', 'tertiary-container': '#00885d',
        'text-primary': '#e6edf3', 'secondary-container': '#42474f',
      },
      borderRadius: { DEFAULT: '0.125rem', lg: '0.25rem', xl: '0.5rem', full: '0.75rem' },
      spacing: {
        gutter: '1.5rem', 'space-md': '1rem', 'space-xs': '0.25rem',
        'space-sm': '0.5rem', 'space-lg': '1.5rem', 'space-xl': '2.5rem',
      },
      fontFamily: {
        'headline-md': ['"Source Sans 3"'], 'title-md': ['"Source Sans 3"'],
        'title-sm': ['"Source Sans 3"'], 'label-sm': ['Inter'], 'label-md': ['Inter'],
        'body-md': ['"Source Sans 3"'], 'body-sm': ['"Source Sans 3"'],
        'headline-lg': ['"Source Sans 3"'], 'headline-sm': ['"Source Sans 3"'],
      },
      fontSize: {
        'headline-sm': ['20px', { lineHeight: '28px', fontWeight: '600' }],
        'title-md': ['16px', { lineHeight: '24px', fontWeight: '600' }],
        'label-sm': ['11px', { lineHeight: '14px', letterSpacing: '0.05em', fontWeight: '700' }],
        'label-md': ['12px', { lineHeight: '16px', fontWeight: '600' }],
        'body-md': ['14px', { lineHeight: '20px', fontWeight: '400' }],
        'headline-md': ['24px', { lineHeight: '32px', fontWeight: '600' }],
        'title-sm': ['14px', { lineHeight: '20px', fontWeight: '600' }],
        'headline-lg': ['32px', { lineHeight: '40px', fontWeight: '600' }],
        'body-sm': ['12px', { lineHeight: '16px', fontWeight: '400' }],
      },
    } },
  };
</script>