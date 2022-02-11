class OurValuesCardsResize {
 constructor(){
  this.cards = document.querySelectorAll('#our-values .card')
  this.init()
  this.events()
 }

 events(){
  window.addEventListener('resize', this.widthHeightEqual.bind(this))
 }

 init(){
  this.widthHeightEqual();
 }

 widthHeightEqual(){
  this.cards.forEach(item => {
   item.style.height = getComputedStyle(item).width;
  })
 }
}

export default OurValuesCardsResize