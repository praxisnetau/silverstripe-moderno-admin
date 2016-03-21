<?php

/**
 * An extension of the data extension class to add Moderno Admin settings to site config.
 */
class ModernoConfigExtension extends DataExtension
{
    private static $db = array(
        'ModernoLinkColor' => 'Color',
        'ModernoLogoBkgColor' => 'Color',
        'ModernoHighlightColor' => 'Color',
        'ModernoProfileLinkColor' => 'Color'
    );
    
    private static $defaults = array(
        'ModernoLinkColor' => '007FBA',
        'ModernoLogoBkgColor' => '1B354C',
        'ModernoHighlightColor' => '139FDA',
        'ModernoProfileLinkColor' => '3EBAE0'
    );
    
    /**
     * Updates the CMS fields of the extended object.
     *
     * @param FieldList $fields
     */
    public function updateCMSFields(FieldList $fields)
    {
        // Create Moderno Tab:
        
        $fields->findOrMakeTab('Root.Moderno', _t('ModernoConfigExtension.MODERNO', 'Moderno'));
        
        // Create Moderno Fields:
        
        $fields->addFieldsToTab(
            'Root.Moderno',
            array(
                new ColorField(
                    'ModernoHighlightColor',
                    _t('ModernoConfigExtension.HIGHLIGHTCOLOR', 'Highlight color')
                ),
                ColorField::create(
                    'ModernoLogoBkgColor',
                    _t('ModernoConfigExtension.LOGOBACKGROUNDCOLOR', 'Logo background color')
                ),
                ColorField::create(
                    'ModernoLinkColor',
                    _t('ModernoConfigExtension.LINKCOLOR', 'Link color')
                ),
                ColorField::create(
                    'ModernoProfileLinkColor',
                    _t('ModernoConfigExtension.PROFILELINKCOLOR', 'Profile link color')
                )
            )
        );
    }
}
