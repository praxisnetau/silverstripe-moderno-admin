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
            
            // Load Moderno Custom CSS:
            
            Requirements::customCSS($SiteConfig->renderWith('ModernoAdminCustomCSS'));
            
            // Customise Application Name:
            
            if ($application_name = $SiteConfig->ModernoApplicationName) {
                
                Config::inst()->update(
                    'LeftAndMain',
                    'application_name',
                    $application_name
                );
                
            }
            
            // Customise Application Link:
            
            if ($application_link = $SiteConfig->ModernoApplicationLink) {
                
                Config::inst()->update(
                    'LeftAndMain',
                    'application_link',
                    $SiteConfig->dbObject('ModernoApplicationLink')->URL()
                );
                
            }
            
        }
    }
}
