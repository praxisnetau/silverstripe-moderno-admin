<?php

/**
 * An extension which allows LeftAndMain classes to make use of Moderno Admin features.
 */
class ModernoAdminExtension extends LeftAndMainExtension
{
    /**
     * Initialises the extension by generating custom CSS for the CMS interface.
     */
    public function init()
    {
        if (class_exists("SiteConfig") && $SiteConfig = SiteConfig::current_site_config()) {
            Requirements::customCSS($SiteConfig->renderWith('ModernoAdminCustomCSS'));
        }
    }
}
