import { getElement } from "./tool";

class MobileMenu {
 constructor(){
   if (document.querySelector("#menu-la-saphire-main-menu")){
     this.mainMenu = getElement("#menu-la-saphire-main-menu");
     this.myAccount = getElement("#myaccount-link");
     this.addMenu = getElement("#la-saphire-additional-menu");
     this.searchIcon = getElement('#search');
     this.cart = getElement("#cart");
     this.header = getElement("#top-bar .row");
     this.mediaQuery = window.matchMedia("(max-width: 767px)");
     this.init()
     this.events();
   }
 }

 events(){
  this.mediaQuery.addEventListener("change", this.screenTest.bind(this));
 }

 init(){
  const screenWidth = screen.width
  if (screenWidth <= 767) {
    this.moveNode();
  } else {
    this.moveBackNode();
  }
 }

 screenTest(e){
  if(e.matches){
   this.moveNode()
  } else {
   this.moveBackNode()
  }
 }

 moveNode(){
  this.mainMenu.appendChild(this.myAccount);
  this.header.appendChild(this.cart)
  this.header.appendChild(this.searchIcon)
 }

 moveBackNode(){
  this.addMenu.insertBefore(this.myAccount, this.addMenu.childNodes[0]);
  this.addMenu.appendChild(this.searchIcon)
  this.addMenu.appendChild(this.cart)
 };

}

export default MobileMenu