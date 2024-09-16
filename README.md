# Mobile Detect
This plugin is for the developers, you can use directives in your blade templates. 

## Requirements

-   Botble core 7.0.0 or higher.

## Installation

### Install via Admin Panel

Go to the **Admin Panel** and click on the **Plugins** tab. Click on the "Add new" button, find the **Mobile Detect** plugin and click on the "Install" button.

### Install manually

1. Download the plugin from the [Botble Marketplace](https://marketplace.botble.com/products/rajaishtiaq6/mobiledetect).
2. Extract the downloaded file and upload the extracted folder to the `platform/plugins` directory.
3. Go to **Admin** > **Plugins** and click on the **Activate** button.
### Usage
Use the new Blade directives in your template files:

```php
@desktop
     <section>this is for the desktop only</section>
@elsedesktop
    <section>this is for the mobile only</section>
@enddesktop
```

> **NOTE** You might have to run `php artisan view:clear` to have the new Blade directives take effect!

### Available directives
`@desktop`, `@elsedesktop`, `@enddesktop` - for desktop devices

`@handheld`, `@elsehandheld`, `@endhandheld` - for non-desktop (mobile and tablet) devices

`@tablet`, `@elsetablet`, `@endtablet` - for tablet devices

`@nottablet`, `@elsenottablet`, `@endnottablet` - for non-tablet (desktop or mobile) devices

`@mobile`, `@elsemobile`, `@endmobile` - for mobile devices

`@notmobile`, `@elsenotmobile`, `@endnotmobile` - for non-mobile (desktop or tablet) devices

`@ios`, `@elseios`, `@endios` - for iOS platforms

`@android`, `@elseandroid`, `@endandroid` - for Android platforms

The usage of `@else...` directives are optional.
