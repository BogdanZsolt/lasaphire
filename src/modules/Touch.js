import { getTouchScreen } from "./tool";

class Touch {
	constructor() {
		this.isTouch = getTouchScreen();
		if (document.querySelector(".blog a .img-fluid")) {
			this.frontNewsImgs = document.querySelectorAll(".blog a .img-fluid");
			this.initImages();
		}
	}

	initImages() {
		if (this.isTouch) {
			this.frontNewsImgs.forEach((item) => {
				item.classList.add("ontouch");
			});
		}
	}
}

export default Touch;
