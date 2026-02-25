# FrontendDevIntermediateCampaignStylingTheme

This plugin is part of the **Frontend Development Intermediate** learning path of the Shopware Academy.

It demonstrates how to:

- Implement campaign-specific storefront styling using a Black Friday example.
- Override storefront templates (product card and product-detail-page) in a theme plugin.
- Add and structure campaign SCSS and integrate it into the storefront build.
- Use a product custom field (bool) to control campaign styling

Tested for **Shopware 6.7**

## Install

Run the following commands to install the plugin:

```bash
bin/console plugin:refresh
bin/console plugin:install FrontendDevIntermediateCampaignStylingTheme --activate --clearCache
```

Then compile the theme and clear the cache:

```bash
bin/console theme:compile
bin/console cache:clear
```

## License

MIT License – Educational use only (intended as an educational example; the MIT license in `composer.json` applies).

## Contributing

This plugin is part of the Shopware Academy curriculum. For educational purposes only.