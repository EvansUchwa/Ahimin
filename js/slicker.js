$(document).ready(function(){
    // Slick pour les categorie de la page d'acceuil
  $('.uvpComments').slick({
  dots: false,
  infinite: true,
  speed: 300,
  slidesToShow: 1,
   centerMode: true,
      variableWidth: true,
      prevArrow:false,
      nextArrow:false,
});

  

  // Slick pour les categorie du dashboard
$('.dashSlide').slick({
    dots: false,
     slidesToShow: 5,
      slidesToScroll: 1,
      autoplay: true,
      autoplaySpeed: 2000,
      variableWidth: true,
      // centerMode: true,
      prevArrow:false,
      nextArrow:false,
       responsive: [
    {
      breakpoint: 1200,
      settings: {
        slidesToShow: 4,
        slidesToScroll: 1,
        infinite: true,
      }
    },
    {
      breakpoint: 992,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 1,
        infinite: true,
      }
    },
    {
      breakpoint: 768,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 1
      }
    },
    {
      breakpoint: 576,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 1
      }
    }
    // You can unslick at a given breakpoint now by adding:
    // settings: "unslick"
    // instead of a settings object
  ]
  });

// Pour les produits recents du dash
  // Slick pour les categorie du dashboard
$('.dhlpCardList').slick({
  centerMode: true,
    dots: false,
     slidesToShow: 5,
      slidesToScroll: 1,
      autoplay: true,
      autoplaySpeed: 2000,
      variableWidth: true,
      prevArrow:false,
      nextArrow:false,
       responsive: [
    {
      breakpoint: 1200,
      settings: {
        slidesToShow: 4,
        slidesToScroll: 1,
        infinite: true,
        dots: false
      }
    },
    {
      breakpoint: 992,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 1,
        infinite: true,
        dots: false
      }
    },
    {
      breakpoint: 768,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 1,
        dots: false
      }
    },
    {
      breakpoint: 576,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 1,
        dots: false
      }
    }
    // You can unslick at a given breakpoint now by adding:
    // settings: "unslick"
    // instead of a settings object
  ]
  });

// Pour la page de visualisation de produit
$('.pdisGiant').slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    arrows: false,
    fade: true,
    asNavFor: '.pdisSmall'
  });
  $('.pdisSmall').slick({
    slidesToShow: 3,
    slidesToScroll: 1,
    asNavFor: '.pdisGiant',
    dots: false,
    prevArrow:false,
    nextArrow:false,
    centerMode: true,
    focusOnSelect: true
  });










});