# JetSmart ReIndexer

JetSmart ReIndexer is a WordPress plugin that automatically reindexes JetSmart filters whenever a post is saved, updated, or trashed. It also works with JetForm Builder forms, efficiently updating filter indexes whenever changes are made. This ensures that your website's search and filtering functionalities are always up-to-date.

## Features

- Automatically reindexes JetSmart filters on post save, update, or trash events.
- Integrates with JetForm Builder forms.
- Keeps website search and filter options current.

## Installation

1. Download the JetSmart ReIndexer plugin.
2. Upload the plugin folder to the `/wp-content/plugins/` directory of your WordPress installation.
3. Activate the plugin through the 'Plugins' menu in WordPress.

## Usage

After installing and activating the plugin, no further configuration is needed. JetSmart ReIndexer will automatically reindex the relevant filters whenever a post is saved, updated, or trashed. When using JetForm Builder forms, the same automatic reindexing will occur.

## JetFormBuilder Custom Hook Usage

To use the custom JetFormBuilder action hook in JetSmart ReIndexer, follow these steps:

1. Create a new JetFormBuilder form or edit an existing one by going to the WordPress dashboard, and then navigating to JetForms > Add New/Edit Form.
2. In the form editor, add the form fields you'd like to use.
3. Scroll down to the "Post Submit Actions" section, and click the "New Action" button.
4. Select the "Call Hook" option to add a custom hook action.
5. Click the "Edit Action" button to configure the custom hook action.
6. In the "Hook Name" field, enter the hook title for our JetSmart ReIndexer action: `smartfilter-reindex`. (jet-form-builder/custom-action/smartfilter-reindex)
This custom action hook will reindex the smartfilters without form validation.
7. Save the form and insert it on the desired page using a Gutenberg block or shortcode.

By using the "Call Hook" action with the specified hook title, JetFormBuilder will trigger the JetSmart ReIndexer's custom action hook for reindexing smartfilters without form validation every time the form is submitted.

## Requirements

- WordPress 5.0 or higher
- PHP 7.4 or later

## License

JetSmart ReIndexer is licensed under the [GPLv2 or later](https://www.gnu.org/licenses/gpl-2.0.html) license.

## Contributing

Feel free to contribute to JetSmart ReIndexer by submitting pull requests, reporting bugs, or suggesting new features. We appreciate any feedback!

## Credits

- trueqap (author)
- [CrocoBlock](https://github.com/CrocoBlock) (plugin inspiration)

With JetSmart ReIndexer, your WordPress website's search and filtering capabilities are always current, providing your users with an up-to-date experience.
