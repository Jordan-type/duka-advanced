$(document).ready(function() {
	// console.log('Happy new year');
	    $('.addcategory').click(function(e){
          e.preventDefault();

          $.get('addcategory',function(data){
          $('#addcategory').modal('show')
          .find('#addcategoryContent')
          // .load($(this).attr('value'));
          .html(data);

        });

      });
      //addbrand
      $('.addbrand').click(function(e){
          e.preventDefault();

          $.get('addbrand',function(data){
          $('#addbrand').modal('show')
          .find('#addbrandContent')
          // .load($(this).attr('value'));
          .html(data);

        });

      }); 

            //addcart
      $('.addcart').click(function(e){
          e.preventDefault();

          $.get('addcart',function(data){
          $('#addcart').modal('show')
          .find('#addcartContent')
          // .load($(this).attr('value'));
          .html(data);

        });

      }); 
});