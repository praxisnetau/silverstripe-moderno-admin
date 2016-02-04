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
    
})(jQuery);