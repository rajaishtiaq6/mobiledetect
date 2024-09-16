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
