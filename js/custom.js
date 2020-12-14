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
      $('.addtocart').click(function(e){
          e.preventDefault();

          var shoe_id = $(this).attr('val');
          $.get('addtocart?shoe_id='+shoe_id,function(data){
          $('#addtocart').modal('show')
          .find('#addtocartContent')
          // .load($(this).attr('value'));
          .html(data);

        });

      }); 
});