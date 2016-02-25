(function($) {
    
    // Define Variables:
    
    var selector   = "#cms-content-tools-CMSMain";
    var cookieName = "cms-content-tools-width";
    
    // Make Menu Resizable:
    
    $(selector).entwine({
        
        onadd: function() {
            
            var self = this;
            
            self.resizable({
                
                handles: 'e',
                
                resize: function(event,ui) { $.cookie(cookieName, self.outerWidth()); }
                
            });
            
        }
        
    });
    
    // Resize Menu after Ajax Load:
    
    $(document).ajaxComplete(function() {
        
        if (!$(selector).hasClass('collapsed')) {
            
            var width = $.cookie(cookieName);
            
            if (width != null) $(selector).css('width', width + 'px');
            
        }
        
    });
    
    // Create Animated Icons for Buttons:
    
    $("#ActionMenus_MoreOptions > button").entwine({
        
        onadd: function() {
            
            this.prepend('<i class="fa fa-refresh fa-spin" style="display: none"></i>');
            
        }
        
    });
    
})(jQuery);