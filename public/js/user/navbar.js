document.addEventListener('DOMContentLoaded', function() {
  const navbar = document.getElementById('mainNavbar');
  const navLinks = document.querySelectorAll('.nav-link-enhanced');

  // Navbar scroll behavior
  let scrolled = false;

  function updateNavbar() {
    if (window.scrollY > 50) {
      if (!scrolled) {
        navbar.classList.add('scrolled');
        document.body.classList.add('scrolled');
        scrolled = true;
      }
    } else {
      if (scrolled) {
        navbar.classList.remove('scrolled');
        document.body.classList.remove('scrolled');
        scrolled = false;
      }
    }
  }

  window.addEventListener('scroll', updateNavbar);
  updateNavbar();

  // Active page highlighting
  const currentPath = window.location.pathname;
  navLinks.forEach(link => {
    if (link.getAttribute('href') === currentPath) {
      link.classList.add('active');
    }
  });

  // Mobile menu close on link click
  navLinks.forEach(link => {
    link.addEventListener('click', () => {
      const navbarCollapse = document.getElementById('navbarSupportedContent');
      if (navbarCollapse.classList.contains('show')) {
        const bsCollapse = new bootstrap.Collapse(navbarCollapse);
        bsCollapse.hide();
      }
    });
  });

  // Dropdown accessibility improvements
  const dropdownToggles = document.querySelectorAll('.dropdown-toggle');
  dropdownToggles.forEach(toggle => {
    // Close dropdown when clicking outside
    document.addEventListener('click', (e) => {
      if (!toggle.contains(e.target) && !toggle.nextElementSibling?.contains(e.target)) {
        toggle.setAttribute('aria-expanded', 'false');
      }
    });

    // Handle keyboard navigation
    toggle.addEventListener('keydown', (e) => {
      if (e.key === 'Escape') {
        toggle.setAttribute('aria-expanded', 'false');
        toggle.blur();
      }
    });
  });
});
