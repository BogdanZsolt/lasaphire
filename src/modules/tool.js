export const getElement = (selection) => {
	const element = document.querySelector(selection);
	if (element) {
		return element;
	}
	throw new Error(
		`Please check "${selection}" selector, no such elements exists`
	);
};

export const getTouchScreen = () => {
	if ("ontouchstart" in document.documentElement) {
		return true;
	} else {
		return false;
	}
};

export const html2str = (strInput) => {
	return strInput.replace(/<\/?[^>]+(>|$)/g, "");
};
