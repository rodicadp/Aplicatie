/*artik*/
function limitText(limitField, limitCount, limitNum) {
  limitField.value = limitField.value.replace(/^\s+/g, '');
  if (limitField.value.length > limitNum) {
     limitField.value = limitField.value.substring(0, limitNum);
   } else {
     limitCount.value = limitNum - limitField.value.length + '/' + limitNum;
   }

 }
 /*yt*/
 $(document).ready(function(){
      $('#create_button').click(function(){
           var image_name = $('#image').val();
           if(image_name == '')
           {
                alert("Please Select Image");
                return false;
           }
           else
           {
                var extension = $('#image').val().split('.').pop().toLowerCase();
                if(jQuery.inArray(extension, ['gif','png','jpg','jpeg']) == -1)
                {
                     alert('Invalid Image File');
                     $('#image').val('');
                     return false;
                }
           }
      });
 });
