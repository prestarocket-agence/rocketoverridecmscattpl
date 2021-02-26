<?php
/**
 * @author      Prestarocket <contact@prestarocket.com>
 */

if (!defined('_PS_VERSION_')) {
    exit;
}


class rocketoverridecmscattpl extends Module
{


    public function __construct()
    {
        $this->name = 'rocketoverridecmscattpl';
        $this->tab = 'administration';
        $this->version = '1.0.0';
        $this->author = 'Prestarocket';
        $this->bootstrap = true;

        parent::__construct();
        $this->extension = ".tpl";
        $this->displayName = $this->l('Override tpl cms category in your theme');
        $this->description = $this->l('Override tpl cms category with template hierarchy');

    }

    public function install()
    {
        return parent::install() && $this->registerHook('displayOverrideTemplate');
    }

    public function uninstall()
    {
        return parent::uninstall();
    }

    public function getContent()
    {
        return 'Module by <a href="https://prestarocket.com/" target="_blank" rel="">Prestarocket</a>';
    }

    /**
     * @param array $params
     * @return mixed|string
     */
    public function hookDisplayOverrideTemplate(array $params)
    {
        $template_file = $params['template_file'];

        if($template_file === "cms/category"){

            $id = $params['controller']->cms_category->id;

            return $this->getTemplateCmsCategory($id,$params['locale']);
        }
    }

    /**
     *
     * @param $id
     * @param $locale
     * @return mixed|string
     */
    public function getTemplateCmsCategory($id, $locale)
    {
        $locale = (Validate::isLocale($locale)) ? $locale : '';

        $templates = array(
            'cms/category-' . $id,
            'cms/category'
        );

        $directories = $this->context->smarty->getTemplateDir();

        foreach ($directories as $dir) {
            foreach ($templates as $tpl) {
                if (!empty($locale) && is_file($dir . $locale . DIRECTORY_SEPARATOR . $tpl . $this->extension)) {
                    return $locale . DIRECTORY_SEPARATOR . $tpl . $this->extension;
                }
                if (is_file($dir . $tpl . $this->extension)) {
                    return $tpl . $this->extension;
                }
                if (is_file($dir . $tpl) && false !== strpos($tpl, $this->extension)) {
                    return $tpl;
                }
            }
        }

    }
}