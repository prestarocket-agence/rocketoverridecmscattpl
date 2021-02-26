# Override CMS category template in your Theme

### by [Prestarocket](https://prestarocket.com/)

[Addons Prestarocket](https://addons.prestarocket.com/) - [Twitter Prestarocket](https://twitter.com/prestarocket)

## Why ?

In PrestaShop, you can override default template for category, product or cms page but not for category CMS pages.

## How to use

Install the module (no override);

With the CMS category page, the module will check the following locations (in order) and return the first template found :

- ``themes/*/templates/en-US/cms/category-3.tpl``
- ``themes/*/templates/cms/category-3.tpl``
- ``themes/*/templates/en-US/cms/category.tpl``
- ``themes/*/templates/cms/category.tpl``

## License
AFL 3.0