# TODO: Change Primary Color from Green to Existing Hex and Refresh Theme

## Tasks
- [ ] Update `public/css/user_css/sitecolor.css`:
  - Change `--primary-color` from `#146c43` to `#ffa996`
  - Change `--primary-dark` from `#18551c` to `#495057` (gray-500)
  - Update `--rgba-primary-*` values to use RGB of `#ffa996` (255,169,150)
  - Update `--bs-primary-rgb` to `255,169,150`
- [ ] Update `public/css/user_css/graident.css`:
  - Replace `#146c43` with `#ffa996` in the gradient
  - Replace `#18551c` with `#495057` in the gradient
- [ ] Run `npm run dev` to refresh the theme and compile any changes
- [ ] Test the website to ensure the new primary color is applied and green is no longer used as primary
