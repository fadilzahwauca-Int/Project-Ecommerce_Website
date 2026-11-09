 <!-- HEADER TOPBAR COMPONENT (AdminLTE TopNavBar Anchor) -->
<header
  class="flex justify-between items-center w-full px-space-md h-14 sticky top-0 z-40 bg-surface-container-lowest border-b border-border-default shadow-sm"
>
  <!-- Left: Search & Sidebar Toggle -->
  <div class="flex items-center gap-space-md">
    <button
      class="text-text-secondary hover:text-text-primary p-1 rounded hover:bg-surface-hover transition-colors"
      title="Toggle Sidebar"
    >
      <span class="material-symbols-outlined" data-icon="menu">menu</span>
    </button>
    <!-- Quick Search -->
    <div class="relative w-64 md:w-80">
      <span
        class="material-symbols-outlined absolute left-2.5 top-1/2 -translate-y-1/2 text-outline text-title-md"
        data-icon="search"
        >search</span
      >
      <input
        class="w-full bg-surface-container-low border border-border-default rounded-lg pl-9 pr-3 py-1.5 text-body-md text-text-primary placeholder:text-text-muted focus:bg-surface-container focus:border-primary-container focus:ring-1 focus:ring-primary-container outline-none transition"
        placeholder="Search orders, SKU, customers..."
        type="text"
      />
    </div>
  </div>

  <!-- Right: Actions Cluster & Admin Profile -->
  <div class="flex items-center gap-space-sm md:gap-space-md">
    <!-- Storefront Quick Preview Link -->
    <a
      class="hidden sm:inline-flex items-center gap-1.5 px-3 py-1 bg-surface-container border border-border-default rounded-lg text-title-sm font-title-sm text-primary hover:bg-primary-container hover:text-white transition-colors"
      href="./mainpage.php"
    >
      <span class="material-symbols-outlined text-body-md" data-icon="storefront">storefront</span>
      <span>Storefront Live Preview</span>
    </a>

    <!-- Trailing Icon Actions -->
    <div class="flex items-center gap-1">
      <!-- Messages Dropdown -->
      <button
        class="relative p-2 text-text-secondary hover:text-text-primary hover:bg-surface-hover rounded-lg transition-colors"
        title="Messages"
      >
        <span class="material-symbols-outlined" data-icon="mail">mail</span>
        <span
          class="absolute top-1.5 right-1.5 w-4 h-4 bg-primary-container text-white text-[10px] font-bold rounded-full flex items-center justify-center"
          >3</span
        >
      </button>
      <!-- Notifications Dropdown -->
      <button
        class="relative p-2 text-text-secondary hover:text-text-primary hover:bg-surface-hover rounded-lg transition-colors"
        title="Notifications"
      >
        <span class="material-symbols-outlined" data-icon="notifications">notifications</span>
        <span
          class="absolute top-1.5 right-1.5 w-4 h-4 bg-tertiary-container text-white text-[10px] font-bold rounded-full flex items-center justify-center"
          >7</span
        >
      </button>
      <!-- Fullscreen -->
      <button
        class="p-2 text-text-secondary hover:text-text-primary hover:bg-surface-hover rounded-lg transition-colors hidden md:block"
        title="Toggle Fullscreen"
      >
        <span class="material-symbols-outlined" data-icon="fullscreen">fullscreen</span>
      </button>
      <!-- Settings / Tune -->
      <button
        class="p-2 text-text-secondary hover:text-text-primary hover:bg-surface-hover rounded-lg transition-colors hidden md:block"
        title="Control Sidebar"
      >
        <span class="material-symbols-outlined" data-icon="tune">tune</span>
      </button>
    </div>

    <!-- Divider -->
    <div class="h-6 w-px bg-border-default"></div>

    <!-- Profile Badge Menu -->
    <div class="flex items-center gap-space-sm pl-1">
      <img
        class="w-8 h-8 rounded-full border border-primary-container object-cover"
        data-alt="Administrator profile avatar with badge for Alexander Pierce showing a sharp tailored portrait in corporate setting with neutral tones and blue highlights."
        src="https://lh3.googleusercontent.com/aida-public/AB6AXuAWNfz5SwJKwuoOpRVzKgo9nZsrCLaQ28IntdqAG-5q6S_cZEgCKBMSR43761k9JxKR1JfFf7wgiVrJlIZI5r85xDU_ZUCQ64MJfT3-YzY_wLG2dD2iaXtRV6YbNEfqUziX-mAX1XcJRCy7M4JwpVgnxd1ZYYajvIOMIm8FC7yFg9-6ivsMT3N7TZ6QdrdiCFXd2B4-XB8bsu5gt7rc77c2JIGR9O3Fsz0BPtvvlmdM"
      />
      <div class="hidden xl:flex flex-col text-left">
        <span class="text-title-sm font-title-sm text-text-primary leading-tight"
          >alexander.pierce</span
        >
        <span class="text-label-sm font-label-sm text-text-muted">Super Admin</span>
      </div>
      <button
        class="text-text-muted hover:text-error text-body-sm font-body-sm ml-1 p-1"
        title="Sign Out"
      >
        <span class="material-symbols-outlined" data-icon="logout">logout</span>
      </button>
    </div>
  </div>
</header>