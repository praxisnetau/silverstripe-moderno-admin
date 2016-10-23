<?php

/**
 * An extension which loads the required EditForm scripts for CMSMain (workaround for a bug in 3.4.0 + Secure Assets).
 */
class CMSMainEditFormExtension extends LeftAndMainExtension
{
    /**
     * Extension init() method, called by LeftAndMain init() method.
     */
    public function init()
    {
        if (defined('CMS_DIR')) {
            Requirements::javascript(CMS_DIR . '/javascript/CMSMain.EditForm.js');
        }
        
        if ($this->isAssetAdmin() && $this->hasSecureAssets()) {
            Requirements::javascript(MODERNO_ADMIN_DIR . '/javascript/AssetAdmin.EditForm.js');
        }
    }
    
    /**
     * Updates the edit form object from AssetAdmin to provide a workaround for a bug in Secure Assets.
     *
     * @param Form $form
     */
    public function updateEditForm($form)
    {
        if ($this->isAssetAdmin() && $this->hasSecureAssets()) {
            
            if (($record = $form->getRecord()) && $record instanceof Folder) {
                
                if ($field = $form->Fields()->dataFieldByName('ViewerGroups')) {
                    
                    // Create Form Object:
                    
                    $dummy = Form::create(
                        $this->owner,
                        'EditForm',
                        FieldList::create(),
                        FieldList::create()
                    );
                    
                    // Populate Form Data:
                    
                    $dummy->loadDataFrom($record);
                    
                    // Define Form Action (allows ViewerGroups field to work in asset EditForm):
                    
                    $dummy->setFormAction(
                        sprintf(
                            '%s/field/File/item/%d/ItemEditForm',
                            $form->FormAction(),
                            $record->ID
                        )
                    );
                    
                    // Update Field Object:
                    
                    $field->setForm($dummy);
                    
                }
                
            }
            
        }
    }
    
    /**
     * Answers true if the extended object is AssetAdmin.
     *
     * @return boolean
     */
    private function isAssetAdmin()
    {
        return ($this->owner->class == 'AssetAdmin');
    }
    
    /**
     * Answers true if the File class has the Secure Assets extension applied.
     *
     * @return boolean
     */
    private function hasSecureAssets()
    {
        return Object::has_extension('File', 'SecureFileExtension');
    }
}
