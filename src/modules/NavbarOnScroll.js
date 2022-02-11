import { getElement } from "./tool";

class NavbarOnScroll {
 constructor(){
  this.navBar = getElement("#top-bar");
  this.logo = getElement('.lasaphire-logo')
  this.toTopBtn = getElement(".totop");
  this.events()
 }

 events(){
  window.addEventListener('scroll', this.changeElements.bind(this))
 }

 changeElements(){
  if(window.scrollY > 100){
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
