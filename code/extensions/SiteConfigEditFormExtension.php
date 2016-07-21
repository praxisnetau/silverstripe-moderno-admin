<?php

/**
 * An extension which loads the required EditForm script for SiteConfig (workaround for a bug in 3.4.0).
 */
class SiteConfigEditFormExtension extends LeftAndMainExtension
{
    /**
     * Extension init() method, called by LeftAndMain init() method.
     */
    public function init()
    {
        Requirements::javascript(CMS_DIR . '/javascript/CMSMain.EditForm.js');
    }
}
