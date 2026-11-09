<!DOCTYPE html>

<html class="dark" lang="en"><head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<title>Aura Apparel | AdminLTE Storefront</title>
<!-- Material Symbols Outlined -->
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
<!-- Fonts -->
<link href="https://fonts.googleapis.com" rel="preconnect"/>
<link crossorigin="" href="https://fonts.gstatic.com" rel="preconnect"/>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&amp;family=Source+Sans+3:wght@400;600;700&amp;display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
<!-- Tailwind CSS -->
<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
<script id="tailwind-config">
    tailwind.config = {
      darkMode: "class",
      theme: {
        extend: {
          "colors": {
            "primary": "#b1c5ff",
            "surface-hover": "#22272e",
            "on-secondary-fixed-variant": "#42474f",
            "primary-container": "#0d6efd",
            "text-secondary": "#c9d1d9",
            "surface-container-low": "#191c20",
            "on-surface": "#e1e2e8",
            "surface-container-lowest": "#0b0e12",
            "inverse-primary": "#0057ce",
            "surface-card": "#1e2227",
            "surface-container-high": "#272a2e",
            "canvas-dark": "#121417",
            "border-default": "#30363d",
            "on-surface-variant": "#c2c6d8",
            "on-tertiary-container": "#000703",
            "surface-dim": "#111417",
            "text-muted": "#8b949e",
            "primary-fixed-dim": "#b1c5ff",
            "tertiary-fixed": "#6ffbbe",
            "on-primary": "#002c70",
            "inverse-on-surface": "#2e3135",
            "on-secondary": "#2c3138",
            "secondary-fixed-dim": "#c2c7d0",
            "secondary": "#c2c7d0",
            "badge-warning": "#f59e0b",
            "on-primary-fixed-variant": "#00419e",
            "surface-base": "#181b1f",
            "on-tertiary-fixed": "#002113",
            "on-tertiary": "#003824",
            "outline": "#8c90a1",
            "tertiary-fixed-dim": "#4edea3",
            "border-subtle": "#2d333b",
            "surface-variant": "#323539",
            "on-secondary-container": "#b1b5be",
            "on-primary-fixed": "#001946",
            "tertiary": "#4edea3",
            "surface-tint": "#b1c5ff",
            "error": "#ffb4ab",
            "badge-success": "#10b981",
            "secondary-fixed": "#dee3ec",
            "primary-fixed": "#dae2ff",
            "surface-container": "#1d2024",
            "on-background": "#e1e2e8",
            "surface-container-highest": "#323539",
            "outline-variant": "#424655",
            "on-tertiary-fixed-variant": "#005236",
            "on-secondary-fixed": "#171c23",
            "on-primary-container": "#ffffff",
            "surface-bright": "#36393e",
            "badge-info": "#06b6d4",
            "error-container": "#93000a",
            "inverse-surface": "#e1e2e8",
            "surface": "#111417",
            "background": "#111417",
            "badge-danger": "#ef4444",
            "tertiary-container": "#00885d",
            "text-primary": "#e6edf3",
            "on-error-container": "#ffdad6",
            "secondary-container": "#42474f",
            "on-error": "#690005"
          },
          "borderRadius": {
            "DEFAULT": "0.125rem",
            "lg": "0.25rem",
            "xl": "0.5rem",
            "full": "0.75rem"
          },
          "spacing": {
            "margin-mobile": "1rem",
            "gutter": "1.5rem",
            "space-lg": "1.5rem",
            "space-sm": "0.5rem",
            "space-xl": "2.5rem",
            "margin": "1.5rem",
            "space-md": "1rem",
            "gutter-mobile": "0.75rem",
            "space-xs": "0.25rem"
          },
          "fontFamily": {
            "title-sm": ["\"Source Sans 3\""],
            "headline-md": ["\"Source Sans 3\""],
            "headline-lg-mobile": ["\"Source Sans 3\""],
            "label-sm": ["Inter"],
            "body-md": ["\"Source Sans 3\""],
            "body-lg": ["\"Source Sans 3\""],
            "headline-lg": ["\"Source Sans 3\""],
            "headline-sm": ["\"Source Sans 3\""],
            "title-md": ["\"Source Sans 3\""],
            "label-md": ["Inter"],
            "body-sm": ["\"Source Sans 3\""],
            "label-lg": ["Inter"],
            "display": ["\"Source Sans 3\""]
          },
          "fontSize": {
            "title-sm": ["14px", { "lineHeight": "20px", "fontWeight": "600" }],
            "headline-md": ["24px", { "lineHeight": "32px", "fontWeight": "600" }],
            "headline-lg-mobile": ["26px", { "lineHeight": "34px", "fontWeight": "600" }],
            "label-sm": ["11px", { "lineHeight": "14px", "letterSpacing": "0.05em", "fontWeight": "700" }],
            "body-md": ["14px", { "lineHeight": "20px", "fontWeight": "400" }],
            "body-lg": ["16px", { "lineHeight": "24px", "fontWeight": "400" }],
            "headline-lg": ["32px", { "lineHeight": "40px", "fontWeight": "600" }],
            "headline-sm": ["20px", { "lineHeight": "28px", "fontWeight": "600" }],
            "title-md": ["16px", { "lineHeight": "24px", "fontWeight": "600" }],
            "label-md": ["12px", { "lineHeight": "16px", "fontWeight": "600" }],
            "body-sm": ["12px", { "lineHeight": "16px", "fontWeight": "400" }],
            "label-lg": ["14px", { "lineHeight": "20px", "fontWeight": "600" }],
            "display": ["40px", { "lineHeight": "48px", "fontWeight": "700" }]
          }
        },
      },
    }
  </script>
