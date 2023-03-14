class ShopMegaMenuUrl {
	constructor() {
		this.links = document.querySelectorAll(".shop-mega-menu .mega-link");
		this.setUrl();
	}

	setUrl() {
		this.links.forEach((link) => {
			link.href = link.protocol + "//" + link.hostname + "/" + link.dataset.url;
			console.log(link.href);
		});
	}
}

export default ShopMegaMenuUrl;
