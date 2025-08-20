# Changelog

## Unreleased


## 0.5.13

- Rename `open` to `dialogOpen` in dialog component
- Rename `open` to `dropdownOpen` in dropdown component
- Rename `open` to `alertOpen` in alert component

## 0.5.12

- Improve text contrast for primary color of solid button variant on dark mode

## 0.5.11

- Fixed alert content growth when using an icon
- Added `icon-align` property to alert component

## 0.5.10

- Fixed dropdown item dismiss to still allow default link / mailto behavior

## 0.5.9

- Added `containerClass` property to `<ui:dropdown>` component

## 0.5.8

- Actually add cursor:pointer to button component

## 0.5.7

- Added `data-ui-button` attribute to all buttons

## 0.5.6

- Buttons can now become a real `<a>` tag instead of a `<button>` when the `href` property is set
- Alert contrast for warning and primary improved on light mode on darker backgrounds

## 0.5.5

- Add `badgeRadius` property to menu items
- Improve contrast of menu item active state in light mode
- Improve vertical height of badges by removing line height

## 0.5.4

- Added `gap` property to `<ui:menu>` component to control spacing between menu items
- Fixed badge in menu items to not take up vertical space. This makes all menu items a consistent height
- Updated menu documentation


## 0.6.0

- Upgrade to Tailwind CSS 4.x
- Changed sizing scale for many components to improve clarity
- Changed loading indicator logic to target wire clicks automatically
- Dialog header and footer slots now forward attributes to card slots
- Add `when` attribute to card (and dialog) header and footer slots to conditionally show them
- Fix button padding to allow icon-only buttons without strange custom padding
- Add `tooltip` property to button component
- Add `menu` and `menu-item` components

## 0.5.3
- Downgrade of `0.6.0` to provide version compatible with Tailwind CSS v3

## 0.5.2

- Added `containerClass` property to `<ui:table>` component
- Removed table responsiveness breakpoint (default to responsive)

## 0.5.1

- Table responsiveness breakpoint changed to `lg` instead of `md`

## 0.5.0

- Fixed dropdown items when using `focus-on-hover` property
- Rewrote most of `<ui:toggle>` component
- Added `<ui:badge>` component
- Added loading state to `<ui:button>` component
- Added `<ui:table>` and related components
- Added Dusk tests for current set of components

## 0.4.0

- First stable release!
