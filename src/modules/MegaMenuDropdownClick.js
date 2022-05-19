import { getTouchScreen } from "./tool";

class MagaMenuDropdownClick {
 constructor(){
  this.dropdownToggles = document.querySelectorAll(".mega-menu-parent.onOpen .dropdown-toggle");
  this.dropdownMenus = document.querySelectorAll(".mega-menu-parent .dropdown-menu");
  this.init()
 }

 events(){
  this.dropdownToggles.forEach(item => {
   item.addEventListener('click', this.openToggle.bind(this))
  })
 }

 init(){
  if(getTouchScreen()){
   this.dropdownMenus.forEach(item => {
    item.classList.add('ontouch')
   })
   this.setDropdownInMenu()
  } else {
   this.events()
  }
 }

 setDropdownInMenu(){
  this.dropdownToggles.forEach(item => {
   // console.log(item.href)
  })
  this.dropdownMenus.forEach(item => {
   // console.log(item);
  })
 }

 openToggle(e){
  console.log("click on " + e.target + " dropdown toggle");
  window.open(e.target, "_self");
 }

}

export default MagaMenuDropdownClick
