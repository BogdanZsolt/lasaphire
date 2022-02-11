import { getElement } from "./tool";

class ScrollToTop {
 constructor() {
  this.toTopBtn = getElement('.totop')
  this.rootElement = document.documentElement
  this.events()
 }

 events(){
  this.toTopBtn.addEventListener('click', this.scrollToTop.bind(this))
 }

 scrollToTop(){
  this.rootElement.scrollTo({
   top: 0,
   behavior: 'smooth',
  })
 }
}

export default ScrollToTop