<?php

/**
 * An extension which allows LeftAndMain classes to make use of Font Awesome icons in the CMS interface.
 */
class AwesomeIconExtension extends LeftAndMainExtension
{
    /**
     * Initialises the extension by generating the custom CSS for the icons.
     */
    public function init()
    {
        // Add Custom CSS Requirements:
        
        Requirements::customCSS($this->getAwesomeIconCSS());
    }
    
    /**
     * Answers a string containing the custom CSS for the CMS interface.
     *
     * @return string
     */
    public function getAwesomeIconCSS()
    {
        // Initialise Variables:
        
        $css = array();
        
        $menu_items = CMSMenu::get_viewable_menu_items();
        
        // Iterate Viewable Menu Items:
        
        foreach ($menu_items as $class => $item) {
            
            // Does this class have an awesome icon?
            
            if ($icon = Config::inst()->get($class, 'awesome_icon', Config::FIRST_SET)) {
                
                // Fix the prefix of the icon class name:
                
                $icon = $this->prefix($icon);
                
            } elseif ($class == 'Help') {
                
                // The icon for the Help menu item:
                
                $icon = 'fa-question-circle';
                
            } else {
                
                // The default icon, for ModelAdmin menu items:
                
                $icon = 'fa-database';
                
            }
            
            // Define CSS for this icon:
            
            $css[] = ".icon.icon-16.icon-" . strtolower($class) . ":before {";
            $css[] = "  content: \"\\" . $this->getIconUnicode($icon) . "\";";
            $css[] = "}";
        }
        
        // Answer CSS String:
        
        return implode("\n", $css);
    }
    
    /**
     * Answers the unicode value for the icon with the given name.
     *
     * @param string $name
     * @return string
     */
    protected function getIconUnicode($name)
    {
        $icons = Config::inst()->get(__CLASS__, 'icons');
        
        if (isset($icons[$name])) {
            
            return $icons[$name];
            
        }
    }
    
    /**
     * Ensures the icon class name has the correct prefix.
     *
     * @param string $name
     * @return string
     */
    protected function prefix($name)
    {
        return (substr($name, 0, 3) != 'fa-') ? 'fa-' . $name : $name;
    }
}
