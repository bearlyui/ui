# Changelog

## Unreleased

- Upgrade to Tailwind CSS 4.x
- Changed sizing scale for many components to improve clarity
- Removed nested `<span>` elements from buttons
- Changed loading indicator logic to target wire clicks automatically
- Dialog header and footer slots now forward attributes to card slots
- Add `when` attribute to card (and dialog) header and footer slots to conditionally show them
- Fix button padding to allow icon-only buttons without strange custom padding

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
