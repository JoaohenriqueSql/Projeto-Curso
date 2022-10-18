/*menu mobile responsivo*/

class MobileNavbar {
    constructor(mobileMenu, navList, navLinks) {
      this.mobileMenu = document.querySelector(mobileMenu);
      this.navList = document.querySelector(navList);
      this.navLinks = document.querySelectorAll(navLinks);
      this.activeClass = "active";
  
      this.handleClick = this.handleClick.bind(this);
    }

/*animação fade*/
    animateLinks() {
      this.navLinks.forEach((link, index) => {
        link.style.animation
          ? (link.style.animation = "")
          : (link.style.animation = `navLinkFade 0.5s ease forwards ${
              index / 7 + 0.3
            }s`);
      });
    }
  
    handleClick() {
      this.navList.classList.toggle(this.activeClass);
      this.mobileMenu.classList.toggle(this.activeClass);
      this.animateLinks();
    }
  
    addClickEvent() {
      this.mobileMenu.addEventListener("click", this.handleClick);
    }
  
    init() {
      if (this.mobileMenu) {
        this.addClickEvent();
      }
      return this;
    }
  }
  
  const mobileNavbar = new MobileNavbar(
    ".mobile-menu",
    ".nav-list",
    ".nav-list li",
  );
  mobileNavbar.init();

/*script alterar os encaminhamento interno ou externo!!!!!!*/

/*FECHAR BOX DE LOGIN E REGISTRO*/
function popup(popup_name)
{
  get_popup=document.getElementById(popup_name);
  if(get_popup.style.display=="flex")
  {
    get_popup.style.display="none";
  }
  else
  {
    get_popup.style.display="flex";
  }
}


function forgotPopup(){
  document.getElementById('login-popup').style.display="none";
  document.getElementById('forgot-popup').style.display="flex";
}
/*END*/


/*TRAÇOS DO BACKGROUND DA PÁGINA*/
((c) => {
  const options = {
      num: 40,
      particle: {color: 'rgba(0, 255, 234)',
                 szMin: 0.5, szMax: 1,
                 spMin: 0.05, spMax: 0.5},
      link: {color: 'rgba(0, 255, 234)', maxDist: 120}
  };

  const pi2  = Math.PI*2;
  const degrad = Math.PI / 180.0;
  const ctx = c.getContext('2d');
  let w = c.width = window.innerWidth;
  let h = c.height = window.innerHeight;

/*PARTÍCULAS*/
  class Particle {
      constructor() {
          this.p = {x: Math.random() * c.width, y: Math.random() * c.height};
          this.s = options.particle.spMin + Math.random() * options.particle.spMax;
          this.r = options.particle.szMin + Math.random() * options.particle.szMax;
          this.d = Math.random() * pi2;
          this.v = {x: Math.cos(this.d) * this.s, y: Math.sin(this.d) * this.s};
      }
      setDir(d) {
          this.d = d;
          this.v.x = Math.cos(this.d) * this.s;
          this.v.y = Math.sin(this.d) * this.s;
      }
      wrap() {
          if(this.p.x < 0 || this.p.x > w || this.p.y < 0 || this.p.y > h)
              this.setDir(this.d + Math.random() * degrad * 5);
          if( this.p.x < 0) this.p.x += w;
          if( this.p.x > w) this.p.x -= w;
          if( this.p.y < 0) this.p.y += h;
          if( this.p.y > h) this.p.y -= h;
      }
      update() {
          this.p.x += this.v.x;
          this.p.y += this.v.y;
          this.wrap();
      }
      draw() {
          ctx.beginPath();
          ctx.arc(this.p.x, this.p.y, this.r, 0, pi2);
          ctx.fillStyle = options.particle.color;
          ctx.fill();
      }
      drawLink(other) {
          ctx.save();
          ctx.globalAlpha = 1 - (this.distanceTo(other) / options.link.maxDist);
          ctx.beginPath();
          ctx.moveTo(this.p.x, this.p.y);
          ctx.lineWidth = this.r;
          ctx.lineTo(other.p.x, other.p.y);
          ctx.strokeStyle = options.link.color;
          ctx.stroke();
          ctx.restore();
      }
      closeTo(other) {
          let xd = other.p.x - this.p.x;
          let yd = other.p.y - this.p.y;

          return (xd*xd + yd*yd) <= (options.link.maxDist * options.link.maxDist);
      }
      distanceTo(other) {
          let xd = other.p.x - this.p.x;
          let yd = other.p.y - this.p.y;
          
          return Math.sqrt(xd*xd + yd*yd);
      }
  }

  const particles = [...Array(options.num)].map((_, i) => new Particle);

  const resize = () => {
      let s = {x: window.innerWidth / w, y: window.innerHeight / h};
      w = c.width = window.innerWidth;
      h = c.height = window.innerHeight;
      particles.forEach((particle) => {
          particle.p.x *= s.x;
          particle.p.y *= s.y;
          particle.draw();
      });
  };

  let integrate = () => {
      ctx.clearRect(0, 0, w, h);
      particles.forEach((a) => {
          a.update();
          a.draw();
          particles.forEach((b) => {
              if( a === b || !b.closeTo(a) ) return;
              a.drawLink(b);
          });

      });
      window.requestAnimationFrame(integrate);
  };

/*CONEXÃO COM FUNDO E AINMAÇÃO EM TRANSIÇÃO INFINITO*/
  const init = () => {
      c.classList.add('network-background-canvas');
      document.body.insertAdjacentElement('beforeend', c);
      resize();
      window.addEventListener('resize', resize);
      window.requestAnimationFrame(integrate);
  };

  document.addEventListener('DOMContentLoaded', init);
})(document.createElement('canvas'));