<style>
    .material-symbols-outlined {
      font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
      display: inline-block;
      vertical-align: middle;
      line-height: 1;
    }
    .adminlte-card-header {
      border-bottom: 1px solid #30363d;
    }
    input[type=range]::-webkit-slider-thumb {
      accent-color: #0d6efd;
    }
  </style>
  </head>
    <body class="bg-surface font-body-md text-on-surface antialiased min-h-screen flex flex-col">
    <!-- 1. Top Utility & Announcement Bar -->
    <header class="bg-surface-container-lowest text-text-secondary px-space-md py-1 text-body-sm text-xs border-b border-border-default">
    <div class="max-w-7xl mx-auto flex flex-col sm:flex-row justify-between items-center gap-1">
    <div class="flex items-center gap-space-sm">
    <span class="bg-primary-container text-white px-1.5 py-0.5 rounded text-[10px] font-label-sm uppercase tracking-wider font-bold">Offer</span>
    <span class="text-text-secondary">Free shipping on all orders over $75.00 worldwide!</span>
  </div>
    <div class="flex items-center gap-space-md text-text-muted">
    <div class="flex items-center gap-1 cursor-pointer hover:text-white transition-colors">
    <span class="material-symbols-outlined text-[14px]">language</span>
    <span>USD ($)</span>
    <span class="material-symbols-outlined text-[12px]">expand_more</span>
  </div>
      <span class="text-border-default">|</span>
      <a class="flex items-center gap-1 text-primary hover:text-white transition-colors font-medium" href="#admin-portal">
      <span class="material-symbols-outlined text-[14px]">admin_panel_settings</span>
      <span>Admin Portal / Staff Login</span>
    </a>
    </div>
  </div>
  </header>

  <!-- 2. Main Storefront Header -->
    <div class="bg-surface-container-low border-b border-border-default sticky top-0 z-40 shadow-md">
    <div class="max-w-7xl mx-auto px-space-md md:px-space-lg h-16 flex items-center justify-between gap-space-md">
  <!-- Brand Logo -->
    <div class="flex items-center gap-space-md">
    <a class="flex items-center gap-2" href="#">
    <div class="w-8 h-8 rounded bg-primary-container flex items-center justify-center text-white font-bold shadow-sm">
    <span class="material-symbols-outlined text-[20px]">checkroom</span>
    </div>
    <div class="flex flex-col">
    <span class="font-headline-sm text-headline-sm font-bold tracking-tight text-white leading-tight">Aura Apparel</span>
    <span class="font-label-sm text-[10px] uppercase text-text-muted tracking-widest -mt-0.5">AdminLTE Storefront</span>
    </div>
    </a>
    </div>
  <!-- Search Bar with Category Dropdown -->
    <div class="hidden lg:flex flex-1 max-w-xl mx-4">
      <div class="flex w-full rounded border border-border-default overflow-hidden focus-within:border-primary-container focus-within:ring-1 focus-within:ring-primary-container shadow-sm bg-surface-card">
        <select class="bg-surface-container-high border-r border-border-default text-body-sm font-label-md px-3 py-2 text-on-surface focus:outline-none cursor-pointer">
          <option>All Apparel</option>
          <option>Jackets</option>
        <option>Shirts</option>
      <option>Pants</option>
    </select>
    <div class="relative flex-1 flex items-center">
      <input class="w-full bg-surface-card border-none px-3 py-2 text-body-md text-on-surface placeholder:text-text-muted focus:ring-0" placeholder="Search premium garments, SKU, fits..." type="text"/>
      </div>
        <button class="bg-primary-container text-white px-4 flex items-center justify-center hover:bg-blue-600 transition">
        <span class="material-symbols-outlined text-[18px]">search</span>
      </button>
      </div> 
    </div>
  <!-- Right Actions: Wishlist, Cart & User Account Dropdown -->
    <div class="flex items-center gap-space-sm md:gap-space-md">
  <!-- Wishlist -->
    <button class="relative p-2 text-text-secondary hover:text-white transition rounded-lg hover:bg-surface-hover" title="Saved items">
      <span class="material-symbols-outlined text-[22px]">favorite</span>
      <span class="absolute top-1 right-1 w-4 h-4 rounded-full bg-primary-container text-white font-label-sm text-[10px] flex items-center justify-center font-bold"><?= $wishlistQty ?></span>
    </button>
  <!-- Cart Action -->
    <button class="flex items-center gap-2 bg-surface-card hover:bg-surface-hover px-3 py-1.5 rounded border border-border-default text-on-surface transition">
        <div class="relative">
        <span class="material-symbols-outlined text-[20px] text-primary">shopping_bag</span>
        <span class="absolute -top-1.5 -right-1.5 bg-tertiary text-canvas-dark font-label-sm text-[9px] w-3.5 h-3.5 rounded-full flex items-center justify-center font-bold"><?= $cartQty ?></span>
      </div>
        <div class="hidden sm:flex flex-col text-left">
        <span class="font-label-sm text-[10px] text-text-muted uppercase font-semibold leading-none">Cart Total</span>
        <span class="font-title-sm text-xs font-bold text-white"><?= e(rupiah($cartTotal)) ?></span>
      </div>
    </button>
  
    <div class="h-6 w-px bg-border-default"></div>
  <!-- User Profile Dropdown Pill -->

    <div class="relative group cursor-pointer">
      <div class="flex items-center gap-2 py-1 px-1.5 rounded hover:bg-surface-hover transition">
        <img class="w-8 h-8 rounded object-cover border border-border-default" data-alt="A refined studio portrait of a woman professional with subtle makeup against an executive neutral background. The lighting is clean and soft with light mode aesthetics, capturing natural composure and precision." src="https://lh3.googleusercontent.com/aida-public/AB6AXuBCZ6TFuNNeIAyVYE9ebw7hHdNwPcchd4BDlLhWahilt9B008RT5oazPJy2K5IHet6Er2ZGfO6mehMZ1GBLdaSuN50dtanhz3tnlDKA22tQ9EigP5bM3ux_Mnj5bG268hcrQJygmU2FU70io_oUFvl8yeSMy3OBmRDxmqt3YanvUn5GafRYmmYscd6WUSxpM4FWAqbTPztqvb-T6QZP1SbL4B_NMgxgmnOsthJrlXvj"/>
        <div class="hidden xl:flex flex-col text-left">
        <span class="font-title-sm text-xs text-on-surface leading-tight">Sarah Bullock</span>
      <span class="font-body-sm text-[11px] text-text-muted leading-none">Verified Customer</span>
    </div>
  <span class="material-symbols-outlined text-[16px] text-text-muted">expand_more</span>
  </div>
  
  <!-- Dropdown Flyout -->

            <div class="absolute right-0 mt-1 w-64 bg-surface-container border border-border-default rounded shadow-xl hidden group-hover:block z-50 py-2">
              <div class="px-4 py-2 border-b border-border-default">
              <p class="font-title-sm text-xs text-on-surface">Sarah Bullock</p>
              <p class="font-body-sm text-[11px] text-text-muted truncate">sarah.bullock@example.com</p>
            </div>
            <a class="flex items-center gap-2 px-4 py-2 text-body-sm text-on-surface hover:bg-surface-hover hover:text-primary transition" href="#">
              <span class="material-symbols-outlined text-[16px]">receipt_long</span>
              <span>My Orders</span>
              <span class="ml-auto bg-surface-container-high px-1.5 py-0.5 rounded text-[10px] font-label-sm text-text-secondary">4 Active</span>
              </a>
            <a class="flex items-center gap-2 px-4 py-2 text-body-sm text-on-surface hover:bg-surface-hover hover:text-primary transition" href="#">
              <span class="material-symbols-outlined text-[16px]">location_on</span>
              <span>Saved Addresses</span>
            </a>
            <a class="flex items-center gap-2 px-4 py-2 text-body-sm text-on-surface hover:bg-surface-hover hover:text-primary transition" href="#">
              <span class="material-symbols-outlined text-[16px]">tune</span>
              <span>Account Settings</span>
            </a>
            <div class="border-t border-border-default mt-1 pt-1">
              <a class="flex items-center gap-2 px-4 py-2 text-body-sm text-error hover:bg-error-container/30 transition" href="#">
              <span class="material-symbols-outlined text-[16px]">logout</span>
            <span>Sign Out</span>
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Secondary Category Navigation Bar -->
        <div class="border-t border-border-default bg-surface-container-lowest px-space-md">
          <div class="max-w-7xl mx-auto flex items-center justify-between overflow-x-auto py-1.5 gap-space-md">
            <nav class="flex items-center gap-space-lg text-body-sm">
          <a class="text-primary font-bold border-b-2 border-primary-container py-1 px-1 flex items-center gap-1" href="#">
          <span class="material-symbols-outlined text-[16px]">male</span> Men
        </a>
          <a class="text-text-secondary hover:text-white transition font-medium py-1 px-1 flex items-center gap-1" href="#">
          <span class="material-symbols-outlined text-[16px]">female</span> Women
        </a>
        <a class="text-text-secondary hover:text-white transition font-medium py-1 px-1" href="#">Kids</a>
          <a class="text-text-secondary hover:text-white transition font-medium py-1 px-1 flex items-center gap-1" href="#">
            <span>New Arrivals</span>
          <span class="bg-primary-container text-white text-[9px] px-1 py-0.2 rounded font-label-sm uppercase">Fresh</span>
        </a>
        <a class="text-badge-danger hover:text-opacity-80 transition font-bold py-1 px-1 flex items-center gap-1" href="#">
          <span>Sale</span>
          <span class="bg-badge-danger text-white text-[9px] px-1.5 py-0.2 rounded-full font-label-sm font-bold uppercase">-40%</span>
        </a>
      </nav>
        <div class="hidden md:flex items-center gap-space-md text-xs text-text-muted">
          <span class="flex items-center gap-1"><span class="material-symbols-outlined text-[14px] text-tertiary">verified</span> AdminLTE 4 Ready</span>
          <span class="flex items-center gap-1"><span class="material-symbols-outlined text-[14px]">local_shipping</span> Track Order</span>
        </div>
      </div>
    </div>
  </div>
        <!-- Main Storefront Content Container -->
          <main class="flex-grow max-w-7xl w-full mx-auto px-space-md md:px-space-lg py-space-md flex flex-col gap-space-lg">
            <?php if (isset($_GET['added'])): ?>
              <div class="max-w-7xl mx-auto px-space-md md:px-space-lg pt-space-md">
                <div class="flex items-center gap-2 bg-[#10b981]/15 border border-[#10b981]/40 text-[#6ee7b7] rounded-lg px-space-md py-space-sm text-body-sm">
                  <span class="material-symbols-outlined text-body-md">check_circle</span>
                  Item added to cart.
                </div>
              </div>
            <?php endif; ?>
          <!-- 3. Hero Banner: Clothing Collection Showcase -->
          <section class="relative bg-surface-container-low border border-border-default rounded overflow-hidden shadow-md">
          <div class="grid grid-cols-1 lg:grid-cols-12 items-stretch min-h-[340px]">
          <!-- Left Content -->
          <div class="lg:col-span-7 p-space-lg md:p-space-xl flex flex-col justify-center gap-space-md z-10">
          <div class="flex items-center gap-2">
          <span class="bg-surface-container-high text-on-surface px-2.5 py-0.5 rounded text-xs font-label-md uppercase tracking-wider font-semibold border border-border-default">Seasonal Release</span>
          <span class="text-tertiary text-xs font-title-sm flex items-center gap-1">
          <span class="material-symbols-outlined text-[14px]">eco</span> 100% Sustainable Cotton
                    </span>
        </div>
        <div>
        <h1 class="font-headline-lg text-headline-lg md:text-[34px] font-bold text-white leading-tight">
                      Autumn / Winter Collection 2025
                    </h1>
        <p class="font-body-lg text-body-lg text-text-secondary mt-2 max-w-lg">
                      Refined minimalist apparel precision-crafted with heavyweight natural textiles and architectural tailoring.
                    </p>
        </div>
        <!-- CTAs -->
        <div class="flex flex-wrap items-center gap-space-md pt-2">
        <button class="bg-primary-container text-white px-space-md py-2 rounded font-title-sm hover:bg-blue-600 shadow-sm flex items-center gap-2 active:scale-95 transition">
        <span>Shop Menswear</span>
        <span class="material-symbols-outlined text-[18px]">arrow_forward</span>
        </button>
        <button class="bg-surface-card border border-border-default text-on-surface px-space-md py-2 rounded font-title-sm hover:bg-surface-hover hover:border-outline transition">
        <span>Shop Womenswear</span>
        </button>
        </div>
        <!-- Quick Feature Badges -->
        <div class="grid grid-cols-3 gap-2 pt-4 border-t border-border-default text-text-secondary">
        <div class="flex items-center gap-1.5">
        <span class="material-symbols-outlined text-primary text-[18px]">workspace_premium</span>
        <span class="font-label-md text-xs">Japanese Selvedge</span>
        </div>
        <div class="flex items-center gap-1.5">
        <span class="material-symbols-outlined text-primary text-[18px]">bolt</span>
        <span class="font-label-md text-xs">Next-Day Delivery</span>
        </div>
        <div class="flex items-center gap-1.5">
        <span class="material-symbols-outlined text-primary text-[18px]">published_with_changes</span>
        <span class="font-label-md text-xs">30-Day Free Returns</span>
        </div>
        </div>
        </div>
        <!-- Right Hero Visual -->
        <div class="lg:col-span-5 relative bg-surface-container min-h-[220px] lg:min-h-full">
        <img class="absolute inset-0 w-full h-full object-cover filter brightness-95" data-alt="A high-fashion modern editorial shot of two models showcasing contemporary minimalist outerwear and tailored wool overcoats in neutral olive, charcoal, and cream tones. Soft ambient studio lighting against a textured concrete architecture backdrop with light mode aesthetic." src="https://lh3.googleusercontent.com/aida-public/AB6AXuDSHq5yqbJB6uAw4TxCeZNguYY5RGw1VhYWyqO3AtDeqFBtbCAKqo3XkrOo5GdPMvpXaj1jC4b5B_GzUWOU5jlMV1HEQ9csGadFkCSg-5b4luPjKnfTidygD85V5dyyUyVjk_-6gSAuueHkZg9MqZLRqahz29f2OTU6wjTo0hBaf3SYbr0tJWKjlnSJtXKNXaz4S3gnqA7lFopLdx36TVI_PxbFASgsl5p3_eo_ySTV"/>
        <div class="absolute inset-0 bg-gradient-to-r from-surface-container-low/70 via-transparent to-transparent lg:block hidden"></div>
        <div class="absolute bottom-3 right-3 bg-surface-container-lowest/85 border border-border-default backdrop-blur-sm text-white px-3 py-1 rounded text-xs font-label-md flex items-center gap-1.5">
        <span class="w-2 h-2 rounded-full bg-tertiary animate-pulse"></span>
        <span>Live Stock Synchronized with ERP</span>
        </div>
        </div>
        </div>
        </section>
        <!-- 4. Category Quick-Pills Filter Bar -->
          <section class="flex items-center gap-2 overflow-x-auto pb-1">
            <span class="text-xs font-label-md uppercase text-text-muted mr-2 shrink-0">Browse:</span>
              <button class="bg-primary-container text-white px-3.5 py-1 rounded-full text-xs font-title-sm shrink-0 shadow-sm">All</button>
              <button class="bg-surface-card border border-border-default hover:border-primary text-text-secondary hover:text-white px-3.5 py-1 rounded-full text-xs font-body-md shrink-0 transition">Outerwear</button>
              <button class="bg-surface-card border border-border-default hover:border-primary text-text-secondary hover:text-white px-3.5 py-1 rounded-full text-xs font-body-md shrink-0 transition">T-Shirts &amp; Tops</button>
              <button class="bg-surface-card border border-border-default hover:border-primary text-text-secondary hover:text-white px-3.5 py-1 rounded-full text-xs font-body-md shrink-0 transition">Denim</button>
              <button class="bg-surface-card border border-border-default hover:border-primary text-text-secondary hover:text-white px-3.5 py-1 rounded-full text-xs font-body-md shrink-0 transition">Knitwear</button>
              <button class="bg-surface-card border border-border-default hover:border-primary text-text-secondary hover:text-white px-3.5 py-1 rounded-full text-xs font-body-md shrink-0 transition">Formal</button>
              <button class="bg-surface-card border border-border-default hover:border-primary text-text-secondary hover:text-white px-3.5 py-1 rounded-full text-xs font-body-md shrink-0 transition">Accessories</button>
            <span class="ml-auto text-xs text-text-muted hidden md:inline-block">Showing <?= count($products) ?> of <?= number_format($totalProducts) ?> catalog items</span>
          </section>
        <!-- 5. Two-column Storefront Layout -->
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-space-lg items-start">
        <!-- Sidebar Filters -->
        <aside class="lg:col-span-3 space-y-space-md">
        <!-- Main Filter Card -->
        <div class="bg-surface-container-low border border-border-default rounded shadow-sm overflow-hidden">
        <!-- Card Header -->
        <div class="px-space-md py-space-sm bg-surface-container border-b border-border-default flex items-center justify-between">
        <div class="flex items-center gap-2">
        <span class="material-symbols-outlined text-[18px] text-primary">filter_alt</span>
        <h3 class="font-title-md text-title-md text-white font-bold">Refine Catalog</h3>
        </div>
        <button class="text-xs text-primary hover:underline font-label-md">Reset</button>
        </div>
        <div class="p-space-md divide-y divide-border-default space-y-space-md">
        <!-- Filter by Size -->
        <div class="pt-0">
        <label class="block font-title-sm text-xs font-bold text-white uppercase tracking-wider mb-2">Size Matrix</label>
        <div class="grid grid-cols-3 gap-1.5">
        <button class="py-1.5 text-center text-xs font-label-md border border-border-default rounded hover:border-primary bg-surface-card text-on-surface transition">XS</button>
        <button class="py-1.5 text-center text-xs font-label-md border-2 border-primary-container bg-primary-container/20 text-primary font-bold rounded">S</button>
        <button class="py-1.5 text-center text-xs font-label-md border-2 border-primary-container bg-primary-container text-white font-bold rounded shadow-xs">M</button>
        <button class="py-1.5 text-center text-xs font-label-md border border-border-default rounded hover:border-primary bg-surface-card text-on-surface transition">L</button>
        <button class="py-1.5 text-center text-xs font-label-md border border-border-default rounded hover:border-primary bg-surface-card text-on-surface transition">XL</button>
        <button class="py-1.5 text-center text-xs font-label-md border border-border-default rounded bg-surface-container-highest text-text-muted opacity-50 line-through cursor-not-allowed">XXL</button>
        </div>
        </div>
        <!-- Filter by Color Swatches -->
        <div class="pt-space-md">
        <label class="block font-title-sm text-xs font-bold text-white uppercase tracking-wider mb-2">Color Palette</label>
        <div class="flex items-center gap-2">
        <button class="w-6 h-6 rounded-full bg-slate-900 border-2 border-primary ring-1 ring-primary focus:outline-none" title="Black"></button>
        <button class="w-6 h-6 rounded-full bg-blue-950 border border-outline hover:scale-110 transition" title="Navy"></button>
        <button class="w-6 h-6 rounded-full bg-amber-100 border border-outline hover:scale-110 transition" title="Sand"></button>
        <button class="w-6 h-6 rounded-full bg-stone-600 border border-outline hover:scale-110 transition" title="Olive"></button>
        <button class="w-6 h-6 rounded-full bg-gray-600 border border-outline hover:scale-110 transition" title="Charcoal"></button>
        </div>
        </div>
        <!-- Price Range Slider -->
        <div class="pt-space-md">
        <div class="flex justify-between items-center mb-1">
        <label class="font-title-sm text-xs font-bold text-white uppercase tracking-wider">Price Range</label>
        <span class="text-xs font-title-sm text-primary font-bold">$20 - $250</span>
        </div>
        <input class="w-full h-1.5 bg-surface-container-highest rounded cursor-pointer accent-primary-container" max="250" min="20" type="range" value="120"/>
        <div class="flex justify-between text-[11px] text-text-muted mt-1 font-body-sm">
        <span>$20.00</span>
        <span>$250.00</span>
        </div>
        </div>
        <!-- Category & Fit Selectors -->
        <div class="pt-space-md space-y-2">
        <label class="block font-title-sm text-xs font-bold text-white uppercase tracking-wider mb-1">Silhouettes &amp; Fit</label>
        <label class="flex items-center gap-2 cursor-pointer text-body-sm text-on-surface">
        <input checked="" class="rounded border-border-default bg-surface-card text-primary-container focus:ring-primary-container w-4 h-4" type="checkbox"/>
        <span>Regular Fit (18)</span>
        </label>
        <label class="flex items-center gap-2 cursor-pointer text-body-sm text-on-surface">
        <input checked="" class="rounded border-border-default bg-surface-card text-primary-container focus:ring-primary-container w-4 h-4" type="checkbox"/>
        <span>Oversized / Boxy (12)</span>
        </label>
        <label class="flex items-center gap-2 cursor-pointer text-body-sm text-on-surface">
        <input class="rounded border-border-default bg-surface-card text-primary-container focus:ring-primary-container w-4 h-4" type="checkbox"/>
        <span>Slim Tailored (8)</span>
        </label>
        </div>
        <!-- Stock Availability Toggle -->
        <div class="pt-space-md flex items-center justify-between">
        <div>
        <span class="text-xs font-title-sm font-bold text-white block">In Stock Only</span>
        <span class="text-[11px] text-text-muted">Exclude backorders</span>
        </div>
        <label class="relative inline-flex items-center cursor-pointer">
        <input checked="" class="sr-only peer" type="checkbox"/>
        <div class="w-9 h-5 bg-surface-container-highest peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-600 after:border after:rounded-full after:h-4 after:w-4 after:transition-all peer-checked:bg-primary-container"></div>
        </label>
        </div>
        </div>
        <!-- Filter Action Footer -->
        <div class="bg-surface-container px-space-md py-space-sm border-t border-border-default">
        <button class="w-full bg-primary-container text-white py-2 rounded text-xs font-title-sm hover:bg-blue-600 transition shadow-sm font-bold">
                      Apply Filters (6 Matching)
                    </button>
        </div>
        </div>
        <!-- AdminLTE Quick System Status Box -->
        <div class="bg-surface-container-low border border-border-default rounded p-space-md text-xs text-text-secondary space-y-2">
        <div class="flex items-center justify-between text-white font-title-sm">
        <span class="flex items-center gap-1.5">
        <span class="w-2 h-2 rounded-full bg-tertiary"></span>
        <span>Inventory Sync</span>
        </span>
        <span class="font-label-sm text-[10px] bg-tertiary/20 text-tertiary border border-tertiary/30 px-1.5 py-0.5 rounded font-bold">ACTIVE</span>
        </div>
        <p class="text-[11px] text-text-muted">Warehouse Hub: <strong class="text-on-surface">US-East-01</strong>. Quantities automatically deducted via MySQL transaction stream.</p>
        </div>
        </aside>
        <!-- Product Grid (col-lg-9) -->
        <section class="lg:col-span-9 flex flex-col gap-space-md">
        Showing <strong class="text-white"><?= count($products) ?: 0 ?></strong>
        of <strong class="text-white"><?= number_format($totalProducts) ?></strong> active styles
      </div>

      <!-- Storefront Controls Header -->
        <div class="bg-surface-container-low border border-border-default rounded px-space-md py-space-sm flex flex-col sm:flex-row justify-between items-center gap-space-sm shadow-sm">
        <div class="text-xs text-text-muted">
        Showing <strong class="text-white">1 - 6</strong> of <strong class="text-white">38</strong> active styles
      </div>
      <div class="flex items-center gap-space-sm">
          <label for="sort" class="text-xs text-text-muted">Sort By:</label>
            <select id="sort" name="sort" onchange="this.form.submit()"
                    class="bg-surface-card border border-border-default rounded text-xs font-title-sm px-2.5 py-1 text-on-surface focus:outline-none focus:border-primary-container">
                <option value="featured"   <?= $sort === 'featured'   ? 'selected' : '' ?>>Recommended / Featured</option>
                <option value="price_asc"  <?= $sort === 'price_asc'  ? 'selected' : '' ?>>Price: Low to High</option>
                <option value="price_desc" <?= $sort === 'price_desc' ? 'selected' : '' ?>>Price: High to Low</option>
                <option value="name_asc"   <?= $sort === 'name_asc'   ? 'selected' : '' ?>>Name: A → Z</option>
                <option value="newest"     <?= $sort === 'newest'     ? 'selected' : '' ?>>Newest Additions</option>
            </select>
      </div>
        
        <!-- 6 Items Product Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-space-md">
        <?php if (!$products): ?>
          <div class="col-span-full bg-surface-container-low border border-border-default rounded p-space-lg text-center text-text-muted">
            Belum ada produk. Tambahkan produk lewat tabel <code>barang</code>.
          </div>
        <?php else: foreach ($products as $p): ?>
          <article class="bg-surface-card border border-border-default rounded overflow-hidden flex flex-col group hover:border-primary/60 hover:shadow-lg transition">
            <div class="relative aspect-[3/4] bg-surface-container overflow-hidden flex items-center justify-center">
              <span class="material-symbols-outlined text-[80px] text-border-default">checkroom</span>
              <?php if (!empty($p['brand_name'])): ?>
                <div class="absolute top-2.5 left-2.5">
                  <span class="bg-primary-container text-white font-label-sm text-[10px] uppercase font-bold px-2 py-0.5 rounded shadow-sm">
                    <?= e($p['brand_name']) ?>
                  </span>
                </div>
              <?php endif; ?>
            </div>
            <div class="p-space-md flex flex-col flex-grow justify-between gap-3">
              <div>
                <div class="flex items-center justify-between text-xs text-text-muted mb-1">
                  <span class="font-label-md text-[11px] uppercase tracking-wider">
                    <?= e($p['category'] ?: 'Uncategorized') ?>
                  </span>
                  <?php if (!empty($p['warna'])): ?>
                    <span class="text-text-muted"><?= e($p['warna']) ?></span>
                  <?php endif; ?>
                </div>
                <h4 class="font-title-md text-title-md text-white group-hover:text-primary transition leading-snug">
                  <?= e($p['nm_barang']) ?>
                </h4>
                <div class="flex items-center gap-1.5 mt-2">
                  <span class="font-title-md text-lg font-bold text-white"><?= e(rupiah($p['harga_jual'])) ?></span>
                </div>
                <?php if (!empty($p['model'])): ?>
                  <div class="text-label-sm text-text-muted mt-1"><?= e($p['model']) ?></div>
                <?php endif; ?>
              </div>
              <form method="post" action="mainpage.php">
                <input type="hidden" name="action" value="add_to_cart" />
                <input type="hidden" name="id_barang" value="<?= (int)$p['id_barang'] ?>" />
                <input type="hidden" name="qty" value="1" />
                <button type="submit" class="w-full bg-primary-container text-white py-2 rounded font-title-sm text-xs hover:bg-blue-600 flex items-center justify-center gap-1.5 transition active:scale-[0.99] font-bold shadow-sm">
                  <span class="material-symbols-outlined text-[16px]">shopping_bag</span>
                  <span>Add to Cart</span>
                </button>
              </form>
            </div>
        </article>
      <?php endforeach; endif; ?>
    </div>
        
    </article>
        <!-- ITEM 2: Minimalist Merino Wool Sweater -->
          <article class="bg-surface-card border border-border-default rounded overflow-hidden flex flex-col group hover:border-primary/60 hover:shadow-lg transition">
            <div class="relative aspect-[3/4] bg-surface-container overflow-hidden">
            <img class="w-full h-full object-cover group-hover:scale-105 transition duration-300" data-alt="A studio catalog photograph of a refined minimalist crewneck merino wool sweater in oatmeal heather knit. Professional high-key photography with clear weave definition on an ivory setting." src="https://lh3.googleusercontent.com/aida-public/AB6AXuAbFtCd_XKbZFtf6HowYXVO-Uu2wsuba-qGp1hUfjUXyKRaCw_NsMDR61gqjsf7uZrO7P04G74vUd9JImUOLj2xELzJoObgWA8Qmk3VPaceDYcJQuI13cJyuYSUBc6jWKGBXFBordTBV80qJzduBIHl5Y_tsJD1195d9iJb1WB_VqhHbDU2QtCo2b5ewco00AYgnR8SdUg6v9v4LZXEQcXmP9tNPGmiHwP-ehYDuYeF"/>
            <div class="absolute top-2.5 left-2.5">
          <span class="bg-tertiary-container text-white font-label-sm text-[10px] uppercase font-bold px-2 py-0.5 rounded shadow-sm">New</span>
        </div>
        <button class="absolute top-2.5 right-2.5 w-8 h-8 rounded-full bg-surface-container-lowest/80 backdrop-blur-sm text-text-muted hover:text-error flex items-center justify-center transition border border-border-default shadow-sm">
        <span class="material-symbols-outlined text-[18px]">favorite</span>
        </button>
        </div>
        <div class="p-space-md flex flex-col flex-grow justify-between gap-3">
        <div>
        <div class="flex items-center justify-between text-xs text-text-muted mb-1">
        <span class="font-label-md text-[11px] uppercase tracking-wider text-text-muted">Knitwear Studio</span>
        <div class="flex items-center gap-1 text-badge-warning font-label-sm text-[11px]">
        <span class="material-symbols-outlined text-[14px]" style="font-variation-settings: 'FILL' 1;">star</span>
        <span class="font-bold text-white">4.8</span>
        <span class="text-text-muted">(42)</span>
        </div>
        </div>
        <h4 class="font-title-md text-title-md text-white group-hover:text-primary transition leading-snug">
                          Minimalist Merino Wool Sweater
                        </h4>
        <div class="flex items-center gap-1.5 mt-2">
        <span class="font-title-md text-lg font-bold text-white">$89.00</span>
        <span class="text-xs text-text-muted">USD</span>
        </div>
        <div class="flex items-center gap-1 mt-2">
        <span class="text-[10px] text-text-muted uppercase font-semibold mr-1">Sizes:</span>
        <span class="px-1.5 py-0.5 border border-border-default bg-surface-container text-text-secondary text-[10px] rounded font-label-md">M</span>
        <span class="px-1.5 py-0.5 border border-border-default bg-surface-container text-text-secondary text-[10px] rounded font-label-md">L</span>
        </div>
        </div>
        <button class="w-full bg-surface-container hover:bg-surface-hover border border-border-default hover:border-primary text-on-surface py-2 rounded font-title-sm text-xs flex items-center justify-center gap-1.5 transition">
        <span class="material-symbols-outlined text-[16px]">shopping_bag</span>
        <span>Add to Cart</span>
        </button>
        </div>
        </article>
        <!-- ITEM 3: Structured Utility Overshirt (ON SALE) -->
        <article class="bg-surface-card border border-border-default rounded overflow-hidden flex flex-col group hover:border-primary/60 hover:shadow-lg transition">
        <div class="relative aspect-[3/4] bg-surface-container overflow-hidden">
        <img class="w-full h-full object-cover group-hover:scale-105 transition duration-300" data-alt="A studio photograph of a structured military-inspired utility overshirt in deep olive canvas with dual chest flap pockets and tonal horn buttons, set against a calm pale grey light studio environment." src="https://lh3.googleusercontent.com/aida-public/AB6AXuA2h1NxbKdzfjLO0gQaSQXkDQO49W2Ot-N5H0tbGE2IE6j5ep2Q2K2g3HdgC1504qnKWHXgT6Cz1VuGrlqm94tDm_QAWXpmaZH5MbT88eztojfj4bJn2PLVCX02cLzGv6t689pSPpg0nkxJFOUNpuJUHwj3u1PPa22qBtOLpOPm9fsAg7K5WsFH2HwN7D0WlvT1u3FR90xSXSnrvnWYGYRCrNXq4cF5oc0IcdUWtge2"/>
        <div class="absolute top-2.5 left-2.5">
        <span class="bg-badge-danger text-white font-label-sm text-[10px] uppercase font-bold px-2 py-0.5 rounded shadow-sm">-25% Sale</span>
        </div>
        <button class="absolute top-2.5 right-2.5 w-8 h-8 rounded-full bg-surface-container-lowest/80 backdrop-blur-sm text-text-muted hover:text-error flex items-center justify-center transition border border-border-default shadow-sm">
        <span class="material-symbols-outlined text-[18px]">favorite</span>
        </button>
        </div>
        <div class="p-space-md flex flex-col flex-grow justify-between gap-3">
        <div>
        <div class="flex items-center justify-between text-xs text-text-muted mb-1">
        <span class="font-label-md text-[11px] uppercase tracking-wider text-text-muted">Outerwear</span>
        <div class="flex items-center gap-1 text-badge-warning font-label-sm text-[11px]">
        <span class="material-symbols-outlined text-[14px]" style="font-variation-settings: 'FILL' 1;">star</span>
        <span class="font-bold text-white">5.0</span>
        <span class="text-text-muted">(88)</span>
        </div>
        </div>
        <h4 class="font-title-md text-title-md text-white group-hover:text-primary transition leading-snug">
                          Structured Utility Overshirt
                        </h4>
        <div class="flex items-center gap-2 mt-2">
        <span class="font-title-md text-lg font-bold text-badge-danger">$74.00</span>
        <span class="text-xs text-text-muted line-through">$98.00</span>
        </div>
        <div class="flex items-center gap-1 mt-2">
        <span class="text-[10px] text-text-muted uppercase font-semibold mr-1">Sizes:</span>
        <span class="px-1.5 py-0.5 border border-border-default bg-surface-container text-text-secondary text-[10px] rounded font-label-md">S</span>
        <span class="px-1.5 py-0.5 border border-border-default bg-surface-container text-text-secondary text-[10px] rounded font-label-md">M</span>
        <span class="px-1.5 py-0.5 border border-border-default bg-surface-container text-text-secondary text-[10px] rounded font-label-md">L</span>
        </div>
        </div>
        <button class="w-full bg-primary-container text-white py-2 rounded font-title-sm text-xs hover:bg-blue-600 flex items-center justify-center gap-1.5 transition font-bold shadow-sm">
        <span class="material-symbols-outlined text-[16px]">shopping_bag</span>
        <span>Add to Cart</span>
        </button>
        </div>
        </article>
        <!-- ITEM 4: Tailored Pleated Trousers -->
        <article class="bg-surface-card border border-border-default rounded overflow-hidden flex flex-col group hover:border-primary/60 hover:shadow-lg transition">
        <div class="relative aspect-[3/4] bg-surface-container overflow-hidden">
        <img class="w-full h-full object-cover group-hover:scale-105 transition duration-300" data-alt="A clean apparel product photo of tailored double-pleated trousers in charcoal melange wool blend, featuring modern tapered silhouette draped with precision on an off-white display surface." src="https://lh3.googleusercontent.com/aida-public/AB6AXuBOdaIgs5CdNdKY1YI3iIeFIaPi_vqNgq-kpdbY3N2mu4LXA6m7rh_2fOonQRw7s0mk4glkgH8PA2WxYwwLuZDL41wyVmKEIADc1J6f4a__bxka4c_1iU0qqj3CCxW_aYWnCX9dYnzL9ql0bBouTY7-0aEe-smUswIFeUfj9qTX5ut_fR-Q8j_psiyGcfRb5v31s9Sbz5bRKqF0pxMUNj8NpH-VOuQguqgeJ-pthnJQ"/>
        <button class="absolute top-2.5 right-2.5 w-8 h-8 rounded-full bg-surface-container-lowest/80 backdrop-blur-sm text-text-muted hover:text-error flex items-center justify-center transition border border-border-default shadow-sm">
        <span class="material-symbols-outlined text-[18px]">favorite</span>
        </button>
        </div>
        <div class="p-space-md flex flex-col flex-grow justify-between gap-3">
        <div>
        <div class="flex items-center justify-between text-xs text-text-muted mb-1">
        <span class="font-label-md text-[11px] uppercase tracking-wider text-text-muted">Bottoms &amp; Suiting</span>
        <div class="flex items-center gap-1 text-badge-warning font-label-sm text-[11px]">
        <span class="material-symbols-outlined text-[14px]" style="font-variation-settings: 'FILL' 1;">star</span>
        <span class="font-bold text-white">4.7</span>
        <span class="text-text-muted">(56)</span>
        </div>
        </div>
        <h4 class="font-title-md text-title-md text-white group-hover:text-primary transition leading-snug">
                          Tailored Pleated Trousers
                        </h4>
        <div class="flex items-center gap-1.5 mt-2">
        <span class="font-title-md text-lg font-bold text-white">$65.00</span>
        <span class="text-xs text-text-muted">USD</span>
        </div>
        <div class="flex items-center gap-1 mt-2">
        <span class="text-[10px] text-text-muted uppercase font-semibold mr-1">Waist:</span>
        <span class="px-1.5 py-0.5 border border-border-default bg-surface-container text-text-secondary text-[10px] rounded font-label-md">30</span>
        <span class="px-1.5 py-0.5 border border-border-default bg-surface-container text-text-secondary text-[10px] rounded font-label-md">32</span>
        <span class="px-1.5 py-0.5 border border-border-default bg-surface-container text-text-secondary text-[10px] rounded font-label-md">34</span>
        <span class="px-1.5 py-0.5 border border-border-default bg-surface-container text-text-secondary text-[10px] rounded font-label-md">36</span>
        </div>
        </div>
        <button class="w-full bg-surface-container hover:bg-surface-hover border border-border-default hover:border-primary text-on-surface py-2 rounded font-title-sm text-xs flex items-center justify-center gap-1.5 transition">
        <span class="material-symbols-outlined text-[16px]">shopping_bag</span>
        <span>Add to Cart</span>
        </button>
        </div>
        </article>
        <!-- ITEM 5: Japanese Selvedge Denim Jacket -->
        <article class="bg-surface-card border border-border-default rounded overflow-hidden flex flex-col group hover:border-primary/60 hover:shadow-lg transition">
        <div class="relative aspect-[3/4] bg-surface-container overflow-hidden">
        <img class="w-full h-full object-cover group-hover:scale-105 transition duration-300" data-alt="A commercial product photography shot of a 14oz raw indigo Japanese selvedge denim jacket with custom brass hardware, crisp red selvedge id detail showing at the cuff, against a clean illuminated light grey backdrop." src="https://lh3.googleusercontent.com/aida-public/AB6AXuBiI8hZ3JfwrPXmAHMnb6e23FyA_PeicmNUaUbIIWos9cPe5aWk68nj6Wm0iPgELMgha2NqrsnCO6qKiv1MJVU2Tx6ATIv6dq6lIsCyy1-ARPVWRXruWCk55cjlggktRHYFmWc002Hbo-g7ayR8-GUsAlAN1kcr81aMJbiIMhWz3gZnjO8l4LVAzHNHN8_HjXyFl-7RCALIi_jK36mp3e7XLKGdNRP2k6cnbvXkj33g"/>
        <div class="absolute top-2.5 left-2.5">
        <span class="bg-surface-container-high text-primary font-label-sm text-[10px] uppercase font-bold px-2 py-0.5 rounded border border-border-default">Artisan</span>
        </div>
        <button class="absolute top-2.5 right-2.5 w-8 h-8 rounded-full bg-surface-container-lowest/80 backdrop-blur-sm text-text-muted hover:text-error flex items-center justify-center transition border border-border-default shadow-sm">
        <span class="material-symbols-outlined text-[18px]">favorite</span>
        </button>
        </div>
        <div class="p-space-md flex flex-col flex-grow justify-between gap-3">
        <div>
        <div class="flex items-center justify-between text-xs text-text-muted mb-1">
        <span class="font-label-md text-[11px] uppercase tracking-wider text-text-muted">Heritage Denim</span>
        <div class="flex items-center gap-1 text-badge-warning font-label-sm text-[11px]">
        <span class="material-symbols-outlined text-[14px]" style="font-variation-settings: 'FILL' 1;">star</span>
        <span class="font-bold text-white">4.9</span>
        <span class="text-text-muted">(92)</span>
        </div>
        </div>
        <h4 class="font-title-md text-title-md text-white group-hover:text-primary transition leading-snug">
                          Japanese Selvedge Denim Jacket
                        </h4>
        <div class="flex items-center gap-1.5 mt-2">
        <span class="font-title-md text-lg font-bold text-white">$120.00</span>
        <span class="text-xs text-text-muted">USD</span>
        </div>
        <div class="flex items-center gap-1 mt-2">
        <span class="text-[10px] text-text-muted uppercase font-semibold mr-1">Sizes:</span>
        <span class="px-1.5 py-0.5 border border-border-default bg-surface-container text-text-secondary text-[10px] rounded font-label-md">M</span>
        <span class="px-1.5 py-0.5 border border-border-default bg-surface-container text-text-secondary text-[10px] rounded font-label-md">L</span>
        <span class="px-1.5 py-0.5 border border-border-default bg-surface-container text-text-secondary text-[10px] rounded font-label-md">XL</span>
        </div>
        </div>
        <button class="w-full bg-primary-container text-white py-2 rounded font-title-sm text-xs hover:bg-blue-600 flex items-center justify-center gap-1.5 transition font-bold shadow-sm">
        <span class="material-symbols-outlined text-[16px]">shopping_bag</span>
        <span>Add to Cart</span>
        </button>
        </div>
        </article>
        <!-- ITEM 6: Relaxed French Terry Hoodie -->
        <article class="bg-surface-card border border-border-default rounded overflow-hidden flex flex-col group hover:border-primary/60 hover:shadow-lg transition">
        <div class="relative aspect-[3/4] bg-surface-container overflow-hidden">
        <img class="w-full h-full object-cover group-hover:scale-105 transition duration-300" data-alt="A clean studio photo of a relaxed 450 GSM French terry cotton hoodie in washed heather grey with seamless kangaroo pocket and double-lined hood on a calm bright minimal studio background." src="https://lh3.googleusercontent.com/aida-public/AB6AXuDYCvyC4obvWApyOwnUX7TzEcTenNqpS-sQ0io_xfvpqW4Bqw_9IWqzp7s5hmXO0aKXgUgnj4ihuhdfDOE37e7o_MIYCFkCDMyvydayWdDo_eFjI6i3eDbgDNvGAGZscLNpyZHZ7vzlyv2UXNAa8K1efN-JCY4QR3cpJ-3hkd1jgyF5rIAFziA0Uru6kGmoBAtfNAWzrFJ62sUMyvwK6N4hAUXN36rdDK6-MqYnBBsY"/>
        <button class="absolute top-2.5 right-2.5 w-8 h-8 rounded-full bg-surface-container-lowest/80 backdrop-blur-sm text-text-muted hover:text-error flex items-center justify-center transition border border-border-default shadow-sm">
        <span class="material-symbols-outlined text-[18px]">favorite</span>
        </button>
        </div>
        <div class="p-space-md flex flex-col flex-grow justify-between gap-3">
        <div>
        <div class="flex items-center justify-between text-xs text-text-muted mb-1">
        <span class="font-label-md text-[11px] uppercase tracking-wider text-text-muted">Loungewear</span>
        <div class="flex items-center gap-1 text-badge-warning font-label-sm text-[11px]">
        <span class="material-symbols-outlined text-[14px]" style="font-variation-settings: 'FILL' 1;">star</span>
        <span class="font-bold text-white">4.8</span>
        <span class="text-text-muted">(64)</span>
        </div>
        </div>
        <h4 class="font-title-md text-title-md text-white group-hover:text-primary transition leading-snug">
                          Relaxed French Terry Hoodie
                        </h4>
        <div class="flex items-center gap-1.5 mt-2">
        <span class="font-title-md text-lg font-bold text-white">$55.00</span>
        <span class="text-xs text-text-muted">USD</span>
        </div>
        <div class="flex items-center gap-1 mt-2">
        <span class="text-[10px] text-text-muted uppercase font-semibold mr-1">Sizes:</span>
        <span class="px-1.5 py-0.5 border border-border-default bg-surface-container text-text-secondary text-[10px] rounded font-label-md">S</span>
        <span class="px-1.5 py-0.5 border border-border-default bg-surface-container text-text-secondary text-[10px] rounded font-label-md">M</span>
        <span class="px-1.5 py-0.5 border border-border-default bg-surface-container text-text-secondary text-[10px] rounded font-label-md">L</span>
        <span class="px-1.5 py-0.5 border border-border-default bg-surface-container text-text-secondary text-[10px] rounded font-label-md">XL</span>
        </div>
        </div>
        <button class="w-full bg-surface-container hover:bg-surface-hover border border-border-default hover:border-primary text-on-surface py-2 rounded font-title-sm text-xs flex items-center justify-center gap-1.5 transition">
        <span class="material-symbols-outlined text-[16px]">shopping_bag</span>
        <span>Add to Cart</span>
        </button>
        </div>
        </article>
        </div>
        <!-- Quick Pagination Bar -->
        <div class="bg-surface-container-low border border-border-default rounded p-space-md flex flex-col sm:flex-row justify-between items-center gap-space-md shadow-sm">
        <span class="text-xs text-text-muted font-body-sm">
                    Showing <strong class="text-white">1</strong> to <strong class="text-white">6</strong> of <strong class="text-white">38</strong> entries
                  </span>
        <div class="flex items-center gap-1">
        <button class="px-2.5 py-1 text-xs border border-border-default rounded text-text-muted hover:bg-surface-hover disabled:opacity-40" disabled="">Previous</button>
        <button class="px-3 py-1 text-xs border border-primary-container bg-primary-container text-white font-bold rounded shadow-xs">1</button>
        <button class="px-3 py-1 text-xs border border-border-default bg-surface-card rounded text-on-surface hover:bg-surface-hover font-medium">2</button>
        <button class="px-3 py-1 text-xs border border-border-default bg-surface-card rounded text-on-surface hover:bg-surface-hover font-medium">3</button>
        <button class="px-3 py-1 text-xs border border-border-default bg-surface-card rounded text-on-surface hover:bg-surface-hover font-medium">4</button>
        <button class="px-2.5 py-1 text-xs border border-border-default bg-surface-card rounded text-on-surface hover:bg-surface-hover font-medium">Next</button>
        </div>
        </div>
        </section>
        </div>
        <!-- 6. Bottom Featured Section: Customer Reviews & Trust + Newsletter Subscribe -->
        <section class="grid grid-cols-1 lg:grid-cols-12 gap-space-lg pt-4">
        <!-- Trust & Review Bento -->
        <div class="lg:col-span-8 bg-surface-container-low border border-border-default rounded p-space-lg shadow-sm flex flex-col justify-between gap-space-md">
        <div class="flex items-center justify-between border-b border-border-default pb-space-sm">
        <div class="flex items-center gap-2">
        <span class="material-symbols-outlined text-primary text-[22px]">verified_user</span>
        <h3 class="font-title-md text-title-md font-bold text-white">Customer Verified Experience</h3>
        </div>
        <div class="flex items-center gap-1 text-xs font-title-sm text-text-muted">
        <span>Overall Score:</span>
        <span class="bg-tertiary-container text-white px-1.5 py-0.5 rounded font-bold">4.92 / 5.0</span>
        </div>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-space-md">
        <div class="bg-surface-card p-space-md rounded border border-border-default flex flex-col justify-between">
        <div>
        <div class="flex text-badge-warning mb-1">
        <span class="material-symbols-outlined text-[16px]" style="font-variation-settings: 'FILL' 1;">star</span>
        <span class="material-symbols-outlined text-[16px]" style="font-variation-settings: 'FILL' 1;">star</span>
        <span class="material-symbols-outlined text-[16px]" style="font-variation-settings: 'FILL' 1;">star</span>
        <span class="material-symbols-outlined text-[16px]" style="font-variation-settings: 'FILL' 1;">star</span>
        <span class="material-symbols-outlined text-[16px]" style="font-variation-settings: 'FILL' 1;">star</span>
        </div>
        <p class="font-body-md text-xs text-text-secondary italic">
                        "The Heavyweight Oversized Tee fits exactly like Japanese luxury blanks. The stitch density and neckline retention after 10 washes is unmatched."
                      </p>
        </div>
        <div class="mt-3 flex items-center justify-between text-[11px] text-text-muted">
        <span class="font-bold text-white">David M. — Verified Buyer</span>
        <span>2 days ago</span>
        </div>
        </div>
        <div class="bg-surface-card p-space-md rounded border border-border-default flex flex-col justify-between">
        <div>
        <div class="flex text-badge-warning mb-1">
        <span class="material-symbols-outlined text-[16px]" style="font-variation-settings: 'FILL' 1;">star</span>
        <span class="material-symbols-outlined text-[16px]" style="font-variation-settings: 'FILL' 1;">star</span>
        <span class="material-symbols-outlined text-[16px]" style="font-variation-settings: 'FILL' 1;">star</span>
        <span class="material-symbols-outlined text-[16px]" style="font-variation-settings: 'FILL' 1;">star</span>
        <span class="material-symbols-outlined text-[16px]" style="font-variation-settings: 'FILL' 1;">star</span>
        </div>
        <p class="font-body-md text-xs text-text-secondary italic">
                        "Fastest turnaround I've experienced. Ordered Monday morning, delivered Tuesday evening in recyclable packaging. Selvedge quality is legit."
                      </p>
        </div>
        <div class="mt-3 flex items-center justify-between text-[11px] text-text-muted">
        <span class="font-bold text-white">Elena K. — Verified Buyer</span>
        <span>Yesterday</span>
        </div>
        </div>
        </div>
        <div class="flex flex-wrap items-center justify-between gap-2 text-xs text-text-muted pt-2 border-t border-border-default/60">
        <span class="flex items-center gap-1"><span class="material-symbols-outlined text-[16px] text-primary">security</span> SSL 256-Bit Encrypted Checkout</span>
        <span class="flex items-center gap-1"><span class="material-symbols-outlined text-[16px] text-primary">inventory</span> Integrated with ERP Inventory</span>
        <span class="flex items-center gap-1"><span class="material-symbols-outlined text-[16px] text-primary">undo</span> 30-Day Hassle-Free Exchange</span>
        </div>
        </div>
        <!-- Newsletter & Restock Box -->
        <div class="lg:col-span-4 bg-gradient-to-br from-surface-card to-surface-container border border-border-default text-on-surface rounded p-space-lg flex flex-col justify-between shadow-md relative overflow-hidden">
        <!-- Background decorative icon -->
        <span class="material-symbols-outlined absolute -right-4 -bottom-4 text-[120px] text-white/5 select-none pointer-events-none">mail</span>
        <div class="relative z-10">
        <span class="bg-primary-container/20 border border-primary-container/30 text-primary px-2 py-0.5 rounded text-[10px] font-label-sm uppercase font-bold tracking-wider inline-block mb-2">Member Privileges</span>
        <h3 class="font-headline-sm text-headline-sm font-bold text-white leading-tight">Stay Ahead of Small-Batch Drops</h3>
        <p class="font-body-sm text-xs text-text-secondary mt-1">
                    Subscribe for early catalog access, restock alerts, and exclusive archival apparel sales.
                  </p>
        </div>
        <form class="relative z-10 space-y-2 mt-4" onsubmit="event.preventDefault();">
        <div class="flex rounded overflow-hidden border border-border-default focus-within:border-primary-container shadow-sm">
        <input class="w-full bg-surface-container-low text-on-surface text-xs px-3 py-2 border-none focus:ring-0 placeholder:text-text-muted" placeholder="Enter your email address..." type="email"/>
        <button class="bg-primary-container text-white px-4 text-xs font-title-sm hover:bg-blue-600 transition shrink-0 flex items-center gap-1 font-bold" type="submit">
        <span>Join</span>
        <span class="material-symbols-outlined text-[14px]">chevron_right</span>
        </button>
        </div>
        <p class="text-[10px] text-text-muted">No spam. Unsubscribe anytime with 1-click in account center.</p>
        </form>
        </div>
        </section>
        </main>
        <!-- 7. Footer Matching AdminLTE Layout Anchor -->
        <footer class="mt-space-xl bg-surface-container-lowest border-t border-border-default text-text-muted">
        <!-- Upper Footer Directory -->
        <div class="max-w-7xl mx-auto px-space-md md:px-space-lg py-space-lg grid grid-cols-2 md:grid-cols-4 gap-space-lg text-body-sm text-xs">
        <div>
        <h5 class="font-title-sm text-white font-bold uppercase tracking-wider mb-2">Store Catalog</h5>
        <ul class="space-y-1.5 text-text-secondary">
        <li><a class="hover:text-primary transition" href="#">Menswear Core Collection</a></li>
        <li><a class="hover:text-primary transition" href="#">Womenswear Tailoring</a></li>
        <li><a class="hover:text-primary transition" href="#">Raw Selvedge Denim</a></li>
        <li><a class="hover:text-primary transition" href="#">Heavyweight Knitwear</a></li>
        <li><a class="hover:text-primary transition" href="#">Seasonal Sale Archive</a></li>
        </ul>
        </div>
        <div>
        <h5 class="font-title-sm text-white font-bold uppercase tracking-wider mb-2">Customer Care</h5>
        <ul class="space-y-1.5 text-text-secondary">
        <li><a class="hover:text-primary transition" href="#">Shipping Policy &amp; Rates</a></li>
        <li><a class="hover:text-primary transition" href="#">Returns &amp; Exchanges</a></li>
        <li><a class="hover:text-primary transition" href="#">Garment Care &amp; Repair</a></li>
        <li><a class="hover:text-primary transition" href="#">Size Conversion Chart</a></li>
        <li><a class="hover:text-primary transition" href="#">Contact Support</a></li>
        </ul>
        </div>
        <div>
        <h5 class="font-title-sm text-white font-bold uppercase tracking-wider mb-2">Store Architecture</h5>
        <ul class="space-y-1.5 text-text-secondary">
        <li><a class="hover:text-primary transition" href="#">AdminLTE 4 Framework</a></li>
        <li><a class="hover:text-primary transition" href="#">Bootstrap 5 Components</a></li>
        <li><a class="hover:text-primary transition" href="#">Documentation &amp; API</a></li>
        <li><a class="hover:text-primary transition" href="#">System Status Monitor</a></li>
        <li><a class="hover:text-primary transition" href="#">Changelog &amp; Release Notes</a></li>
        </ul>
        </div>
        <div>
        <h5 class="font-title-sm text-white font-bold uppercase tracking-wider mb-2">Admin Portal Link</h5>
        <p class="text-[11px] text-text-muted mb-2">Authorized managers and warehouse personnel can access inventory controls directly.</p>
        <a class="inline-flex items-center gap-1.5 bg-surface-card border border-border-default px-3 py-1.5 rounded text-xs font-title-sm text-on-surface hover:text-primary hover:border-primary transition" href="#admin">
        <span class="material-symbols-outlined text-[16px] text-primary">dashboard</span>
        <span>Open AdminLTE Suite</span>
        </a>
        </div>
        </div>
        <!-- Bottom Copyright & Backend System Ribbon -->
        <div class="border-t border-border-default bg-surface-container-low px-space-md py-space-sm">
        <div class="max-w-7xl mx-auto flex flex-col md:flex-row justify-between items-center gap-2 text-body-sm text-xs text-text-muted">
        <div>
        <span>Copyright © 2024 <strong class="text-on-surface">AdminLTE.io</strong>. All rights reserved. Powered by XAMPP &amp; MySQL.</span>
        </div>
        <div class="flex items-center gap-space-md">
        <a class="hover:text-primary transition" href="#">Documentation</a>
        <span class="text-border-default">·</span>
        <a class="hover:text-primary transition" href="#">System Status</a>
        <span class="text-border-default">·</span>
        <a class="hover:text-primary transition" href="#">Changelog</a>
        <span class="text-border-default">·</span>
        <a class="hover:text-primary transition" href="#">Support License</a>
        </div>
        </div>
        </div>
        </footer>
        </body></html>