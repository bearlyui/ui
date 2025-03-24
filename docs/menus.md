# Menus

The menu component displays a vertical sidebar-esque menu that transforms into a select tag on mobile devices.
Currently menus only have support a vertical layout. It's possible that other layouts will be added in the future.

---

## Using Menus

To use a menu, use the `<ui:menu>` tag with `<ui:menu-item>` components inside it.

```html +demo title={Basic Menu}
<ui:menu>
    <ui:menu-item href="/dashboard" active>Dashboard</ui:menu-item>
    <ui:menu-item href="/team">Team</ui:menu-item>
    <ui:menu-item href="/projects">Projects</ui:menu-item>
    <ui:menu-item href="/calendar">Calendar</ui:menu-item>
    <ui:menu-item href="/settings">Settings</ui:menu-item>
</ui:menu>
```

## Menu Properties

| Property | Type | Default | Description |
|:---|:---|:---|:---|
| `mobileLabel` | `string` | `Navigation` | The label shown in the mobile select dropdown. |
| `size` | `Size` | `Size::SM` | Controls the maximum width of the menu. |

---

### Mobile Label

The label shown in the mobile select dropdown. This is used for accessibility, labeling, and as a disabled option in the select dropdown.

```html
<ui:menu mobile-label="Main Navigation">
    <!-- Menu items -->
</ui:menu>
```

### Size

The `size` property controls the maximum width of the menu (defaulting to `sm` size). Supported sizes are `xs`, `sm`, `md`, and `lg`.

```html
<ui:menu size="md">
    <!-- Menu items -->
</ui:menu>
```

```html +demo title={Menu with XS Size}
<ui:menu size="xs">
    <ui:menu-item href="/dashboard" active>Dashboard</ui:menu-item>
    <ui:menu-item href="/team">Team</ui:menu-item>
    <ui:menu-item href="/projects">Projects</ui:menu-item>
    <ui:menu-item href="/calendar">Calendar</ui:menu-item>
    <ui:menu-item href="/settings">Settings</ui:menu-item>
</ui:menu>
```

## Menu Items

Menu items are used to display a single menu item in the menu. They can be customized in various ways by using the following properties:

### Properties

| Property | Type | Default | Description |
|:---|:---|:---|:---|
| `href` | `string` | `null` | The URL the menu item links to. **Required** |
| `icon` | `string` | `null` | Include [an Icon](/docs/icons) before the menu item's content. |
| `iconVariant` | `string` | `outline` | The icon variant to use. `micro`, `mini`, `solid`, or `outline` |
| `active` | `boolean` | `request()->url() === $href` | Whether the menu item is active. By default, it's active if the current URL matches the href. |
| `badge` | `integer\|string` | `null` | A badge to display on the menu item. |
| `showZero` | `boolean` | `false` | Whether to show the badge when its value is 0. |
| `badgeColor` | `Color` | `Color::Secondary` | The color of the badge. |
| `badgeVariant` | `Variant` | `Variant::Solid` | The variant of the badge. |
| `badgeSize` | `Size` | `Size::XS` | The size of the badge. |

---

#### Href

The `href` property is used to specify the URL that the menu item links to. It is **required**!

```html
<ui:menu-item href="/dashboard">Dashboard</ui:menu-item>
```

### Icons

The `icon` property is used to include an icon before the menu item's content.

```html
<ui:menu-item icon="home" href="/dashboard">Dashboard</ui:menu-item>
```

```html +demo title={Menu Items with Icons}
<ui:menu>
    <ui:menu-item href="/dashboard" icon="home" active>Dashboard</ui:menu-item>
    <ui:menu-item href="/team" icon="user-circle">Team</ui:menu-item>
    <ui:menu-item href="/projects" icon="document">Projects</ui:menu-item>
    <ui:menu-item href="/calendar" icon="calendar-days">Calendar</ui:menu-item>
    <ui:menu-item href="/settings" icon="cog">Settings</ui:menu-item>
</ui:menu>
```

#### Icon Variants
You can also specify the icon variant using the icon variant property.

```html +demo title={Customizing the Icon Variant}
<ui:menu-item href="/dashboard" icon="home" icon-variant="micro">Dashboard</ui:menu-item>
```

### Active State

The `active` property indicates the currently active menu item. By default, a menu item is active if the current URL matches its href.

```html +demo
<ui:menu-item href="/dashboard" active="true">Dashboard</ui:menu-item>
```

You can also use custom logic to determine if a menu item is active:

```php
<ui:menu-item href="/projects" :active="$yourCustomLogic">
    Projects
</ui:menu-item>
```

### Badges

The `badge` property is used to display a badge on the menu item. This is useful for showing counts or status indicators.

```html
<ui:menu-item href="/messages" badge="5">Messages</ui:menu-item>
```

```html +demo title={Menu Items with Badges}
<ui:menu>
    <ui:menu-item href="/dashboard" icon="home" active>Dashboard</ui:menu-item>
    <ui:menu-item href="/team" icon="user-circle" badge="3">Team</ui:menu-item>
    <ui:menu-item href="/messages" icon="document-text" badge="5">Messages</ui:menu-item>
    <ui:menu-item href="/notifications" icon="bell-alert" badge="12">Notifications</ui:menu-item>
    <ui:menu-item href="/tasks" icon="check-circle" badge="0" show-zero>Tasks</ui:menu-item>
</ui:menu>
```

#### Badge Customization

You can customize the badge appearance using the `badgeColor`, `badgeVariant`, and `badgeSize` properties. For more information on the values these properties support, read the [Badges documentation](/docs/badges) page.

```html
<ui:menu-item
    href="/messages"
    badge="5"
    badge-color="primary"
    badge-variant="outline"
    badge-size="sm"
>
    Messages
</ui:menu-item>
```
