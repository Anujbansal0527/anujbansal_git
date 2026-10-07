		    // Venubox

            $(document).ready(function(){
                $('.venobox').venobox({
                    framewidth : '100%',                            // default: ''
                    frameheight: '600px',                            // default: ''
                    border     : '2px',                             // default: '0'
                    bgcolor    : '#ff0001',                          // default: '#fff'
                    titleattr  : 'data-title',                       // default: 'title'
                    numeratio  : true,                               // default: false
                    infinigall : true,  
                }); 
            });

            $(document).ready(function(){
                $('.venobox_video').venobox({
                    framewidth : '800px',                            // default: ''
                    frameheight: '450px',                            // default: ''
                    border     : '2px',                             // default: '0'
                    bgcolor    : '#ff0001',                          // default: '#fff'
                    titleattr  : 'data-title',                       // default: 'title'
                    numeratio  : false,                               // default: false
                    infinigall : false,  
                }); 
            });
            
        
// Drop Down Menu

$('.dropdown.subdropdown .nav-link').click(function(){
    $('.dropdown-submenu').addClass('active');
});



           