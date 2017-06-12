$(document).ready(function(){ 
      var hash = window.location.hash,
        navbar = $(".navbar-default").height();
      if(window.location.hash) {
        $('html, body').stop().animate({
            'scrollTop': ($(hash).offset().top) - navbar
        }, 1, 'swing', function () {
          window.scrollTo(0, ($(hash).offset().top) - navbar);
        });
      }
      function setModalCarousel(idModal) {
        $(idModal + ' .slick-carousel').slick({
          slidesToShow: 1,
          slidesToScroll: 1,
          infinite: true,
          arrows: true,
          fade: true,
          cssEase: 'linear',
          prevArrow: '<img class="slick-prev" src="img/icons/arrow-left.png">',
          nextArrow: '<img class="slick-next" src="img/icons/arrow-right.png">'
        });
      }

      function setModalText(idModal) {
        $(idModal + ' .slick-text').slick({
          slidesToShow: 1,
          slidesToScroll: 1,
          infinite: true,
          fade: true,
          draggable: false
        });
      }

      function getImages(idSubservice) {
        var idModal = '#modal-' + idSubservice;
        $.ajax({
          url: 'api.php',
          type: 'GET',
          data: {search:'subservice-photos', id: idSubservice},
          success: function (data) {
            var response = jQuery.parseJSON(data),
                carousel = $(idModal + ' .slick-carousel'),
                text = $(idModal + ' .slick-text');
              if(response['images'] != null || response['images'] != undefined) {
                response['images'].forEach(function (elem) {
                  carousel.append('<div>' +
                    '<div class="rectangle-container">' +
                        '<div class="square-image" style="background-image: url(\'' + elem.path +'\')"></div>' +
                    '</div>' +
                  '</div>');
                  text.append('<p class="description">' + elem.title +'</p>');
                });
              }  
              setModalText(idModal);
              setModalCarousel(idModal);
          }
        });
      }
      var i;
      for (i = 0; i <= 9; i++) {
        getImages(i);
      }

      $('a[href^="#"]:not([href="#"])').on('click',function (e) {
        e.preventDefault();
        var target = this.hash;
        var $target = $(target);
        $('html, body').stop().animate({
            'scrollTop': $target.offset().top - navbar
        }, 700, 'swing',function () {
          window.location.hash = target;
          window.scrollTo(0, ($target.offset().top) - navbar);
        });
      });
      $('#content-wrapper').click(function () {
        $('#navbar').removeClass('navbar-shown');
      });
      $('#navbar-trigger').click(function () {
        $('#navbar').addClass('navbar-shown');
      });
    });