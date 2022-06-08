window.onload = function() { 
  const loader = document.querySelector('.loader_burgerhub');
  loader.remove();
};

$(document).ready(function(){
    $("#navigation_responsive").click(function(){
      $("ul.nav_links").toggleClass("open dark", $('#hamburger-menu')[0].checked);
      $("header.header_burgerhub").toggleClass("dark", $('#hamburger-menu')[0].checked);
    });

    $("li.links").click(function() {
      $(this).addClass("active");
      console.log(this);
    });

    $("#img-profile").click(function(){
      $("div.navigation_profile-dropdown").fadeToggle();
    });

    $(".button_signin").click(function() {
      window.location.assign("signin.php");
    });

    $(window).scroll(function(){
      if ($(this).scrollTop() == 0) {
        $("header.header_burgerhub").css({"background-color": "transparent"});
      } else {
        $("header.header_burgerhub").css({"background-color": "var(--primary-dark)"});
      }
    });
});
