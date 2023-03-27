import "./index.scss";

// Our modules / classes
import { tns } from "tiny-slider";
import Search from "./modules/Search";
import MobileMenu from "./modules/MobileMenu";
import ScrollToTop from "./modules/ScrollToTop";
import NavbarOnScroll from "./modules/NavbarOnScroll";
import OurValuesCardsResize from "./modules/OurValuesCardsResize";
import MegaMenuDropdownClick from "./modules/MegaMenuDropdownClick";
import MegamenuPageGrid from "./modules/MegamenuPageGrid";
import Touch from "./modules/Touch";
// import {getTouchScreen} from './modules/tool'
import ChangeLang from "./modules/ChangeLang";
import ShopMegaMenuUrl from "./modules/ShopMegaMenuUrl";
import InsertDecorIntoMegaMenu from "./modules/InsertDecorIntoMegaMenu";

document.addEventListener("DOMContentLoaded", () => {
	// Product slider
	if (document.querySelector(".tiny-slider")) {
		const tslider = document.querySelector(".tiny-slider");
		tslider.classList.remove("columns-4");
		tslider.firstElementChild.classList.remove("columns-4");
		tslider.firstElementChild.id = "product-slider";
		const items = document.querySelectorAll(
			".tiny-slider.woocommerce ul.products li.product"
		);
		const ptslider = tns({
			container: "#product-slider",
			items: 1,
			gutter: 0,
			nav: false,
			controlsText: [
				'<span class="prev-button"></span>',
				'<span class="next-button"></span>',
			],
			responsive: {
				1280: {
					items: 5,
				},
				1024: {
					items: 4,
				},
				960: {
					items: 3,
				},
				500: {
					items: 2,
				},
				0: {
					items: 1,
				},
			},
		});
	}

	document
		.querySelector(".navbar-toggler-btn")
		.addEventListener("click", () => {
			document.body.classList.toggle("noscroll");
		});

	// Gallery lightbox
	if (document.querySelector("#gallery")) {
		const zoomImgs = document.querySelectorAll(".zoom-img");
		const lightboxArray = Array.from(zoomImgs);
		const lastImage = lightboxArray.length - 1;
		const lightboxContainer = document.querySelector(".lightbox-container");
		const lightboxImage = document.querySelector(".lightbox-image");
		const lightboxBtns = document.querySelectorAll(".lightbox-btn");
		const lightboxBtnLeft = document.querySelector("#left");
		const lightboxBtnRight = document.querySelector("#right");
		let activeImage;

		// functions
		const showLightBox = () => {
			lightboxContainer.classList.add("active");
		};

		const hideLightBox = () => {
			lightboxContainer.classList.remove("active");
		};

		const setActiveImage = (image) => {
			lightboxImage.src = image.dataset.imagesrc;
			activeImage = lightboxArray.indexOf(image);
			removeBtnInactiveClass();
			switch (activeImage) {
				case 0:
					lightboxBtnLeft.classList.add("inactive");
					break;
				case lastImage:
					lightboxBtnRight.classList.add("inactive");
					break;
				default:
					removeBtnInactiveClass();
			}
		};

		const removeBtnInactiveClass = () => {
			lightboxBtns.forEach((btn) => {
				btn.classList.remove("inactive");
			});
		};

		const removeBtnAnimation = () => {
			lightboxBtns.forEach((btn) => {
				setTimeout(function () {
					btn.blur();
				}, 200);
			});
		};

		const transitionSlidesLeft = () => {
			lightboxBtnLeft.focus();
			activeImage === 0
				? setActiveImage(lightboxArray[lastImage])
				: setActiveImage(lightboxArray[activeImage].previousElementSibling);
			removeBtnAnimation();
		};

		const transitionSlidesRight = () => {
			lightboxBtnRight.focus();
			activeImage === lastImage
				? setActiveImage(lightboxArray[0])
				: setActiveImage(lightboxArray[activeImage].nextElementSibling);
			removeBtnAnimation();
		};

		const transitionSlideHandler = (moveItem) => {
			moveItem.includes("left")
				? transitionSlidesLeft()
				: transitionSlidesRight();
		};

		// event listener
		zoomImgs.forEach((image) => {
			image.addEventListener("click", (e) => {
				showLightBox();
				setActiveImage(image);
			});
		});

		lightboxContainer.addEventListener("click", () => {
			hideLightBox();
		});

		lightboxBtns.forEach((btn) => {
			btn.addEventListener("click", (e) => {
				e.stopPropagation();
				transitionSlideHandler(e.currentTarget.id);
			});
		});

		window.addEventListener("keydown", (e) => {
			if (!lightboxContainer.classList.contains("active")) return;
			if (e.key.includes("Left") || e.key.includes("Right")) {
				e.preventDefault();
				transitionSlideHandler(e.key.toLowerCase());
			}
			if (e.key.includes("Escape")) {
				e.preventDefault();
				hideLightBox();
			}
		});
	}

	// KOA Scroll Animations

	const items = document.querySelectorAll("[data-koa]");
	if (items) {
		items.forEach((item) => {
			item.classList.add("koa-" + item.dataset.koa);
		});

		// koa callback function
		const itemObserverCallback = (itemsToWatch, koaObserver) => {
			itemsToWatch.forEach((itemToWatch) => {
				if (itemToWatch.isIntersecting) {
					itemToWatch.target.classList.add("koa-active");
				} else {
					itemToWatch.target.classList.remove("koa-active");
				}
			});
		};

		// koa options
		const itemObserverOptions = {
			threshold: 0.5,
		};

		// koa observer
		const itemObserver = new IntersectionObserver(
			itemObserverCallback,
			itemObserverOptions
		);

		// kOAs observe on items
		items.forEach((item) => {
			itemObserver.observe(item);
		});
	}

	// Cookie Setup

	if (document.querySelector(".cookie-container")) {
		const cookieBox = document.querySelector(".cookie-container");
		const acceptBtn = document.querySelector(".buttons button");

		acceptBtn.addEventListener("click", () => {
			document.cookie = "cookieBy=LaSaphire; max-age=" + 60 * 60 * 24 * 30;
			if (document.cookie) {
				cookieBox.classList.remove("show");
			} else {
				alert("Cookie can't be set!");
			}
		});

		let checkCookie = document.cookie.indexOf("cookieBy=LaSaphire");
		checkCookie == -1
			? cookieBox.classList.add("show")
			: cookieBox.classList.remove("show");
	}

	// Bootstrap

	jQuery(".faq-collapse").collapse();

	jQuery("body").scrollspy({ target: "#faq-category-list" });

	// scroll to top effect
	const totop = new ScrollToTop();

	// Navbar onScroll color change
	const onScroll = new NavbarOnScroll();

	// Mega menu dropdown click
	const megaMenuDropdowClick = new MegaMenuDropdownClick();

	// Front Page Our Values Cards Whith and height equal
	const resizeOurValues = new OurValuesCardsResize();

	// search
	const search = new Search();

	// MobileMenu
	const mobileMenu = new MobileMenu();

	// creates a list from the mega menu on the page that matches the name of the menu item
	const megamenuPageGrid = new MegamenuPageGrid();

	// setup no hover
	const setTouch = new Touch();

	// setup Menu Change Lang
	const changeLang = new ChangeLang();

	// Shop Mega menu set mega-link URLs
	const shopMegaMenuUrl = new ShopMegaMenuUrl();

	// Insert Decor svg element into Mega menu
	// const insertDecorIntoMegaMenu = new InsertDecorIntoMegaMenu()
});
