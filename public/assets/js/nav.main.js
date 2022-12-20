    let navbar_inner = document.getElementById('navbar__inner');
    let nav_div = document.getElementById('nav__div');
    let loader = document.getElementById('loader');

    document.body.style.overflowY = "hidden";

     window.onscroll = function() {myFunction()};
     window.onload = function() {myFunction()};

    function myFunction() {
      if(loader){
        document.body.style.overflowY = "auto";
        loader.style.display = "none";
      }else{
          loader.style.display = "none";
      }
      if (document.body.scrollTop > 70 || document.documentElement.scrollTop > 70) {
        navbar_inner.classList.add("row__nav");
        navbar_inner.classList.remove("col__nav");
        nav_div.classList.add("nav__fixed");
        nav_div.classList.remove("nav__abs");
      } else {
        navbar_inner.classList.remove("row__nav");
        navbar_inner.classList.add("col__nav");
        nav_div.classList.remove("nav__fixed");
        nav_div.classList.add("nav__abs");
      }
    }

    /**************************************************

                    Toggle Nav bar Links

    **************************************************/
    let links = document.getElementsByClassName('link');
    let m__links = document.getElementsByClassName('m__link');

    for(let x = 0; x < links.length; x++){
      // console.log(links[x]);
      links[x].addEventListener("click", (e)=>{
          activateLink(e.target);
      })

    }

    for(let i = 0; i < m__links.length; i++){
      // console.log(links[x]);
      m__links[i].addEventListener("click", (e)=>{
          activateLink(e.target);
          toggleMenu('menu--anime-rev','menu--anime','auto');
      })

    }

    function activateLink(target){
      for(let x = 0; x < links.length; x++){
          if(target === links[x]){
            links[x].classList.add('active')
          }else{
            links[x].classList.remove('active')

          }
      }

    }

    /**************************************************

         This Js part handles the menu button toggle

    **************************************************/

    let menu__btn = document.getElementById('menu__btn');
    menu__btn.addEventListener('click',(e)=>{
      toggleMenu('menu--anime','menu--anime-rev','hidden');

    })

    let close__btn = document.getElementById('close__btn');
    close__btn.addEventListener('click',(e)=>{
      toggleMenu('menu--anime-rev','menu--anime','auto');

    })


    function toggleMenu(addAnime,removeAnime,overflow){
      // console.log(addAnime);

      let menu_div = document.getElementById("menu__div");
      let body = document.body;
      menu_div.classList.add(addAnime);
      menu_div.classList.remove(removeAnime);
      body.style.overflowY = overflow;

      if(overflow == 'hidden'){
        for(let i = 0; i < m__links.length; i++){

          m__links[i].style.animationDelay = i/m__links.length+"s";
          m__links[i].classList.add('anime__link');

        }
      }else{

        for(let i = 0; i < m__links.length; i++){

          // m__links[i].classList.add('anime__link');
          setTimeout(()=>{
            m__links[i].classList.remove('anime__link');

          },100)

        }

      }

    }
