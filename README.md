# GS Nepali Date for WordPress

A small WordPress plugin that converts Gregorian (English/AD) dates to Nepali Bikram Sambat (BS) dates for use in themes, templates, widgets, and custom plugins.

## Features

- Convert WordPress post dates to Nepali BS dates.
- Display today's Nepali date.
- Display translated relative time such as days, hours, minutes, and seconds.
- Convert dates in either direction through the `Nepali_Date` PHP class.
- Convert Arabic digits to Nepali digits.
- Works without an external API or database table.

## Requirements

- WordPress 5.2 or newer.
- PHP 7.2 or newer.
- A theme or plugin where PHP template code can be edited.

The included date table supports BS years 2000 through 2090 and Gregorian dates covered by that table, approximately AD 1943 through 2034.

## Installation

### Method 1: Download and upload the ZIP file

1. Download the ready-to-install [`gsnepalidate.zip`](https://github.com/SumanKhdka/gs-nepali-date/raw/main/gsnepalidate.zip) file from this repository.
2. In WordPress, open **Plugins > Add New > Upload Plugin**.
3. Select the downloaded ZIP file and click **Install Now**.
4. Click **Activate Plugin**, or activate **GS Nepali Date** from the Plugins screen.

The ZIP file is also available in the root of this GitHub repository. You do not need to extract it or create a new ZIP file before uploading it to WordPress.

### Method 2: Manual installation

1. Copy the plugin folder into:

   ```text
    wp-content/plugins/gsnepalidate/
   ```

2. Confirm these files are directly inside that folder:

   ```text
    gs-nepali-date.php
   class.nepali-date.php
   index.php
   ```

3. Activate **GS Nepali Date** from **Plugins** in the WordPress dashboard.

There is no settings page. After activation, add the functions below to the appropriate theme template file or use them from a custom plugin.

## Display a post date

Use `get_nepali_post_date()` in a loop or anywhere a post date is available:

```php
<?php
if ( function_exists( 'get_nepali_post_date' ) ) {
    echo esc_html( get_nepali_post_date( get_the_time( 'c' ) ) );
}
?>
```

The function accepts a date string accepted by `strtotime()`:

```php
<?php echo esc_html( get_nepali_post_date( get_the_date( 'c' ) ) ); ?>
```

If the first argument is empty, the current server time is used:

```php
<?php echo esc_html( get_nepali_post_date( '' ) ); ?>
```

### Custom post-date format

Pass a format as the second argument:

```php
<?php
echo esc_html(
    get_nepali_post_date( get_the_time( 'c' ), 'd m y, l' )
);
?>
```

Supported format tokens:

| Token | Output |
| --- | --- |
| `d` | Nepali day number |
| `m` | Nepali month name |
| `y` | Nepali year number |
| `l` | Nepali weekday name |
| `H` | Nepali hour when time output is enabled |
| `i` | Nepali minute when time output is enabled |

Example output format:

```text
15 Baisakh 2081, Monday
```

The month and weekday values are returned in Nepali by the plugin. The example above is only a format illustration.

## Display today's date

Use this in a header, footer, sidebar, or widget template:

```php
<?php
if ( function_exists( 'get_nepali_today_date' ) ) {
    echo esc_html( get_nepali_today_date() );
}
?>
```

To use a custom format, pass it through the plugin options filter described below. The default today format is:

```text
 d m y, l
```

## Display Nepali relative time

`get_nepali_ago()` translates WordPress relative-time text returned by `human_time_diff()`:

```php
<?php
if ( function_exists( 'get_nepali_ago' ) ) {
    echo esc_html( get_nepali_ago( get_the_time( 'U' ) ) );
}
?>
```

The argument should be a Unix timestamp. A complete example:

```php
<?php
$published_timestamp = get_post_time( 'U', true );

if ( function_exists( 'get_nepali_ago' ) ) {
    printf(
        esc_html__( '%s ago', 'your-text-domain' ),
        esc_html( get_nepali_ago( $published_timestamp ) )
    );
}
?>
```

## Use the conversion class directly

The plugin loads the `Nepali_Date` class after activation:

```php
<?php
if ( class_exists( 'Nepali_Date' ) ) {
    $calendar = new Nepali_Date();
    $nepali = $calendar->eng_to_nep( 2024, 4, 13 );

    echo esc_html(
        $nepali['year'] . '-' .
        $nepali['month'] . '-' .
        $nepali['date']
    );
}
?>
```

The result contains:

```php
array(
    'year'    => 2081,
    'month'   => 1,
    'date'    => 1,
    'day'     => '...',
    'nmonth'  => '...',
    'num_day' => 7,
)
```

Convert BS to Gregorian:

```php
<?php
$calendar = new Nepali_Date();
$english = $calendar->nep_to_eng( 2081, 1, 1 );

printf(
    '%04d-%02d-%02d',
    $english['year'],
    $english['month'],
    $english['date']
);
?>
```

Useful class methods:

| Method | Purpose |
| --- | --- |
| `eng_to_nep( $year, $month, $day )` | Gregorian date to BS date |
| `nep_to_eng( $year, $month, $day )` | BS date to Gregorian date |
| `convert_to_nepali_number( $value )` | Convert digits to Nepali digit entities |
| `convert_to_nepali_secandmin( $text )` | Translate common relative-time units |
| `is_leap_year( $year )` | Check a Gregorian leap year |

## Customize defaults with a filter

The plugin applies the `npd_modify_default_opts` filter before reading its options. A theme can use it to customize the default post-date and today-date formats:

```php
<?php
add_filter( 'npd_modify_default_opts', function ( $options ) {
    $options['date_format'] = 'd m y';
    $options['today_date_format'] = 'l, d m y';
    $options['active']['time'] = false;

    return $options;
} );
```

For post dates, the relevant keys are:

```php
array(
    'active' => array(
        'date' => true,
        'time' => false,
    ),
    'date_format' => 'd m y, l',
    'custom_date_format' => '',
)
```

For today's date, the relevant keys are:

```php
array(
    'date_format' => 'd m y, l',
    'today_date_format' => '',
)
```

A `custom_date_format` passed directly to `get_nepali_post_date()` takes priority over the default `date_format`.

## Theme integration examples

### Replace a theme's post metadata

In a single-post template such as `single.php`, `content.php`, or a theme-specific post-card template:

```php
<time datetime="<?php echo esc_attr( get_the_date( 'c' ) ); ?>">
    <?php
    if ( function_exists( 'get_nepali_post_date' ) ) {
        echo esc_html( get_nepali_post_date( get_the_date( 'c' ) ) );
    } else {
        echo esc_html( get_the_date() );
    }
    ?>
</time>
```

### Add today's date to a header

Place this in `header.php`, a widget template, or a template part:

```php
<div class="site-nepali-date">
    <?php
    if ( function_exists( 'get_nepali_today_date' ) ) {
        echo esc_html( get_nepali_today_date() );
    }
    ?>
</div>
```

### Use it in a shortcode

Add this to a custom plugin or the theme's `functions.php`:

```php
<?php
function my_nepali_today_shortcode() {
    if ( ! function_exists( 'get_nepali_today_date' ) ) {
        return '';
    }

    return esc_html( get_nepali_today_date() );
}
add_shortcode( 'nepali_today', 'my_nepali_today_shortcode' );
```

Then use this shortcode in a page or post:

```text
[nepali_today]
```

## Security and WordPress coding notes

- Escape returned values when printing them in HTML with `esc_html()`.
- Use `esc_attr()` for values placed inside HTML attributes.
- Use `get_the_date( 'c' )` or another timezone-aware WordPress date value instead of manually assembling dates.
- Do not edit the plugin files to customize a theme. Put custom filters and shortcodes in a child theme or custom plugin.
- Always check `function_exists()` or `class_exists()` when theme code should also work if the plugin is deactivated.

## Troubleshooting

### The date does not change

Confirm that:

1. The plugin is activated.
2. The template contains the function call, not the original date call only.
3. The function name is spelled correctly.
4. You are editing the active theme or child theme.
5. A page-cache or object-cache plugin has been cleared.

### The date is one day different

WordPress uses the site's configured timezone. Check **Settings > General > Timezone**, then clear page and object caches. Pass a complete WordPress date string such as `get_the_date( 'c' )` instead of a date assembled manually.

### The date is outside the supported range

The included table supports BS 2000 through 2090. Dates outside the table are not supported and should be handled by the calling code before conversion.

### The output contains unexpected HTML entities

`convert_to_nepali_number()` returns Nepali digit HTML entities. This is suitable for normal HTML output. Do not wrap already escaped output in another conversion step.

### The date appears in English

The plugin returns Nepali month and weekday names from the class. If a theme still shows an English date, it is likely rendering a separate date call elsewhere. Search the theme for `the_date()`, `get_the_date()`, `get_the_time()`, or `get_post_time()`.

## Development checks

Run the PHP syntax check from the plugin directory:

```bash
php -l class.nepali-date.php
php -l gs-nepali-date.php
```

A useful boundary check is:

```php
<?php
require_once 'class.nepali-date.php';

$calendar = new Nepali_Date();
print_r( $calendar->eng_to_nep( 2024, 4, 13 ) );
print_r( $calendar->nep_to_eng( 2081, 1, 1 ) );
```

Expected date relationship:

```text
2024-04-13 = BS 2081-01-01
BS 2081-01-01 = 2024-04-13
```

## License

GPL v2 or later. See the plugin header for author and license information.
