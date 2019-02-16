jQuery(document).ready(function($){
  $('.MDbutton').on('click',function(){
    var id = $(this).parent('a').attr('id');
    var section = id.split('-');
    $('.window-fade').fadeIn(300);
    $('.center-modal').fadeIn(300);
    $.ajax({
      url: obj_ajax.ajax_url,
      data: {
        'action':'PrintUserForm',
        'data': section,
      },
      success: function(data){
        $('.center-modal').append(data);
      },
      error: function(errThrown) {
        console.log(errThrown);
      }
    });
  });

  $('.center-modal').on('click', function(){
    $('.window-fade').fadeOut(300);
    $(this).fadeOut(300);
  });

  $('form').submit(function(e){
    e.preventDefault(); //Prevent the normal submission action
    var form = $(this);
    var data = $(this).serialize();//Obtenemos datos.
    $.ajax({
      url: obj_ajax.ajax_url,
      data: {
        'action':'InsertMDUser',
        'data': data,
      },
      success: function(resp){
        form.children('input').val('');
        console.log(resp);
      },
      error: function(errThrown) {
        console.log(errThrown);
      }
    });
  });


});
