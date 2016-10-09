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
        'ModernoProfileLinkColor' => 'Color',
        'ModernoApplicationName' => 'Varchar(255)',
        'ModernoApplicationLink' => 'Varchar(2048)',
        'ModernoLogoImageWidth' => 'Varchar(16)',
        'ModernoLogoImageHeight' => 'Varchar(16)',
        'ModernoLogoImageResize' => 'Varchar(16)',
        'ModernoLoadingImageWidth' => 'Varchar(16)',
        'ModernoLoadingImageHeight' => 'Varchar(16)',
        'ModernoLoadingImageResize' => 'Varchar(16)',
        'ModernoSupportRetina' => 'Boolean',
        'ModernoHideSiteName' => 'Boolean'
    );
    
    private static $has_one = array(
        'ModernoLogoImage' => 'Image',
        'ModernoLoadingImage' => 'Image'
    );
    
    private static $defaults = array(
        'ModernoLinkColor' => '007FBA',
        'ModernoLogoBkgColor' => '1B354C',
        'ModernoHighlightColor' => '139FDA',
        'ModernoProfileLinkColor' => '3EBAE0',
        'ModernoSupportRetina' => 1,
        'ModernoHideSiteName' => 0
    );
    
    /**
     * @config
     * @var string
     */
    private static $asset_path = "Uploads/Moderno";
    
    /**
     * Answers the path to use for uploading images.
     *
     * @return string
     */
    public static function get_asset_path()
    {
        return Config::inst()->get(__CLASS__, 'asset_path');
    }
    
    /**
     * Answers an array of image resize methods.
     *
     * @return array
     */
    public static function get_resize_methods()
    {
        return Config::inst()->get(__CLASS__, 'resize_methods');
    }
    
    /**
     * Updates the CMS fields of the extended object.
     *
     * @param FieldList $fields
     */
    public function updateCMSFields(FieldList $fields)
    {
        // Create Moderno Tab Set:
        
        $fields->addFieldToTab(
            'Root',
            TabSet::create(
                'Moderno',
                _t('ModernoConfigExtension.MODERNO', 'Moderno')
            )
        );
        
        // Create Colors Tab:
        
        $fields->findOrMakeTab('Root.Moderno.Colors', _t('ModernoConfigExtension.COLORS', 'Colors'));
        
        // Create Colors Fields:
        
        $fields->addFieldsToTab(
            'Root.Moderno.Colors',
            array(
                ColorField::create(
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
        
        // Create Branding Tab:
        
        $fields->findOrMakeTab('Root.Moderno.Branding', _t('ModernoConfigExtension.BRANDING', 'Branding'));
        
        // Create Branding Fields:
        
        $fields->addFieldsToTab(
            'Root.Moderno.Branding',
            array(
                TextField::create(
                    'ModernoApplicationName',
                    _t('ModernoConfigExtension.APPLICATIONNAME', 'Application name')
                ),
                TextField::create(
                    'ModernoApplicationLink',
                    _t('ModernoConfigExtension.APPLICATIONLINK', 'Application link')
                ),
                ToggleCompositeField::create(
                    'ModernoLogoToggle',
                    _t('ModernoConfigExtension.LOGOIMAGETOGGLETITLE', 'Logo Image'),
                    array(
                        UploadField::create(
                            'ModernoLogoImage',
                            _t('ModernoConfigExtension.LOGOIMAGE', 'Logo image')
                        )->setAllowedFileCategories('image')->setFolderName(self::get_asset_path()),
                        FieldGroup::create(
                            _t('ModernoConfigExtension.DIMENSIONSINPIXELS', 'Dimensions (in pixels)'),
                            array(
                                TextField::create('ModernoLogoImageWidth', '')->setAttribute(
                                    'placeholder',
                                    _t('ModernoConfigExtension.WIDTH', 'Width')
                                ),
                                LiteralField::create('ModernoLogoImageBy', '<i class="fa fa-times by"></i>'),
                                TextField::create('ModernoLogoImageHeight', '')->setAttribute(
                                    'placeholder',
                                    _t('ModernoConfigExtension.HEIGHT', 'Height')
                                )
                            )
                        ),
                        DropdownField::create(
                            'ModernoLogoImageResize',
                            _t('ModernoConfigExtension.RESIZEMETHOD', 'Resize method'),
                            self::get_resize_methods()
                        )->setEmptyString(' '),
                        CheckboxField::create(
                            'ModernoHideSiteName',
                            _t('ModernoConfigExtension.HIDESITENAME', 'Hide site name')
                        ),
                        CheckboxField::create(
                            'ModernoSupportRetina',
                            _t('ModernoConfigExtension.SUPPORTRETINADEVICES', 'Support Retina devices')
                        )
                    )
                ),
                ToggleCompositeField::create(
                    'ModernoLoadingToggle',
                    _t('ModernoConfigExtension.LOADINGIMAGETOGGLETITLE', 'Loading Image'),
                    array(
                        UploadField::create(
                            'ModernoLoadingImage',
                            _t('ModernoConfigExtension.LOADINGIMAGE', 'Loading image')
                        )->setAllowedFileCategories('image')->setFolderName(self::get_asset_path()),
                        FieldGroup::create(
                            _t('ModernoConfigExtension.DIMENSIONSINPIXELS', 'Dimensions (in pixels)'),
                            array(
                                TextField::create('ModernoLoadingImageWidth', '')->setAttribute(
                                    'placeholder',
                                    _t('ModernoConfigExtension.WIDTH', 'Width')
                                ),
                                LiteralField::create('ModernoLoadingImageBy', '<i class="fa fa-times by"></i>'),
                                TextField::create('ModernoLoadingImageHeight', '')->setAttribute(
                                    'placeholder',
                                    _t('ModernoConfigExtension.HEIGHT', 'Height')
                                )
                            )
                        ),
                        DropdownField::create(
                            'ModernoLoadingImageResize',
                            _t('ModernoConfigExtension.RESIZEMETHOD', 'Resize method'),
                            self::get_resize_methods()
                        )->setEmptyString(' ')
                    )
                )
            )
        );
    }
    
    /**
     * Event method called before the receiver is written to the database.
     */
    public function onBeforeWrite()
    {
        if ($w = $this->owner->ModernoLogoImageWidth) {
            $this->owner->ModernoLogoImageWidth = is_numeric($w) ? (int) $w : null;
        }
        
        if ($h = $this->owner->ModernoLogoImageHeight) {
            $this->owner->ModernoLogoImageHeight = is_numeric($h) ? (int) $h : null;
        }
        
        if ($w = $this->owner->ModernoLoadingImageWidth) {
            $this->owner->ModernoLoadingImageWidth = is_numeric($w) ? (int) $w : null;
        }
        
        if ($h = $this->owner->ModernoLoadingImageHeight) {
            $this->owner->ModernoLoadingImageHeight = is_numeric($h) ? (int) $h : null;
        }
    }
    
    /**
     * Answers true if a custom logo image exists.
     *
     * @return boolean
     */
    public function ModernoLogoImageExists()
    {
        if ($image = $this->owner->ModernoLogoImage()) {
            return ($image->exists() && file_exists($image->getFullPath()));
        }
        
        return false;
    }
    
    /**
     * Answers true if a custom loading image exists.
     *
     * @return boolean
     */
    public function ModernoLoadingImageExists()
    {
        if ($image = $this->owner->ModernoLoadingImage()) {
            return ($image->exists() && file_exists($image->getFullPath()));
        }
        
        return false;
    }
    
    /**
     * Answers a resized version of the logo image.
     *
     * @return Image
     */
    public function ModernoLogoImageResized()
    {
        if ($this->owner->ModernoLogoImageExists()) {
            return $this->performImageResize('ModernoLogoImage');
        }
    }
    
    /**
     * Answers a retina version of the logo image.
     *
     * @return Image
     */
    public function ModernoLogoImageRetina()
    {
        if ($this->owner->ModernoLogoImageExists()) {
            return $this->performImageResize('ModernoLogoImage', true);
        }
    }
    
    /**
     * Answers the background-size for the retina version of the logo image.
     *
     * @return string
     */
    public function ModernoLogoRetinaBackgroundSize()
    {
        if ($this->owner->ModernoLogoImageExists()) {
            
            // Obtain Target Dimensions:
            
            list($tw, $th) = $this->getTargetDimensions('ModernoLogoImage');
            
            // Answer Background Size:
            
            return "{$tw}px {$th}px";
            
        }
    }
    
    /**
     * Answers a resized version of the loading image.
     *
     * @return Image
     */
    public function ModernoLoadingImageResized()
    {
        if ($this->owner->ModernoLoadingImageExists()) {
            return $this->performImageResize('ModernoLoadingImage');
        }
    }
    
    /**
     * Answers the target dimensions for the specified image.
     *
     * @param string $image
     * @return array
     */
    private function getTargetDimensions($image)
    {
        // Obtain Source Image:
        
        $si = $this->owner->{$image}();
        
        // Obtain Source Image Dimensions:
        
        $sw = $si->getWidth();
        $sh = $si->getHeight();
        
        // Obtain Target Image Dimensions:
        
        $wp = "{$image}Width";
        $hp = "{$image}Height";
        
        $tw = $this->owner->$wp;
        $th = $this->owner->$hp;
        
        // Calculate Target Width/Height (if required):
        
        if ($tw && !$th && $sw) {
            $th = round(($tw / $sw) * $sh);
        } elseif (!$tw && $th && $sh) {
            $tw = round(($th / $sh) * $sw);
        }
        
        // Answer Dimensions:
        
        return array($tw, $th);
    }
    
    /**
     * Answers a resized version of the loading image.
     *
     * @param string $image
     * @param boolean $retina
     * @return Image
     */
    private function performImageResize($image, $retina = false)
    {
        // Obtain Source Image:
        
        $si = $this->owner->{$image}();
        
        // Obtain Resize Method:
        
        $rp = "{$image}Resize";
        
        $tr = $this->owner->$rp;
        
        // Obtain Target Dimensions:
        
        list($tw, $th) = $this->getTargetDimensions($image);
        
        // Perform Image Resize:
        
        if ($tw && $th && $tr) {
            
            // Handle Retina Flag:
            
            if ($retina) {
                $tw = ($tw * 2);
                $th = ($th * 2);
            }
            
            // Build Argument Array:
            
            if (strpos($tr, 'Width') !== false) {
                $args = array($tw);
            } elseif (strpos($tr, 'Height') !== false) {
                $args = array($th);
            } else {
                $args = array($tw, $th);
            }
            
            // Call Resize Method:
            
            if ($si->hasMethod($tr)) {
                return call_user_func_array(array($si, $tr), $args);
            }
            
        }
        
        // Answer Source Image (no resize):
        
        return $si;
        
    }
}
