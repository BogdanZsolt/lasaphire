import { getElement } from "./tool";

class InsertDecorIntoMegaMenu {
	constructor() {
		this.megaMenu = getElement(".shop-mega-menu");
		this.insertElemet();
	}

	insertElemet() {
		this.megaMenu.insertAdjacentHTML(
			"afterbegin",
			`
    <svg class="decor-cat">
		   <use href="#decor-cat"></use>
	   </svg>
    <svg class="decor-cobweb">
		   <use href="#decor-cobweb"></use>
	   </svg>
   `
		);
	}
}

export default InsertDecorIntoMegaMenu;
