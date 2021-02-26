#Override CMS category tempalte in your theme
###by Prestarocket
https://prestarocket.com/
https://addons.prestarocket.com/
https://twitter.com/prestarocket

## Why ?

In PrestaShop, you can override default template for category, product or cms page but not for category CMS

## How to use

just install the module (no override);

With the cms category page, the module will check the following locations (in order) and return the first template found:

- themes/*/templates/en-US/cms/category-3.tpl
- themes/*/templates/cms/category-3.tpl
- themes/*/templates/en-US/cms/category.tpl
- themes/*/templates/cms/category.tpl

