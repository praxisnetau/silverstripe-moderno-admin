/**
 * File: AssetAdmin.EditForm.js
 */
(function($) {
    
    $.entwine('ss', function($) {
        
        // Fix for TreeDropdownField to prevent the Ajax tree load from triggering a 'navigation warning' confirm box:
        
        $('#Form_EditForm_ViewerGroups_Holder').entwine({
            
            // If global is true, a 'click' event is triggered on the DetailsView tab :( (see framework TabSet.js):
            
            onmatch: function() {
                
                $.ajaxPrefilter(function(options) {
                    options.global = false;
                    if (window.debug) console.log('Disabled global ajax events for "' + options.url + '"');
                });
                
                this._super();
                
            }
            
        });
        
        // Handle the Secure Assets fields which have been added to the AssetAdmin edit form:
        
        $('.cms-edit-form #CanViewType').entwine({
            
            // Binds the change event to option set fields and handles the initial value:
            
            onmatch: function() {
                
                this.bindOptions();
                this.handleValue();
                
                this._super();
                
            },
            
            // Calls the superclass 'onunmatch':
            
            onunmatch: function() {
                this._super();
            },
            
            // Binds the change event to option set fields:
            
            bindOptions: function() {
                
                var self = this;
                
                this.find('.optionset :input').bind('change', function() {
                    self.handleValue();
                });
                
            },
            
            // Handles the current option value, shows dropdown for 'OnlyTheseUsers' option:
            
            handleValue: function() {
                
                if (this.getValue() == 'OnlyTheseUsers') {
                    this.doShow();
                } else {
                    this.doHide();
                }
                
            },
            
            // Shows the dropdown and hides the splitter line:
            
            doShow: function() {
                this.addClass('remove-splitter');
                this.getDropdown().show();
            },
            
            // Hides the dropdown and shows the splitter line:
            
            doHide: function() {
                this.removeClass('remove-splitter');
                this.getDropdown().hide();
            },
            
            // Answers the current option value:
            
            getValue: function() {
                return this.find('input[name=' + this.attr('id') + ']:checked').val();
            },
            
            // Answers the groups dropdown for the option set:
            
            getDropdown: function() {
                return $('#' + this.closest('form').attr('id') + '_ViewerGroups_Holder');
            }
            
        });
        
    });
    
}(jQuery));
