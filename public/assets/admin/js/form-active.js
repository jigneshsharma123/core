(function ($) {
 "use strict";
        $("#frmroduct").validate(
        {                    
            rules:
            {    
                category_id:
                {
                    required: true
                },
                title:
                {
                    required: true
                },
                brief:
                {
                    required: true
                    
                },
                publish_at:
                {
                    required: true
                    
                },
                content:
                {
                    required: true
                },
                
                author:
                {
                    required: true
                }
            },
            messages:
            {    
                category_id:
                {
                    required: 'Please select category'
                },
                title:
                {
                    required: 'Please enter title'
                },
                brief:
                {
                    required: 'Please enter brief'
                },
                author:
                {
                    required: 'Please enter author'
                    
                },
                status:
                {
                    required: 'Please enter status'
                }
            },                    
            
            errorPlacement: function(error, element)
            {
                error.insertAfter(element);
            }
        });
        $("#Formprofile").validate(
        {                    
            rules:
            {    
                category_id:
                {
                    required: true
                },                
                fname:
                {
                    required: true
                },                
            },
            messages:
            {    
                fname:
                {
                    required: 'Please enter first name'
                },
                category_id:
                {
                    required: 'Please select category'
                    
                },                
            },                   
            
            errorPlacement: function(error, element)
            {
                error.insertAfter(element);
            }
        });
        $("#Formhotel").validate(
        {                    
            rules:
            {    
                name:
                {
                    required: true
                },
                hotel_type:
                {
                    required: true
                },
                country:
                {
                    required: true
                }
            },
            messages:
            {    
                name:
                {
                    required: 'Please enter first name'
                }                
            },            
            errorPlacement: function(error, element)
            {
                error.insertAfter(element);
            }
        });
})(jQuery); 