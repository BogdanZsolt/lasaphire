import { getElement, html2str } from "./tool";

class MegamenuPageGrid {
 constructor(){
   if(document.querySelector('#about-grid')){
     this.aboutGrid = getElement('#about-grid');
     this.menuItems = document.querySelectorAll(".mega-column.menu-item a");
     this.menuData;
     this.init();
   }
 }

 init(){
  this.menuData = [];
  this.menuItems.forEach((item, index) => {
   this.menuData[index] = {
     url: item.href,
     title: html2str(item.querySelector("h5").innerHTML),
     image: item.querySelector("img").src,
   };
  })
  this.aboutGrid.innerHTML = `
   <ul class="menu-grid-wrapper">
    ${this.menuData.map((item) => `
     <li>
      <a href="${item.url}">
       <div class="image-wrapper">
        <img src="${item.image}"
       </div>
       <h5 class="title">${item.title}</h5>
      </a>
     </li>
    `)}
   </ul>
  `
 }

}
export default MegamenuPageGrid