# TODO: Transfer Inline JS from Views to Separate Files

## Steps to Complete

- [x] Create public/js/user/layout.js for app.blade.php carousel JS
- [x] Create public/js/user/hero.js for hero.blade.php animations and interactions JS
- [x] Create public/js/user/contact.js for contact.blade.php form validation JS
- [x] Create public/js/user/aboutus.js for aboutus.blade.php counter animation JS
- [x] Create public/js/user/navbar.js for navbar.blade.php navbar behavior JS
- [x] Edit resources/views/user/layouts/app.blade.php to remove inline JS and link layout.js
- [x] Edit resources/views/user/pages/hero.blade.php to remove inline JS and add @push('scripts') for hero.js
- [x] Edit resources/views/user/pages/contact.blade.php to remove inline JS and add @push('scripts') for contact.js
- [x] Edit resources/views/user/pages/aboutus.blade.php to remove inline JS and add @push('scripts') for aboutus.js
- [x] Edit resources/views/user/partials/navbar.blade.php to remove inline JS and add @push('scripts') for navbar.js
- [ ] Test website functionality to ensure JS works after separation
- [ ] Debug and fix any issues if found
