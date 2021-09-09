$('.form').find('input, textarea').on('keyup blur focus', function (e) {
  
    var $this = $(this), label = $this.prev('label');
  
        if (e.type === 'keyup') {
              if ($this.val() === '') {
            label.removeClass('active');
          } else {
            label.addClass('active');
          }

      }  
  });
  
  
  $('.tab a').on('click', function (e) {
    
    e.preventDefault();
    
    $(this).parent().addClass('active');
    $(this).parent().siblings().removeClass('active');
    
    target = $(this).attr('href');
  
    $('.form .tab-content > div').not(target).hide();
    
    $(target).fadeIn(600);
    
  });