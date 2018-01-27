$(document).ready(function(){
//scroll reveal
  window.sr = ScrollReveal({ reset: true });
  btnContainer = document.getElementById("buttons");
  demoContainer = document.getElementById("demo");

  sr.reveal('.showcase', { duration: 2000 });
  sr.reveal('.showcase-left-top', {duration: 2000, origin:'left'});
  sr.reveal('.showcase-left', { duration: 2000, origin:'left'});
  sr.reveal('.showcase-right', { duration: 2000, origin:'right'});
  sr.reveal('.showcase-seq', { container: btnContainer, duration: 2000, delay:1000 }, 50);

  // Add smooth scrolling to all links
  $("a").on('click', function(event) {

    if (this.hash !== "") {

      event.preventDefault();

      var hash = this.hash;

      $('html, body').animate({
        scrollTop: $(hash).offset().top
      }, 800, function(){
 
        window.location.hash = hash;
      });
    } 
  });

