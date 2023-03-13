import { getElement } from "./tool";

class NavbarOnScroll {
 constructor(){
  this.navBar = getElement("#top-bar");
  // this.logo = getElement('.lasaphire-logo')
  this.logo = getElement('#top-bar .brand')
  this.toTopBtn = getElement(".totop");
  this.events()
  this.changeElements()
 }

 events(){
   window.addEventListener('scroll', () => setTimeout(() => {
    this.changeElements();
   },200));
}

 changeElements(){
  if(window.scrollY > 60){
   this.navBar.classList.add('scrollBgColor')
   this.logo.classList.add('scroll')
   this.toTopBtn.classList.add('scroll')
  } else {
   this.navBar.classList.remove('scrollBgColor')
   this.logo.classList.remove('scroll')
   this.toTopBtn.classList.remove('scroll')
  }
 }
}

export default NavbarOnScroll
